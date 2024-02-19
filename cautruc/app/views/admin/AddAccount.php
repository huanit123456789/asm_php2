<div class="body-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6" style="padding:10px; padding-left:60px; padding-top:30px">
                    <h1 class="ml-3">Thêm tài khoản</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="container">
                        <form action="index.php?url=addaccount" method="POST" enctype="multipart/form-data">
                            <div class="form-group mb-4">
                                <label>Họ và tên</label><span style="color:red; font-size:10px; margin-left:20px"><?= $_SESSION["validation"]["name"]??"" ?></span>
                                <input type="text" name="ten" value="<?= $_POST["ten"]??"" ?>" class="form-control" placeholder="Nhập tên khách hàng">
                            </div>

                            <span style="color:red; font-size:10px; margin-left:80px"><?= $_SESSION["validation"]["image"]??"" ?></span>
                            <div class="form-group mb-4 mt-3">
                                <label for="anhNhanVien">Ảnh</label>
                                <input type="file" name="anh" class="form-control-file" id="inputImage" onchange="previewImage()">
                                <img id="preview" style="max-width: 50%; max-height: 150px;">
                            </div>

                            <div class="form-group mb-4">
                                <label>Email</label><span style="color:red; font-size:10px; margin-left:20px"><?= $_SESSION["validation"]["email"]??"" ?></span>
                                <input type="email" name="email"  value="<?= $_POST["email"]??"" ?>" class="form-control" placeholder="Nhập email">
                            </div>

                            <div class="form-group mb-4">
                                <label>Mật Khẩu</label><span style="color:red; font-size:10px; margin-left:20px"><?= $_SESSION["validation"]["pass"]??"" ?></span>
                                <input type="password" name="mk" class="form-control" placeholder="Nhập mật khẩu">
                            </div>

                            <span style="color:red; font-size:10px; margin-left:80px"><?= $_SESSION["validation"]["role"]??"" ?></span>
                            <div class="form-group mb-4 mt-3">
                                <label>Chức vụ</label>
                                <select name="id_cv">
                                    <option value="1">Admin</option>
                                    <option value="2">Người dùng</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary mb-3" name="submit">Thêm tài khoản</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>