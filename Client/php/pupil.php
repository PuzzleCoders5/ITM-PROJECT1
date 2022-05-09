<?php
include_once "../../config.php";
$sessionid = $_SESSION['unique_id'];
$status = "Accepted";

$sql = mysqli_query($conn,"SELECT * FROM tblpupil WHERE unique_fk = '$sessionid' AND status='$status'");

while($row = mysqli_fetch_assoc($sql))
{
	$centreNo = $row['centre'];
	$centreReg = $row['centreReg'];

	$sql1 = mysqli_query($conn, "SELECT * FROM tblcentre WHERE centreNo='$centreNo' AND centreRegion='$centreReg'");
	$row1 = mysqli_fetch_assoc($sql1);

	$sql2 = mysqli_query($conn, "SELECT * FROM tblregion WHERE regionNo='$centreReg'");
	$row2 = mysqli_fetch_assoc($sql2);

	$sql3 = mysqli_query($conn, "SELECT * FROM tbldocuments WHERE unique_fk='$sessionid'");
	$row3 = mysqli_fetch_assoc($sql3);

	$output .= '<div class="col-sm-6 col-lg-4">
					<div class="feature-box-1">
						<div class="icon">
							<i class="fa fa-user-graduate"></i>
						</div>
						<div class="feature-content">
							<h5>'.$row['fname'].' '.$row['lname'].'</h5>
							<p>'.$row1['name'].'</p>
							<p>'.$row2['regname'].'</p>
							<p>Registered: '.$row3['dateCreated'].'</p>
							<a href="Programmes.php?centreprovince='.$row1['province'].'" style="text-decoration: none">View Programmes</a>
						</div>
					</div>
				</div>
';
}