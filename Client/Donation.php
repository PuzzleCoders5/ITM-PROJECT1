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
    <div class="main-content text-center">
        <!----Title---->
        <div class="title">
            <h2 class="text-center">Donations</h2>
            <p class="text-center capation">You can make donations,view statement and also update each transaction. Click on the cards below for more.</p>
        </div>
        <br />

        <!----Cards---->
        <div class="info-card text-center">

            <!----Payment Card---->
            <div class="cards">
                <div class="card-icon">
                    <span><i class="fas fa-calendar-alt"></i></span>
                </div>
                <div class="card-detail">
                    <h4>Payment Option</h4>
                </div>
                <p>View dates and time of all upcoming events.</p>
               
                   
			
                <a href="" data-bs-target="#events" data-bs-toggle="modal" class="btn btn-outline-light">Show</a>
            </div>
            <?
            $conn = mysqli_connect("sict-mysql.mandela.ac.za","grp41","grp41-2021","projectdb");
              

                 if($result)
               {
                   echo "";
               }
               else{
                   die(mysqli_error($conn));
               } 
            
     


?>
            <!----Payment Details Card---->
            <div class="cards">
                <div class="card-icon">
                    <span><i class="fas fa-calendar-day"></i></span>
                </div>
                <div class="card-details">
                    <h4>Payment Details Option</h4>
                </div>
                <p>View dates and time of our weekly schedule.</p>
               
                 
                <a href=""  data-bs-target="#schedule" data-bs-toggle="modal" class="btn btn-outline-light show">Show</a>
            </div>
        </div>
        <?
                
        ?>
       

        

        <!----Progress Report---->
        <div class="main-table" id="form1">
            <div class="title">
            
            </div>

            
        </div>
<?php

$con = mysqli_connect("sict-mysql.mandela.ac.za","grp41","grp41-2021","projectdb");

$query2="SELECT * FROM tblcentre ";
$resultss=mysqli_query($conn,$query2);

if($resultss)
       {
         echo "";
       }
       else{
         die(mysqli_error($conn));
       }

?>

        <!----Show Events Modal---->
        <div class="modal fade" id="events" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Donation Options</h6>
                    </div>
<?php
$id="user_id";
 $query2="SELECT * FROM tblaccount WHERE tblaccount.user_id=$id";
$resultss=mysqli_query($conn,$query2);
if($resultss)
       {
         echo "";
       }
       else{
         die(mysqli_error($conn));
       }
 

if(isset($_POST['submit']))
{    
  
	 $DName=$_POST['DName'];
     $Amount=$_POST['Amount'];
     $CType=$_POST['CType'];
      $AcNum=$_POST['AcNum'];
     $DDate=$_POST['DDate'];
     $Description=$_POST['Description'];
     $AHolder=$_POST['AHolder'];
     $RName=$_POST['RName'];
     $CName=$_POST['CName'];
     $ProvName=$_POST['ProvName'];
     
     
    $conn = mysqli_connect("sict-mysql.mandela.ac.za","grp41","grp41-2021","projectdb");
 $query="INSERT INTO tbldonation (DName,Amount,CType,DDate,Description,CName,RName,PName,AHolder,AcNum) VALUES
        ('$DName','$Amount','$CType','$DDate','$Description','$RName','$CName','$ProvName','$AHolder','$AcNum')  ";
       $result=mysqli_query($conn,$query);
        if($result)
       {
        echo "Submited";
        
       }
       else{
         die(mysqli_error($conn));
       }
     
    

     

}
       
?>
                    
                      <div class="modal-body">

                        <h4><b>Donations</b></h4>
                       <form action="#" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                              
                                <div class="mb-3">
                                    <label class="col-form-label">Payer Name:</label>
                                  
                            
                            <?php
                                           while ($row=mysqli_fetch_assoc($resultss))
                                           {
                                            $Fname=$row['fname'];
                                            $Lname=$row['lname'];
                                               
                                        ?>   
                                        <?php  
                                           }
                                        ?>  
                                           <input type="text" name="DName" class="form-control" value="<?php echo " $Fname $Lname"?>" required >

                                        
                        
                                </div>
                           
                                <div class="mb-3">
                                    <label class="col-form-label">Card Type:</label>
                                   <p><input type="radio"  name="CType" value="Debit" required >Debit                   <input type="radio"  name="CType" value="Credit"  required >Credit</p> 
                                   
                                  </div>
                            </div>
                            <div class="col-lg-6">
                                
                            <div class="mb-3">
                                    <label class="col-form-label">Enter Amount:</label>
                                    <p><input type="text" class="form-control" name="Amount" required ></p>
                                </div>
                               
                                <div class="mb-3">
                                    <label class="col-form-label">Account Number:</label>
                                   <p><input type="text" class="form-control" name="AcNum"  required ></p> 
                                </div>
                            </div>
                                
                                
                            <div class="col-lg-6">
                            <div class="mb-3">
                                    <label class="col-form-label">Donation Date</label>
                                    <p><input type="date" class="form-control" name="DDate"  required ></p> 
                                </div>
                            </div>   
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="col-form-label">Payment Decription</label>
                                    <p>  <input type="text" class="form-control" name="Description"  required > </p>
                                </div>
                            </div>

                        <div class="col-lg-12">
                        <div class="label">Account Holder</div>
                        <select name="AHolder" class="form-select" id="validationCustom05" required >
                            <option selected disabled value="">Choose...</option>
                            <option value="Client">Client</option>
                            <option value="Female">Teacher</option>
                            <option value="Female">Manager</option>
                            <option value="Female">Regional Cordinator</option>
                            <option value="Female">Provintial Cordinator</option>
                        </select>
                           <div class="label">Centre Names</div>
                        <select class="form-control" name="CName">
                        <option  selected disabled value="">Choose...</option>
                       
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
                            <option  selected disabled value="">Choose...</option>
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

                        <div class="label">Province Name:</div>
                        <select class="form-control" name="ProvName">
                            <option selected disabled value="">Choose...</option>
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
                     <button type="submit" class="btn btn-success" name="submit">Submit</button>
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>

                   
                    </div>

                    </div>
                </form>
            </div>
        </div>

        <?php
$conn = mysqli_connect("sict-mysql.mandela.ac.za","grp41","grp41-2021","projectdb");


      
?>

        <!----Show Schedule Modal---->
        <div class="modal fade" id="schedule" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">

               
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Transaction</h6>
                        
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <div class="title">
                                <h2 class="text-center header">View Transaction</h2>
                                <p class="text-center capation">Below is a transaction for all users and pupil to use. Please note to check this schedule frequently in case updates are made. <a href="#">Click here </a>if you are having trouble with this window.</p>
                            </div>
<?

       $query="SELECT  * FROM tbldonation ";
       $resultSSS=mysqli_query($conn,$query2);
       
       if($resultSSS)
              {
                echo "";
              }
              else{
                die(mysqli_error($conn));
              }
              
        

?>
                             <br />
                              <div class="main-content main-table" id="form2">
                              <form action="Donation.php" method="POST">
                                  <div class="col-lg-4">
                                  <div class="label">Donator Name</div>
                                  <input type="text" placeholder="Zamani Tambo" name="DName" size="40" required />
                                  <div class="label">Account Number </div>
                                  <input type="text" name="AcNum" placeholder="0123456789" size="40"required />
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
                     <button type="submit" class="btn btn-primary" name="search">Search</button><div class="profile_content">
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
                                                <td style="background-color: #807a7a;color:#fff;">Donator</td>
                                                <td style="background-color: #494949;color:#fff;">Amount</td>
                                                <td style="background-color: #6f2edb;color:#fff;">Date</td>
                                                <td style="background-color: #6f2edb;color:#fff;">Description</td>
                                                <td style="background-color: #005e6b;color:#fff;">Center Name:</td>
                                                <td style="background-color: #005e6b;color:#fff;">Region Name</td>
                                                <td style="background-color: #005e6b;color:#fff;">Province Name</td>
                                                <td style="background-color: #6f3edb;color:#fff;">Transaction Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php 
                                                        if(isset($_POST['search']))
                                                        {
                                                        $DName=$_POST['DName'];
                                                        $AcNum=$_POST['AcNum'];
                                                        $CName=$_POST['CName'];
                                                        $RName=$_POST['RName'];
                                                        $ProvName=$_POST['ProvName'];
                                                            
                                                        if($DName!=" "|| $AcNum!=" "|| $CName!=" "|| $RName!=" "|| $ProvName!=" ")
                                                        {
                                                            $query="SELECT * FROM tbldonation WHERE ( DName='$DName' AND AcNum='$AcNum' ) || (PName='$ProvName' AND CName='$CName' AND RName='$RName')";
                                                            $results=mysqli_query($conn,$query);

                                                                if($results)
                                                                {
                                                                    echo "";
                                                                }
                                                                else{
                                                                    die(mysqli_error($conn));
                                                                    echo "system cannot find information";
                                                                } 
                                                            }
                                                        } 
                                         
                                           
                                           if(isset($_POST['search']))
                                            {   if(is_iterable($results)){
                                                foreach($results as $row){
                                                    $id=$row['DonationNo'];
                                                    $DName=$row['DName'];
                                                    $Amount=$row['Amount'];
                                                    $Date=$row['DDate'];
                                                    $Description=$row['Description'];
                                                    $CName=$row['CName'];
                                                    $RName=$row['RName'];
                                                    $ProvName=$row['PName'];
                                                  
                                                    ?>
                                                  <tr>            
                                                  <td><?php echo $DName;?></td>
                                                   <td><?php echo $Amount;?></td>
                                                   <td><?php echo $Date;?></td>
                                                   <td><?php echo $Description;?></td>
                                                   <td><?php echo $CName;?></td>
                                                   <td><?php echo $RName;?></td>
                                                   <td><?php echo $ProvName;?></td>
                                                   <td> <a href="DonationDel.php?Del=<?php echo $id;?>" class="fa fa-trash">Remove Transaction</a></td>
                                                   </tr>
                                                    <?php
                                            }
                                        } 
                                                    ?>
                                           <?php
                                            }else
                                            {
                                                echo "System Cannot find Infromation";
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