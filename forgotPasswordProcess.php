<?php

include "connection.php";

include "SMTP.php";
include "PHPMailer.php";
include "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_GET["e"])) {

    $email = $_GET["e"];

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
    $num = $rs->num_rows;

    if ($num == 1) {

        $code = uniqid();
        Database::iud("UPDATE `user` SET `verification_code`='" . $code . "' WHERE `email`='" . $email . "'");

        // email code
        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'oshanadithya637@gmail.com';
        $mail->Password = 'cyokeqjqpchhdfir';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('oshanadithya637@gmail.com', 'iHeaven Community');
        $mail->addReplyTo('oshanadithya637@gmail.com', 'iHeaven Community');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'iHeaven Forgot Password Verification Code';
        $bodyContent = '<table style="width: 100%; font-family: sans-serif;">
        <tbody>
            <tr>
                <td align="center">
                    <table style="max-width: 600px;">
                        <tr>
                            <td align="center">
                                <a href="#" style="font-size: 35px; font-weight: bold; color: black; text-decoration: none;">iHeaven</a>
                                <hr>
                            </td>
                        </tr>
    
                        <tr>
                            <td>
                                <h1 style="font-size: 30px; line-height: 45px; font-weight: 600;">Your Verification Code is : ' . $code . '</h1>
                                <p style="margin-top: 24px; color: red;">Do not share this code with anyone!</p>
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                <p style="font-weight: 500;">&copy; 2024 iHeaven.lk || All Rights Reserved</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>';
        $mail->Body    = $bodyContent;

        if (!$mail->send()) {
            echo ("Email sent Failed");
        } else {
            echo ("success");
        }
    } else {
        echo ("Invalid Emial Address");
    }
} else {
    echo ("Please enter your email address in email field");
}
