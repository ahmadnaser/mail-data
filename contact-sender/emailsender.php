<?php
function buildBody($title,$fname,$lname,$phone,$email,$zipcode,$company,$street,$city,$subject,$message)
{
$body = "Hi ,<br />My Name is ".$title.$fname." ".$lname."<br />".
"Subject :".$subject."<br />".
"Message :".$message."<br />".
"----------------------------<br />".
"Our Company is :".$company."<br />".
"Address and contact info :<br />".
"Phone: ".$phone."<br />".
"Email :".$email."<br />".
"ZipCode :".$zipcode."<br />".
"City :".$city."<br />".
"Street :".$street."<br />"."<a href='asd'>here you go</a>";
return $body;
}
?>
<html>
<head>
<style>

 body{background:white;}
#box
{ 
width:380px;
height:380px;
margin:auto;
 position:relative;
 top:80px;background:#FFF;
 border-radius:15px;
}

#ch1
{
color:black;


	font-style:italic;
	
	font-family:Arial, Helvetica, sans-serif;
-moz-border-radius-topright: 15px;
-moz-border-radius-topleft: 15px;
border-top-right-radius: 15px;
border-top-left-radius: 15px;
background: #ed6a00;
		text-shadow:1px 1px 1px #999; 
    
}
img {   
    display:block;
   
    text-align:center;
    margin: auto;
 
    
    z-index: 1000;

    cursor: wait;                
    }
#cntDisp
 {
display:block;
clear:both;
text-align:center;    
 }   
.cheaders
{
    text-align:center;
    
} 
</style>



</head>
<body>
<div id="box">
<?php



if(
isset($_POST['contactform_subject'])&&!empty($_POST['contactform_subject']) &&
isset($_POST['contactform_firstname'])&&!empty($_POST['contactform_firstname']) &&
isset($_POST['contactform_lastname'])&&!empty($_POST['contactform_lastname']) &&
isset($_POST['contactform_message'])&&!empty($_POST['contactform_message']) &&
isset($_POST['contactform_phone'])&&!empty($_POST['contactform_phone']) &&
isset($_POST['contactform_email'])&&!empty($_POST['contactform_email']) &&
isset($_POST['contactform_company'])&&!empty($_POST['contactform_company'])
)
{
$contactform_title=$_POST['contactform_title'];
$contactform_firstname=$_POST['contactform_firstname'];
$contactform_lastname=$_POST['contactform_lastname'];
$contactform_phone=$_POST['contactform_phone'];
$contactform_email=$_POST['contactform_email'];
$contactform_zipcode=$_POST['contactform_zipcode'];
$contactform_company=$_POST['contactform_company'];
$contactform_street=$_POST['contactform_street'];
$contactform_city=$_POST['contactform_city'];
$contactform_subject=$_POST['contactform_subject'];
$contactform_message=$_POST['contactform_message'];
  sendemail($contactform_title,$contactform_firstname,$contactform_lastname,$contactform_phone,$contactform_email,$contactform_zipcode,$contactform_company,$contactform_street,$contactform_city,$contactform_subject,$contactform_message);
}
else{
?>
<script>
alert('please fill all the required fields');
 window.open("index.php", "_self");
</script>
<?php

}
?>
	<?php
     function sendemailE($title,$fname,$lname,$phone,$email,$zipcode,$company,$street,$city,$subject,$message)
    {

$from = $lname." <'$email'>";

$message = buildBody($title,$fname,$lname,$phone,$email,$zipcode,$company,$street,$city,$subject,$message);

$to = 'demo@gmail.com';


$headers = "From: ".$email."\r\nReply-To: ".$email."";
$headers .= "\r\nContent-Type: text/html; charset='iso-8859-1'; charset='iso-8859-1';Content-Transfer-Encoding: 7bit"; 

$mail_sent = @mail( $to, $subject, $message, $headers );
if($mail_sent)
{

?>



<h2 class="cheaders" id="ch1">Contact Sent!</h2>
<h3 class="cheaders">Your Message has been sent</h3>
<p class="cheaders">Thank You !</p>

<img src="spinner-md.gif"  alt="Loading..."/> 
  <div id="cntDisp"> </div>
<script>
var cnt = 10;

        function Redirect()

        {                        

            if (cnt > 0){

                document.getElementById("cntDisp").innerHTML = 

                cnt + " seconds left..";                

                cnt = cnt - 1;
                

                setTimeout("Redirect()", 1000);

            }

            else {

                document.getElementById("cntDisp").innerHTML =

                "redirecting...";

                window.open("index.php", "_self");

            }

        }  
        Redirect();   
</script>
<?php 
}
else
{
echo "Mail Failed";
}

    }
    ?>
	
	
	
<?php




	    function   sendemail($title,$fname,$lname,$phone,$email,$zipcode,$company,$street,$city,$subject,$message)
    {

	$e="demo@gmail.com";
	

require_once "Mail.php";
$from = "Contact <dev.demo@gmail.com>";
$to = $fname." <".$e.">";
//$subject = "Message Received";
$body=buildBody($title,$fname,$lname,$phone,$email,$zipcode,$company,$street,$city,$subject,$message);


$host = "ssl://smtp.gmail.com";//"smtp.gmail.com";
$port = "465";//"587";
$username = "dev.demo";
$password = "as";
$headers = array ('From' => $from,
'To' => $to,
'Subject' => $subject,
'Content-type'=> "text/html",
'charset'=>"utf-8");
$smtp =@ Mail::factory('smtp',
array ('host' => $host,
'port' => $port,
'auth' => true,
'username' => $username,
'password' => $password));
$mail = @$smtp->send($to, $headers, $body);

if (@PEAR::isError($mail)) {
echo("<p>" . $mail->getMessage() .":(". "</p>");
} else {
	//echo '<h1 align="center"><a >activation for  '.$e.'   send to your email</a></h1>';
	?>
	
	
<h2 class="cheaders" id="ch1">Contact Sent!</h2>
<h3 class="cheaders">Your Message has been sent</h3>
<p class="cheaders">Thank You !</p>

<img src="spinner-md.gif"  alt="Loading..."/> 
  <div id="cntDisp"> </div>
<script>
var cnt = 10;

        function Redirect()

        {                        

            if (cnt > 0){

                document.getElementById("cntDisp").innerHTML = 

                cnt + " seconds left..";                

                cnt = cnt - 1;
                

                setTimeout("Redirect()", 1000);

            }

            else {

                document.getElementById("cntDisp").innerHTML =

                "redirecting...";

                window.open("index.php", "_self");

            }

        }  
        Redirect();   
</script>
	
	
	
	
	
	
	
	
	<?php
}


    }
	?>
	
	
</div ><!--end box-->
</body>
</html>