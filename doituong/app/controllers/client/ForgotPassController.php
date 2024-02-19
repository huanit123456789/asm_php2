<?php
    namespace App\Controllers\Client;

    use App\Controllers\BaseController;
    use App\Models\AccountModel;
    use App\Traits\Validation;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    class ForgotPassController extends BaseController{
        protected $model;

        use Validation;

        public function __construct(){
            $this -> model = new AccountModel();
        }

        public function sendMail($ten_tk,$matkhau_tk,$email_tk){
            $p1 = "
            <b>Thông báo vv</b>: Thông tin Mật khẩu Tài khoản

            Chào <b>$ten_tk</b>,

            Chúng tôi nhận được yêu cầu khôi phục mật khẩu của bạn. Dưới đây là thông tin mật khẩu mới của bạn:

            Mật khẩu : <b>$matkhau_tk</b>

            Lưu ý rằng bạn nên thay đổi mật khẩu ngay sau khi đăng nhập để đảm bảo tính bảo mật của tài khoản.

            Nếu bạn không thực hiện yêu cầu này, vui lòng liên hệ với chúng tôi ngay lập tức để bảo vệ tài khoản của bạn.

            Trân trọng";

            $mail = new PHPMailer();
            try {
                $mail->SMTPDebug = 0;  // 0,1,2: chế độ debug
                $mail->isSMTP();
                $mail->CharSet  = "utf-8";
                $mail->Host = 'smtp.gmail.com'; //địa chỉ server
                $mail->SMTPAuth = true;
                $tennguoigui = 'Admin Quiz System';
                $mail->Username = 'quizsystem2003@gmail.com';
                // $mail->Password = 'ocbn bdre zbdu rids'; // mật khẩu ứng dụng không phải mật khẩu gmail
                $mail->Password = "wtjv imof rxlt jsmz";
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
                $mail->setFrom('quizsystem2003@gmail.com',$tennguoigui);
                $mail->addAddress($email_tk); //mail người nhận  
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

        public function forgotPass1(){
            $title = "Quên mật khẩu";
            $this -> render("client/forgotpass/forgotpass.blade.php",compact('title'));
            unset($_SESSION["validation"]);
            unset($_SESSION["post"]);
        }

        public function forgotPass2(){
            if(isset($_POST["submitforgotpass"])){
                $check1 = $this -> validationEmail($_POST["email_tk"]);

                if($check1){
                    $tk = $this -> model -> getEmail($_POST["email_tk"]);
                    if(empty($tk)){
                        echo "<script>alert('Tài khoản không tồn tại')</script>";
                        echo "<script>window.location.href=`". route("forgotpass") ."`</script>";
                    }else{
                        // bắt đầu gửi email
                        $check = $this -> sendMail($tk["ten_tk"],$tk["matkhau_tk"],$tk["email_tk"]);
                        if($check){
                            echo "<script>alert('Vui lòng kiểm tra gmail để lấy mật khẩu')</script>";
                            echo "<script>window.location.href='". route("signinclient") ."'</script>";
                        }else{
                            echo "<script>alert('Gửi mail không thành công')</script>";
                            echo "<script>window.location.href=`". route("forgotpass") ."`</script>";
                        }
                    }
                }else{
                    $_SESSION["post"] = $_POST;
                    echo "<script>window.location.href=`". route("forgotpass") ."`</script>";
                }
            }
        }
    }
?>