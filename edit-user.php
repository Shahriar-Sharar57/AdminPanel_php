<?php
    require_once('functions/function.php');
    get_header();
    get_sidebar();

    $eid=$_GET['e'];
    $sel="SELECT * FROM users where user_id='$eid'";
    $Q=mysqli_query($con,$sel);
    $data=mysqli_fetch_assoc($Q);

    if(!empty($_POST)){
      $id=$_POST['id'];
      $name=$_POST['name'];
      $phone=$_POST['phone'];
      $email=$_POST['email'];

      $update="UPDATE users SET user_name='$name', user_phone='$phone',
      user_email='$email' WHERE user_id='$id'";

      if(mysqli_query($con,$update)){
        header('Location:view-user.php?v='.$id);
      }else{
        echo "Opps! update failed.";
      }
    }
?>
  <div class="card">
    <form method="post" action="" enctype="multipart/form-data">
      <div class="card-header">
          <div class="row">
              <div class="col-md-8">
                  <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> Update User Information</h4>
              </div>
              <div class="col-md-4 text-right">
                  <a class="btn btn-sm btn-dark card_top_btn" href="all-user.php"><i class="fa fa-th"></i> All User</a>
              </div>
              <div class="clearfix"></div>
          </div>
      </div>
      <div class="card-body">
         <div class="form-group row custom_form_group">
            <label class="col-sm-3 col-form-label">Name:</label>
            <div class="col-sm-7">
              <input type="hidden" name="id" value="<?= $data['user_id'];?>"/>
              <input type="text" class="form-control" id="" name="name" value="<?= $data['user_name'];?>">
            </div>
          </div>
          <div class="form-group row custom_form_group">
             <label class="col-sm-3 col-form-label">Phone:</label>
             <div class="col-sm-7">
               <input type="text" class="form-control" id="" name="phone" value="<?= $data['user_phone'];?>">
             </div>
           </div>
          <div class="form-group row custom_form_group">
            <label class="col-sm-3 col-form-label">Email:</label>
            <div class="col-sm-7">
              <input type="email" class="form-control" id="" name="email" value="<?= $data['user_email'];?>">
            </div>
          </div>
          <div class="form-group row custom_form_group">
            <label class="col-sm-3 col-form-label">Username:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="" name="username" value="<?= $data['user_username'];?>" disabled>
            </div>
          </div>
          <div class="form-group row custom_form_group">
            <label class="col-sm-3 col-form-label">User Role:</label>
            <div class="col-sm-7">
              <select class="form-control" name="role">
                  <option value="">Select Role</option>
                  <?php
                    $selr="SELECT * FROM role ORDER BY role_id ASC";
                    $QR=mysqli_query($con,$selr);
                    while($urole=mysqli_fetch_assoc($QR)){
                  ?>
                  <option value="<?= $urole['role_id']; ?>"><?= $urole['role_name']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group row custom_form_group">
            <label class="col-sm-3 col-form-label">Photo:</label>
            <div class="col-sm-4">
              <input type="file" name="pic">
            </div>
            <div class="col-md-3">
                <?php
                    if($data['user_photo']!=''){
                ?>
                <img class="img-thumbnail" style="max-height:150px;" src="uploads/<?= $data['user_photo'];?>" />
                <?php }else{ ?>
                <img class="img-thumbnail" style="max-height:150px;" src="images/avatar.jpg" />
                <?php } ?>
            </div>
          </div>
      </div>
      <div class="card-footer text-center">
          <button type="submit" class="btn btn-sm btn-dark submit_btn">UPDATE</button>
      </div>
    </form>
  </div>
<?php
    get_footer();
?>
