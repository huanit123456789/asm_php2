@extends('layout/admin.blade.php')
@section('content')
<div class="body-wrapper">
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
                        <?php
                            if(isset($account)){
                                $s1 = $s2 = " ";
                                if(isset($_SESSION["post"])){
                                    if($_SESSION["post"]["id_cv"] == 1){
                                        $s1 = "selected";
                                    }

                                    if($_SESSION["post"]["id_cv"] == 2){
                                        $s2 = "selected";
                                    }
                                }else{
                                    if($account["id_cv"] == 1){
                                        $s1 = "selected";
                                    }

                                    if($account["id_cv"] == 2){
                                        $s2 = "selected";
                                    }
                                }

                                echo '
                                <form action="'. route("submiteditaccount/" . $account["id_tk"]) .'" method="POST" enctype="multipart/form-data">
                                <div class="form-group mb-4">
                                    <label for="ten_nd">Họ và tên</label><span style="color:red; font-size:10px; margin-left:20px">'. ($_SESSION["validation"]["name"]??"") .'</span>
                                    <input type="text" class="form-control" name="ten_tk" value="'. ($_SESSION["post"]["ten_tk"]??$account["ten_tk"]) .'">
                                </div>
    
                                <span style="color:red; font-size:10px; margin-left:80px">'. ($_SESSION["validation"]["image"]??"") .'</span>
                                <div class="form-group mb-4">
                                    <label for="anhNhanVien">Ảnh</label>
                                    <input type="file" name="anh_tk" class="form-control-file mb-3" id="inputImage" onchange="previewImage()">
                                    <img id="preview" src="'. route($account["anh_tk"]) .'" style="max-width: 50%; max-height: 150px;">
                                </div>
    
                                <div class="form-group mb-4">
                                    <label for="email_nd">Email</label>
                                    <input type="email" value="'. $account["email_tk"] .'" class="form-control" disabled>
                                </div>
    
                                <div class="form-group mb-4">
                                    <label for="mk_nd">Mật Khẩu</label><span style="color:red; font-size:10px; margin-left:20px">'. ($_SESSION["validation"]["pass"]??"") .'</span>
                                    <input type="password" name="matkhau_tk" class="form-control" id="mk_nd" placeholder="Nhập mật khẩu">
                                </div>

                                <span style="color:red; font-size:10px; margin-left:80px"><?= $_SESSION["validation"]["role"]??"" ?></span>
                                    <div class="form-group mb-4 mt-3">
                                    <label>Chức vụ</label>
                                    <select name="id_cv">
                                        <option value="1"'. $s1 .' >Admin</option>
                                        <option value="2"'. $s2 .'>Người dùng</option>
                                    </select>
                                </div>
    
                                <button type="submit" class="btn btn-primary mb-3" name="submiteditaccount">Cập nhật tài khoản</button>
                            </form>
                        </div>
                                ';
                            }else{
                                echo "TÀI KHOẢN KHÔNG TỒN TẠI";
                            }
                        ?>
                </div>
            </div>
        </div>
    </section>


</div>
@endsection