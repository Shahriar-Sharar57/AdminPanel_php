<?php
    require_once('functions/function.php');
    get_header();
    get_sidebar();

    if(!empty($_POST)){
        $name=$_POST['name'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $user=$_POST['username'];
        $role=$_POST['role'];
        $pw=md5($_POST['pass']);
        $rpw=md5($_POST['repass']);
        $image=$_FILES['pic'];
        $imageName='';
        if($image['name']!=''){
          $imageName='user-'.time().'-'.rand(100000,100000000).'.'.pathinfo($image['name'], PATHINFO_EXTENSION);
        }
        if(!empty($name)){
          if(!empty($pw)){
            if($pw===$rpw){
              $insert="INSERT INTO users(user_name,user_phone,user_email,user_username,user_password,role_id,user_photo)
              VALUES('$name','$phone','$email','$user','$pw','$role','$imageName')";
              if(mysqli_query($con,$insert)){
                  move_uploaded_file($image['tmp_name'],'uploads/'.$imageName);
                  echo "Successfully completed user registration.";
              }else{
                  echo "Registration failed!";
              }
          }else{
            echo "Password didn't match!";
          }
        }else{
          echo "Please enter password!";
        }
      }else{
        echo "Please enter your name!";
      }
    }
?>
  <div class="card">
    <form method="post" action="" enctype="multipart/form-data">
      <div class="card-header">
          <div class="row">
              <div class="col-md-8">
                  <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> User Registration</h4>
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
              <input type="text" class="form-control" id="" name="name">
            </div>
          </div>
          <div class="form-group row custom_form_group">
             <label class="col-sm-3 col-form-label">Phone:</label>
             <div class="col-sm-7">
               <input type="text" class="form-control" id="" name="phone">
             </div>
           </div>
          <div class="form-group row custom_form_group">
            <label class="col-sm-3 col-form-label">Email:</label>
            <div class="col-sm-7">
              <input type="email" class="form-control" id="" name="email">
            </div>
          </div>
          <div class="form-group row custom_form_group">
            <label class="col-sm-3 col-form-label">Username:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="" name="username">
            </div>
          </div>
          <div class="form-group row custom_form_group">
            <label class="col-sm-3 col-form-label">Password:</label>
            <div class="col-sm-7">
              <input type="password" class="form-control" id="" name="pass">
            </div>
          </div>
          <div class="form-group row custom_form_group">
            <label class="col-sm-3 col-form-label">Confirm-Password:</label>
            <div class="col-sm-7">
              <input type="password" class="form-control" id="" name="repass">
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
            <div class="col-sm-7">
              <input type="file" name="pic">
            </div>
          </div>
      </div>
      <div class="card-footer text-center">
          <button type="submit" class="btn btn-sm btn-dark submit_btn">REGISTRATION</button>
      </div>
    </form>
  </div>
<?php
    get_footer();
?>
