<?php

function validationEmail($email)
{
    if ($email == 0) {
        $_SESSION["validation"]["email"] = "Email không được bỏ trống";
        return false;
    }

    if (empty($email)) {
        $_SESSION["validation"]["email"] = "Email không được bỏ trống";
        return false;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["validation"]["email"] = "Email không đúng định dạng";
        return false;
    }
    return true;
}

function validationPass($pass)
{
    // Kiểm tra độ dài mật khẩu
    if (strlen($pass) < 8) {
        $_SESSION["validation"]["pass"] = "Mật khẩu phải có ít nhất 8 ký tự.";
        return false;
    }

    // Kiểm tra sự hiện diện của các loại ký tự
    if (!preg_match("#[A-Z]#", $pass)) {
        $_SESSION["validation"]["pass"] = "Mật khẩu phải chứa ít nhất một chữ cái viết hoa.";
        return false;
    }

    if (!preg_match("#[a-z]#", $pass)) {
        $_SESSION["validation"]["pass"] = "Mật khẩu phải chứa ít nhất một chữ cái viết thường.";
        return false;
    }

    if (!preg_match("#[0-9]#", $pass)) {
        $_SESSION["validation"]["pass"] = "Mật khẩu phải chứa ít nhất một số.";
        return false;
    }

    if (!preg_match("#[\W]#", $pass)) {
        $_SESSION["validation"]["pass"] = "Mật khẩu phải chứa ít nhất một ký tự đặc biệt.";
        return false;
    }

    return true;
}

function validationPass2($pass1, $pass2)
{
    if ($pass1 !== $pass2) {
        $_SESSION["validation"]["pass2"] = "Mật khẩu không giống nhau";
        return false;
    }
    return true;
}

function validationName($name)
{
    if (empty($name)) {
        $_SESSION["validation"]["name"] = "Tên không được bỏ trống";
        return false;
    }

    if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $_SESSION["validation"]["name"] = "Tên chỉ chứa chữ cái và dấu cách";
        return false;
    }

    return true;
}


// DUNG CHO THEM
function validationImage($file)
{
    if ($file["size"] == 0) {
        $_SESSION["validation"]["image"] = "Ảnh không được bỏ trống";
        return false;
    } elseif ($file['error'] !== UPLOAD_ERR_OK) {
        $_SESSION["validation"]["image"] = "Lỗi tải ảnh";
        return false;
    }

    // Check if the file is an image
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($file['type'], $allowedTypes)) {
        $_SESSION["validation"]["image"] = "Ảnh định dạng ipeg, png, gif";
        return false;
    }

    // Check if the file size is within acceptable limits (e.g., 5MB)
    $maxFileSize = 5 * 1024 * 1024; // 5MB in bytes
    if ($file['size'] > $maxFileSize) {
        $_SESSION["validation"]["image"] = "Kích thước ảnh không quá 5MB";
        return false;
    }

    return true;
}

// DUNG CHO CHINH SUA
function validationImage2($file)
{
    // Check if the file is an image
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if($file["size"]==0){

    }elseif (!in_array($file['type'], $allowedTypes)) {
        $_SESSION["validation"]["image"] = "Ảnh định dạng ipeg, png, gif";
        return false;
    }

    // Check if the file size is within acceptable limits (e.g., 5MB)
    $maxFileSize = 5 * 1024 * 1024; // 5MB in bytes
    if ($file['size'] > $maxFileSize) {
        $_SESSION["validation"]["image"] = "Kích thước ảnh không quá 5MB";
        return false;
    }

    return true;
}

function validationRole($id_cv)
{
    if ($id_cv != 1 && $id_cv != 2) {
        $_SESSION["validation"]["role"] = "Không được sửa mã nguồn";
        return false;
    }
    return true;
}
