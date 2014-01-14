<?php
 require_once "Mail.php";

        $from = "dev.demo@gmail.com";
        $to = "demo@gmail.com";
        $subject = "registration ok";
        $body = "this is message body";

        $host = "ssl://smtp.gmail.com";//"smtp.gmail.com";
        $port = "465";//"587";
        $username = "dev.demo@gmail.com";
        $password = "";
        $headers = array ('From' => $from,
          'To' => $to,
          'Subject' => $subject);
        $smtp =@ Mail::factory('smtp',
          array ('host' => $host,
            'port' => $port,
            'auth' => true,
            'username' => $username,
            'password' => $password));
        $mail = @$smtp->send($to, $headers, $body);
		echo "Trying to send email ....";
		
        if (@PEAR::isError($mail)) {
          echo("<p>" . $mail->getMessage() . "</p>");
         } else {
          echo("<p>Message successfully sent!</p>");
         }
?>
