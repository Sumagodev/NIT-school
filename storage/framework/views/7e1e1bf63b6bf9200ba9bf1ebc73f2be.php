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
                    Area Master
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('list-taluka')); ?>">Area Master</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Add Taluka</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" id="frm_register" name="frm_register" method="post" role="form"
                                action="<?php echo e(route('add-taluka')); ?>" enctype="multipart/form-data">
                                <div class="row">
                                    <input type="hidden" name="_token" id="csrf-token" value="<?php echo e(Session::token()); ?>" />
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Taluka Name</label>&nbsp;<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="" value="<?php echo e(old('name')); ?>">

                                            <?php if($errors->has('name')): ?>
                                                <span class="red-text"><?php echo e($errors->first('name', ':message')); ?></span>
                                            <?php endif; ?>
                                        </div>
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
                                        
                                        <span><a href="<?php echo e(route('list-taluka')); ?>"
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

    


        <!--  -->

        <script>
            $(document).ready(function() {
                // Function to check if all input fields are filled with valid data
                function checkFormValidity() {
                    const name = $('#name').val();
                    // const district = $('#district').val();
                    // Enable the submit button if all fields are valid
                    if (name) {
                        $('#submitButton').prop('disabled', false);
                    } else {
                        $('#submitButton').prop('disabled', true);
                    }
                }

                // Call the checkFormValidity function on input change
                $('input,textarea, select, #user_profile').on('input change',
                    checkFormValidity);


                // Initialize the form validation
                $("#frm_register").validate({
                    rules: {
                        name: {
                            required: true,
                        },

                    },
                    messages: {
                        name: {
                            required: "Please Enter the Taluka Name",
                        },
                    },

                });
            });

          
        </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\voter_info_collection\resources\views/admin/pages/area/add-taluka.blade.php ENDPATH**/ ?>