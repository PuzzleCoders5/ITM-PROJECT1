<?php
include '../../config.php';
session_start();
$unique_fk = $_SESSION['unique_id'];

if(isset($_POST['submit']))
{
	/**** Parent Information****/
	$idnum = $_POST['idNo'];
	$firstname = $_POST['first-name'];
	$lastname = $_POST['last-name'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
	$title = $_POST['title'];
	$phone = $_POST['phone'];
	$workNum = $_POST['workNum'];
	$street = $_POST['street'];
	$province = $_POST['province'];
	$city = $_POST['city'];
	$code = $_POST['code'];

	/**** Pupil Information****/
	$pupilid = $_POST['pupil-idNo'];
	$pupilfname = $_POST['pupil-fname'];
	$pupillname = $_POST['pupil-lname'];
	$pupildob = $_POST['pupil-dob'];
	$pupilgender = $_POST['pupil-gender'];
	$pupilstreet = $_POST['pupil-street'];
	$pupilprovince = $_POST['pupil-province'];
	$pupilcity = $_POST['pupil-city'];
	$pupilcode = $_POST['pupil-code'];
	$pupilcentre = $_POST['pupil-centre'];
	$centrereg = $_POST['centre-region'];

	/**** Next of Kin Information****/
	$kinfname = $_POST['kin-fname'];
	$kinlname = $_POST['kin-lname'];
	$kingender = $_POST['kin-gender'];
	$kintitle = $_POST['kin-title'];
	$kinphone = $_POST['kin-phone'];
	$kinemail = $_POST['kin-email'];
	$kinstreet = $_POST['kin-street'];
	$kinprovince = $_POST['kin-province'];
	$kincity = $_POST['kin-city'];
	$kincode = $_POST['kin-code'];
	$relation = $_POST['kin-relation'];

	/**** Document Information****/
	$idbook = $_FILES['idbook'];
	$residence = $_FILES['residence'];
	$datecreated = $_POST['date-registered'];

	/***** Get file information ****/
	$fileName = $_FILES['birth-cert']['name'];
	$fileTmpName = $_FILES['birth-cert']['tmp_name'];
	$fileSize = $_FILES['birth-cert']['size'];
	$fileError = $_FILES['birth-cert']['error'];
	$fileType = $_FILES['birth-cert']['type'];

	$fileName1 = $_FILES['idbook']['name'];
	$fileTmpName1 = $_FILES['idbook']['tmp_name'];
	$fileSize1 = $_FILES['idbook']['size'];
	$fileError1 = $_FILES['idbook']['error'];
	$fileType1 = $_FILES['idbook']['type'];

	$fileName2 = $_FILES['residence']['name'];
	$fileTmpName2 = $_FILES['residence']['tmp_name'];
	$fileSize2 = $_FILES['residence']['size'];
	$fileError2 = $_FILES['residence']['error'];
	$fileType2 = $_FILES['residence']['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$fileExt1 = explode('.', $fileName1);
	$fileActualExt1 = strtolower(end($fileExt1));

	$fileExt2 = explode('.', $fileName2);
	$fileActualExt2 = strtolower(end($fileExt2));

	$extension = array('pdf', 'jpeg', 'jpg', 'png');

	if((in_array($fileActualExt, $extension) === true) && (in_array($fileActualExt1,$extension) === true)&& (in_array($fileActualExt2,$extension) === true)) //if the file is the accepted format
	{
		$time = time(); //to save the current time. This helps save all images in a unique manner such that the same image can be uploaded many times without trouble.
		$new_file_name = $time.$fileName; //add time to the file name so we can save files with the same name.
		$new_file_name1 = $time.$fileName1; //add time to the file name so we can save files with the same name.
		$new_file_name2 = $time.$fileName2; //add time to the file name so we can save files with the same name.

		//move the file into the folder titled Images.
		//if ( move_uploaded_file( $fileTmpName, "../../Universal/upload/documents/" . $new_file_name ) ) {
			$fileDestination = '../../Universal/upload/documents/'.$new_file_name;
			$fileDestination1 = '../../Universal/upload/documents/'.$new_file_name1;
			$fileDestination2 = '../../Universal/upload/documents/'.$new_file_name2;

			move_uploaded_file($fileTmpName, $fileDestination);
			move_uploaded_file($fileTmpName1, $fileDestination1);
			move_uploaded_file($fileTmpName2, $fileDestination2);

			//-- Pupil unique id --//
			$random_id = rand( time(), 10000000 ); //a random number for each user.
			$status = "Waiting for response...";
			$dismiss = "Show";

			/**** Insert into tblPersonal ****/
			$sql0 = mysqli_query($conn,"INSERT INTO tblpersonalinfo (idNo, fname, lname, dob, gender, title, phone, workNum, streetadd, province, city, code, unique_fk,pupil_fk) VALUES ('$idnum', '$firstname', '$lastname', '$dob', '$gender', '$title', '$phone', '{$workNum}', '$street', '$province', '$city', '$code','$unique_fk','$random_id')");

			/**** Insert into tblKin ****/
			$sql4 = mysqli_query($conn,"INSERT INTO tblkininfo (fname, lname, gender, title, phone, email, street, province, city, code, relation, unique_fk,pupil_fk) VALUES ('$kinfname', '$kinlname','$kingender', '$kintitle', '$kinphone', '$kinemail', '$kinstreet', '$kinprovince', '$kincity', '$kincode', '$relation', '$unique_fk','$random_id')");

			$sql1 = mysqli_query($conn,"INSERT INTO tbldocuments (idBook, residence, dateCreated, unique_fk,pupil_fk) VALUES('{$new_file_name2}', '{$new_file_name2}', '{$datecreated}', '$unique_fk','$random_id')");

			/**** Insert into tblPupil ****/
			$sql1 = mysqli_query($conn,"INSERT INTO tblpupil (unique_id, idNo, fname, lname, dob, gender, street, province, city, code, birthCert, centre, centreReg, unique_fk, status, dismiss) VALUES ('$random_id','$pupilid','$pupilfname','$pupillname','$pupildob','$pupilgender','$pupilstreet','$pupilprovince','$pupilcity','$pupilcode','$new_file_name','$pupilcentre','$centrereg','$unique_fk','$status', '$dismiss')");

			if($sql1)
			{
				header("location: ../Registrations.php");
			}
		//}Comment out the file storage section
		//else
		//{
			//$_SESSION['message'] = "Error encountered while saving your files. Please contact the developers.";
			//$_SESSION['msg_type'] = "danger";
			//$_SESSION['icon'] = '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>';
			//$_SESSION['gif'] = '<img src="../../Universal/upload/Error.gif" alt="User found icon" style="height: 230px; width: 330px">';
			//header("location: ../Register.php");
		//}
	}
	else
	{
		$_SESSION['message'] = "Registration failed! It seems you tried to upload an invalid file. Please choose pdf,jpeg,jpg,png file formats.";
		$_SESSION['msg_type'] = "danger";
		$_SESSION['icon'] = '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>';
		$_SESSION['gif'] = '<img src="../../Universal/upload/Error.gif" alt="User found icon" style="height: 230px; width: 330px">';
		header("location: ../Register.php");
	}
}