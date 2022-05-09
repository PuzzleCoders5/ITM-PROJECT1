<?php
include_once "../../config.php";
session_start();
$session = $_SESSION['unique_id'];
$status = "Accepted";

$sql = mysqli_query($conn,"SELECT * FROM tblpupil WHERE unique_fk = '$session' AND status='$status'");
$output = "";

if(mysqli_num_rows($sql) == 0) //if there is one coordinator on the database
{
	$output .= '<div class="text-center mt-5">
	                <i class="fas fa-exclamation-circle" style="font-size: 44px;"></i>
	                <p>Your child is either unregistered or awaiting manager response.</p>
	            </div>';
}
elseif(mysqli_num_rows($sql) > 0)
{
	include_once "pupil.php";
}
echo $output;
?>
