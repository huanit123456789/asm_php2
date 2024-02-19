<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Đăng nhập Admin</title>
  <link rel="shortcut icon" type="image/png" href="<?= route("public/assets/images/logos/favicon.png") ?>" />
  <link rel="stylesheet" href="<?= route("public/assets/css/styles.min.css") ?>"/>
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.php" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="./public/assets/images/logos/dark-logo.svg" width="180" alt="">
                </a>
                <p class="text-center">Quiz System Admin</p>


                <form method="POST" action="<?= route("submitsigninadmin") ?>">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label><span style="color:red; font-size:10px; margin-left:20px"><?= $_SESSION["validation"]["email"]??"" ?></span>
                    <input type="email" name="email_tk" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $_SESSION["post"]["email_tk"]??"" ?>">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Mật khẩu</label><span style="color:red; font-size:10px; margin-left:20px"><?= $_SESSION["validation"]["pass"]??"" ?></span>
                    <input type="password" name="matkhau_tk" class="form-control" id="exampleInputPassword1">
                  </div>
                  <input type="submit" name="submitsignin" value="Đăng nhập"  class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2"></input>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>