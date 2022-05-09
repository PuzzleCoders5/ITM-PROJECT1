<?php
include "Navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Progress Report</title>
	<link href="Stylesheet/site-searchbtn.css" rel="stylesheet" />
	<link href="Stylesheet/site-academic.css" rel="stylesheet" />
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
					<h2 class="heading">Progress Reports</h2>
					<p>A list of all programme progress for your child is displayed below.</p>
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

        <table class="table">
            <thead>
            <tr>
                <th>Centre Name</th>
                <th>Centre Region</th>
                <th>Pupil Name</th>
                <th>Programme</th>
                <th>Term</th>
                <th>Feedback</th>
                <th>Year</th>
            </tr>
            </thead>
            <tbody class="report-list">

            </tbody>
        </table>
        <br>
        <button onclick="window.print()" class="btn btn-dark">Print Report</button>
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

<script src="../validate-fields.js"></script>

<script src="Javascript/report.js"></script>