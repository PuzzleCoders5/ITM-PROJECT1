<?php
$conn= mysqli_connect("sict-mysql.mandela.ac.za","grp41","grp41-2021","projectdb");

$id=$_GET['Del'];
$query3="DELETE FROM tbldonation WHERE tbldonation.DonationNo ='$id'";
$results3=mysqli_query($conn,$query3);
if($results3)
       {
        header("location: Donation.php");
       }
       else{
         die(mysqli_error($conn));
       }


?>