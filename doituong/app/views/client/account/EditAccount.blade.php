@extends('layout/client.blade.php')
@section('content')
<div class="body-wrapper" style="margin-bottom:90px">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6" style="padding:10px; padding-left:60px; padding-top:30px">
                    <h1 class="ml-3">Chỉnh sửa tài khoản</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="container">
                        <form action="<?= route("submiteditprofile") ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="ten_nd">Họ và tên</label><span style="color:red; font-size:10px; margin-left:40px"><?= $_SESSION["validation"]["name"] ?? "" ?></span>
                                <input type="text" class="form-control" placeholder="Nhập họ và tên" name="ten_tk" value="<?= $_SESSION["post"]["ten"] ?? $account["ten_tk"] ?>">
                            </div>


                            <div class="form-group mb-3">
                                <label for="anhNhanVien">Ảnh</label><span style="color:red; font-size:10px; margin-left:80px"><?= $_SESSION["validation"]["image"] ?? "" ?></span>
                                <input type="file" name="anh_tk" class="form-control-file" id="inputImage" onchange="previewImage()">
                                <img class="mt-2" id="preview" style="max-width: 50%; max-height: 150px;" src="<?= route($account["anh_tk"]) ?>">
                            </div>

                            <div class="form-group mb-4">
                                <label for="email_nd">Email</label>
                                <input type="email" class="form-control" value="<?= $account["email_tk"] ?>" disabled>
                            </div>

                            <div class="form-group mb-4">
                                <label for="mk_nd">Mật Khẩu</label><span style="color:red; font-size:10px; margin-left:40px"><?= $_SESSION["validation"]["pass"] ?? "" ?></span>
                                <input type="password" class="form-control" name="matkhau_tk" placeholder="Nhập mật khẩu">
                            </div>

                            <button type="submit" class="btn btn-primary mt-3" name="submiteditprofile">Cập nhật tài khoản</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
</div>
@endsection