  <?php 
 session_start();
  if(!$_SESSION['s_id']){
    header("location:index.php");
  }
  $user_id=$_SESSION['s_id'];
								include'Database/config.php';
								$select="SELECT logo FROM profile WHERE PharmacyID='$user_id'";
								$run_select=mysqli_query($conn,$select);
								$row=mysqli_fetch_array($run_select);
								
								?>
								
                                     <a href="#">
                                     <?php
									echo '<p><img class="avatar border-gray" src="'.$row['logo'].'" alt="No logo"  ></p>';
									?>

                                     
                                    </a>
                                    