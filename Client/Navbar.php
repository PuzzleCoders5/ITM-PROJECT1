<?php
session_start();
include_once "../config.php";
if(!isset($_SESSION['unique_id'])) //if user is not signed in, block from opening the page and/or redirect to login page
{
	header("location: ../Guest/Account.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="Stylesheet/site-navbar.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<!----Side Navigation Bar---->
<div class="sidebar" id="navbar">
    <!----Hamburger---->
    <div class="nav_toggle" id="nav-toggle">
        <i class="fas fa-bars" id="bars"></i>
    </div>
    <br /><br />

    <!----Profile Picture---->
    <?php
    include_once "../config.php";
    $sessionid = $_SESSION['unique_id'];
    $sql0 = mysqli_query($conn, "SELECT * FROM tblaccount WHERE unique_id='$sessionid'");
    $row0 = mysqli_fetch_assoc($sql0);
    ?>
    <div class="logo_content">
        <div class="logo">
            <img src="../Universal/upload/avatar/<?php echo $row0['img']?>" />
            <div class="logo_name"><?php echo $row0['fname']." ".$row0['lname']?></div>
        </div>
    </div>

    <!----Navigation Links---->
    <ul class="nav_list" id="navbarId">
        <li>
            <a href="Home.php">
                <i class="fas fa-home"></i>
                <span class="links_name">Home</span>
            </a>
            <span class="tooltip">Home</span>
        </li>
        <li>
            <a href="Registrations.php">
                <i class="fa fa-user-plus"></i>
                <span class="links_name">Registrations</span>
            </a>
            <span class="tooltip">Registrations</span>
        </li>

        <li>
            <a href="Pupil.php">
                <i class="fa fa-book-open"></i>
                <span class="links_name">Programmes</span>
            </a>
            <span class="tooltip">Programmes</span>
        </li>
        <li>
            <a href="Bookings.php">
                <i class="fas fa-hourglass-end"></i>
                <span class="links_name">Book Extra</span>
            </a>
            <span class="tooltip">Book Extra</span>
        </li>
        <li>
            <a href="../Universal/Chat/Users.php">
                <i class="fas fa-comment"></i>
                <span class="links_name">Chat</span>
            </a>
            <span class="tooltip">Chat</span>
        </li>
        <li>
            <a href="Report.php">
                <i class="fa fa-chart-pie"></i>
                <span class="links_name">Reports</span>
            </a>
            <span class="tooltip">Reports</span>
        </li>
        <li>
            <a href="../Universal/Settings/Settings.php">
                <i class="fas fa-cog"></i>
                <span class="links_name">Settings</span>
            </a>
            <span class="tooltip">Settings</span>
        </li>
        <li>
            <a href="#" data-bs-toggle="modal" data-bs-target="#sign-out">
                <i class="fas fa-power-off"></i>
                <span class="links_name">Sign out</span>
            </a>
            <span class="tooltip">Sign out</span>
        </li>
    </ul>

    <!----Developers---->
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
<script>
    let bars = document.querySelector("#bars");
    let sidebar = document.querySelector(".sidebar");

    bars.onclick = function () {
        sidebar.classList.toggle("active");
    }
</script>

<?php
include_once "../config.php";
$sql = mysqli_query($conn, "SELECT * FROM tblaccount WHERE unique_id={$_SESSION['unique_id']} ");

if(mysqli_num_rows($sql) > 0)
{
	$row = mysqli_fetch_assoc($sql);
}
?>
<!-- Modal -->
<div class="modal fade" id="sign-out" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="sign-outLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sign-outLabel">Confirm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h2 class="text-center">Sign Out</h2>
                <p>Are you sure you want to logout? This will take you to the guests home page.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a type="button" class="btn btn-dark" href="../signout.php?signout_id=<?php echo $row['unique_id'] ?>">Sign Out</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>