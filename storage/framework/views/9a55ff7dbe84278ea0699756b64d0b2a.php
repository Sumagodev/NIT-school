
<?php $__env->startSection('content'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Village Master
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('list-village')); ?>">Area</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Village Master</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" id="regForm" name="frm_register" method="post" role="form"
                                action="<?php echo e(route('update-village')); ?>" enctype="multipart/form-data">
                                <input type="hidden" name="_token" id="csrf-token" value="<?php echo e(Session::token()); ?>" />
                                <div class="row">
                                    
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="taluka">Taluka</label>&nbsp<span class="red-text">*</span>
                                                    <select class="form-control" name="taluka" id="taluka">
                                                        <option value="">Select District</option>
                                                        <?php $__currentLoopData = $dynamic_taluka; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taluka): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($taluka['location_id']); ?>"
                                                        <?php if($taluka['location_id'] == $data_users['data_village']['taluka_id']): ?> <?php echo 'selected'; ?> <?php endif; ?>>
                                                        <?php echo e($taluka['name']); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                    <?php if($errors->has('taluka')): ?>
                                                        <span class="red-text"><?php echo $errors->first('taluka', ':message'); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                    

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Village Name</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control mb-2" name="name" id="name"
                                                placeholder="" value="<?php echo e($data_users['data_village']['name']); ?>"
                                                oninput="this.value = this.value.replace(/[^a-zA-Z\s.]/g, '').replace(/(\..*)\./g, '$1');">
                                            <?php if($errors->has('name')): ?>
                                                <span class="red-text"><?php echo $errors->first('name', ':message'); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    

                                    <br>
                                    <div class="col-lg-2 col-md-2 col-sm-2 mt-3">
                                        <div class="form-group form-check form-check-flat form-check-primary">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="is_active"
                                                    id="is_active" value="y" data-parsley-multiple="is_active"
                                                    <?php if($data_users['data_village']['is_active']): ?> <?php echo 'checked'; ?> <?php endif; ?>>
                                                Is Active
                                                <i class="input-helper"></i><i class="input-helper"></i></label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-2 col-md-2 col-sm-2 mt-3">
                                        <div class="form-group form-check form-check-flat form-check-primary">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="is_ward"
                                                    id="is_ward" value="y" data-parsley-multiple="is_ward"
                                                    <?php echo e(old('is_ward') ? 'checked' : ''); ?>

                                                    <?php if($data_users['data_village']['is_ward']): ?> <?php echo 'checked'; ?> <?php endif; ?>>
                                                Is Ward
                                                <i class="input-helper"></i><i class="input-helper"></i></label>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                                <button type="button" class="btn btn-sm btn-success mt-2" id="add_more">Add More</button>
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12 user_tbl">
                                    <?php $abc = 1; ?>
                                    <div id="row_for_add_more">
                                        <?php $__currentLoopData = $data_users['data_wards']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ward): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="row  mt-2" id="new_row<?php echo e($abc); ?>">
                                                <div class="col-lg-3 col-md-3 col-sm-3">
                                                    <div class="form-group">
                                                        <label for="ward_no_<?php echo e($abc); ?>">Ward Number</label>&nbsp;<span class="red-text">*</span>
                                                        <input type="text" class="form-control" name="ward_no[]" id="ward_no_<?php echo e($abc); ?>"
                                                            placeholder="" value="<?php echo e($ward['ward_name']); ?>">
                                                        <input type="hidden" class="form-check-input" name="ward_no_id[]" id="ward_no_id"
                                                            value="<?php echo e($ward['id']); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <button type="button" name="remove" id="<?php echo e($abc); ?>" class="btn btn-danger btn_remove">X</button>
                                                </div>
                                            </div>
                                            <?php $abc++; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>


                                    <div class="col-md-12 col-sm-12 text-center mt-3">
                                        <input type="hidden" class="form-check-input" name="edit_id" id="edit_id"
                                            value="<?php echo e($data_users['data_village']['location_id']); ?>">
                                        <button type="submit" class="btn btn-sm btn-success" id="submitButton">
                                            Save &amp; Update
                                        </button>
                                        <span><a href="<?php echo e(route('list-village')); ?>" class="btn btn-sm btn-primary">Back</a></span>
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
    $(document).ready(function() {
        // Function to check if all input fields are filled with valid data
        function checkFormValidity() {
            const taluka = $('#taluka').val();
            const name = $('#name').val();
            
        }

        // Call the checkFormValidity function on file input change
        $('input, #english_image, #marathi_image').on('change', function() {
            checkFormValidity();
            validator.element(this); // Revalidate the file input
        });
        // Initialize the form validation
        var form = $("#regForm");
        // Initialize the form validation
        // $("#frm_register").validate({
        var validator = form.validate({
    rules: {
        taluka: {
            required: true,
        },
        name: {
            required: true,
        },
        'ward_no[]': {
            required: function(element) {
                return $("#is_ward").is(":checked");
            },
        },
    },
    messages: {
        taluka: {
            required: "Please Select Taluka",
        },
        name: {
            required: "Please Enter the Village Name",
        },
        'ward_no[]': {
            required: "Please Enter the Ward Number",
        },
    },
    errorPlacement: function (error, element) {
        if (element.attr("name") == "ward_no[]") {
            error.insertAfter(element.closest('.form-group'));
        } else {
            error.insertAfter(element);
        }
    }
});


            $("#is_ward").change(function() {
                // Trigger validation on ward_no[] fields when is_ward checkbox is checked/unchecked
                $("input[name='ward_no[]']").each(function() {
                    $(this).valid();
                });
            });

        // Submit the form when the "Update" button is clicked
        $("#submitButton").click(function() {
            // Validate the form
            if (form.valid()) {
                form.submit();
            }
        });
    });
</script>    



<script>
    $(document).ready(function() {
        // Function to check if all input fields are filled with valid data
        function checkFormValidity() {
            const taluka = $('#taluka').val();
            const name = $('#name').val();

            // Enable the submit button if all fields are valid
            if (taluka && name) {
                $('#submitButton').prop('disabled', false);
            } else {
                $('#submitButton').prop('disabled', true);
            }
        }

        // Call the checkFormValidity function on input change
        $('input,textarea, select, #user_profile').on('input change',
            checkFormValidity);

    });
</script>

<script>
$(document).ready(function() {
    var i = $('#row_for_add_more .row').length + 1; // Start with the current number of rows plus 1

    // Event handler for the "Is Ward" checkbox
    $('#is_ward').change(function() {
        if ($(this).is(':checked')) {
            // If checked, add a new row
            addNewWardRow(i);
            i++;
        } else {
            // If unchecked, remove all rows
            $('#row_for_add_more').empty();
            i = 1; // Reset the counter
        }
    });

    // Add new row on clicking the "Add More" button
    $('#add_more').click(function() {
        // Validate the last added ward number input
        var lastInput = $('#row_for_add_more .row:last-child input[name="ward_no[]"]').val();

        if (lastInput === "") {
            alert("Please fill in the Ward Number before adding a new row.");
            return false;
        }

        addNewWardRow(i);
        i++;
    });

    // Function to add a new row for ward number
    function addNewWardRow(index) {
        var structure = $(`
            <div class="row mt-2" id="new_row` + index + `">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="form-group">
                        <input type="text" class="form-control" name="ward_no[]" id="ward_no_` + index + `"
                            placeholder="Enter Ward Number" value="">
                        <input type="hidden" class="form-check-input" name="ward_no_id[]" id="ward_no_id" value="">
                    </div>
                </div>
                <div class="col-lg-2">
                    <button type="button" name="remove" id="` + index + `" class="btn btn-danger btn_remove">X</button>
                </div>
            </div>
        `);
        $('#row_for_add_more').append(structure);
    }

   $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");

        if ($('#is_ward').is(':checked')) {
            // Check the number of remaining rows
            var rowCount = $('#row_for_add_more .row').length;
            if (rowCount === 1) {
                alert("Cannot remove rows while 'Is Ward' is checked.");
                return false;
            }
        }

        $('#new_row' + button_id).remove();

        // Reorder the rows and update IDs
        $('#row_for_add_more .row').each(function(index) {
            $(this).attr('id', 'new_row' + (index + 1));
            $(this).find('.btn_remove').attr('id', (index + 1));
        });

        i = $('#row_for_add_more .row').length + 1; // Reset the counter
    });
});


    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/suhasannakande/public_html/resources/views/admin/pages/area/edit-village.blade.php ENDPATH**/ ?>