<?php

include_once "../../../config.php";
session_start();
$sessionid = $_SESSION['unique_id'];

//If a user dismisses, delete from the meetings table but save the data on another table.
if(isset($_GET['dismiss-meetingid']))
{
	$dismiss_id = $_GET['dismiss-meetingid'];
	$sql2 = mysqli_query($conn, "SELECT * FROM tblmeeting WHERE meetingId='$dismiss_id'");
	$row2 = mysqli_fetch_assoc($sql2);
	$organaizer = $row2['unique_fk'];
	$liaison = $row2['liaison'];
	$coordinator = $row2['coordinator'];
	$date = $row2['meetingdate'];
	$start = $row2['startTime'];
	$end = $row2['endTime'];
	$subject = $row2['subject'];
	$message = $row2['message'];
	$location = $row2['location'];
	$status = $row2['status'];

	$todays_date = date("Y-m-d");

	//If the meeting has passed or been cancelled, user may dismiss the card
	if($todays_date < $date)
	{
		//Get the id of the person that created this meeting
		$sql1 = mysqli_query($conn,"INSERT INTO tblmeetingshistory (unique_fk,liaison,coordinator,meetingdate,startTime,endTime,subject,message,location,status)
			VALUES ('$organaizer','$liaison','$coordinator','$date','$start','$end','$subject','$message','$location','$status')");

		if($sql1)
		{
			$sql3 = mysqli_query($conn, "DELETE FROM tblmeeting WHERE meetingId='$dismiss_id'");
			if($sql3)
			{
				$_SESSION['message'] = "Great! You have successfully dismissed the card. Click 'Timeline' to view all meetings";
				$_SESSION['msg_type'] = "success";
				$_SESSION['icon'] = '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>';
				header("location:../Meetings.php");
			}
		}
		else
		{
			$_SESSION['message'] = "Oops, we are not able to dismiss card at the moment.";
			$_SESSION['msg_type'] = "danger";
			$_SESSION['icon'] = '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>';
			header("location:../Meetings.php");
		}
	}
	//If the meeting has not passed or been cancelled then, we cannot allow user to hide the card
	else
	{
		$_SESSION['message'] = "Apologies, you can dismiss this card a day after the meeting.";
		$_SESSION['msg_type'] = "warning";
		$_SESSION['icon'] = '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>';
		header("location:../Meetings.php");
	}
}
?>

