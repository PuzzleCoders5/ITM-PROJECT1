<?php
include_once "../../config.php";

if(isset($_POST['donate']))
{
	$name = $_POST['name'];
	$type = $_POST['type'];
	$amount = $_POST['amount'];
	$date = $_POST['date'];
	$description = $_POST['description'];
	$centre_name = $_POST['centre-name'];
	$centre_region = $_POST['centre-region'];
	$acc_holder = $_POST['acc-holder'];
	$acc_num = $_POST['acc-num'];

	$sql = mysqli_query($conn,"INSERT INTO tblnewdonation (donor,donationType,amount,dateSent,description,centreNo,centreReg,accHolder,accnum) 
					VALUES ('$name','$type','$amount','$date','$description','$centre_name','$centre_region','$acc_holder','$acc_num')");

	if($sql)
	{
		header("location: ../Home.php");
	}
	else
	{
		echo "Failed";
	}
}
?>