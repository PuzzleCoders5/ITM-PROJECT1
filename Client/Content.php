<?php
include "Navbar.php";
include_once "../config.php";
$programmeid = $_GET['programmeid'];
$sql0 = mysqli_query($conn,"SELECT * FROM tblprogrammes WHERE progId='$programmeid'");
$row0 = mysqli_fetch_assoc($sql0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Content</title>
    <link href="Stylesheet/content.css" rel="stylesheet" />
    <link href="Stylesheet/site-searchbtn.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
</head>
<body id="body">
<section class="py-6 bg-light-primary">
    <div class="container">
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

        <div class="row justify-content-center text-center mb-4">
            <div class="col-xl-6 col-lg-8 col-sm-10">
                <h2 class="font-weight-bold"><?php echo $row0['pname']?> Content</h2>
                <p class="text-muted mb-0">A list of content that are under this programme have been displayed below. Click on 'activities' to view and add the activity for the content.</p>
            </div>
        </div>

        <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 text-center justify-content-center px-xl-6 aos-init aos-animate new-card" data-aos="fade-up">
            <?php
            $sql = mysqli_query($conn,"SELECT * FROM tblcontent WHERE programme='$programmeid'");
            $output = "";

            if(mysqli_num_rows($sql) > 0)
            {
	            while ($row = mysqli_fetch_assoc($sql))
	            {
		            echo '<div class="col my-3">
                        <div class="card border-hover-primary hover-scale">
                            <div class="card-body">
                                <div class="text-primary mb-5">
                                    <svg width="60" height="60" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path d="M3.73851648,19 L8.5,19 C8.77614237,19 9,18.7761424 9,18.5 L9,6.5962912 C9,6.32014883 8.77614237,6.0962912 8.5,6.0962912 C8.29554771,6.0962912 8.11169333,6.22076667 8.03576165,6.41059586 L3.27427814,18.3143047 C3.17172143,18.5706964 3.29642938,18.8616816 3.55282114,18.9642383 C3.61188128,18.9878624 3.67490677,19 3.73851648,19 Z" fill="currentColor" opacity="0.3"></path>
                                                <path d="M15.7385165,19 L20.5,19 C20.7761424,19 21,18.7761424 21,18.5 L21,6.5962912 C21,6.32014883 20.7761424,6.0962912 20.5,6.0962912 C20.2955477,6.0962912 20.1116933,6.22076667 20.0357617,6.41059586 L15.2742781,18.3143047 C15.1717214,18.5706964 15.2964294,18.8616816 15.5528211,18.9642383 C15.6118813,18.9878624 15.6749068,19 15.7385165,19 Z" fill="currentColor" transform="translate(18.000000, 12.500000) scale(-1, 1) translate(-18.000000, -12.500000) "></path>
                                                <rect fill="currentColor" opacity="0.3" x="11" y="2" width="2" height="20" rx="1"></rect>
                                            </g>
                                    </svg>
                                </div>
                                <h6 class="font-weight-bold mb-3">'.$row['contentName'].'</h6>
                                <p class="text-muted mb-0">'.$row['contentDescr'].'</p>
                                <p class="text-muted mb-0"><b>Start date: </b>'.$row['startDate'].' to '.$row['endDate'].'</p>
                                <p class="text-muted mb-0"><b>End date: </b>'.$row['endDate'].'</p>
                                <a style="text-decoration: none" href="Activities.php?contentid='.$row['contentNo'].'">Activities</a>
                            </div>
                        </div>
                    </div>';
	            }
            }
            else
            {
	            echo '<div class="text-center mt-5">
                        <i class="fas fa-exclamation-circle" style="font-size: 44px;"></i>
                        <p>No content available.</p>
                    </div>';
            }
            ?>
        </div>
    </div>
</section>
</body>
</html>
<!----Sidebar Animation Javascript---->
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
