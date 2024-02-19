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
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/animate1.css">
        <link rel="stylesheet" href="css/buttons.css">
        
        
        
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
        </style>
        
        
    </head>
    
    <body class="bg-info" >
        <div class="row"></div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar navbar-default navbar-fixed-top">
        <a class="navbar-brand col-md-7"><img src="style/images/csis.png" class="logo">Phil Jr Online Exam System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                    <a class="nav-link col-md-4" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link col-md-4" href="admin.php">Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link col-md-4" href="lecturer.php">Lecturer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link col-md-4" href="student.php">Student</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link col-md-4" href="About.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link col-md-4" href="contact.php">Contact</a>
                </li>
            </ul>

        </div>
    </nav>
       
       <h1 class="jumbotron text-center  effect2" style="margin:0;padding:20px;margin-bottom:5px;">Phil ONLINE EXAMINATION SYSTEM<small><br/></small></h1>
        
       <div class="container">
                   <div id="txtHint" class="btn btn-success btn-block" style="display:none;"><b>Process Status...</b></div>

</div>
       <div class="container h100 ">
              <div class="col-sm-5 text-center col-sm-offset-1 wow bounceIn" style="margin-left: 30%; margin-top: 100px;padding:0;border-radius:5px;box-shadow:0px 20px 20px -10px #999999;background-color: #cccccc; height:350px;">
                   <h3 style="border-top-left-radius:10px;border-top-right-radius:10px;padding:10px 0px;margin-top:0px;box-shadow:0px 3px 3px #999999;color:#ffffff;background-color: #999999" class="text-center">STUDENT LOGIN</h3> 
                   <div class="form-group" style="padding: 0px 10px;">
                       <span class="control-lable">Student ID</span>
                       <input type="text" class="form-control" id="sid" style="box-shadow:0px 10px 20px -10px #999999;">
                   </div>
                   <div class="form-group" style="padding: 0px 10px;">
                       <span class="control-lable">Student Pass</span>
                       <input type="password" class="form-control" id="spass" style="box-shadow:0px 10px 20px -10px #999999;">
                   </div>
                   <div class="form-group" style="padding: 0px 10px;">
                       <input type="button" value="Login" class="form-control btn btn-success" id="studentloginbtn" style="box-shadow:0px 10px 20px -10px #999999;">
                   </div><br><br>
                   <p>Don't have an account yet?<a href="student_register.php">Register Now</a></p>
                   </div>
        </div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Register Now</h4>
      </div>
      <div class="modal-body">
      <form action="index.php" method="post">
                     <fieldset class="form-group">
    <label for="exampleInputEmail1">Student ID</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter ID" maxlength="50" name="std_id1">
    <small class="text-muted">Enter the ID given to you by your faculty.</small>
  </fieldset>

  <fieldset class="form-group">
    <label for="exampleInputEmail1">Generated Code</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter code" maxlength="12" name="std_code1">
    <small class="text-muted">Enter the ID given to you by your faculty.</small>
  </fieldset>

  <button type="submit" name="studreg1" class="btn btn-primary" name="std_submit">Submit</button>

                   </form>
        
      </div>
      
    </div>
    </div>
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

