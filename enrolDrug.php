<?php
include'../Database/config.php';
if(isset($_POST['btn'])){
    $drugName=$_POST['drugName'];
    $status=$_POST['status'];
    $price=$_POST['price'];
    $prescription=$_POST['prescription'];
    $pharmacy_id=$_POST['pharmacy_id'];
    $insert="INSERT INTO `stocklevels`( `drugname`, `PharmacyID`, `description`, `presciption`, `price`, `status`)
     VALUES ('$drugName','$pharmacy_id','','$prescription','$price','$status')";
     $run_insert=mysqli_query($conn,$insert);
     if($run_insert){
         ?>
<div class="alert alert-success">
             <strong>Success!</strong> Drug Enrol was successfull.
             </div>
         <?php
     }
     else{
         ?>
         <div class="alert alert-danger">
             <strong>Error!</strong>Drug enrolment was unsuccessfull.
             </div>

         <?php
     }

   
}
?>