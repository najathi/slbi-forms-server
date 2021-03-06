<?php
// a_config.php template file
include('layouts/a_config.php');
$PAGE_TITLE = "Employee";

include_once 'includes/employees/select_emp_role.inc.php';
include_once 'includes/employees/select_ds-divs.inc.php';
include_once 'includes/employees/select_district.inc.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php
    include('layouts/head-tag-contents.php');
    ?>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light mb-2">
    <?php include("layouts/header-logo.php"); ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <?php include("layouts/main_menu.php"); ?>
</nav>

<div class="container mb-5">

    <h3 class="display-4 mc-2">SLBI Employee Details</h3>

    <?php
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if (strpos($fullUrl, "emp=dataErr") == true) {
        echo '<div style="margin-top:1rem;" class="alert alert-danger" role="alert">
				<strong>Data Insertion</strong> Sorry, that wasn\'t added, <b> Please Try Again</b>  
				</div>';
    } else if (strpos($fullUrl, "emp=sizeErr") == true) {
        echo '<div style="margin-top:1rem;" class="alert alert-danger" role="alert">
				<strong>Image upload</strong> Sorry, image maximum size limit 2MB.<b> Please Try Again</b>  
				</div>';
    } else if (strpos($fullUrl, "emp=fileErr") == true) {
        echo '<div style="margin-top:1rem;" class="alert alert-danger" role="alert">
				<strong>Image upload</strong> Sorry, files are wrong .<b> Please Try Again</b>  
				</div>';
    } else if (strpos($fullUrl, "emp=fileTypeErr") == true) {
        echo '<div style="margin-top:1rem;" class="alert alert-danger" role="alert">
				<strong>Image upload</strong> Sorry, files type is wrong.<b> Please Try Again (Supported types: .jpg, .jpeg, .png )</b>  
				</div>';
    } else if (strpos($fullUrl, "emp=success") == true) {
        echo '<div style="margin-top:1rem;" class="alert alert-success" role="alert">
				<strong>Employee Details</strong> Successfully added,<b> We\'ll contact you soon. </b>  
				</div>';
    }
    ?>

    <form method="post" id="empform" enctype="multipart/form-data">
        <div class="form-group">
            <label for="namee">Employee ID</label>
            <input type="text" class="form-control" placeholder="eg: JOHN/KYO/BBC/DM/10" required name="id" id="id">
        </div>
        <div class="form-group">
            <label for="namee">Full Name</label>
            <input type="text" class="form-control" placeholder="eg: Raymond Joseph Teller" required name="namee"
                   id="namee">
        </div>

        <div class="row">
            <div class="col-sm-6 col-lg-6 mb-3">
                <label for="gender">Gender</label>
                <select class="form-control" required name="gender" id="gender">
                    <option value="">Select your Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="col-sm-6 col-lg-6 mb-3">
                <label for="cstatus">Civil Status</label>
                <select class="form-control" required name="cstatus" id="cstatus">
                    <option value="">Select your Civil Status</option>
                    <option value="Married">Married</option>
                    <option value="Single">Single</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="address_l_one">Address Line 1</label>
                <input type="text" class="form-control" placeholder="eg: 14 Tottenham Court Road" required
                       name="address_l_one"
                       id="address_l_one">
            </div>
            <div class="col-md-6">
                <label for="address_l_one">Address Line 2</label>
                <input type="text" class="form-control" placeholder="eg: London England W1T 1JY" required
                       name="address_l_two"
                       id="address_l_two">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-lg-6 mb-3">
                <label for="nic_no">NIC No</label>
                <input type="text" class="form-control" placeholder="eg: 9723574389v OR 1997235074389v" required
                       name="nic_no" id="nic_no">
            </div>
            <div class="col-sm-6 col-lg-6 mb-3">
                <label for="dobir">Data of Birth</label>
                <input type="date" class="form-control" placeholder="eg: 1996-01-01" required
                       name="dobir" id="dobir" max="2002-12-31">
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 col-lg-6 mb-3">
                <label for="m_no">Personal Contact Number</label>
                <input type="tel" class="form-control" placeholder="eg: 0777823456" required name="m_no" id="m_no">
            </div>
            <div class="col-sm-6 col-lg-6 mb-3">
                <label for="email_add">Your SLBI E-Mail Address</label>
                <input type="email" class="form-control" placeholder="eg: person@slbi.lk" required name="email_add" id="email_add">
            </div>
        </div>
        <div class="form-group">
            <label for="designation">Designation</label>
            <select class="form-control" name="designation" id="designation" required>
                <option value="">Select Designation</option>
                <?php while ($rowSelectEmpRole = mysqli_fetch_assoc($resultSelectEmpRole)) :; ?>
                    <option value="<?= $rowSelectEmpRole['id']; ?>"><?= $rowSelectEmpRole['role_name']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="district">District</label>
            <select class="form-control" name="district" id="district" required">
                <option value="">Select District</option>
                <?php while ($rowSelectDist = mysqli_fetch_assoc($resultSelectDist)) :; ?>
                    <option value="<?= $rowSelectDist['id']; ?>"><?= $rowSelectDist['dist_name']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="row">
            <div class="col-sm-6 col-lg-6 mb-3">
                <label for="ds_div">DS Division</label>
                <select class="form-control" name="ds_div" id="ds_div" required></select>
            </div>
            <div class="col-sm-6 col-lg-6 mb-3">
                <label for="gn_div">GN Division</label>
                <input type="text" class="form-control" placeholder="GN Division" required name="gn_div" id="gn_div">
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 col-lg-6 mb-3">
                <label for="nic_f_img">Driving Licence / NIC Front Image</label>
                <input type="file" accept="image/*" name="nic_f_img" id="nic_f_img" class="form-control mb-1" required>
                <p id="sizeNic1"></p>
                <div class="form-group">
                    <img src="https://placehold.it/80x80" id="preview" class="img-thumbnail">
                </div>
            </div>
            <div class="col-sm-6 col-lg-6 mb-3">
                <label for="nic_b_img">Driving Licence / NIC Back Image</label>
                <input type="file" name="nic_b_img" id="nic_b_img" accept="image/*" class="form-control mb-1" required>
                <p id="sizeNic2"></p>
            </div>
        </div>

        <div class="form-group">
            <label for="pass_img">Passport size photo</label><br/>
            <input type="file" accept="image/*" name="pass_img" id="pass_img" class="mb-1" required>
            <p id="sizePass"></p>
        </div>

        <div class="form-group">
            <label for="sim_no">Do you get company SIM?</label>
            <p>
                <input type="radio" required name="sim_no" id="sim_no" value="yes" required> <span class="mr-5"
                                                                                                   style="padding: 0.7rem 1rem; color: dodgerblue; font-weight: bold;">Yes</span>
                &nbsp;
                <input type="radio" required name="sim_no" id="sim_no" value="no"> <span class="mr-5 noRatio"
                                                                                         style="padding: 0.7rem 1rem; color: red; font-weight: bold;">No</span>
            </p>

        </div>

        <div id="sim-de-div" style="display: none">
            <div class="form-group">
                <label for="sim_no">Provided Company Sim Number</label>
                <input type="tel" class="form-control" placeholder="Provided Sim Number" name="sim_no" id="sim_no">
            </div>
            <div class="form-group">
                <label for="sim_s_no">Provided Sim Serial number (16 digit code in your provided sim card)</label>
                <input type="text" class="form-control" placeholder="Provided Sim Serial number" name="sim_s_no"
                       id="sim_s_no">
            </div>
        </div>

        <input type="submit" id="insert" name="insert" value="Submit" class="btn btn-primary submitBtn">
        <button type="reset" class="btn btn-secondary">Reset</button>
    </form>

    <div id="err"></div>

    <!-- Modal -->
    <div class="modal fade" id="imageError" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle" style="color:red;">Image file is Error</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        File too Big, please select a file less than <strong>6MB.<strong>
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include("layouts/footer.php"); ?>

</body>
<?php include("layouts/scripts-files.php"); ?>


<script>
    $(document).ready(function () {

        $('#pass_img').on('change', function () {

            const size =
                (this.files[0].size / 1000 / 1000).toFixed(2);

            if (size >= 6) {
                $('#pass_img').val("");
                $("#imageError").modal('show');
                $("#sizePass").html('');
            } else {
                $("#sizePass").html('<b>' +
                    size + " MB" + '</b>');
            }
        });

        $('input[type="radio"]').click(function () {
            var value = $(this).val();
            if (value === 'yes') {
                $("#sim-de-div").show();
                $("input#sim_no").prop('required', true);
                $("input#sim_s_no").prop('required', true);
            } else if (value === 'no') {
                $("#sim-de-div").hide();
                $("input#sim_no").prop('required', false);
                $("input#sim_s_no").prop('required', false);
            }
        });

        $('#nic_f_img').on('change', function () {

            const size =
                (this.files[0].size / 1000 / 1000).toFixed(2);

            if (size >= 6) {
                $('#nic_f_img').val("");
                $("#imageError").modal('show');
                $("#sizeNic1").html('');
            } else {
                $("#sizeNic1").html('<b>' +
                    size + " MB" + '</b>');
            }
        });

        $('#nic_b_img').on('change', function () {

            const size =
                (this.files[0].size / 1000 / 1000).toFixed(2);

            if (size >= 6) {
                $('#nic_b_img').val("");
                $("#imageError").modal('show');
                $("#sizeNic2").html('');
            } else {
                $("#sizeNic2").html('<b>' +
                    size + " MB" + '</b>');
            }
        });

        $('#district').on('change', function () {

            var str='';
            var val=document.getElementById('district');
            for (i=0;i< val.length;i++) {
                if(val[i].selected){
                    str += val[i].value + ',';
                }
            }
            var str=str.slice(0,str.length -1);

            $.ajax({
                type: "GET",
                url: "includes/employees/get_ds_div.inc.php",
                data:'ds_div_id='+str,
                success: function(data){
                    $("#ds_div").html(data);
                    //console.log(data);
                }
            });
        });

        $('input[type="file"]').change(function(e) {
            var fileName = e.target.files[0].name;
            $("#nic_f_img").val(fileName);

            var reader = new FileReader();
            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                document.getElementById("preview").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });

        $("#empform").on('submit',(function(e) {
            e.preventDefault();
            $.ajax({
                url: "includes/employees/add_new_emp.inc.php",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                beforeSend : function()
                {
                    //$("#preview").fadeOut();
                    $("#err").fadeOut();
                },
                success: function(data)
                {
                    if(data=='invalid')
                    {
                        // invalid file format.
                        $("#err").html("Invalid File !").fadeIn();
                    }
                    else
                    {
                        // view uploaded file.
                        $("#preview").html(data).fadeIn();
                        $("#form")[0].reset();
                    }
                },
                error: function(e)
                {
                    $("#err").html(e).fadeIn();
                }
            });
        }));

    });
</script>
</html>