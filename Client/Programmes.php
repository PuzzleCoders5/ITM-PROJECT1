<?php
include "Navbar.php";
$centreprovince = $_GET['centreprovince'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Programmes</title>
    <link href="Stylesheet/site-programmes.css" rel="stylesheet" />
    <link href="Stylesheet/site-searchbtn.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body id="body">
<div class="container mt-5">
    <!----Title---->
    <div class="row">
        <div class="col-md-12 text-center full-content">
            <h2 class="h3 block-title text-center">Programmes</h2>
            <p class="sub-section-title v-2">Choose from the list of programmes created which ones you would like to make changes to or, create a new programme by clicking the plus button on the left side of the title.</p>
            <div class="mrb-45"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="row show-cards">
                <!----Cards and Images---->
                <?php
                include_once "../config.php";

                $sql = mysqli_query($conn, "SELECT * FROM tblprogrammes WHERE province='$centreprovince'");

                while ($row = mysqli_fetch_assoc($sql))
                {
	                /**** Get name of the liaison that created this programme ****/
	                $liaison = $row['liaison'];
	                $sql2 = mysqli_query($conn,"SELECT * FROM tblpersonalinfo WHERE unique_fk= '$liaison'");
	                $row2 = mysqli_fetch_assoc($sql2);

	                /**** Get name of selected province ****/
	                $prov = $row['province'];
	                $sql3 = mysqli_query($conn,"SELECT * FROM tblprovince WHERE provNo='$prov'");
	                $row3 = mysqli_fetch_assoc($sql3);

	                $prog_id = $row['progId'];
	                if(mysqli_num_rows($sql) > 0)  //if there is data on this row
	                {
		                echo '<div class="col-lg-4 col-md-6 col-sm-7">
                                <div class="card">
                                    <div class="card-image">
                                        <img src="../Universal/upload/avatar/'.$row['img'].'" class="card-img" alt="" />
                                    </div>
                                    <div class="card-text">
                                        <span class="date">Created: '.$row['pdate'].'</span>
                                        <h2>'.$row['pname'].'</h2>
                                        <p>'.$row['description'].'</p>
                                        <p>'.$row3['provname'].'</p>
                                        <p style="color: #000000;font-weight: normal"><span>Created by:</span> '.$row2['title'].", ".$row2['fname']." ".$row2['lname'].'</p>
                                        <a href="Content.php?programmeid='.$prog_id.'" style="text-decoration: none; color: #FFFFFF;" class="btn btn-dark">Content</a>
                                    </div>
                                </div>
                            </div>';
	                }
                }
                ?>
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
<script src="../all.min.css"></script>
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
