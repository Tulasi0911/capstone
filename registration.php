<?php 
ob_start();
require_once '../../includes/autoload.php';
include '..\..\includes\header.php';
/**
 * user 3 tier archtecture
 */
use classes\util\DBUConnect;
use classes\entity\User;
use classes\business\UserManager;
/**
 * declare of variables
 */
$form_error='';
$password_error='';
$email_error='';
$first_name='';
$last_name='';
$email='';
$password='';
$confirm_password='';
$username='';
$country='';
$city='';
$company='';
$subscribe='';

/**
  * checking for form submission
 */
if($_SERVER['REQUEST_METHOD']=='POST'){
    $first_name=$_POST['firstName'];
    $last_name=$_POST['lastName'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $username=$_POST['username'];
    if(isset($_POST['country'])){
        $country=$_POST['country'];
    }
    $city=$_POST['city'];
    $company=$_POST['company'];
    
    if(isset($_POST['subscribe']) && $_POST['subscribe'] == '1')
        {
            $subscribe='1';
        }
    else
        {
            $subscribe='0';
        }
        
	if($first_name!='' && $last_name!='' && $email!='' && $password!='' && $username!='' && $country!='' && $city!=''){
        $UM = new UserManager();
        $user=new User();
        $user->first_name=$first_name;
        $user->last_name=$last_name;
        $user->email=$email;
        $user->password=$password;
        $user->username=$username;
        $user->country=$country;
        $user->city=$city;    
        if($company==''){
            $user->company='';
        }else{
            $user->company=$company;
        }
        $user->is_subscribe=$subscribe;
        $user_exists=$UM->getUserByUsername($username);
        
        if(isset($user_exists)){			
            			
            $form_error='Username already exits';
        }else{
            $UM->saveUser($user);
			header('Location:registrationthankyou.php');
        }
    }else{
        $form_error='Please fill in empty fields';
    }
}

?>
<!-- html form for registration -->


<div class='row mt-5'>
<div class='col-1'></div>

<!--Column for form-->
		<div class="container-fluid" >
			
			<div class="row">
				<div class="col-lg-12">	
					<div style="width: auto;max-width: 1200px;height: 500px;text-align: center;margin: 0 auto;position: relative; ">
					<img src="../../images/Register.png" style=" width: 100%;"class="img-responsive">					
					<h2 style="text-align:center"><strong>Registration Form</h2>
					</div>
				</div>
			</div>

	<!--Start of Form-->
	<form name='signupForm' method='POST'>
		<div class="row">
			<div class="col-lg-4"></div>
			<div class="col-lg-4">

		<div class="form-row">
		<p><?=$form_error?></p>
	  <div class="form-group col-12">
	    <label for="usernameField">Username</label>
	    <input type="text" name='username' value='<?=$username?>' class="form-control" id="usernameField" placeholder="username">
  	  <br>
       
      	<label for="passwordField">Password</label>
      	<input type="password" name='password' value='<?=$password?>' class="form-control" id="passwordField" placeholder="Minimum 6 characters">
        
		<br>
	 
      	<label for="confirmPasswordField">Confirm Password</label>
      	<input type="password" name='confirmPassword' value='<?=$confirm_password?>' class="form-control" id="confirmPasswordField" placeholder="Re-type Password">
    
	     <br>
		<label for= "email">Email</label>			
	 <input type="email" name='email' value='<?=$email?>' class="form-control" id="emailField" placeholder="example@example.com">
			<br>
<!--firstName -->	
					   
			<label for= "firstname" >First Name</label>
			
			<input type="text" name='firstName' value='<?=$first_name?>' class="form-control" id="firstNameField" placeholder="John">
		<br>
			 
			<label for= "lastname">Last Name</label>
			
			<input type="text" name='lastName' value='<?=$last_name?>' class="form-control" id="lastNameField" placeholder="Smith">

			<br>
			<label for= "company name">Company Name</label>
				
			<input type="text" name='company' value='<?=$company?>' class="form-control" id="companyField"> 

			<br>
			<label for= "city">City</label>
				
			<input type="text" name='city' value='<?=$city?>' class="form-control" id="cityField">
          
		  <br>
		  
			<label for= "country">Country</label>
				
			<input type="text" name='country' value='<?=$country?>' class="form-control" id="country" placeholder="eg:Singapore"> 
     <br><br>
	 


</form>
       
     <div class="form-check">
    <input type="checkbox" class="form-check-input" name="subscribe" value="1" id="subscribe">
    <label for="updates" class="form-check-label">Notify me about new updates</label>
  </div>
      
			<!--input type ="button" value="SUBMIT" class='btn btn-primary'-->
			<button type='submit' class='btn btn-primary'>Sign up</button>
			<button type='reset' class='btn btn-primary'>Clear</button>
			<!--<input type ="reset" value="CLEAR">-->
			
		</div>
			</div>
			</br>
			<p style="text-align:center">By joining, you agree to the <a style="color:orange">Terms and Privacy Policy</a>.</p>
				
				<p style="text-align:center">Already have an account? <a href="../../login.php" style="color:orange">Login</a>
				<div class="col-lg-4"></div>
			</div>



</form>
</div>
<div class='col-1'></div>
</div>

<?php 
include '..\..\includes\footer.php';
?>
