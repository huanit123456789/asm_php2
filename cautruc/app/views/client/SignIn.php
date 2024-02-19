<section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="./public/image/acount.webp" class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form method="POST" action="index.php?url=signinclient">
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                            <p class="lead fw-normal mb-0 me-3">
                            <h3>Đăng nhập</h3>
                            </p>
                        </div>

                        <div class="divider d-flex align-items-center my-4"></div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example3">Email</label><span style="color:red; margin-left:40px; font-size:10px"><?= $_SESSION["validation"]["email"]??"" ?></span>
                            <input type="email" name ="email" id="form3Example3" class="form-control form-control-lg" value="<?= $_POST["email"]??"" ?>" placeholder="Nhập địa chỉ Email" />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <label class="form-label"  for="form3Example4">Mật khẩu</label><span style="color:red; margin-left:10px; font-size:10px"><?= $_SESSION["validation"]["pass"]??"" ?></span>
                            <input type="password" name ="mk" id="form3Example4" class="form-control form-control-lg"
                                placeholder="Nhập mật khẩu" />
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-0"></div>
                            <a href="?url=forgotpass" class="text-body">Quên mật khẩu</a>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <input type="submit" name="submit" value="Đăng nhập" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;"></input>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Bạn chưa có tài khoản ?<a href="?url=signupclient"
                                    class="link-danger">Đăng ký</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>