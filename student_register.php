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
        <link rel="stylesheet" href="css/stureg.css">
        
        
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
        
        
        
        
        
        
        
        
    </head>
    
    <body class="bg-info">
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
<?php
include "admin/database.php";
$newexaminerid="std001";      
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql4 = "select * from oes_student where studentid like 's%' order by studentid";
$result4 = $conn->query($sql4);
if ($result4->num_rows > 0) {
    // output data of each row
    while($row = $result4->fetch_assoc()) {
        $newexaminerid=$row["studentid"];
    }
    $val=substr($newexaminerid, 3);
    $val=(int)$val;
    $val=$val+1;
    $val=(String)$val;
    if(strlen($val)==1)
    $newexaminerid="std00".$val;
    else if(strlen($val)==2)
    $newexaminerid="std0".$val;
    else
    $newexaminerid="std".$val;
}
?>
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
<h2 style="text-align:center;margin-bottom:30px;">Registration Form</h2>
 <form action="admin/student.php" method="post" style="background:White;width:500px;margin:0 auto;padding:30px;border:1px solid #ccc;border-radius:5px;">
  <label style="display:block;margin-bottom:5px;">Student ID:</label>
  <input readonly="" value="<?php echo $newexaminerid; ?>" required="" type="text" name="newsid" placeholder="Student ID" class="form-control"><br> 
<label style="display:block;margin-bottom:5px;">Student Name:</label>
<input type="text" name="newsname" required="" placeholder="Student Name" class="form-control"><br>
  <label style="display:block;margin-bottom:5px;">Password:</label> 
  <input type="password" name="newspass" required="" placeholder="Student password" class="form-control"><br>
  <label style="display:block;margin-bottom:5px;">Program:</label>
  <select style="margin-bottom:5px;" name="newscourse" class="form-control">
  <option>B.Tech</option>
  <option>MCA</option>
  </select>
  <label style="display:block;margin-bottom:5px;">Semester:</label> 
  <select name="newssem" class="form-control">
    <option>Semester 1</option>
    <option>Semester 2</option>
    <option>Semester 3</option>
    <option>Semester 4</option>
    <option>Semester 5</option>
    <option>Semester 6</option>
    <option>Semester 7</option>
    <option>Semester 8</option>
  </select>
  <label style="display:block;margin-bottom:5px;">Status:</label> 
  <select name="newsstat" class="form-control">
    <option>active</option>
    <option>inactive</option>
  </select><br><br>
  <input type="submit" value="Create Account" name="addbtn" class="form-control btn-success">
<center><p>Already have an account? <a href="student.php">Login</a></p></center>
<?php
                if(filter_input(INPUT_POST,"addbtn")!=NULL)
                {
                    $conn = new mysqli($servername, $dbuname, $dbupass, $dbname);
// Create connection
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql3 = "insert into oes_login values('".filter_input(INPUT_POST,"neweid")."','".filter_input(INPUT_POST,"newename")."','".filter_input(INPUT_POST,"newepass")."','employee','".filter_input(INPUT_POST,"newestat")."')";

if ($conn->query($sql3) === TRUE) 
{
    echo "<div class='col-sm-4 col-sm-offset-4 btn btn-success'>New Examiner Added</div><div style='clear:both;'></div>";
} 
else {
    echo "<div class='col-sm-4 col-sm-offset-4 btn btn-danger'>Not Added</div><div style='clear:both;'></div>";
}

}
?>
</form>

</body>
</html>
