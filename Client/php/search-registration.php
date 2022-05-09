<?php
include_once "../../config.php";
session_start();
$session = $_SESSION['unique_id'];
$accepted = "Accepted";
$declined = "Declined";
$pending = "Waiting for response...";
$dissmiss = "Show";

//Get the users search value. This is ajax and php communicating back and forth.
$searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
$output = "";

$sql = mysqli_query($conn,"SELECT * FROM tblpupil WHERE unique_fk = '$session' AND status='$pending' AND dismiss='$dissmiss' AND fname LIKE '%{$searchTerm}%' OR lname='%{$searchTerm}%'");

/**** Get new registrations ****/
if(mysqli_num_rows($sql) > 0) {
	while($row = mysqli_fetch_assoc($sql))
	{
		$centre = $row['centre'];
		$centreReg = $row['centreReg'];
		$regid = $row['unique_fk'];

		$sql1 = mysqli_query( $conn, "SELECT * FROM tblcentre WHERE centreNo='$centre' AND centreRegion='$centreReg'" );
		$row1 = mysqli_fetch_assoc( $sql1 );

		$sql3 = mysqli_query( $conn, "SELECT * FROM tblregion WHERE regionNo='$centreReg'" );
		$row3 = mysqli_fetch_assoc( $sql3 );

		$output .= '<div class="col-sm-9 col-md-6 col-lg-4 text-center">
	                <div class="feature-box-1">
	                <img src="../Universal/upload/paperplane1.gif" style="width: 290px;height: 280px" alt="">
	                    <div class="feature-content">
	                        <h5>'.$row['fname']." ".$row['lname'].'</h5>
	                        <p>'.$row1['name'].'</p>
	                        <p>'.$row3['regname'].'</p>
	                        <p>'.$row['status'].'</p><br>
	                        <a href="php/close-registrations.php?deleteid='.$row['unique_id'].'" style="text-decoration: none">Cancel Registration</a><br>
	                    </div>
	                </div>
	            </div>';


	}
}

/**** Get the accepted registrations ****/
$sql0 = mysqli_query($conn,"SELECT * FROM tblpupil WHERE unique_fk = '$session' AND status='$accepted' AND dismiss='$dissmiss' AND fname LIKE '%{$searchTerm}%' OR lname='%{$searchTerm}%'");
if(mysqli_num_rows($sql0) > 0)
{
	while ($row0 = mysqli_fetch_assoc($sql0))
	{
		$centre = $row0['centre'];
		$centreReg = $row0['centreReg'];
		$regid = $row0['unique_fk'];

		$sql1 = mysqli_query( $conn, "SELECT * FROM tblcentre WHERE centreNo='$centre' AND centreRegion='$centreReg'" );
		$row1 = mysqli_fetch_assoc( $sql1 );

		$sql3 = mysqli_query( $conn, "SELECT * FROM tblregion WHERE regionNo='$centreReg'" );
		$row3 = mysqli_fetch_assoc( $sql3 );

		$output .= '<div class="col-sm-9 col-md-6 col-lg-4 text-center">
	                <div class="feature-box-1">
	                        <img src="../Universal/upload/Thumbs%20up.gif" style="width: 290px;height: 280px" alt="">
	                    <div class="feature-content">
	                        <h5>'.$row0['fname']." ".$row0['lname'].'</h5>
	                        <p>'.$row1['name'].'</p>
	                        <p>'.$row3['regname'].'</p>
	                        <p>'.$row0['status'].'</p><br>
	                        <a href="php/close-registrations.php?dismissid='.$row0['pupilNo'].'" style="text-decoration: none">Dismiss</a><br>
                            <a href="php/close-registrations.php?deleteid='.$row0['unique_id'].'" style="text-decoration: none">Cancel Registration</a><br>
	                    </div>
	                </div>
	            </div>';
	}
}

/**** Get the declined registrations ****/
$sql2 = mysqli_query($conn,"SELECT * FROM tblpupil WHERE unique_fk = '$session' AND status='$declined' AND dismiss='$dissmiss' AND fname LIKE '%{$searchTerm}%' OR lname='%{$searchTerm}%'");
if(mysqli_num_rows($sql2) > 0)
{
	while ($row2 = mysqli_fetch_assoc($sql2))
	{
		$centre = $row2['centre'];
		$centreReg = $row2['centreReg'];
		$regid = $row2['unique_fk'];

		$sql1 = mysqli_query( $conn, "SELECT * FROM tblcentre WHERE centreNo='$centre' AND centreRegion='$centreReg'" );
		$row1 = mysqli_fetch_assoc( $sql1 );

		$sql3 = mysqli_query( $conn, "SELECT * FROM tblregion WHERE regionNo='$centreReg'" );
		$row3 = mysqli_fetch_assoc( $sql3 );

		$output .= '<div class="col-sm-9 col-md-6 col-lg-4 text-center">
	                <div class="feature-box-1">
	                        <img src="../Universal/upload/Error.gif" style="width: 290px;height: 280px" alt="">
	                    <div class="feature-content">
	                        <h5>'.$row2['fname']." ".$row2['lname'].'</h5>
	                        <p>'.$row1['name'].'</p>
	                        <p>'.$row3['regname'].'</p>
	                        <p>'.$row2['status'].'</p><br>
	                        <a href="php/close-registrations.php?dismissid='.$row2['pupilNo'].'" style="text-decoration: none">Dismiss</a><br>
	                    </div>
	                </div>
	            </div>';
	}
}

echo $output;
?>