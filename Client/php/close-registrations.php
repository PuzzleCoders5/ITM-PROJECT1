<?php
include_once "../../config.php";

if(isset($_GET['dismissid']))
{
	$registrationid=$_GET['dismissid'];
	$dismiss = "Dismissed";
	$sql = mysqli_query($conn, "UPDATE tblpupil SET dismiss='$dismiss' WHERE pupilNo='$registrationid'");

	header("location: ../Registrations.php");
}
if(isset($_GET['deleteid']))
{
	$registrationid=$_GET['deleteid'];

	$sql1 = mysqli_query($conn, "DELETE FROM tblpupil WHERE unique_id='$registrationid'");
	$sql2 = mysqli_query($conn, "DELETE FROM tblpersonalinfo WHERE pupil_fk='$registrationid'");
	$sql3 = mysqli_query($conn, "DELETE FROM tbldocuments WHERE pupil_fk='$registrationid'");

	header("location: ../Registrations.php");
}