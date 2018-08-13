<?php
ob_start();
use classes\business\UserManager;

require_once 'includes\autoload.php';
include 'includes\header.php';

$form_error="";

$user="";
$password="";
if($_SERVER['REQUEST_METHOD']=='POST'){
    $user=$_REQUEST['username'];
    $password=$_REQUEST['password'];
    
    $UM=new UserManager();
    
    $user_exists=$UM->getUserByUsernamePassword($user,$password);
    if(isset($user_exists)){
        if($user_exists->is_block){
            $form_error='Your account has been temporarily blocked';
        }else{
            session_start();
            $_SESSION['user']=$user;
            header('Location: home.php');
        }
    }else{
        $form_error='Invalid username or password';
    }
}


?>
<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">	
					<div style="width: auto;max-width: 1200px;height: 375px;text-align: center;margin: 0 auto;position: relative; ">
					<img src="images/login.jpg" alt="second Slide">					
					
					</div>
				</div>
			</div>
</div>			
			<div class="container" >
			<div class="row">
				<div class="col-lg-12">	
                <h2 style="text-align:center"><strong>LOGIN</strong></h2>				
               </div>				
		</div>	
         </br>
	<!--Form-->		
			<span class='form-error'><?=$form_error?></span>
			<form name='loginForm' method='post'>
			<div class="row">
				<div class="col-lg-4"></div>				
					<div class="col-lg-4">
						<div class="form-group">  
							<label for="email">USER NAME</label></br>    
                            <input type='text' class='form-control' name='username' id='usernameField' value='<?=$user?>' placeholder='Username'> </br>
						</div>
						<div class="form-group">
							<label for="password">PASSWORD</label></br>    
                            <input type='password' class='form-control' name='password' id='passwordField' value='<?=$password?>' placeholder='Password'>
						</div>
			</form>
						<div class="form-group">
						<button type='submit' class='btn btn-primary btn-block'>SIGN IN</button>
						</br></br>
						<p style="text-align:center">Not a member in ABC ?<a href='modules\user\registration.php' style="color:orange"> Sign Up</a>.</p>
						<p style="text-align:center"><a href=".\forgotpassword.php" style="color:orange"> Forgot Password</a> ?</p>
						</div>
							<div class="col-lg-4"></div>
							</div>
					</div></br></br>
			</div>

<?php 
include 'includes\footer.php';
?>