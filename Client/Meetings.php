<?php
include "Navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Meetings</title>
	<link href="Stylesheet/site-searchbtn.css" rel="stylesheet" />
	<link href="Stylesheet/site-meetings.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body id="body">
<div class="table-container mt-3">
	<div class="container">
        <!---- Icons ---->
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </symbol>
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </symbol>
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </symbol>
        </svg>
        <!----Search button---->
        <div class="search-box">
            <input type="text" placeholder="Type to search..." />
            <div class="search-btn">
                <i class="fas fa-search"></i>
            </div>
            <div class="cancel-btn">
                <i class="fas fa-times"></i>
            </div>
        </div>
        <br>

        <!-- Title -->
		<div class="row justify-content-center">
			<div class="col-12 col-sm-8 col-lg-6">
				<!-- Section Heading-->
				<div class="section_heading text-center">
					<h2 class="heading">Meetings</h2>
					<p>A list of all meetings requested is displayed below.</p>
					<div class="line"></div>
				</div>
			</div>
		</div>

        <div class="row justify-content-center">
            <div class="col-6 text-center">
                <!---- Display message ---->
		        <?php
		        if(isset($_SESSION['message'])) : ?>
                    <div class="alert alert-<?=$_SESSION['msg_type']?> d-flex align-items-center" role="alert">
				        <?php
				        echo $_SESSION['icon'];
				        echo $_SESSION['message'];
				        unset($_SESSION['message']);
				        ?>
                    </div>
		        <?php endif; ?>
            </div>
        </div>

		<div class="row">
			<div class="col-md-12">
				<div class="">
					<div class="card-body">
						<h6 class="card-title text-center"><a href="AllMeetings.php" style="text-decoration: none;">Timeline</a></h6>
						<div id="content">
							<ul class="timeline">

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>

<!----Search Animation Javascript---->
<script>
    const searchBtn = document.querySelector(".search-btn");
    const cancelBtn = document.querySelector(".cancel-btn");
    const searchBox = document.querySelector(".search-box");
    const searchInput = document.querySelector("input");

    searchBtn.onclick = () => {
        searchBox.classList.add("active");
        searchInput.classList.add("active");
        searchBtn.classList.add("active");
        cancelBtn.classList.add("active");
    }
    cancelBtn.onclick = () => {
        searchBox.classList.remove("active");
        searchInput.classList.remove("active");
        searchBtn.classList.remove("active");
        cancelBtn.classList.remove("active");
    }
</script>

<!----Request Meeting Modal---->
<div class="modal fade" id="newmeeting" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title" id="exampleModalLabel">Meeting</h6>
			</div>
			<div class="modal-body">
				<div class="container">
					<h2 class="text-center">Request New Meeting</h2>
					<div class="form-outer">
						<form action="php/insert-meeting.php" class="needs-validation" enctype="multipart/form-data" method="post" novalidate>
							<div class="page">
								<div class="caption text-center">
									<p>
										You can request a meeting with Regional Coordinators in your province and/or other Provincial Liaison.
									</p>
								</div>
								<div class="title text-center"><b>Required Information</b></div>
								<div class="field">
									<div class="label">Provincial Liaison</div>
									<select class="form-select" id="validationCustom01" name="liaison">
										<option selected value="0">Choose...</option>
										<?php
										include_once "../../config.php";
										$sessionid = $_SESSION['unique_id'];
										$liaison = "Provincial Liaison";
										$sql0 = mysqli_query($conn, "SELECT * FROM tblaccount WHERE NOT unique_id='$sessionid' AND user_role='$liaison'");
										while ($row0=mysqli_fetch_assoc($sql0))
										{
											$liaisonid = $row0['unique_id'];

											$sql1 = mysqli_query($conn,"SELECT * FROM tblpersonalinfo WHERE unique_fk='$liaisonid'");
											$row1 = mysqli_fetch_assoc($sql1);
											$title = $row1['title'];
											$fname = $row1['fname'];
											$lname = $row1['lname'];
											$liaisonNo = $row1['unique_fk'];
											?>
											<option value="<?php echo "$liaisonNo"?>"><?php echo "$title".", "."$fname"." "."$lname"?></option>
											<?php
										}
										?>
									</select>
									<div class="valid-feedback">
										Looks good! The liaison will not receive this meeting request.
									</div>
								</div>
								<div class="field">
									<div class="label">Regional Coordinator</div>
									<select class="form-select" id="validationCustom02" name="coordinator">
										<option selected value="0">Choose...</option>
										<?php
                                        //Find the province of the currently logged in user
                                        $sql4 = mysqli_query($conn,"SELECT * FROM tblpersonalinfo WHERE unique_fk='$sessionid'");
                                        $row4 = mysqli_fetch_assoc($sql4);
                                        $province = $row4['province'];

                                        //Find regional coordinators from account table
										$coordinatorid = "Regional Coordinator";
										$sql2 = mysqli_query($conn, "SELECT * FROM tblaccount WHERE NOT unique_id='$sessionid' AND user_role='$coordinatorid'");
										while ($row2=mysqli_fetch_assoc($sql2))
										{
											$coordinatorid = $row2['unique_id'];

											$sql3 = mysqli_query($conn,"SELECT * FROM tblpersonalinfo WHERE unique_fk='$coordinatorid' AND province='$province'");
											$row3 = mysqli_fetch_assoc($sql3);
											$title = $row3['title'];
											$fname = $row3['fname'];
											$lname = $row3['lname'];
											$coordinatorNo = $row3['unique_fk'];
											?>
											<option value="<?php echo "$coordinatorNo"?>"><?php echo "$title"." "."$fname"." "."$lname"?></option>
											<?php
										}
										?>
									</select>
									<div class="valid-feedback">
										Looks good! The coordinator will not receive this meeting request.
									</div>
								</div>
								<div class="field">
									<div class="label">Date</div>
									<input type="date" class="form-control" name="date" id="validationCustom3" required />
									<div class="valid-feedback">
										Looks good!
									</div>
									<div class="invalid-feedback">
										Please select a date for this meeting.
									</div>
								</div>
								<div class="field">
									<div class="label">Start Time</div>
									<input type="time" class="form-control" name="start-time" id="validationCustom04" required />
									<div class="valid-feedback">
										Looks good!
									</div>
									<div class="invalid-feedback">
										Please specify the start time for this meeting.
									</div>
								</div>
								<div class="field">
									<div class="label">End Time</div>
									<input type="time" class="form-control" name="end-time" id="validationCustom05" required />
									<div class="valid-feedback">
										Looks good!
									</div>
									<div class="invalid-feedback">
										Please specify the end time for this meeting.
									</div>
								</div>
								<div class="field">
									<div class="label">Subject</div>
									<input type="text" class="form-control" name="subject" id="validationCustom06" required />
									<div class="valid-feedback">
										Looks good!
									</div>
									<div class="invalid-feedback">
										Please provide a subject.
									</div>
								</div>
								<div class="field">
									<div class="label">Message</div>
									<textarea placeholder="Reason for time extension" class="form-control" name="message" id="validationCustom07" required></textarea>
									<div class="valid-feedback">
										Looks good!
									</div>
									<div class="invalid-feedback">
										Please let us know the topic/agenda for the meeting.
									</div>
								</div>
								<div class="field">
									<div class="label">Location/link</div>
									<input type="text" placeholder="Enter meeting place or a link if online." class="form-control" name="location" id="validationCustom08" required />
									<div class="valid-feedback">
										Looks good!
									</div>
									<div class="invalid-feedback">
										Please provide gathering location/link.
									</div>
								</div>
								<div class="field">
									<div></div>
								</div>
								<div class="fieldbtn">
									<button type="submit" name="send-request" class="btn" id="submit">Request Meeting</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<script src="../../validate-fields.js"></script>
<script src="javascript/meeting.js"></script>
