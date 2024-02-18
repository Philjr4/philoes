<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Phil-OES</title>
        
        <?php
// Start the session
session_start();
$_SESSION["userid"]="";
?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
        <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/animate1.css">
        <link rel="stylesheet" href="css/buttons.css">
        
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script type="text/javascript"  src="script/jquery-hp.js"></script>
        <script type="text/javascript" src="script/bootstrap.js"></script>
        <script type="text/javascript" src="script/jquery.noty.packaged1.js"></script>
        <script type="text/javascript" src="script/notification_html3.js"></script>
       
        
        <script>
            function generate(type, text) {

            var n = noty({
                text        : text,
                type        : type,
                dismissQueue: true,
                layout      : 'topCenter',
                closeWith   : ['click'],
                theme       : 'relax',
                maxVisible  : 10,
                animation   : {
                    open  : 'animated bounceInLeft',
                    close : 'animated bounceOutRight',
                    easing: 'swing',
                    speed : 400
                }
            });
            console.log('html: ' + n.options.id);
        }
        function generateLeft(type, text) {

            var n = noty({
                text        : text,
                type        : type,
                dismissQueue: true,
                layout      : 'topLeft',
                closeWith   : ['click'],
                theme       : 'relax',
                maxVisible  : 10,
                animation   : {
                    open  : 'animated bounceInLeft',
                    close : 'animated bounceOutRight',
                    easing: 'swing',
                    speed : 400
                }
            });
            console.log('html: ' + n.options.id);
        }
            //generate('warning', notification_html[2]);
            //generate('error', notification_html[1]);
            //generate('information', notification_html[0]);
            //generate('success', notification_html[3]);
            //generate('notification');
            //generate('success');
        
       
        

        $(document).ready(function () {

            $("#successbtn").click(function c2(){
            
               validateadminlogin();
            
            });
            
            
            
            $("#studentloginbtn").click(function(){
            
               validatestudentlogin();
            
            });
        });
 ////////////////////////////////////////////////STUDENT LOGIN SECTION CODES////////////////////////////////////////////////            
 function validatestudentlogin()
        {
            if($("#sid").val()==="" || $("#sid").val()===null || $("#spass").val()==="" || $("#spass").val()===null)
        {
            //alert('Please enter your userid and password');
            getdata("Please enter your userid and password",'fill before submit');
                generateLeft('error',notification_html[4]);
        }  
        else
        {
            validateStudent();
               setTimeout(function(){
                   if(document.getElementById("txtHint").innerHTML.substring(0,1)==="W")
                   {
                       onsucessalertSTUDENT();
                   }
                   else
                   {
                       onerroralertSTUDENT();
                   }
               },1000);
        }
        }
 function validateStudent() {
    
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","student/studentprocess/login-do.php?studentid="+$("#sid").val()+"&studentpass="+$("#spass").val(),true);
        xmlhttp.send();
        }
        function onsucessalertSTUDENT()
        {
            getdata("Welcome User",'Validating Authentication');
                generate('success',notification_html[4]);
                /////////////////////////TIME OUT////////////////////
                        setTimeout(function() {
                        
                        getdata("Hello Student",'Redirecting to your home page in 2 Seconds');
                        generate('information',notification_html[4]);
                        setTimeout(function(){window.location.assign("student/studenthome.php");},2000);
                }, 1000);
               //////////////////////////TIMEOUT END/////////////////////            
        }
        
        function onerroralertSTUDENT()
        {
            getdata(document.getElementById("txtHint").innerHTML,'');
                generate('error',notification_html[4]);
                $("#spass").val("");
                /////////////////////////TIME OUT////////////////////
                        setTimeout(function() {
                        //getdata('Hello Administrator','Redirecting to your home page in 5 Seconds');
                        //generate('information',notification_html[4]);
                
                        setTimeout(function(){
                        //getdata('Ready to Redirect','Redirecting to your home page Now');
                        //generate('Success',notification_html[4]);  
                        },5000);
                
                }, 1000);
               //////////////////////////TIMEOUT END/////////////////////            
        }
        
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 ////////////////////////////////////////////////ADMIN LOGIN SECTION CODES////////////////////////////////////////////////       
        function validateadminlogin()
        {
            if($("#aid").val()==="" || $("#aid").val()===null || $("#apass").val()==="" || $("#apass").val()===null)
        {
            //alert('Please enter your userid and password');
            getdata("Please enter your userid and password",'fill before submit');
                generateLeft('error',notification_html[4]);
        }  
        else
        {
            validateAdmin();
               setTimeout(function(){
                   if(document.getElementById("txtHint").innerHTML.substring(0,1)==="W")
                   {
                       onsucessalert();
                   }
                   else
                   {
                       onerroralert();
                   }
               },1000);
        }
        }
        
        
        function validateAdmin() {
    
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","admin/adminprocess/login-do.php?adminid="+$("#aid").val()+"&adminpass="+$("#apass").val(),true);
        xmlhttp.send();
        }
        
        function onsucessalert()
        {
            getdata("Welcome User",'Validating Authentication');
                generate('success',notification_html[4]);
                /////////////////////////TIME OUT////////////////////
                        setTimeout(function() {
                        
                        if((document.getElementById("txtHint").innerHTML.substr(64,3)).toString()==="adm")
                        {
                        getdata("Hello Administrator",'Redirecting to your home page in 2 Seconds');
                        generate('information',notification_html[4]);
                        setTimeout(function(){window.location.assign("admin/adminhome.php");},2000);
                        }
                        else
                        {
                        getdata("Hello Examiner",'Redirecting to your home page in 2 Seconds');
                        generate('information',notification_html[4]);
                        setTimeout(function(){window.location.assign("admin/employeehome.php");},2000);
                        }
                
                }, 1000);
               //////////////////////////TIMEOUT END/////////////////////            
        }
        
        function onerroralert()
        {
            getdata(document.getElementById("txtHint").innerHTML,'');
                generate('error',notification_html[4]);
                $("#apass").val("");
                /////////////////////////TIME OUT////////////////////
                        setTimeout(function() {
                        //getdata('Hello Administrator','Redirecting to your home page in 5 Seconds');
                        //generate('information',notification_html[4]);
                
                        setTimeout(function(){
                        //getdata('Ready to Redirect','Redirecting to your home page Now');
                        //generate('Success',notification_html[4]);  
                        },5000);
                
                }, 1000);
               //////////////////////////TIMEOUT END/////////////////////            
        }
        
        </script>
        
        
        
        
        
        
        <style>
            ul{
                list-style-type: none;
            }
            .effect2
{
  position: relative;
  margin-bottom:10px;
  background-color: white;
}
.effect2:before, .effect2:after
{
  z-index: -1;
  position: absolute;
  content: "";
  bottom: 10px;
  left: 10px;
  width: 70%;
  top: 80%;
  max-width:300px;
  background: #777;
  -webkit-box-shadow: 0 15px 10px #777;
  -moz-box-shadow: 0 15px 10px #777;
  box-shadow: 0 15px 10px #777;
  -webkit-transform: rotate(-3deg);
  -moz-transform: rotate(-3deg);
  -o-transform: rotate(-3deg);
  -ms-transform: rotate(-3deg);
  transform: rotate(-3deg);
}
.effect2:after
{
  -webkit-transform: rotate(3deg);
  -moz-transform: rotate(3deg);
  -o-transform: rotate(3deg);
  -ms-transform: rotate(3deg);
  transform: rotate(3deg);
  right: 10px;
  left: auto;
}
.bg-overlay {
    background: linear-gradient(rgba(0,0,0,.7), rgba(0,0,0,.7)), url("image/students.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
    color: #fff;
    height: 650px;
    padding-top: 50px;
}
        </style>
        
        
    </head>
    
    <body>
        <div class="row"></div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar navbar-default navbar-fixed-top">
        <a class="navbar-brand col-md-9"><img src="image/icon.png" width="40" height="34" class="d-inline-block align-text-top">Phil Jr Online Exam System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="container-fluid">
    <a class="navbar-nav" href="index.php">HOME</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            LOGIN
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="admin.php">Administrator</a></li>
            <li><a class="dropdown-item" href="lecturer.php">Lecturer</a></li>
            <li><a class="dropdown-item" href="student.php">Student</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="navbar-nav" href="#about">ABOUT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">CONTACT</a>
        </li>
      </ul>
    </div>
  </div>
    </nav>
         
            <div class="jumbotron bg-overlay">
                <div class="mask text-light d-flex justify-content-center flex-column text-center" style="margin-top: 250px;">
                <h1>Welcome To Phil Online Examination System</h1>
  <center><p><a class="btn btn-success btn-lg active" href="#about" role="button">Learn more</a></p></center>
                </div>
</div>
        <!--------------------------HEADER---------------------------------->
       <h1 class="jumbotron text-center  effect2" style="margin:0;padding:20px;margin-bottom:5px;"  id="about">ABOUT<small><br></small></h1>
       <div class="container">
           <div class="row">
               <div class="">
                   <div id="txtHint" class="btn btn-success btn-block" style="display:none;"><b>Process Status...</b></div>
                   <div class="jumbotron">
                   <p style="margin-left: 30px; margin-right: 30px;">Online Exam System is developed such that students can take online examination of their courses. Lecturers announce the schedule of the examination and students can take exam on that particular date. Students can also see the result after taking examination. </p>
<fieldset >
<div class="container py-5">
    <div class="row text-center">
      <!-- Team item-->
      <div class="col-xl-3 col-sm-6 mb-5">
        <div class="bg-primary rounded shadow-sm py-5 px-4"><img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
          <h3 class="mb-0">Lecturer</h3>
          <ul class="social mb-0 list-block mt-3">
            <li>Manage Own Profile.</li>
            <li>Create Exam Schedule.</li>
            <li>Create Question Bank.</li>
          </ul>
        </div>
      </div>
      <!-- End-->

      <!-- Team item-->
      <div class="col-xl-3 col-sm-6 mb-5">
        <div class="bg-white rounded shadow-sm py-5 px-4"><img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
        <h3 class="mb-0">Student</h3>
          <ul class="social mb-0 list-block mt-3">
            <li>Manage Own Profile.</li>
            <li>Take Examination</li>
            <li>View Result</li>
          </ul>
        </div>
      </div>
      <!-- End-->
    </div>
  </div>
<?php 
        include 'admin/database.php';
        if (isset($_POST['studreg1'])) {
           $std_id1 = $_POST['std_id1'];
          $std_code1 = $_POST['std_code1'];
          $search_db = mysql_query("SELECT * FROM studentreg WHERE stdreg_user LIKE '%$std_id1%' ");
            while ($row_posts = mysql_fetch_array($search_db)) {
              $id = $row_posts['stdreg_user'];
              $code = $row_posts['std_code'];
              if ($std_code1==$code && $std_id1==$id) {
                 setcookie('user_id', $id, time()+5000);
  echo "<script>window.open('register_student.php','_self')</script>";
              }
              else{
                echo "<h5 style='color: red;'>* Your User ID and Code does not match. Please contact your faculty.</h5>";
                die();
              }

        
      }
    }

        ?>
               </div>
           </div>
       </div>

    </body>
</html>

