<?php
require '../vendor/autoload.php';
class Mailer
{
    private $app_password = "iwzenhlthxnosoqb";
    function VerifyEmail($to)
    {
        $code = rand(1000, 9999);
        $from = "tinkerthethinker495@gmail.com";
        $message = "
<html>
<head>
<title>Email Verification</title>
</head>
<body>
<p>Enter this code to verify your email: 
    <b>$code</b>
    </p>
</body>
</html>
";
        $subject = "Test Email";
        $headers1 = "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers2 = "MIME-Version:1.0" . "\r\n";
        $headers3 = "From: <$from>" . "\r\n";
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username =   $from;
        $mail->Password = $this->app_password; // Gmail App password
        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;
        $mail->setFrom($from);
        $mail->addAddress($to);
        $mail->isHTML(true);
        $mail->Subject = "Email Verification";
        $mail->Body = $message;
        $mail->send();
        return $code;
    }
    function ResetPassword($to)
    {
        $code = rand(1000, 9999);
        $from = "tinkerthethinker495@gmail.com";
        $message = "
        <html>
        <head>
        <title>Password Reset</title>
        </head>
        <body>
        <p>Enter this code to reset your password: 
            <b>$code</b>
            </p>
        </body>
        </html>
        ";
        $subject = "Test Email";
        $headers1 = "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers2 = "MIME-Version:1.0" . "\r\n";
        $headers3 = "From: <$from>" . "\r\n";
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username =   $from;
        $mail->Password = $this->app_password; // Gmail App password
        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;
        $mail->setFrom($from);
        $mail->addAddress($to);
        $mail->isHTML(true);
        $mail->Subject = "Email Verification";
        $mail->Body = $message;
        $mail->send();
        return $code;
    }

}