<?php
require_once '../../includes/autoload.php';

use classes\business\UserManager;

ob_start();
include '../../includes/security.php';
include '../../includes/header.php';
/**
 * For table row
 */
$username='';
$first_name='';
$last_name='';
$search_table='';
$delete_button='';
$toggle_block_button='';
$toggle_subscribe_button='';
?>

<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = $_REQUEST['username'];
    $first_name = $_REQUEST['firstName'];
    $last_name = $_REQUEST['lastName'];
    $UM = new UserManager;
    $is_admin = $UM->adminCheck($_SESSION['user']);
    $search_table='<div class="table-responsive"><table class="table table-bordered">
    <thead><tr><tr><th>id</th><th>Username</th><th>First Name</th><th>Last Name</th>';
    /**
     * admin delete ,toggleblock  db code
     */
    if($is_admin){
        $search_table.='<th>Block Status</th><br><th>Subscription</th><br><th>Toggle Block</th><br><th>Toggle Subscription</th><br><th>Delete</th></tr></thead>';
        $users = $UM->searchUsers($username,$first_name,$last_name);
        $delete_button='<input type="submit" name="deleteButton" value="Delete">';
        $toggle_block_button='<input type="submit" name="toggleBlockButton" value="Toggle Block">';
        $toggle_subscribe_button='<input type = "submit" name="toggleSubscribeButton" value="Toggle Subscribe">';
            foreach($users as $user){
            $is_blocked='Active';
			$is_subscribed='No';
            if($user->is_block){
                $is_blocked='Blocked';
            }
			if($user->is_subscribe){
                $is_subscribed='Yes';
            }
            $search_table .= '<tr>			 
                                <td>'.$user->id.'</td>
                                <td>'.$user->username.'</td>
                                <td>'.$user->first_name.'</td>
                                <td>'.$user->last_name.'</td>
                                <td>'.$is_blocked.'</td>
                                <td>'.$is_subscribed.'</td>								
                                <td><input type="checkbox" name="toggleBlock[]" value='.$user->id.'></td>
								<td><input type ="checkbox" name="toggleSubscribe[]" value ='.$user->id.'></td>
								<td><input type="checkbox" name="delete[]" value='.$user->id.'></td>
                              </tr>';
        }
    }else{
        $search_table.='</tr>';
        $users = $UM->searchUsers($username,$first_name,$last_name);
        foreach($users as $user){
            $is_blocked='';
            if(!$user->is_block){
                $search_table .= '<tr>
                                <td>'.$user->id.'</td>
								<td>'.$user->username.'</td>
                                <td>'.$user->first_name.'</td>
                                <td>'.$user->last_name.'</td>
                                
                                
                               </tr>';
            }
        }
    }
}
?>

<form name='searchUsers' method='POST'>
<div class="row">
			<div class="col-lg-4"></div>
			<div class="col-lg-4">

<div class="form-row">
   <label for="username">Username</label><br>			
			<input type="text" name='username' class='form-control' value='<?=$username?>'></br>

		</div>

<div class="form-row">
   <label for= "firstname" >First Name</label><br>			
			<input type="text" name='firstName'class='form-control' value='<?=$first_name?>'></br>

		</div>
<div class="form-row">
   <label for= "lastname" >Last Name</label><br>			
			<input type="text" name='lastName'class='form-control' value='<?=$last_name?>'></br>

		</div>



<input type='submit' value='Search'>
</div>
</div>
</form>

<form name='searchTable' action='../../../admin/modules/user/toggleBlockDeleteUsers.php' method='POST'>
<table>
<?=$search_table?>
</table>
<?=$toggle_block_button?>
<?=$toggle_subscribe_button?>
<?=$delete_button?>
</form><br><br>

<?php 
include '..\..\includes\footer.php';
?>
