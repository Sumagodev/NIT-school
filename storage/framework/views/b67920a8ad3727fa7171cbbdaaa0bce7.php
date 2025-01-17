<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        <?php echo e(env('APP_NAME')); ?>

    </title>
    
    <!-- css global-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/iconfonts/font-awesome/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/css/vendor.bundle.base.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/css/vendor.bundle.addons.css')); ?>">
    <!-- poppins font css -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- page style css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <!-- favicon -->
    <link rel="shortcut icon" href="<?php echo e(asset('assets/images/favicon.png')); ?>" />
</head>
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
<body>
    <!--  header -->
    <!--Container Scroller Start-->
    <div class="container-scroller" style="overflow-y: hidden; height: 100vh;">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
                <div class="row flex-grow">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="auth-form-transparent text-left p-3">
                            <!--  Brand Logo -->
                            <div class="brand-logo d-flex justify-content-center">
                                <img src="<?php echo e(asset('/assets/images/new_logo.png')); ?>" alt="logo">
                            </div>
                            <!--  Login Form -->
                            <h4 class="text-center" style="color:#392C70">आमदार परिवार</h4>
                            <?php if(isset($return_data['msg_alert']) && $return_data['msg_alert'] == 'green'): ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo e($return_data['msg']); ?>

                                </div>
                            <?php endif; ?>

                            <?php if(session('error')): ?>
                                <div class="alert alert-danger" role="alert">
                                    <p><?php echo e(session()->get('error')); ?> </p>
                                </div>
                            <?php endif; ?>
                            <?php if(session('success')): ?>
                                <div class="alert alert-success" role="alert">
                                    <p> <?php echo e(session('success')); ?> </p>
                                </div>
                            <?php endif; ?>

                            <form class="pt-3 login_wrap" method="post" action='<?php echo e(route('submitLogin')); ?>'>
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="fa fa-user text-primary"></i>
                                            </span>
                                        </div>
                                        <input class="form-control form-control-lg border-left-0" type="email"
                                            name='email' value='<?php echo e(old('email')); ?>' placeholder="Email">

                                    </div>
                                    <?php if($errors->has('email')): ?>
                                        <span class="red-text"><?php echo $errors->first('email', ':message'); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="fa fa-lock text-primary"></i>
                                            </span>
                                        </div>
                                        <input class="form-control form-control-lg border-left-0 password" id="passport"
                                            type="password" name='password' placeholder='Password'>

                                            <span id="togglePassword" class="togglePpassword password-toggle"
                                            onclick="togglePasswordVisibility()">
                                            <i class="fa fa-eye-slash"></i>
                                        </span>

                                    </div>
                                    <?php if($errors->has('password')): ?>
                                        <span class="red-text"><?php echo $errors->first('password', ':message'); ?></span>
                                    <?php endif; ?>
                                 
                                </div>
                                


                                <div class="my-3">
                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Login</button>
                                    
                                    <div class="border-line"></div>
                                </div>
                                
                            </form>
                            <!--  Login Form -->
                        </div>
                    </div>
                    <!--  Copyright text -->
                    <div class="col-lg-6 login-half-bg d-flex flex-row">
                       
                        <!-- <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright ©
                            <?php echo e(date('Y')); ?>.
                            All rights reserved with Admin.</p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- container-scroller end-->
    <!--footer-->
    <!-- global js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <script src="vendors/js/vendor.bundle.addons.js"></script>
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/misc.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <script>
        $('.digit-group').find('input').each(function() {
            $(this).attr('maxlength', 1);
            $(this).on('keyup', function(e) {
                var parent = $($(this).parent());

                if (e.keyCode === 8 || e.keyCode === 37) {
                    var prev = parent.find('input#' + $(this).data('previous'));

                    if (prev.length) {
                        $(prev).select();
                    }
                } else if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (
                        e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode === 39) {
                    var next = parent.find('input#' + $(this).data('next'));

                    if (next.length) {
                        $(next).select();
                    } else {
                        if (parent.data('autosubmit')) {
                            parent.submit();
                        }
                    }
                }
            });
        });
    </script>
    <script>
        $(".btn-otp").click(function() {
            $(".otp-area").slideUp();
            $(".redirect").slideDown();
        });

        $(".btn-otp2").click(function() {
            $(".otp-area2").slideUp();
            $(".redirecting2").slideDown();
        });

        $(".btn-auth").click(function() {
            $(".business-details").slideDown();
        });

        $(".btn-auth-2").click(function() {
            $(".business-details-2").slideDown();
        });

        $(".btn-non-impo").click(function() {
            $(".non-food-importer").slideDown();
            $(".food-importer").slideUp();
            $(".authorized-user").slideUp();
            $(".btn-non-impo").addClass("btn-register-active");
            $(".btn-autho-user").removeClass("btn-register-active");
            $(".btn-importer").removeClass("btn-register-active");
        });

        $(".btn-autho-user").click(function() {
            $(".authorized-user").slideDown();
            $(".food-importer").slideUp();
            $(".non-food-importer").slideUp();
            $(".btn-autho-user").addClass("btn-register-active");
            $(".btn-importer").removeClass("btn-register-active");
            $(".btn-non-impo").removeClass("btn-register-active");
        });

        $(".btn-importer").click(function() {
            $(".food-importer").slideDown();
            $(".authorized-user").slideUp();
            $(".non-food-importer").slideUp();
            $(".btn-autho-user").removeClass("btn-register-active");
            $(".btn-importer").addClass("btn-register-active");
            $(".btn-non-impo").removeClass("btn-register-active");
        });
    </script>

<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementsByClassName("password")[0];
        var toggleIcon = document.querySelector(".togglePpassword i");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleIcon.classList.remove("fa-eye-slash");
            toggleIcon.classList.add("fa-eye");
        } else {
            passwordInput.type = "password";
            toggleIcon.classList.remove("fa-eye");
            toggleIcon.classList.add("fa-eye-slash");
        }
    }
</script>
</body>

</html>
<?php /**PATH /home3/suhasannakande/public_html/resources/views/admin/login.blade.php ENDPATH**/ ?>