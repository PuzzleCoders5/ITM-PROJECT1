<?php
include_once "../../config.php";

if(isset($_GET['deleteid']))
{
	$bookingid=$_GET['deleteid'];

	/**** Account information ****/
	$sql = mysqli_query($conn, "DELETE FROM tblxtratime WHERE TimeNo='$bookingid'");
	header("location:../Bookings.php");
}
?>