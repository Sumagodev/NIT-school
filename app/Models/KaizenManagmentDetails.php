<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaizenManagmentDetails extends Model
{
    use HasFactory;
    protected $table = 'kaizen_managment_details';
    protected $primaryKey = 'id';
}
