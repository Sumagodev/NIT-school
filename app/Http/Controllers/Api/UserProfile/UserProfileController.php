<?php

namespace App\Http\Controllers\Api\UserProfile;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Validator;
use App\Models\ {
    User
};
use Illuminate\Support\Facades\Config;
use Storage;
use Carbon\Carbon;


class UserProfileController extends Controller
{
    public function getParticularUserProfile(Request $request) {

            try {
                $user = auth()->user()->id;
            
                $data_output = User::leftJoin('tbl_area as district_users', 'users.user_district', '=', 'district_users.location_id')
                ->leftJoin('tbl_area as taluka_users', 'users.user_taluka', '=', 'taluka_users.location_id')
                ->leftJoin('tbl_area as village_users', 'users.user_village', '=', 'village_users.location_id')
                ->where('users.id', $user)
                ->select('users.id',
                    User::raw("CONCAT(users.f_name, COALESCE(CONCAT(' ', users.m_name), ''),' ', users.l_name) AS gramsevak_full_name"),
                    'users.number',
                    'users.user_district',
                    'district_users.name as district_name',
                    'users.user_taluka',
                    'taluka_users.name as taluka_name',
                    'users.user_village',
                    'village_users.name as village_name',
                    'users.aadhar_no',
                    'users.address'               
                    )->distinct('users.id')
                    ->get();
                    
                    foreach ($data_output as $userimage) {
                        $userimage->user_profile = Config::get('DocumentConstant.USER_PROFILE_VIEW') . $userimage->user_profile;
                    }
        
                return response()->json(['status' => 'true', 'message' => 'User data retrieved successfully','data' => $data_output], 200);
            } catch (\Exception $e) {
                return response()->json(['status' => 'false', 'message' => 'User details get fail','error' => $e->getMessage()], 500);
            }
    }
    
    public function changePasswordProfile(Request $request) {
        try {
            $all_data_validation = Validator::make($request->all(), [
                'old_password' => 'required|min:8|max:16', 
                'new_password' => 'required|min:8|max:16|different:old_password', 
            ], [
                'old_password.required' => 'The old password field is required.',
                'old_password.min' => 'The old password must be at least 8 characters.',
                'old_password.max' => 'The old password may not be greater than 16 characters.',
                'new_password.required' => 'The new password field is required.',
                'new_password.min' => 'The new password must be at least 16 characters.',
                'new_password.max' => 'The new password may not be greater than 16 characters.',
                'new_password.different' => 'The new password must be different from the old password.',
            ]);
          
            
            if ($all_data_validation->fails()) {
                $errorMessage = $all_data_validation->errors()->first(); // Simplified error message retrieval
                return response()->json([
                    'status' => 'false',
                    'message' => 'Validation Fail: ' . $errorMessage,
                ], 200); // Changed status code to 422 for validation errors
            }
    
            $user = auth()->user();
            if (!Hash::check($request->old_password, $user->password)) {
                return response()->json(['status' => 'false', 'message' => 'Invalid old password'], 200); // Changed status code to 401 for unauthorized
            }
    
            $user->password = Hash::make($request->new_password);
            $user->save();
    
            return response()->json(['status' => 'true', 'message' => 'Password updated successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'false', 'message' => 'Failed to update password', 'error' => $e->getMessage()], 500);
        }
    }
        
}