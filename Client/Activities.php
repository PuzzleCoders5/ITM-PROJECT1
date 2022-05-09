<?php
include "Navbar.php";
include_once "../config.php";

$contentid = $_GET['contentid'];
$sql0 = mysqli_query($conn,"SELECT * FROM tblcontent WHERE contentNo='$contentid'");
$row0 = mysqli_fetch_assoc($sql0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php echo $row0['contentName']?> - Activities</title>
	<link href="Stylesheet/site-searchbtn.css" rel="stylesheet" />
	<link href="Stylesheet/content.css" rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
</head>
<body id="body">
<div class="container mt-5">
	<h2 class="h3 block-title text-center">Activities</h2>
	<p class="text-center">All the activity for this content are display below.

	<div class="timeline-page mt-5">
		<?php
		$sql = mysqli_query($conn,"SELECT * FROM tblactivities WHERE content='$contentid'");
		$output = "";

		if(mysqli_num_rows($sql) > 0)
		{
			while ($row = mysqli_fetch_assoc($sql))
			{
				echo '<div class="timeline-item">
            <div class="row">
                <div class="col-lg-6">
                    <div class="duration date-label-left">
                        '.$row['url'].'
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="works works-description-right">
                        <h4>'.$row['activityName'].'</h4>
                        <p class="timeline-subtitle">'.$row['activityDescr'].'</p>
                        <p class="timeline-subtitle"><i>Start date: '.$row['startDate'].'</i></p>
                        <p class="timeline-subtitle"><i>End date: '.$row['endDate'].'</i></p>
                    </div>
                </div>
            </div>';
			}
		}
		else
		{
			echo '<div class="text-center mt-5">
	                <i class="fas fa-exclamation-circle" style="font-size: 44px;"></i>
	                <p>No activities available.</p>
	            </div>';
		}
		?>
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

