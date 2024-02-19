<?php
require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/SMTP.php";
require 'PHPMailer/src/Exception.php';



function sendMail($email, $pass, $name)
{

    $p1 = "
    <b>Thông báo vv</b>: Thông tin Mật khẩu Tài khoản

Chào <b>$name</b>,

Chúng tôi nhận được yêu cầu khôi phục mật khẩu của bạn. Dưới đây là thông tin mật khẩu mới của bạn:

Mật khẩu : <b>$pass</b>

Lưu ý rằng bạn nên thay đổi mật khẩu ngay sau khi đăng nhập để đảm bảo tính bảo mật của tài khoản.

Nếu bạn không thực hiện yêu cầu này, vui lòng liên hệ với chúng tôi ngay lập tức để bảo vệ tài khoản của bạn.

Trân trọng,
    ";

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
    try {
        $mail->SMTPDebug = 0;  // 0,1,2: chế độ debug
        $mail->isSMTP();
        $mail->CharSet  = "utf-8";
        $mail->Host = 'smtp.gmail.com'; //địa chỉ server
        $mail->SMTPAuth = true;
        $tennguoigui = 'Admin Quiz System';
        $mail->Username = 'quizsystem2003@gmail.com';
        $mail->Password = 'ocbn bdre zbdu rids'; // mật khẩu ứng dụng không phải mật khẩu gmail
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('quizsystem2003@gmail.com',$tennguoigui);
        $mail->addAddress($email); //mail người nhận  
        $mail->isHTML(true);
        $mail->Subject = 'Lấy lại mật khẩu';
        $mail->Body = nl2br($p1); //nội dung thư
        $mail->smtpConnect(array("ssl" => array(
            "verify_peer" => false,
            "verify_peer_name" => false,
            "allow_self_signed" => true
        )));
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
