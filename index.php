<?php
include'../Database/config.php';
if(isset($_POST['btn'])){
    $PharmacyID=$_POST['PharmacyID'];
    $latitude=$_POST['latitude'];
    $longitude=$_POST['longitude'];
     $address=$_POST['address'];
     $email=$_POST['email'];
     $cont_number=$_POST['cont_numbers'];
    $date=date("Y/M/D");
    $select="SELECT * FROM profile WHERE pharmacyID='$PharmacyID'";
    $run_select=mysqli_query($conn,$select);
    $num=mysqli_num_rows($run_select);
    if($num==1){

        $update="UPDATE `profile` SET `physicalAddress`='$address',
         `latitude`='$latitude',
         `longitude`='$longitude',
         `dateProfile`='$date', 
         `cont_number`='$cont_number',
         `email`='$email'

         WHERE PharmacyID='$PharmacyID'";
         $run_update=mysqli_query($conn,$update);
         if($run_update){
             ?>
             <div class="alert alert-success">
             <strong>Success!</strong> Profile update was successfull.
             </div>
<?php

         }
         else{
            ?>
            <div class="alert alert-danger">
            <strong>Error!</strong> An error occured please try again!!.
             </div>
            <?php

         }

    }
    else{
        $insert="INSERT INTO `profile`(`physicalAddress`, `PharmacyID`, `logo`, `latitude`, `longitude`, `dateProfile`) 
        VALUES ('$address','$PharmacyID','','$latitude','$longitude','$date')";
        $run_insert=mysqli_query($conn,$insert);
        if($run_insert){
            ?>
            <div class="alert alert-success">
            <strong>Success!</strong> Profile update was successfull.
          </div>
          <?php

        }
        else{
            ?>
            <div class="alert alert-danger">
            <strong>Error!</strong> An error occured please try again.
             </div>
            <?php
        }
    }

    
}