@extends('layout/client.blade.php')
@section('content')
<section class="vh-100" style="margin-top:50px;margin-bottom:50px">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="<?= route("public/images/acount.webp") ?>" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form method="POST" action="<?= route("submitsignup") ?>">
                    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                        <p class="lead fw-normal mb-0 me-3">
                        <h3>Đăng ký tài khoản mới</h3>
                        </p>
                    </div>

                    <div class="divider d-flex align-items-center my-4"></div>


                    <!-- tên input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example3">Họ và tên</label><span style="color:red; margin-left:80px; font-size:10px"><?= $_SESSION["validation"]["name"] ?? "" ?></span>
                        <input type="text" name="ten_tk" id="form3Example3" class="form-control form-control-lg" value="<?= $_SESSION["post"]["ten_tk"] ?? "" ?>" placeholder="Nhập họ và tên" />
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example3">Email</label><span style="color:red; margin-left:110px; font-size:10px"><?= $_SESSION["validation"]["email"] ?? "" ?></span>
                        <input type="email" name="email_tk" id="form3Example3" class="form-control form-control-lg" value="<?= $_SESSION["post"]["email_tk"] ?? "" ?>" placeholder="Nhập địa chỉ Email" />
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <label class="form-label" for="form3Example4">Mật khẩu</label><span style="color:red; margin-left:80px; font-size:10px"><?= $_SESSION["validation"]["pass"] ?? "" ?></span>
                        <input type="password" name="matkhau1_tk" id="form3Example4" class="form-control form-control-lg" placeholder="Nhập mật khẩu" />
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <label class="form-label" for="form3Example4">Kiểm tra mật khẩu</label><span style="color:red; margin-left:20px; font-size:10px"><?= $_SESSION["validation"]["pass2"] ?? "" ?></span>
                        <input type="password" name="matkhau2_tk" id="form3Example4" class="form-control form-control-lg" placeholder="Xác nhận mật khẩu" />
                    </div>


                    <div class="text-center text-lg-start mt-4 pt-2">
                        <input type="submit" name="submitsignup" value="Đăng ký" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;"></input>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Bạn đã có tài khoản ?<a href="<?= route("signinclient") ?>" class="link-danger">Đăng nhập</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
@endsection