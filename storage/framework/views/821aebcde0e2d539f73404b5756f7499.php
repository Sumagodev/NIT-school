<?php $__env->startSection('content'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <style>
        .password-toggle {
            cursor: pointer;
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
        }

        .fa-eye-slash {
            /* display: none; */
        }
    </style>
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Admin Master
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('list-admin')); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Admin Master</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" id="frm_register" name="frm_register" method="post" role="form"
                                action="<?php echo e(route('add-admin')); ?>" enctype="multipart/form-data">
                                <div class="row">
                                    <input type="hidden" name="_token" id="csrf-token" value="<?php echo e(Session::token()); ?>" />

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email ID</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="email" id="email"
                                                placeholder="" value="<?php echo e(old('email')); ?>">
                                            <?php if($errors->has('email')): ?>
                                                <span class="red-text"><?php echo $errors->first('email', ':message'); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="password">Password</label>&nbsp<span class="red-text">*</span>
                                            <input type="password" class="password form-control" name="password"
                                                id="password" placeholder="" value="<?php echo e(old('password')); ?>">
                                            <span id="togglePassword" class="togglePpassword password-toggle"
                                                onclick="togglePasswordVisibility()">
                                                <i class="fa fa-eye-slash"></i>
                                            </span>
                                            <?php if($errors->has('password')): ?>
                                                <span class="red-text"><?php echo $errors->first('password', ':message'); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="password_confirmation">Confirm Password</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="password" class="password_confirmation form-control"
                                                id="password_confirmation" name="password_confirmation"
                                                value="<?php echo e(old('password_confirmation')); ?>">
                                            <span id="toggleConfirmPassword" class=" toggleConfirmPpassword password-toggle"
                                                onclick="toggleConfirmPasswordVisibility()">
                                                <i class="fa fa-eye-slash"></i>
                                            </span>
                                            <span id="password-error" class="error-message red-text"></span>
                                            <?php if($errors->has('password_confirmation')): ?>
                                                <span class="red-text"><?php echo $errors->first('password_confirmation', ':message'); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="f_name">First Name</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="f_name" id="f_name"
                                                placeholder="" value="<?php echo e(old('f_name')); ?>"
                                                oninput="this.value = this.value.replace(/[^a-zA-Z\s.]/g, '').replace(/(\..*)\./g, '$1');">
                                            <?php if($errors->has('f_name')): ?>
                                                <span class="red-text"><?php echo $errors->first('f_name', ':message'); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="m_name">Middle Name</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="m_name" id="m_name"
                                                placeholder="" value="<?php echo e(old('m_name')); ?>"
                                                oninput="this.value = this.value.replace(/[^a-zA-Z\s.]/g, '').replace(/(\..*)\./g, '$1');">
                                            <?php if($errors->has('m_name')): ?>
                                                <span class="red-text"><?php echo $errors->first('m_name', ':message'); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="l_name">Last Name</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="l_name" id="l_name"
                                                placeholder="" value="<?php echo e(old('l_name')); ?>"
                                                oninput="this.value = this.value.replace(/[^a-zA-Z\s.]/g, '').replace(/(\..*)\./g, '$1');">
                                            <?php if($errors->has('l_name')): ?>
                                                <span class="red-text"><?php echo $errors->first('l_name', ':message'); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="number">Mobile Number</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" class="form-control" name="number" id="number"
                                                pattern="[789]{1}[0-9]{9}"
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"
                                                maxlength="10" minlength="10" placeholder=""
                                                value="<?php echo e(old('number')); ?>"
                                                onkeyup="addvalidateMobileNumber(this.value)">
                                            <span id="validation-message" class="red-text"></span>
                                            <?php if($errors->has('number')): ?>
                                                <span class="red-text"><?php echo $errors->first('number', ':message'); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="address">Address</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="address" id="address"
                                                placeholder="" value="<?php echo e(old('address')); ?>">
                                            <?php if($errors->has('address')): ?>
                                                <span class="red-text"><?php echo $errors->first('address', ':message'); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="taluka">Taluka</label>&nbsp<span class="red-text">*</span>
                                            <select class="form-control" name="taluka" id="taluka">
                                                <option value="">Select Taluka</option>
                                                <?php $__currentLoopData = $dynamic_taluka; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taluka): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(old('taluka') == $taluka['location_id']): ?>
                                                        <option value="<?php echo e($taluka['location_id']); ?>" selected>
                                                            <?php echo e($taluka['name']); ?></option>
                                                    <?php else: ?>
                                                        <option value="<?php echo e($taluka['location_id']); ?>">
                                                            <?php echo e($taluka['name']); ?>

                                                        </option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('taluka')): ?>
                                                <span class="red-text"><?php echo $errors->first('taluka', ':message'); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="village">Village</label>&nbsp<span class="red-text">*</span>
                                            <select class="form-control" name="village" id="village">
                                                <option value="">Select Village</option>
                                            </select>
                                            <?php if($errors->has('village')): ?>
                                                <span class="red-text"><?php echo $errors->first('village', ':message'); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="pincode">Pincode</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="pincode" id="pincode"
                                                placeholder="" value="<?php echo e(old('pincode')); ?>"
                                                onkeyup="addvalidatePincode(this.value)">
                                            <span id="validation-message-pincode" class="red-text"></span>
                                            <?php if($errors->has('pincode')): ?>
                                                <span class="red-text"><?php //echo $errors->first('pincode', ':message'); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div> -->
                                    
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        
                                    </div>
                                    

                                    <div class="col-lg-12 col-md-12 col-sm-12 user_tbl">
                                        <div id="data_for_role">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-lg-6 col-md-6 col-sm-6 mt-3">
                                        <div class="form-group form-check form-check-flat form-check-primary">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="is_active"
                                                    id="is_active" value="y" data-parsley-multiple="is_active"
                                                    <?php echo e(old('is_active') ? 'checked' : ''); ?>>
                                                Is Active
                                                <i class="input-helper"></i><i class="input-helper"></i></label>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-sm btn-success" id="submitButton" disabled>
                                            Save &amp; Submit
                                        </button>
                                        
                                        <span><a href="<?php echo e(route('list-admin')); ?>"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            function submitRegister() {
                document.getElementById("frm_register").submit();
            }
        </script>
        <script>
            function addvalidateMobileNumber(number) {
                var mobileNumberPattern = /^\d*$/;
                var validationMessage = document.getElementById("validation-message");

                if (mobileNumberPattern.test(number)) {
                    validationMessage.textContent = "";
                } else {
                    validationMessage.textContent = "Please enter only numbers.";
                }
            }
        </script>
        <script>
            function addvalidatePincode(number) {
                var pincodePattern = /^\d*$/;
                var validationMessage = document.getElementById("validation-message-pincode");

                if (pincodePattern.test(number)) {
                    validationMessage.textContent = "";
                } else {
                    validationMessage.textContent = "Please enter only numbers.";
                }
            }
        </script>


        <script>
            $(document).ready(function() {

                $('#taluka').change(function(e) {
                    e.preventDefault();
                    var talukaId = $('#taluka').val();
                    console.log(talukaId);
                    $('#village').html('<option value="">Select Village</option>');

                    if (talukaId !== '') {
                        $.ajax({
                            url: '<?php echo e(route('village')); ?>',
                            type: 'GET',
                            data: {
                                talukaId: talukaId
                            },
                            // headers: {
                            //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            // },
                            success: function(response) {
                                console.log(response);
                                if (response.village.length > 0) {
                                    $.each(response.village, function(index, village) {
                                        $('#village').append('<option value="' + village
                                            .location_id +
                                            '">' + village.name + '</option>');
                                    });
                                }
                            }
                        });
                    }
                });
            });
        </script>
       
        <script>
            function myFunction(role_id) {
                // alert(role_id);
                $("#data_for_role").empty();
                $.ajax({
                    url: "<?php echo e(route('list-role-wise-permission')); ?>",
                    method: "POST",
                    data: {
                        "role_id": role_id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        $("#data_for_role").empty();
                        $("#data_for_role").append(data);
                    },
                    error: function(data) {}
                });
            }
        </script>

        <!--  -->
        <script>
function formatAadharNumber(input) {
    let value = input.value.replace(/\s/g, ''); // Remove existing spaces
    value = value.replace(/\D/g, ''); // Remove non-numeric characters
    let formattedInput = '';
    for (let i = 0; i < value.length; i++) {
        formattedInput += value[i];
        if ((i + 1) % 4 === 0 && i !== value.length - 1) {
            formattedInput += ' ';
        }
    }
    input.value = formattedInput;
}
</script>

        <script>
            $(document).ready(function() {
                // Function to check if all input fields are filled with valid data
                function checkFormValidity() {
                    const email = $('#email').val();
                    const password = $('#password').val();
                    const password_confirmation = $('#password_confirmation').val();
                    const f_name = $('#f_name').val();
                    const m_name = $('#m_name').val();
                    const l_name = $('#l_name').val();
                    const number = $('#number').val();
                    const address = $('#address').val();
                    const taluka = $('#taluka').val();
                    const village = $('#village').val();

                    // Enable the submit button if all fields are valid
                    if (email && password && password_confirmation && f_name && m_name && l_name && number && address
                        && taluka && village) {
                        $('#submitButton').prop('disabled', false);
                    } else {
                        $('#submitButton').prop('disabled', true);
                    }
                }

                // Call the checkFormValidity function on input change
                $('input,textarea, select, #user_profile').on('input change',
                    checkFormValidity);

                    $.validator.addMethod("number", function(value, element) {
                    return this.optional(element) || /^[0-9]{10}$/.test(value);
                }, "Please enter a valid 10-digit number.");

                $.validator.addMethod("email", function(value, element) {
                    // Regular expression for email validation
                    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                    return this.optional(element) || emailRegex.test(value);
                }, "Please enter a valid email address.");


                $.validator.addMethod("aadharNumber", function(value, element) {
                var aadharPattern = /^\d{4}\s\d{4}\s\d{4}$/;
                    return this.optional(element) || aadharPattern.test(value);
                }, "Please enter a valid Aadhar number");  

                

                // Initialize the form validation
                $("#frm_register").validate({
                    rules: {
                        email: {
                            required: true,
                            email:true,
                        },
                        password: {
                            required: true,
                        },
                        password_confirmation: {
                            required: true,
                        },
                        f_name: {
                            required: true,
                        },
                        m_name: {
                            required: true,
                        },
                        l_name: {
                            required: true,
                        },
                        number: {
                            required: true,
                            number:true,
                        },
                        aadhar_no: {
                            required: true,
                            aadharNumber: true
                        },
                        address: {
                            required: true,
                        },
                        district: {
                            required: true,
                        },
                        taluka: {
                            required: true,
                        },
                        village: {
                            required: true,
                        },
                        user_profile: {
                            required: true,
                        },
                        pincode: {
                            required: true,
                        },

                    },
                    messages: {
                        email: {
                            required: "Please Enter the Eamil",
                        },
                        password: {
                            required: "Please Enter the Password",
                        },
                        password_confirmation: {
                            required: "Please Enter the Confirmation Password",
                        },
                        f_name: {
                            required: "Please Enter the First Name",
                        },
                        m_name: {
                            required: "Please Enter the Middle Name",
                        },
                        l_name: {
                            required: "Please Enter the Last Name",
                        },
                        number: {
                            required: "Please Enter the Number",
                        },
                        aadhar_no: {
                            required: "Please Enter the Aadhar No",
                            pattern: "Please enter a valid Aadhar number (e.g., 1234 5678 9101)", // Custom error message for Aadhar card number validation

                        },
                        address: {
                            required: "Please Enter the Address",
                        },
                        district: {
                            required: "Please Select District",
                        },
                        taluka: {
                            required: "Please Select Taluka",
                        },
                        village: {
                            required: "Please Select Village",
                        },
                        user_profile: {
                            required: "Upload Media File",
                            accept: "Only png, jpeg, and jpg image files are allowed.", // Update the error message for the accept rule
                        },
                        pincode: {
                            required: "Please Enter the Pincode",
                        },
                    },

                });
            });

          
        </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/sumagodemo/public_html/voter_info_collection/resources/views/admin/pages/users/add-admin.blade.php ENDPATH**/ ?>