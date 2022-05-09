<?php
include_once "../../config.php";
$session = $_SESSION['unique_id'];
$accepted = "Accepted";
$declined = "Declined";
$pending = "Pending...";

$sql = mysqli_query($conn,"SELECT * FROM tblxtratime WHERE unique_fk = '$session' AND status='$pending'");

/**** Get Unonfirmed Bookings ****/
if(mysqli_num_rows($sql) > 0) {
	while($row = mysqli_fetch_assoc($sql))
	{
		$book = $row['unique_fk'];

		$sql1 = mysqli_query( $conn, "SELECT * FROM tblpupil WHERE unique_fk='$book'" );
		$row1 = mysqli_fetch_assoc( $sql1 );
		$bookingid = $row['TimeNo'];

		$output .= '<div class="col-sm-9 col-md-6 col-lg-4">
	                <div class="feature-box-1">
	                <img src="../Universal/upload/HOURGLASSRED.gif" style="width: 290px;height: 280px" alt="">
	                    <div class="feature-content">
	                        <h5>'.$row1['fname']." ".$row1['lname'].'</h5>
	                        <p>'.$row['Date'].', '.$row['ETA'].'</p>
	                        <p>'.$row['Comment'].'</p>
	                        <p>'.$row['status'].'</p><br>
	                        <a href="php/delete-et-booking.php?deleteid='.$bookingid.'" style="text-decoration: none">Cancel Booking</a><br>
	                    </div>
	                </div>
	            </div>';


	}
}

/**** Get the accepted bookings ****/
$sql0 = mysqli_query($conn,"SELECT * FROM tblxtratime WHERE unique_fk = '$session' AND status='$accepted'");
if(mysqli_num_rows($sql0) > 0)
{
	while ($row0 = mysqli_fetch_assoc($sql0))
	{
		$book = $row0['unique_fk'];

		$sql1 = mysqli_query( $conn, "SELECT * FROM tblpupil WHERE unique_fk='$book'" );
		$row1 = mysqli_fetch_assoc( $sql1 );

		$bookingid = $row0['TimeNo'];

		$output .= '<div class="col-sm-6 col-lg-4">
	                <div class="feature-box-1">
	                        <img src="../../Universal/upload/Thumbs%20up.gif" style="width: 290px;height: 280px" alt="">
	                    <div class="feature-content">
	                        <h5>'.$row1['fname']." ".$row1['lname'].'</h5>
	                        <p>'.$row0['Date'].', '.$row0['ETA'].'</p>
	                        <p>'.$row0['Comment'].'</p>
	                        <p>'.$row0['status'].'</p>
	                        <a href="php/dismiss-et-booking.php?dismissid='.$bookingid.'" style="text-decoration: none">Dismiss</a><br>
                            <a href="php/delete-et-booking.php?deleteid='.$bookingid.'" style="text-decoration: none">Cancel Booking</a><br>
	                    </div>
	                </div>
	            </div>';
	}
}

/**** Get the declined bookings ****/
$sql2 = mysqli_query($conn,"SELECT * FROM tblxtratime WHERE unique_fk = '$session' AND status='$declined'");
if(mysqli_num_rows($sql2) > 0)
{
	while ($row2 = mysqli_fetch_assoc($sql2))
	{
		$book = $row2['unique_fk'];

		$sql1 = mysqli_query( $conn, "SELECT * FROM tblpupil WHERE unique_fk='$book'" );
		$row1 = mysqli_fetch_assoc( $sql1 );

		$bookingid = $row2['TimeNo'];

		$output .= '<div class="col-sm-6 col-lg-4">
	                <div class="feature-box-1">
	                        <img src="../../Universal/upload/Error.gif" style="width: 290px;height: 280px" alt="">
	                    <div class="feature-content">
	                        <h5>'.$row1['fname']." ".$row1['lname'].'</h5>
	                        <p>'.$row2['Date'].', '.$row2['ETA'].'</p>
	                        <p>'.$row2['Comment'].'</p>
	                        <p>'.$row2['status'].'</p><br>
	                        <a href="php/dismiss-et-booking.php?dismissid='.$bookingid.'" style="text-decoration: none">Dismiss</a><br>
	                    </div>
	                </div>
	            </div>';
	}
}


?>