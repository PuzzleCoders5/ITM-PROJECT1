<?php

include_once "../config.php";
include "Navbar.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reports</title>
    <link href="Stylesheet/site-report.css" rel="stylesheet" />
    <link href="Stylesheet/site-searchbtn.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jQuery UI Datepicker - Default functionality</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body id="body">
<div class="main-content mt-5 text-center">
    <!----Title---->
    <div class="title">
        <h2 class="text-center">Reports</h2>
        <p class="text-center capation">You have different types of report that you can view on this page. Click the button on the card to show the relevant information about that report.</p>
    </div>
    <br />

    <!----Cards---->
    <div class="info-card text-center">
        <!----Meetings Card---->
        <div class="cards">
            <div class="card-icon">
                <span><i class="fas fa-handshake"></i></span>
            </div>
            <div class="card-detail">
                <h4>Meetings</h4>
            </div>
            <p>View dates and time of previous and upcoming meetings.</p>
            <a href="Meetings.php" class="btn btn-outline-light">Show</a>
        </div>

        <!----Events Card---->
        <div class="cards">
            <div class="card-icon">
                <span><i class="fas fa-calendar-alt"></i></span>
            </div>
            <div class="card-detail">
                <h4>Progress Reports</h4>
            </div>
            <p>View the performance progress and participation for your child.</p>
            <a href="ProgressReport.php" class="btn btn-outline-light">Show</a>
        </div>

        <!----Schedules Card---->
        <div class="cards">
            <div class="card-icon">
                <span><i class="fas fa-calendar-day"></i></span>
            </div>
            <div class="card-detail">
                <h4>View Memo</h4>
            </div>
            <p>View dates and time of our weekly schedule.</p>
            <a href="" data-bs-target="#schedule" data-bs-toggle="modal" class="btn btn-outline-light show">Show</a>
        </div>
    </div>
  
	
  




<!----Show Meetings Modal---->
<div class="modal fade" id="meetings" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Meetings</h6>
            </div>
            <div class="modal-body">
                <h4><b>Upcoming Meetings</b></h4>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="col-form-label">From:</label>
                            <p>Sakhekile Soyamba</p>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">To:</label>
                            <p>Parents/Guardian</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="col-form-label">Date:</label>
                            <p>2021/06/28</p>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Start Time:</label>
                            <p>11:25</p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label class="col-form-label">Subject:</label>
                            <p>A new programme is being introduced and we would like to adhere to parents suggestion about this addition. The information of the programme will be disclosed on this day as well.</p>
                        </div>
                    </div>
                    <br />
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="col-form-label">Location:</label>
                            <p>ECD B04 Hall</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="col-form-label">End Time:</label>
                            <p>13:30</p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<?php
$conn = mysqli_connect("sict-mysql.mandela.ac.za","grp41","grp41-2021","projectdb");


if(isset($_POST['save']))
{

	$CName=$_POST['CName'];
	$RName=$_POST['RName'];
	$ProvName=$_POST['ProvName'];

	if($CName!=" "|| $RName!=" "|| $ProvName!=" ")
	{
		$query3="SELECT * FROM tblschedules WHERE pname='$ProvName' AND CName='$CName' AND RName='$RName'";
		$result=mysqli_query($conn,$query3);

		if($result)
		{
			echo "";
		}
		else{
			die(mysqli_error($conn));
		}
	}
}
?>

<!----Show Schedule Modal---->
<div class="modal fade" id="schedule" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">

            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Schedule</h6>
                <div class="profile_content">
                    <div class="profile">
                        <div class="profile_details">
                            <img src="../Universal/CodersLogo.jpg" alt="" />

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <div class="title">
                        <h2 class="text-center header">Centre Memo</h2>
                        <p class="text-center capation">Below is a Memo for all clients and pupil to use. Please note to check this schedule frequently in case updates are made. <a href="#">Click here </a>if you are having trouble with this window.</p>
                    </div>

                    <br />
                    <div class="main-content main-table" id="form2">
                        <form action="Report.php" method="POST">
                            <div class="col-lg-4">
                                <div class="label">Centre Names</div>
                                <select class="form-control" name="CName">

									<?php
									$query2="SELECT distinct name FROM tblcentre ";
									$resultss=mysqli_query($conn,$query2);

									if($resultss)
									{
										echo "";
									}
									else{
										die(mysqli_error($conn));
									}

									while ($row=mysqli_fetch_assoc($resultss))
									{
										$CName=$row['name'];

										?>
                                        <option> <?php echo " $CName"?> </option>

										<?php
									}
									?>
                                </select>

                                <div class="label">Centre Region</div>
                                <select class="form-control" name="RName">

									<?php
									$query2="SELECT distinct regname FROM tblregion";
									$resultss=mysqli_query($conn,$query2);

									if($resultss)
									{
										echo "";
									}
									else{
										die(mysqli_error($conn));
									}

									foreach ($resultss as $rows):

										$RName=$rows['regname'];

										?>
                                        <option> <?php echo $RName?> </option>

									<?php
									endforeach
									?>
                                </select>

                                <div class="label">Province Name</div>
                                <select class="form-control" name="ProvName">

									<?php
									$query2="SELECT distinct provname FROM tblprovince";
									$resultss=mysqli_query($conn,$query2);

									if($resultss)
									{
										echo "";
									}
									else{
										die(mysqli_error($conn));
									}
									foreach ($resultss as $rows):

										$ProvName=$rows['provname'];

										?>
                                        <option> <?php echo $ProvName?> </option>

									<?php
									endforeach
									?>
                                </select>
                            </div>
                    </div>


                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="save">Search</button>
                    <div class="profile_content">
                        <div class="profile">
                            <div class="profile_details">
                                <img src="../Universal/CodersLogo.jpg" alt="" />
                                <div class="name_job">
                                    <div class="name">Puzzle Coders</div>
                                    <div class="job">Web Designer</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                <div class="report-table">
                    <table class="table-striped table-bordered text-center">
                        <thead>
                        <tr>
                            <td style="background-color: #807a7a;color:#fff;">Activity Name</td>
                            <td style="background-color: #005e6b;color:#fff;">Centre Name</td>
                            <td style="background-color: #005e6b;color:#fff;">Centre Region</td>
                            <td style="background-color: #005e6b;color:#fff;">Province Name</td>
                            <td style="background-color: #6f2edb;color:#fff;">Start Date</td>
                            <td style="background-color: #6f2edb;color:#fff;">End Date</td>
                            <td style="background-color: #494949;color:#fff;">Start Time</td>
                            <td style="background-color: #494949;color:#fff;">End Time</td>
                        </tr>
                        </thead>
                        <tbody>

						<?php



						if(isset($_POST['save']))
						{
							foreach($result as $row):

								$AName=$row['AName'];
								$CName=$row['CName'];
								$RName=$row['RName'];
								$ProvName=$row['PName'];
								$SDate=$row['SDate'];
								$EDate=$row['EDate'];
								$STime=$row['Seta'];
								$ETime=$row['Eta'];


								?>
                                <tr>
                                    <td><?php echo $AName;?></td>
                                    <td><?php echo $CName;?></td>
                                    <td><?php echo $RName;?></td>
                                    <td><?php echo $ProvName;?></td>
                                    <td><?php echo $SDate;?></td>
                                    <td><?php echo $EDate;?></td>
                                    <td><?php echo $STime;?></td>
                                    <td><?php echo $ETime;?></td>
                                </tr>
							<?php
							endforeach
							?>
							<?php
						}

						?>












                        </tbody>

                    </table>
                </div>
                <div class="modal-footer">
                    <button onclick="window.print()" class="btn btn-promary">Print</button>
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                </div>

            </div>

        </div>
    </div>

</div>
</div>
</div>

</div>
</body>
</html>
<script>
    let bars = document.querySelector("#bars");
    let sidebar = document.querySelector(".sidebar");

    bars.onclick = function () {
        sidebar.classList.toggle("active");
    }
</script>

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
