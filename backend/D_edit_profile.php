<?php $id = $_SESSION['loginid'];
$compl = mysqli_query($conn, "SELECT * from user WHERE user.id=$id");
$comp = $compl->fetch_assoc();

?>
<div class="app-title">
  <div>
    <h1><i class="fa fa-edit"></i><?php $str1 = substr($_GET['page'], 2);
                                  echo " " . ucfirst($str1); ?></h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item">dashboard</li>
    <li class="breadcrumb-item"><a href="#">Profile</a></li>
  </ul>
</div>
<div class="tile">
    <div class="tile-body">
        <div tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="" role="document">
                <div class="-content">

                    <div class="-body">
                        <div class="col-lg-12">
                            <form class="form-horizontal" action="controller/updateProfile.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="form-group col-md-12 ">

                                        <input type="image" id="blah" src="files/<?php echo $comp['image'] ?>" width="100" height="125" style="float:left"><br>

                                        <input type="text" type="hidden" class="form-control" value="<?php echo $comp['image'] ?>" hidden>

                                    </div>
                                    <div class="form-group col-md-12 "><input type="file" id="avatar" name="image" accept="image/jpg, image/jpeg"><br></div>

                                    <div class="form-group col-md-6 ">
                                        <label class="control-label col-sm-1" for="full_name">Name:</label>

                                        <input type="text" class="form-control" id="full_name" placeholder="<?php echo $comp['name'] ?>" value="<?php echo $comp['name'] ?>" name="name" required>

                                    </div>




                                    <div class="form-group col-md-6 ">
                                        <label class="control-label " for="date">Enrollment ID</label>

                                        <input type="text" class="form-control" id="Fathers_name" placeholder="<?php echo $comp['userid'] ?>" value="<?php echo $comp['userid'] ?>" name="userid" required>

                                    </div>


                                    <div class="form-group col-md-6 ">
                                        <label class="control-label " for="date">Date Of Birth</label>

                                        <input type="date" class="form-control" id="Fathers_name" placeholder="<?php echo $comp['dob'] ?>" value="<?php echo $comp['dob'] ?>" name="dob">
                                        <input type="hidden" name="tbname" value="user">
                                        <input type="hidden" name="id" value="<?php echo $comp['id'] ?>">

                                    </div>

                                    <div class="col-md-6">
                                        <label class="control-label " for="date">Mobile No.</label>
                                        <input type="text" class="form-control" id="mob" placeholder="<?php echo $comp['mob_no'] ?>" value="<?php echo $comp['mob_no'] ?>" name="mob_no">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label " for="email">Email:</label>

                                        <input type="email" class="form-control" id="email" placeholder="<?php echo $comp['email'] ?>" value="<?php echo $comp['email'] ?>" name="email" required>

                                    </div>
                                    <div class="col-md-6">
                                        <label for="email">Password:</label>

                                        <input type="text" class="form-control" id="email" placeholder="New Password" name="password">

                                    </div>


                                </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                        <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>