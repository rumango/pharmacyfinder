<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
   <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
   
    <link href="assets/font-awesome/css/font-awesome1.min.css" rel="stylesheet" />
    <style>

        body {
            background-color:#ededed;
        }
    </style>
</head>
<body >
<div class="container" style="padding-top: 100px">
    <div class="row" >
        <div class="col-md-3"></div>
        <div class="col-md-6" style="background-color: #fff;padding-top: 20px">
            <center> <img src="img/logo.jpg" class="img-responsive" alt="logo"></center>
        </div>
        <div class="col-md-3"></div>

    </div>
    <div class="row" >
        <div class="col-md-3"></div>
        <div class="col-md-6"  style="background-color: #fff;">
            <div id="getResult"></div>
            <form id="custo">
            <div class="form-group">
                <label> Pharmacy Name</label>
                <input type="text" class="form-control" id="pharmacyName" placeholder="Pharmacy name">

            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" id="username" placeholder="username" maxlength="8">
            </div>
            <div class="form-group">
                <label for="pass1">Password:</label>
                <input name="pass1" id="pass1" type="password" class="form-control" required></div>
            <div class="form-group">
                <label for="pass2">Confirm Password:</label>
                <input name="pass2" id="pass2" onkeyup="checkPass(); return false;" type="password" class="form-control" required><br>
                <span id="confirmMessage" class="confirmMessage"></span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger btn-md" id="btn" onclick="RegisterAccount()">Sign up</button>
                Already User??? <a href="index.php"> Click here to login</a>
            </div>
            </form>


        </div>
        <div class="col-md-3"></div>

    </div>



</div>
<!-- to check if the passwords match-->
<script type="text/javascript">
    function checkPass()
    {
        //Store the password field objects into variables ...
        var pass1 = document.getElementById('pass1');
        var pass2 = document.getElementById('pass2');
        //Store the Confimation Message Object ...
        var message = document.getElementById('confirmMessage');
        //Set the colors we will be using ...
        var goodColor = "#66cc66";
        var badColor = "#ff6666";
        //Compare the values in the password field
        //and the confirmation field
        if(pass1.value == pass2.value){
            //The passwords match.
            //Set the color to the good color and inform
            //the user that they have entered the correct password
            pass2.style.backgroundColor = goodColor;
            message.style.color = goodColor;
            message.innerHTML = "Passwords Match!"
        }else{
            //The passwords do not match.
            //Set the color to the bad color and
            //notify the user.
            pass2.style.backgroundColor = badColor;
            message.style.color = badColor;
            message.innerHTML = "Passwords Do Not Match!"
        }
    }
</script>
<!-- submit data to registration proccessor without a page refresh using jquery -->
<script type="text/javascript" src="assets/js/jquery-1.12.3.min.js"></script>
<script type="text/javascript">
    function RegisterAccount() {
        var btn =$("#btn").val();
        var username=$("#username").val();
        var pharmacyName=$("#pharmacyName").val();
        var pass1=$("#pass1").val();

        $.post("Registration/", {
                btn :btn ,
                pharmacyName:pharmacyName ,
                username:username,
                pass1:pass1,
            },

            function(data) {
                $('#getResult').html(data);
                //after succesfull submission the form refreshes
                $('#custo')[0].reset()

            });
    }
</script>




</body>
</html>