<?php
include_once "../../config.php";
session_start();
$sessionid = $_SESSION['unique_id'];
$sql0 = mysqli_query($conn,"SELECT * FROM tblpersonalinfo WHERE unique_fk='$sessionid'");
$row0 = mysqli_fetch_assoc($sql0);
$pupilid = $row0['pupil_fk'];

$sql = mysqli_query($conn, "SELECT * FROM tblprogressreport WHERE pupil='$pupilid' ORDER BY pupil ASC");
$output = "";

if(mysqli_num_rows($sql) == 0) //if there is one coordinator on the database
{
}
elseif(mysqli_num_rows($sql) > 0)
{
	include_once "report.php";
}
echo $output;