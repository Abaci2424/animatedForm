<?php

     use PHPMailer\PHPMailer\PHPMailer;
     use PHPMailer\PHPMailer\Exception;

     require "PHPMailer/src/PHPMailer.php";
     require "PHPMailer/src/Exception.php";

     $mail = new PHPMailer(true);
     $mail->CharSet = "UTF-8";
     $mail->isHTML(true);

     $name = $_POST["name"];
     $email = $_POST["email"];
     $phone = $_POST["phone"];
     $message = $POST["message"];

     $email_template = "template_mail.html";

     $body = file_get_contents($email_template);

     $body = str_replace('%name%', $name, $body);
     $body = str_replace('%email%', $email, $body);
     $body = str_replace('%phone%', $phone, $body);
     $body = str_replace('%message%', $message, $body);


     $theme = "[Заявкв с формы]";

     $mail->addAddress("abacioksana@gmail.com");

     $mail->Subject = $theme;
     $mail->msgHTML($body);

     if (!$mail->send()){
          $message = "Message not sent";
     } else {
          $message = "Data sent";
     }
        
     $response = ["message" => $message];
     header('Content-type: application/json');

     echo json_encode($response);
      


     