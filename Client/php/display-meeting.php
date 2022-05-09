<?php
include_once "../../config.php";
session_start();
$sessionid = $_SESSION['unique_id'];
$sql = mysqli_query($conn,"SELECT * FROM tblmeeting WHERE parents='$sessionid' ORDER BY meetingdate DESC");

$output = "";

if(mysqli_num_rows($sql) == 0) //if there is one coordinator on the database
{
	$output .= '<div class="text-center mt-5">
	                <i class="fas fa-exclamation-circle" style="font-size: 44px;"></i>
	                <p>No meetings have been requested at the moment.</p>
	            </div>';
}
elseif(mysqli_num_rows($sql) > 0)
{
	while ($row = mysqli_fetch_assoc($sql))
	{
		$status = $row['status'];
		$organizer = $row['unique_fk'];
		$sql1 = mysqli_query($conn, "SELECT * FROM tblpersonalinfo WHERE unique_fk='$organizer'");
		$row1 = mysqli_fetch_assoc($sql1);
		if(mysqli_num_rows($sql1) > 0)
		{
			$requestfrom = $row1['title'].", ".$row1['fname']." ".$row1['lname'];
		}
		else
		{
			$requestfrom = "Does not exist anymore.";
		}
		$meetingid = $row['meetingId'];
		if($status == "Cancelled")
		{
			$status = $row['status'];
		}
		else{
			$status = "";
		}
		$output .= '<li class="event" data-date="'.$row['meetingdate'].'">
				<h3>'.$row['subject'].'</h3>
				<p>'.$row['message'].'</p>
                <p><b>Location/link:</b> '.$row['location'].'</p>
                <p>'.$row['startTime'].' - '.$row['endTime'].'</p>
                <p style="font-style: italic"><b>Requested by:</b> '.$requestfrom.'</p>
                <h3 style="text-decoration: none;color: #fc5356;">'.$status.'</h3>
                <p><a href="php/meeting-operation.php?dismiss-meetingid='.$meetingid.'" style="text-decoration: none;">Dismiss</a>
                 </p>
			</li>';
	}
}
echo $output;
?>
