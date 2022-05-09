<?php
    include_once "Navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="Stylesheet/site-reglist.css" rel="stylesheet" />
    <link href="Stylesheet/site-searchbtn.css" rel="stylesheet" />
    <link href="Stylesheet/site-booking.css" rel="stylesheet"/>
    <title>Extra Time Bookings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
</head>
<body id="body">
    <section class="container pt-3 mb-3">

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

        <h2 class="h3 block-title text-center"><a href="" data-bs-target="#book" data-bs-toggle="modal"="Booking"><i class="fas fa-plus"></i></a> Extra Time Bookings</h2>
        <p class="text-center">Please note your extra time booking(s) will be displayed here.</p>
        <div class="row pt-5 mt-30 bookings">

        </div>
    </section>
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

<!----Book Extra Time Modal---->
<div class="modal fade" id="book" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Bookings</h6>
            </div>
            <div class="modal-body">
                <div class="container">
                    <header>Book Extra Time</header>
                    <div class="form-outer">
                        <form action="php/insert-et-booking.php" class="needs-validation" enctype="multipart/form-data" method="post" novalidate>
                            <div class="page">
                                <div class="caption">
                                    <p>
                                        You can book for extra time in the centre for your child should there be complications
                                        during the day.
                                    </p>
                                </div>
                                <div class="title text-center">Required Information</div>
                                <div class="field">
                                    <div class="label">Pupil Name</div>
                                    <select class="form-select" id="validationCustom01" name="name" required>
                                        <option selected disabled value="">Choose...</option>
		                                <?php
		                                include_once "../config.php";
		                                $session = $_SESSION['unique_id'];
		                                $status = "Accepted";
		                                $sql2 = mysqli_query($conn, "SELECT * FROM tblpupil WHERE unique_fk='$session' AND status='$status'");
		                                while ($row2=mysqli_fetch_assoc($sql2))
		                                {
			                                $fname = $row2['fname'];
			                                $lname = $row2['lname'];
			                                $pupilNo = $row2['pupilNo'];
			                                ?>
                                            <option value="<?php echo "$pupilNo"?>"><?php echo "$fname"." "."$lname"?></option>
			                                <?php
		                                }
		                                ?>
                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please select name of pupil.
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="label">Date</div>
                                    <input type="date" class="form-control" name="date" id="validationCustom02" required />
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please select a date to book.
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="label">ETA</div>
                                    <input type="time" class="form-control" name="ETA" id="validationCustom03" required />
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please provide estimated time of arrival.
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="label">Comment</div>
                                    <textarea placeholder="Reason for time extension" class="form-control" name="comment" pattern="[a-zA-Z\s]" id="validationCustom04" required></textarea>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please let us know your reason for booking time extension.
                                    </div>
                                </div>
                                <div class="field">
                                    <div></div>
                                </div>
                                <div class="field btns">
                                <button type="submit" id="btnBook" name="book">Book</button>
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

<script src="../validate-fields.js"></script>

<script src="Javascript/et-bookings.js"></script>