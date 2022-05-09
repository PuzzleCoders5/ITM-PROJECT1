<?php
include_once "../../config.php";
$sessionid = $_SESSION['unique_id'];
$sql0 = mysqli_query($conn,"SELECT * FROM tblpersonalinfo WHERE unique_fk='$sessionid'");
$row0 = mysqli_fetch_assoc($sql0);
$pupilid = $row0['pupil_fk'];

$sql = mysqli_query($conn, "SELECT * FROM tblprogressreport WHERE pupil='$pupilid' ORDER BY pupil ASC");

while ($row = mysqli_fetch_assoc($sql))
{
	$centreName = $row['centreName'];
	$centreRegion = $row['centreReg'];
	$pupilName = $row['pupil'];
	$programme = $row['programme'];
	$feedback = $row['feedback'];

	//Get centre name from centre table
	$sql3 = mysqli_query($conn,"SELECT * FROM tblcentre WHERE centreNo='$centreName'");
	$row3 = mysqli_fetch_assoc($sql3);

	//Get centre region from region table
	$sql4 = mysqli_query($conn,"SELECT * FROM tblregion WHERE regionNo='$centreRegion'");
	$row4 = mysqli_fetch_assoc($sql4);

	//Get programme name from programme table
	$sql6 = mysqli_query($conn,"SELECT * FROM tblprogrammes WHERE progId='$programme'");
	$row6 = mysqli_fetch_assoc($sql6);

	//Get feedback name from feedback table
	$sql7 = mysqli_query($conn,"SELECT * FROM tblfeedback WHERE feedbackNo='$feedback'");
	$row7 = mysqli_fetch_assoc($sql7);

	//Get centre name from centre table
	$sql5 = mysqli_query($conn,"SELECT * FROM tblpupil WHERE unique_id ='$pupilName'");
	$row5 = mysqli_fetch_assoc($sql5);

	if(mysqli_num_rows($sql5) > 0)
	{
		$pupil_name = $row5['fname']." ".$row5['lname'];
	}
	else
	{
		$pupil_name = "Not found...";
	}
	$output .= '<tr>
                    <td data-label="Centre Name">'.$row3['name'].'</td>
                    <td data-label="Centre Region">'.$row4['regname'].'</td>
                    <td data-label="Pupil Name">'.$pupil_name.'</td>
                    <td data-label="Programme">'.$row6['pname'].'</td>
                    <td data-label="Term">'.$row['termNo'].'</td>
                    <td data-label="Feedback"><span class="text_open">'.$row7['feedback'].'</span></td>
                    <td data-label="Year">'.$row['dateSaved'].'</td>
                </tr>';
}
