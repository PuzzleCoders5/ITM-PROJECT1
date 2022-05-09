<?php
include_once "../../config.php";
session_start();
$session = $_SESSION['unique_id'];

if(isset($_GET['dismissid']))
{
	$dismiss = $_GET['dismissid'];
	$sql0 = mysqli_query($conn,"SELECT * FROM tblxtratime WHERE TimeNo='$dismiss'");
	$row0 = mysqli_fetch_assoc($sql0);

	$name = $row0['PupilName'];
	$date = $row0['Date'];
	$eta = $row0['ETA'];
	$comment = $row0['Comment'];
	$status = $row0['status'];

	$sql = mysqli_query($conn,"INSERT INTO tblxthistory (unique_fk, PupilName, Date, ETA, Comment, status) VALUES ('$session' ,'$name','$date','$eta','$comment','$status')");

	if($sql)
	{
		$sql1 = mysqli_query($conn, "DELETE FROM tblxtratime WHERE TimeNo='$dismiss'");

		if($sql1)
		{
			header("location: ../Bookings.php");
		}
	}
}