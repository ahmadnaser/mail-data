<?php 

//you need to enable open_ssl in php settings

if(isset($_POST['email'])){
//send email from local server (testing)
	include("clases/class.phpmailer.php");
	include("clases/class.smtp.php");
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "ssl";
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465;
	$mail->Username = "picnicrus.ahmadhammad@gmail.com";
	$mail->Password = "";
	
	  
	$mail->From = "picnicrus.ahmadhammad@gmail.com";//"info@ahmadnaser.com";
	$mail->FromName = "User Name";
	$mail->Subject = "Subject For Email";
	$mail->AltBody = "Hi, How Are You , This is Sterio007 \nxxxx.";
	$mail->MsgHTML("Hi, How Are You , This is Sterio007 <br><b>xxxx</b>.");
	//$mail->AddAttachment("files/files.zip");
	//$mail->AddAttachment("files/img03.jpg");
	$mail->AddAddress($_POST['email'], "user name");
	$mail->IsHTML(true);
	
	if(!$mail->Send()) {
	  echo "Error: " . $mail->ErrorInfo;
	  return false;
	}
    //fin enviar correo usuando servidor local	
}
?>

<form id="form1" name="form1" method="post" action="">
  <p>
    <label for="email"></label>
    <input type="text" name="email" id="email" />
  </p>
  <p>
    <input type="submit" name="Send" id="Send" value="Send" />
  </p>
</form>



