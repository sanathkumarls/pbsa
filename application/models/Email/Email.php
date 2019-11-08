<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 05/11/19
 * Time: 11:57 PM
 */

require_once __DIR__.'/class.phpmailer.php';
require_once __DIR__."/../../utilities/Constants.php";

class Email
{
    function sendMail($from,$to,$subject,$message)
    {

        $mail = new PHPMailer();

        //$mail->IsSMTP();//uncomment in deployment
        $mail->Host = Constants::host;  /*SMTP server*/

        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Port = 587;
        $mail->Username = Constants::username;  /*Username*/
        $mail->Password = Constants::password;    /**Password**/

        $mail->From = Constants::username;    /*From address required*/
        $mail->FromName = $from;
        $mail->AddAddress($to);
//$mail->AddReplyTo("mail@mail.com");

        $mail->IsHTML(true);

        $mail->Subject = $subject;
        $mail->Body = $message;
//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

        if(!$mail->Send())
        {
//            echo "Message could not be sent. <p>";
//            echo "Mailer Error: " . $mail->ErrorInfo;
//            exit;
            return false;
        }
//        echo "Message has been sent";
        return true;
    }
}
//$a = new Email();
//$a->sendMail("pbsa","sanathlslokanathapura@gmail.com","subject","message");

