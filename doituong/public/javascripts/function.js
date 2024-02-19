function deleteAccount(id){
    if(confirm("Bạn có muốn xóa tài khoản không ?")){
        window.location.href = `http://localhost/dashboard/php/asm_oop_mvc/deleteaccount/${id}`;
    }
}

function previewImage() {
    var input = document.getElementById('inputImage');
    var preview = document.getElementById('preview');

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
        };

        reader.readAsDataURL(input.files[0]);
    }
}


