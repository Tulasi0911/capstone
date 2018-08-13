<?php
include '.\includes\header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Forgotpassword</title>
 <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>

<body>

<div class="container" >
			<div class="row">
				<div class="col-lg-12">	
                <h2 style="text-align:center"><strong>Forgot your password</strong></h2>
				<br><br></br>
               </div>				
		</div>	
         </br>
			<form>
			<div class="row">
				<div class="col-lg-4"></div>				
				<div class="col-lg-4">
                <div class="form-group">  
                <p> 
                   Your Email must be the same as the one<br>
                    you used to register yourself at ABC Community portal. 
				 </br></br>
					<div class="form-group">  
                    <label for="email">Email</label></br>    
                    <input type="email" class="form-control" id="email" placeholder="Enter Email You Register With Us">  
                </div>
				</form></br>
				<div class="form-group">
				 <div class="checkbox">
                 <label><input type="checkbox" value="">I'm not a robot</label>
                  </div><br>
				<div class="form-group">
				<button type="button" class="btn btn-primary" onclick="window.location.href='#'">Send reset password email</button>
				</br></br>
				</div>
				<div class="col-lg-4"></div>
			</div>
		</div></br></br>
	</div>		
		
</div>
</div><br><br>
<!--Footer-->	
 			
</header>
</body>
</html>			 
<?php 
include '.\includes\footer.php';
?>
			 
              