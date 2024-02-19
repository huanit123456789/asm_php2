@extends('layout/admin.blade.php')
@section('content')
<div class="body-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6" style="padding:10px; padding-left:60px; padding-top:30px">
          <h1 class="ml-3">Danh sách tài khoản</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Tên</th>
                      <th>Ảnh</th>
                      <th>Email</th>
                      <th>Mật khẩu</th>
                      <th>Chức vụ</th>
                      <th>Hành động</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  <?php
                    if($listAccount){
                        foreach($listAccount as $account){
                            echo '
                            <tr>
                              <td style="width:5%; text-align: center;">
                                <input type="checkbox" class="check-box">
                              </td>
                              <td style="width:20%;">'. $account["ten_tk"] .'</td>
                              <td style="width:20%; text-align:center">
                                <img style="height:100px" src="'. route($account["anh_tk"]) .'" alt="">
                              </td>
                              <td style="width:20%;">'. $account["email_tk"] .'</td>
                              <td style="width:20%;">'. $account["matkhau_tk"] .'</td>
                              <td style="width:15%;">'. ($account["id_cv"]==1?"Admin":"Người dùng") .'</td>
                              <td>
                                <div class="btn-group custom-btns" role="group" aria-label="Basic example">
                                  <a type="button" href="'. route("editaccount/" . $account["id_tk"]) .'" class="btn btn-success">Sửa</a>
                                  <button type="button" onclick="deleteAccount('. $account["id_tk"] .')" class="btn btn-danger">Xóa</button>
                                </div>
                              </td>
                            </tr>
                            ';
                          }
                    }
                  ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="btn-group" role="group" aria-label="Manage Items">
            <button type="button" class="btn btn-primary">Chọn Tất Cả</button>
            <button type="button" class="btn btn-warning">Bỏ Chọn Tất Cả</button>
            <button type="button" class="btn btn-danger">Xóa Các Mục Đã Chọn</button>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<style>
  /* Thêm CSS để tùy chỉnh đường biên cho cột */
  .table-bordered th,
  .table-bordered td {
    border: 1px solid #dee2e6;
  }

  /* Thêm CSS để tùy chỉnh đường biên cho thẻ table */
  .table-bordered {
    border-collapse: collapse;
  }
</style>
@endsection