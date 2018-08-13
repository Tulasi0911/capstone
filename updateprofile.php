<?php 
ob_start();
require_once '../../includes/autoload.php';

use classes\business\UserManager;
use classes\entity\User;

include '../../includes/security.php';
include '../../includes/header.php';

$form_error='';
/**
 * update profile for the current user in session
 */

$UM = new UserManager();
$user_exists=$UM->getUserByUsername($_SESSION['user']);

    $first_name=$user_exists->first_name;
    $last_name=$user_exists->last_name;
    $email=$user_exists->email;
    $password=$user_exists->password;
    $username=$user_exists->username;
    $country=$user_exists->country;
    $city=$user_exists->city; 
	$company=$user_exists->company;
	$subscribe=$user_exists->is_subscribe;
		
?>
<!--<div class="container-fluid" >-->

<form name="updateProfileForm" method="post">
<!--<h1>Profile</h1>-->
<div><?=$form_error?></div>

<div class='row mt-5'>
<div class='col-1'></div>

<!--Column for form-->
		<div class="container-fluid" >
			
			<div class="row">
				<div class="col-lg-12">	
					<div style="width: auto;max-width: 1200px;height: 100px;text-align: center;margin: 0 auto;position: relative; ">
										
					<h2 style="text-align:center"><strong>Profile</h2>
					</div>
				</div>
			</div>

</div>
</div>
<div class="row">
			<div class="col-lg-4"></div>
			<div class="col-lg-4">

<div class="form-row">
   <label for= "firstname" >First Name</label><br>			
			<input type="text" name='firstName'class='form-control' value='<?=$first_name?>'></br>

		</div>
<div>
		<label>Last Name</label><br>
<input type="text" name='lastName'class='form-control' value="<?=$last_name?>"></br>
</div>
<div>
	<label>Email</label><br>
	<input type="text" name='email'class='form-control' value="<?=$email?>"></br>
	</div>
<div>
	<label>Password</label><br>
	<input type="password" name='password'class='form-control' value="<?=$password?>"></br>
</div>
<div>
	<label>Confirm Password</label><br>
	<input type="password" name='cpassword'class='form-control' value="<?=$password?>"></br>
</div>


<div>
	<label>Country</label><br>
	<input type="text" name='country'class='form-control' value="<?=$country?>"></br>
</div>

<div>
	<label>City</label><br>
	<input type="text" name="city"class='form-control' value="<?=$city?>"></br>
</div>

<div>
	<label>Company</label><br>
	<input type="text" name="company"class='form-control' value="<?=$company?>"></br>
</div>
 <div class="form-check">
    <input type="checkbox" class="form-check-input" name="subscribe" id="subscribe" value="1" <?php if ($subscribe == 1) echo 'checked'; ?> >
	<label for="updates" class="form-check-label">Notify me about new updates</label>
  </div>
<div>
   <!--<input type="submit" name="submit" value="Update"><br><br>-->
   <button type='submit' class='btn btn-primary'>Update</button><br><br>
</div>
</div>
</div>
</form>


<?php 
if($_SERVER["REQUEST_METHOD"]=='POST'){
    $first_name=$_REQUEST['firstName'];
    $last_name=$_REQUEST['lastName'];
    $email=$_REQUEST['email'];
    $password=$_REQUEST['password'];
    $country=$_REQUEST['country'];
    $city=$_REQUEST['city'];
    $company=$_REQUEST['company'];
    if($first_name!='' && $last_name!='' && $email!='' && $password!=''){
        $update=true;
        $UM=new UserManager();
        
        if($update){
            $user_exists=$UM->getUserByUsername($_SESSION["user"]);
            $user_exists->first_name=$first_name;
            $user_exists->last_name=$last_name;
            $user_exists->email=$email;
            $user_exists->password=$password;
            $user_exists->country=$country;
            $user_exists->city=$city;
            $user_exists->company=$company;
            if(isset($_POST['subscribe']) && $_POST['subscribe'] == '1')
              {
               $subscribe='1';
              }
            else
              {
            $subscribe='0';
              }
			$user_exists->is_subscribe=$subscribe;
			
            $UM->saveUser($user_exists);

            header("Location:../../home.php");
        }
    }else{
        $form_error="Please provide required values";
    }
}
?>
<?php 
include '..\..\includes\footer.php';
?>
