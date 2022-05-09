<?php
include "Navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link href="Stylesheet/site-registration.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
</head>
<body id="body">
    <div class="container">
        <header>Register</header>
        <div class="progress-bar1">
            <div class="step">
                <p>Personal</p>
                <div class="bullet">
                    <span>1</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
            <div class="step">
                <p>Pupil</p>
                <div class="bullet">
                    <span>2</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
            <div class="step">
                <p>NOK</p>
                <div class="bullet">
                    <span>3</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
            <div class="step">
                <p>Documents</p>
                <div class="bullet">
                    <span>4</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
        </div>

        <div class="form-outer">
            <form class="needs-validation" action="php/insert-registration.php" enctype="multipart/form-data" method="post" autocomplete="off" novalidate>
                <!----Personal Information Form---->
                <div class="page slide-page">
                    <div class="title">Parent Information:</div>
                    <div class="field">
                        <div class="label">ID Number</div>
                        <input type="text" name="idNo" placeholder="ID Number or Passport Number" class="form-control" id="validationCustom01" pattern="[A-Z0-9]{7,13}" required />
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please enter id/passport number(upper case letters).
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">Name</div>
                        <input type="text" name="first-name" class="form-control" id="validationCustom02" required />
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please enter first name and second name.
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">Surname</div>
                        <input type="text" name="last-name" class="form-control" id="validationCustom03" required />
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please enter a surname.
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">Date of Birth</div>
                        <input type="date" name="dob" class="form-control" id="validationCustom04" required />
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please choose a date of birth.
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">Gender</div>
                        <select name="gender" class="form-select" id="validationCustom05" required >
                            <option selected disabled value="">Choose...</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Female">Unspecified</option>
                        </select>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please select gender.
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">Title</div>
                        <select name="title" class="form-select" id="validationCustom06" required >
                            <option selected disabled value="">Choose...</option>
                            <option value="Mr">Mr</option>
                            <option value="Mrs">Mrs</option>
                            <option value="Miss">Miss</option>
                        </select>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please choose title.
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">Phone Number</div>
                        <input type="text" name="phone" class="form-control" id="validationCustom07" pattern="[0-9]{10}" required />
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please enter active phone number with 10 digits.
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">Work Number</div>
                        <input type="text" name="workNum" class="form-control" id="validationCustom08" pattern="[0-9]{10}" placeholder="Optional" />
                    </div>
                    <div class="field">
                        <div class="label">Street Address</div>
                        <input type="text" name="street" class="form-control" id="validationCustom09" required />
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please enter address.
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">Province</div>
                        <!---- Get the province of the current liaison ---->
                        <input name="province" class="form-control" id="validationCustom11" required />
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please select assigned province.
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">City/Region</div>
                        <input name="city" class="form-control" id="validationCustom11" required />
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please choose assigned city/region.
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">Area Code</div>
                        <input type="number" name="code" class="form-control" id="validationCustom12" required />
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please enter area/zip code.
                        </div>
                    </div>
                    <div class="fieldbtn btns">
                        <button type="submit" class="firstNext next" name="from-person">Next</button>
                    </div>
                </div>

                <!----Pupil Information Form---->
                <div class="page">
                    <div class="title text-center">Pupil Information</div>
                    <div class="field">
                        <div class="label">ID Number</div>
                        <input type="text" name="pupil-idNo" placeholder="ID Number" class="form-control" id="validationCustom13" pattern="[A-Z0-9]{7,13}" required />
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please enter id/passport number(upper case letters).
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">Name</div>
                        <input type="text" name="pupil-fname" class="form-control" id="validationCustom14" required />
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please enter first name and second name.
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">Surname</div>
                        <input type="text" name="pupil-lname" class="form-control" id="validationCustom15" required />
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please enter a surname.
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">Date of Birth</div>
                        <input type="date" name="pupil-dob" class="form-control" id="validationCustom16" required />
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please choose a date of birth.
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">Gender</div>
                        <select name="pupil-gender" class="form-select" id="validationCustom17" required >
                            <option selected disabled value="">Choose...</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Female">Unspecified</option>
                        </select>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please select gender.
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">Street Address</div>
                        <input type="text" name="pupil-street" class="form-control" id="validationCustom18" required />
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please enter address.
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">Province</div>
                        <!---- Get the province of the current liaison ---->
                        <input name="pupil-province" class="form-control" id="validationCustom11" required />
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please select assigned province.
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">City/Region</div>
                        <input name="pupil-city" class="form-control" id="validationCustom20" required />
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please choose assigned city/region.
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">Area Code</div>
                        <input type="number" name="pupil-code" class="form-control" id="validationCustom21" required />
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please enter area/zip code.
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">Birth Certificate</div>
                        <input type="file" name="birth-cert" class="form-control" id="validationCustom22" required />
                        <small>File format - pdf, jpeg, jpg, png</small>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Provide pdf,jpeg or jpg of your id book.
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">Centre Name</div>
                        <!---- Get the province of the current liaison ---->
                        <select name="pupil-centre" class="form-select" id="names" required >
                            <option selected disabled value="">Choose...</option>
		                    <?php
		                    include_once "../config.php";
		                    $sql2 = mysqli_query($conn, "SELECT * FROM tblcentre");
		                    if(mysqli_num_rows($sql2) > 0)
		                    {
			                    while ($row2=mysqli_fetch_assoc($sql2))
			                    {
				                    echo '<option value="'.$row2['centreNo'].'">'.$row2['name'].'</option>';
			                    }
		                    }
		                    else
		                    {
			                    echo '<option>No centres created on the system.</option>';
		                    }
		                    ?>
                        </select>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please select assigned province.
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">Centre Region</div>
                        <!---- Get the province of the current liaison ---->
                        <select name="centre-region" class="form-select" id="region" required >
                            <option selected disabled value="">Choose...</option>
                        </select>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please select centre region.
                        </div>
                    </div>

                    <div class="fieldbtn btns">
                        <button type="submit" class="prev-1 prev">Previous</button>
                        <button type="submit" class="next-1 next">Next</button>
                    </div>
                </div>

                <!---Next of Kin--->
                <div class="page">
                    <div class="title text-center">Next of Kin</div>
                    <div class="field">
                        <div class="label">First Name</div>
                        <input type="text" name="kin-fname" class="form-control" id="validationCustom23" required />
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please enter first name.
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">Last Name</div>
                        <input type="text" name="kin-lname" class="form-control" id="validationCustom24" required />
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please enter last name.
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">Gender</div>
                        <select name="kin-gender" class="form-select" id="validationCustom25" required >
                            <option selected disabled value="">Choose...</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Female">Unspecified</option>
                        </select>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please select gender.
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">Title</div>
                        <select name="kin-title" class="form-select" id="validationCustom26" required >
                            <option selected disabled value="">Choose...</option>
                            <option value="Mr">Mr</option>
                            <option value="Mrs">Mrs</option>
                            <option value="Miss">Miss</option>
                        </select>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please select a title.
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">Phone Number</div>
                        <input type="text" name="kin-phone" class="form-control" id="validationCustom27" required />
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please write a phone number with 10 digits.
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">Email</div>
                        <input type="text" name="kin-email" class="form-control" placeholder="Optional" />
                    </div>
                    <div class="field">
                        <div class="label">Street Address</div>
                        <input type="text" name="kin-street" class="form-control" id="validationCustom28" required />
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please enter home address.
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">Province</div>
                        <input type="text" name="kin-province" class="form-control" id="validationCustom29" required />
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please enter name of province.
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">City</div>
                        <input type="text" name="kin-city" class="form-control" id="validationCustom30" required />
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please enter name of the city/region.
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">Area Code</div>
                        <input type="number" name="kin-code" class="form-control" id="validationCustom31" required />
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please enter area/zip code.
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">Relation</div>
                        <select name="kin-relation" class="form-select" id="validationCustom32" required >
                            <option selected disabled value="">Choose...</option>
                            <option value="Mother">Mother</option>
                            <option value="Father">Father</option>
                            <option value="Husband">Husband</option>
                            <option value="Wife">Wife</option>
                            <option value="Aunt">Aunt</option>
                            <option value="Uncle">Uncle</option>
                            <option value="Sister">Sister</option>
                            <option value="Brother">Brother</option>
                            <option value="Friend">Friend</option>
                            <option value="Cousin">Cousin</option>
                            <option value="Grandmother">Grandmother</option>
                            <option value="Grandfather">Grandfather</option>
                            <option value="Partner">Partner</option>
                            <option value="Co-Worker">Co-Worker</option>
                        </select>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please enter select your relationship with this person.
                        </div>
                    </div>
                    <div class="fieldbtn btns">
                        <button class="prev-2 prev">Previous</button>
                        <button type="submit" class="next-2 next" name="from-kin" >Next</button>
                    </div>
                </div>

                <!----Documents---->
                <div class="page">
                    <div class="title text-center">Upload Documents</div>
                    <div class="field">
                        <div class="label">Identity Document</div>
                        <input type="file" name="idbook" class="form-control" id="validationCustom29" required />
                        <small>File format - pdf, jpeg, jpg, png</small>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Provide pdf,jpeg or jpg of your id book.
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">Proof of Residence</div>
                        <input type="file" name="residence" class="form-control" id="validationCustom30" required />
                        <small>File format - pdf, jpeg, jpg, png</small>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Provide pdf,jpeg or jpg of valid proof of residence.
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">Date Registered</div>
                        <input type="date" name="date-registered" class="form-control" id="validationCustom31" required />
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please save date this information is/was being registered.
                        </div>
                    </div>
                    <div class="fieldbtn btns">
                        <button class="prev-3 prev">Previous</button>
                        <button class="btn submit" name="submit" >Submit</button>
                    </div>
                </div>
            </form>
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

<script src="../sweetalert2.all.min.js"></script>
<script src="../validate-registration.js"></script>
<script src="../all.min.css"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        $('#names').on('change', function () {
            var centreID = $(this).val();
            if(centreID){
                $.ajax({
                    type:'POST',
                    url: '../read-region.php',
                    data: 'centreNo='+centreID,
                    success: function (html) {
                        $('#region').html(html);
                    }
                });
            }
            else {
                $('#region').html('<option value="">Choose...</option>');
            }
        });
    });
</script>
