<?php
session_start();
if(!$_SESSION['s_id']){
  header("location:index.php");
}
$user_id=$_SESSION['s_id'];
?>
<!doctype html>
<html lang="en"><!-- InstanceBegin template="/Templates/pharmacyFinder.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<!-- InstanceBeginEditable name="doctitle" -->
	<title>Pharmacy Finder</title>
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
				<li class="active-pro">
                    <a href="upgrade.html">
                        <i class="pe-7s-rocket"></i>
                        <p>Upgrade to PRO</p>
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
                    <!-- InstanceBeginEditable name="EditRegion4" --><a class="navbar-brand" href="#">My Google Maps</a><!-- InstanceEndEditable --></div>
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
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Change Password</a></li>
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

          <script src="jquery-1.12.3.min.js"></script>
                            <script type="text/javascript">
                            $(document).ready(function(){
                            $('#displaymap').load('checkout.php')
                             });
                            </script>
                            <div id="displaymap"></div>
         
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
