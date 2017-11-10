<div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Drug Id</th>
                                    	<th>Drug Name</th>
                                    	<th>Price</th>
                                    	<th>Prescription</th>
                                    	<th>Status</th>
                                    </thead>
                                    <tbody>

<?php 
session_start();
$user_id=$_SESSION['s_id'];
include'../Database/config.php';
 $select_drugs="SELECT * FROM `stocklevels` WHERE PharmacyID='$user_id'";
$run_select=mysqli_query($conn,$select_drugs);
$nums=mysqli_num_rows($run_select);
While($rows=mysqli_fetch_array($run_select)){
    $DrugID=$rows['DrugID'];
    $drugname=$rows['drugname'];
    $presciption=$rows['presciption'];
    $price=$rows['price'];
    $Status=$rows['Status'];
?>

                                        <tr>
                                        	<td><?php echo $DrugID; ?></td>
                                            <td><?php echo $drugname; ?></td>
                                            <td><?php echo $price; ?></td>
                                        	<td><?php echo $presciption; ?></td>
                                        	<td><?php if($Status=='instock'){

                                            
                                                ?>
                                                <button class="btn btn-success btn-sm">instock</button>
                                                <?php
                                            }else{
                                                ?>
                                                <button class="btn btn-danger btn-sm">not instock</button>
                                                <?php

                                            } ?></td>
                                        </tr>
                                        <?php
}
?>
                                    </tbody>
                                </table>

                            </div>
