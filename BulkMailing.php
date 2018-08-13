<?php

ob_start();
require_once '../../../PHPMailerAutoload.php';

include '../../includes/security.php';
include '../../includes/header.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $Subject=$_REQUEST["Subject"];
    $Message=$_REQUEST["Message"];
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->setFrom('lithanm6@gmail.com', 'Admin');
    $mail->Subject = $Subject;
    $mail->isHTML(TRUE);
    $mail->Body = $Message;    
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 25;
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPAuth = TRUE;
    
    $mail->Username = 'lithanm6@gmail.com';
    $mail->Password = 'H245hyt12';
    
    $mysql = mysqli_connect('localhost','root','test123');
    mysqli_select_db($mysql,'capstone');
     $result = mysqli_query($mysql,'select * from tb_user');
      foreach($result as $row){
        $mail->addAddress($row['email'],$row['username']);
        if(!$mail->send()) {
            echo $mail->ErrorInfo;
            break;
        }else {
            echo "Message sent to:" .$row['email'];
            
        }
    }
    $mail->clearAddresses();
}
?>
<div class="container-fluid" >			
<div class="row">
		<div class="col-lg-12">	
          <h2 style="text-align:center"><strong>BULK EMAIL FOR ALL USERS</h2><br><br>
		</div>
 </div>
<form method="post" action="BulkMAiling.php">
<div class="row">
			<div class="col-lg-4"></div>
			<div class="col-lg-4">

		<div class="form-row">
      <label class="control-label " for=" Subject">
       Subject
      </label>
      <input class="form-control" id=" Subject" name=" Subject" type="text" value="<?php $Subject?>" /><br><br>
     </div>
     <div class="form-group ">
      <label class="control-label " for="Message">
       Message
      </label>
      <textarea class="form-control" cols="20" id="Message" name="Message" rows="5"value="<?php $Message?>"></textarea><br><br>
     </div>
		
<input type="submit" value="Send" name="send"class='btn btn-primary'/>
<input type="reset" value="clear" name="clear"class='btn btn-primary'/>
</div>
</div>
</div>
</form><br><br>

<?php 
include '../../includes/footer.php';
?>
