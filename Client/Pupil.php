<?php
include "Navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="Stylesheet/site-searchbtn.css" rel="stylesheet" />
	<link href="Stylesheet/site-pupil.css" rel="stylesheet" />
	<title>Pupil(s)</title>
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

	<h2 class="h3 block-title text-center">Pupil</h2>
	<p class="text-center">Click the link on the card to view the programmes for your child.</p>

	<section class="section services-section" id="services">
		<div class="container">
			<div class="row show-cards">
				<!-- feaure box -->

			</div>
		</div>
	</section></section>
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

<script src="Javascript/pupil.js"></script>
