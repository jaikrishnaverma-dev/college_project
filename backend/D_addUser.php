<?php $id = $_SESSION['loginid'];
$api_key = $_SESSION['api_key'];
if ($_GET['flag'] == 1) { ?>

    <div class="tile">
    <form method="post" action="controller/insert2.php">
        <div class="tile-body">
                <div class="container-fluid">

                    <div class="row">

                        <div class="col-lg-12 col-md-12">
                            <div class="card">

                                <div class="card-body">
                                    <h4 class="card-title"><i class="fa fa-edit"></i> Add New User</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <table class="striped table">

                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            User Type
                                                        </td>
                                                        <td>

                                                            <select name="role" id="" class="form-control">
                                                                <option value="user">User</option>  
                                                                <option value="admin">Admin</option>
                                                            </select>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Name
                                                        </td>
                                                        <td>
                                                            <input type="text" name="name" class="form-control" placeholder="Enter Full Name" required="">
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Email ID
                                                        </td>
                                                        <td>
                                                            <input type="email" name="email" class="form-control" placeholder="Enter Email ID" required="">
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Phone
                                                        </td>
                                                        <td>
                                                            <input type="number" name="mob_no" class="form-control" placeholder="Enter Phone Number" required="">
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            City
                                                        </td>
                                                        <td>
                                                            <input type="text" name="city" class="form-control" placeholder="Enter City" required="">
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            State
                                                        </td>
                                                        <td>
                                                            <select id="state" class="form-control" name="state" required="">
                                                                <option>Select State</option>
                                                                <option value="Andhra Pradesh"> Andhra Pradesh </option>
                                                                <option value="Arunachal Pradesh"> Arunachal Pradesh </option>
                                                                <option value="Assam"> Assam </option>
                                                                <option value="Bihar"> Bihar </option>
                                                                <option value="Chandigarh"> Chandigarh </option>
                                                                <option value="Chhattisgarh"> Chhattisgarh </option>
                                                                <option value="Delhi"> Delhi </option>
                                                                <option value="Gujarat"> Gujarat </option>
                                                                <option value="Haryana"> Haryana </option>
                                                                <option value="Himachal Pradesh"> Himachal Pradesh </option>
                                                                <option value="Jammu and Kashmir"> Jammu and Kashmir </option>
                                                                <option value="Jharkhand"> Jharkhand </option>
                                                                <option value="Karnataka"> Karnataka </option>
                                                                <option value="Kerala"> Kerala </option>
                                                                <option value="Madhya Pradesh"> Madhya Pradesh </option>
                                                                <option value="Maharashtra"> Maharashtra </option>
                                                                <option value="Manipur"> Manipur </option>
                                                                <option value="Meghalaya"> Meghalaya </option>
                                                                <option value="Orissa"> Orissa </option>
                                                                <option value="Puducherry"> Puducherry </option>
                                                                <option value="Punjab"> Punjab </option>
                                                                <option value="Rajasthan"> Rajasthan </option>
                                                                <option value="Tamil Nadu"> Tamil Nadu </option>
                                                                <option value="Telangana"> Telangana </option>
                                                                <option value="Tripura"> Tripura </option>
                                                                <option value="Uttar Pradesh"> Uttar Pradesh </option>
                                                                <option value="Uttarakhand"> Uttarakhand </option>
                                                                <option value="West Bengal "> West Bengal </option>
                                                            </select>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Password
                                                        </td>
                                                        <td>
                                                            <input type="text" name="password" class="form-control" placeholder="Enter password" required="">
                                                            <input type="hidden" name="tbname" value="user">
                                                            <input type="hidden" name="api_key" value="<?php echo $api_key ?>">
                                                            <input type="hidden" name="login_id" value="<?php echo $id ?>">
                                                        </td>


                                                    </tr>



                                                </tbody>
        
            </table>
        </div>
        <div class="col-md-6">
            <div class="col-md-4">
                <img src="master/user.png" alt="" width="80px" height="100px">

            </div>
            <div class="col-md-4 my-2">
                <button class="btn-primary text-white" type="submit"> ADD USER </button>

            </div>

        </div>
        </form>
    </div>





    <!-- *************************************************************** -->
    <!-- End Sales Charts Section -->
    <!-- *************************************************************** -->

    </div>
    </div>
    </div>
<?php } elseif ($_GET['flag'] == 2) { ?>
    <div class="app-title">
<div>
    <h1><i class="fa fa-edit"></i> Users List</h1>
    <p><?php echo $n1['role'] ?></p>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item">User</li>
    <li class="breadcrumb-item"><a href="#">User List</a></li>
  </ul>
</div>
    <div class="tile">
        <div class="tile-body">

        <?php $db->showInTable("user", "id,userid as 'USER ID',name as NAME,role as ROLE,email as EMAIL,mob_no as CONTACT,city as CITY,state as STATE,created_date as 'JOINING DATE'", array("role" => "user"), "editDelete", ""); ?>

        </div>
    </div>
<?php } ?>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#avatar").change(function() {
        readURL(this);
    });
</script>