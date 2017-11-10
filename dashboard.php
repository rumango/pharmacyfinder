<?php
session_start();
if(!$_SESSION['s_id']){
  header("location:index.php");
}
$user_id=$_SESSION['s_id'];
//database connection
include'Database/config.php';
// to check if its anews user you has just logged in
$check="SELECT * FROM profile WHERE PharmacyID='$user_id'";
$run_check=mysqli_query($conn,$check);
$exist=mysqli_num_rows($run_check);
if($exist == 0){
	//if exits variable returns zero that means the user has no  profile id to be able to create a profile
	// now to create profile id
	 
	$insertID = "INSERT INTO `profile`(`physicalAddress`, `PharmacyID`, `logo`, `latitude`, `longitude`, `dateProfile`, `cont_number`, `email`) VALUES('NO DATA','$user_id','','NO DATA','NO DATA','NO DATA','NO DATA','NO DATA')";
	$run_inserID=mysqli_query($conn,$insertID);
}
?>
<!doctype html>
<html lang="en"><!-- InstanceBegin template="/Templates/pharmacyFinder.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<!-- InstanceBeginEditable name="doctitle" -->
	<title>Light Bootstrap Dashboard by Creative Tim</title>
	<!-- InstanceEndEditable -->
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
    <SCRIPT TYPE="text/javascript"> function popup(mylink, windowname) { 
	if (! window.focus)return true; var href; if (typeof(mylink) == 'string')
	 href=mylink;
	  else href=mylink.href; window.open(href, windowname, 'width=800,height=400,scrollbars=yes');
	   return false; }
	    </SCRIPT>


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
 
   


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <!-- InstanceBeginEditable name="head" -->
    <!-- InstanceEndEditable -->
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="red" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                   Pharmacy Finder
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="dashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="profile.php">
                        <i class="pe-7s-user"></i>
                        <p>Pharmacy Profile</p>
                    </a>
                </li>
                <li>
                    <a href="stockManagement.php">
                        <i class="pe-7s-note2"></i>
                        <p>Stock Managment</p>
                    </a>
                </li>
                <li>
                    <a href="checkout.php" onClick="return popup(this, 'notes')">
                        <i class="pe-7s-map-marker"></i>
                        <p>Update Location</p>
                    </a>
                </li>
				
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- InstanceBeginEditable name="EditRegion4" --><a class="navbar-brand" href="#"> My Dashboard</a><!-- InstanceEndEditable --></div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                            </a>
                        </li>
                      
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    My Account
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="changePassword.php" >Change Password</a></li>
                                <li class="divider"></li>
                                <li><a href="logout.php">Sign Out</a></li>
                              </ul>
                        </li>
                       
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content"><!-- InstanceBeginEditable name="EditRegion3" -->
          <div class="row">
       <?php 
          
          $select="SELECT * FROM profile WHERE PharmacyID='$user_id'";
            $run_select= mysqli_query($conn,$select);
            $rows=mysqli_fetch_array($run_select);
            $physicalAddress=$rows['physicalAddress'];
            $phone=$rows['cont_number'];
			$email=$rows['email'];
            $PharmacyID=$rows['PharmacyID'];
            $latitude=$rows['latitude'];
            $longitude=$rows['longitude'];
            $dateProfile=$rows['dateProfile'];
            
            /*to select the name of the phamacy from users table*/
            $sel="SELECT pharmacy_name FROM users WHERE id='$user_id'";
            $run_sel=mysqli_query($conn,$sel);
            $rw=mysqli_fetch_array($run_sel);
            $name=$rw['pharmacy_name'];
            ?>
            
            
          
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                      <script src="jquery-1.12.3.min.js"></script>
                    <style>
 #map {
   width: 100%;
   height: 400px;
   background-color: grey;
 }
</style>
                        <div class="card" style="height:500px; padding:20px">
                            <h3>My Pharmacy Location</h3>
    <div id="myMap">lee</div>
    <script>
      function initMap() {
        var uluru = {lat: -25.363, lng: 131.044};
        var map = new google.maps.Map(document.getElementById('myMap'), {
          zoom: 4,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSuGKK-UtdMjP222UZMiAo6iIMkfL6G00 &callback=initMap">
    </script>

    
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="img/background.jpg" alt="..."/>
                            </div>
                            <!-- To get the logo and constantly check for changes in the logo-->
                            <script type="text/javascript">
                            $(document).ready(function(){
                            setInterval(function(){
                            $('#displayLog').load('displayLogo.php')

                            },120);
                            });
                           </script> 
                            <div class="content">
                                <div class="author">
                              <div id="displayLog">
                             <p></p>
                              </div>
                               <h4 class="title"><?php echo $name ?><br />
                               <h5 class="title"><?php echo $physicalAddress?></h5>
                               <h5 class="title"><?php echo $phone ?></h5>
                               <h5 class="title"><?php echo $email?></h5>
                                </h4>
                                </div>
                               
                            </div>
                            
                            <div class="text-center">
                            <div id="wrapper" style="padding:20px">
                            <div class="form-group">
                            <label>Change Logo</label>
                             <form action="" method="post" enctype="multipart/form-data">
                             <input type="file" class="form-control" id="upload_file" name="upload_file" />
                             <input type="submit" class="btn btn-danger btn-sm" name='submit_image' value="Upload Image"/>
                             </form>
                            </div>
                            </div>
                           <?php
                           if(isset($_POST['submit_image']))
                                                           {
		
  $uploadfile=$_FILES["upload_file"]["tmp_name"];
  
  $folder="img/";
  $location="$folder".$_FILES["upload_file"]["name"];
  move_uploaded_file($_FILES["upload_file"]["tmp_name"], "$folder".$_FILES["upload_file"]["name"]);
 // $insert_path="INSERT INTO image_table VALUES('$folder','$upload_image')";
  $update_path="UPDATE `profile` SET `logo`='$location' WHERE PharmacyID='$user_id'";
  $run_update=mysqli_query($conn,$update_path);
  if($update_path){
	  echo"Update successfull";
  }
  else{
	  echo "update was unsuccessfull";
  }

 exit();
}
?>
                                <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
          </div>
        <!-- InstanceEndEditable -->
        </div>
 <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; 2017 <a href="#">Pharmacy Finder</a>, made with love for a patience web
                </p>
            </div>
        </footer>

    </div>
</div>
 <!-- Load a modal to notify the user to create a profile-->
            <div id="createProfile" class="modal fade" role="dialog">
            <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <center><img src="img/logo.jpg" class="img-responsive img-rounded"></center>
            </div>
            <div class="modal-body">
            <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
            </div>
            </div>
            
            <!--- modal to add a drug-->
            <div id="addDrug" class="modal fade" role="dialog">
            <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Stock</h4>
            </div>
            <div class="modal-body">
            <div class="row">
           
                      <div class="col-md-12">
                       <div id="display"></div>
                      <form id="custo">
                        <div class="form-group">
                           <label>Drug Name</label>
                           <!-- select all drugs for enrolment-->
                           
                           <select id="drugName" class="form-control">
                           <?php 
                           include 'Database/config.php';
                           $sele="SELECT `DrugID`, `Drugname` FROM `drugs`";
                           $run_sele=mysqli_query($conn,$sele);
                           while($row=mysqli_fetch_array($run_sele)){
                           $drugname=$row['Drugname'];
                           ?>
                           <option value="<?php echo $drugname; ?>"><?php echo $drugname; ?></option>
                           <?php
                           }
                           ?>
                           </select>
                           <input type="hidden" id="pharmacy_id" value="<?php echo $user_id; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group">
                                    <label>Prescription</label>
                                    <input type="text" class="form-control" id="prescription" placeholder="Prescription" >
                                    </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Price</label>
                                                <input type="number" id="price" class="form-control" placeholder="price">
                                            </div>
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" id="status">
                                                <option value="instock">Instock</option>
                                                <option value="notInstock">Not instock</option>
                                                </select>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                      <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                  <button type="button" id="btn" class="btn btn-sm btn-danger btn-fill pull-right" onClick="enrole()">Enroll</button>
                                            </div>
                                        </div>
                                    </div>
                                   
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>

           </div>
           </div>
            <script type="text/javascript">
             function enrole() {
                                    var btn =$("#btn").val();
                                    var drugName=$("#drugName").val();
                                    var status=$("#status").val();
									var prescription=$("#prescription").val();
                                    var price=$("#price").val();
									var pharmacy_id=$("#pharmacy_id").val();
                                  $.post("StockManagment/enrolDrug.php", {
                                     btn:btn ,
                                     drugName:drugName,
                                     status:status,
									 price:price,
									 prescription:prescription,
									 pharmacy_id:pharmacy_id,
                                      },

                                    function(data) {
                                                  $('#display').html(data);
												  $('#displayDrugs').load('StockManagment/getDrugs.php')
                                                    $('#custo')[0].reset()
                                                    
                                                            });
                                                           }
                                                           </script> 


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<!--<script src="../assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
   
    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>
   

	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

            },{
                type: 'info',
                timer: 4000
            });

    	});
	</script>

<!-- InstanceEnd --></html>
