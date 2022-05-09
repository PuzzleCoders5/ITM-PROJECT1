<?php
include_once "../../config.php";
session_start();
$session = $_SESSION['unique_id'];

if(isset($_POST['book']))
{
	$name = $_POST['name'];
	$date = $_POST['date'];
	$eta = $_POST['ETA'];
	$comment = $_POST['comment'];
	$status = "Pending...";


	$sql = mysqli_query($conn,"INSERT INTO tblxtratime (unique_fk, PupilName, Date, ETA, Comment, status) VALUES ('$session' ,'$name','$date','$eta','$comment','$status')");

	if($sql)
	{
		header("location: ../Bookings.php");
	}
}