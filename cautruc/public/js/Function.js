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

function deleteAcount(id_tk){
    if(confirm("Bạn có muốn xóa tài khoản không?")){
        window.location.href = `?url=deleteaccount&id_tk=${id_tk}`;
    }
}




// ajax
function update1(){
    $.ajax({
        type:"POST",
        url: "./app/Controllers/client/ChooseController.php",
        data:{
            choose: 1
        },

        success: function(response){
            $.post("app/views/client/Question2.php", function(data){
                $("#quiz").html(data);
            }),
            console.log(response);
        },

        error: function(error){
            console.log(error);
        }
    })
}

function update2(){
    $.ajax({
        type:"POST",
        url: "./app/Controllers/client/ChooseController.php",
        data:{
            choose: 2
        },

        success: function(response){
            $.post("app/views/client/Question2.php", function(data){
                $("#quiz").html(data);
            }),
            console.log(response);

        },

        error: function(error){
            console.log(error);
        }
    })
}

function update3(){
    $.ajax({
        type:"POST",
        url: "./app/Controllers/client/ChooseController.php",
        data:{
            choose: 3
        },

        success: function(response){
            $.post("app/views/client/Question2.php", function(data){
                $("#quiz").html(data);
            }),
            console.log(response);
            
        },

        error: function(error){
            console.log(error);
        }
    })
}

function update4(){
    $.ajax({
        type:"POST",
        url: "./app/Controllers/client/ChooseController.php",
        data:{
            choose: 4
        },

        success: function(response){
            $.post("app/views/client/Question2.php", function(data){
                $("#quiz").html(data);
            }),
            console.log(response);

        },

        error: function(error){
            console.log(error);
        }
    })
}

function next(){
    $.ajax({
        type:"POST",
        url: "./app/Controllers/client/NextController.php",
        data: {},

        success: function(response){
            $.post("app/views/client/Question2.php", function(data){
                $("#quiz").html(data);
            }),
            console.log(response);
            
        },

        error: function(error){
            console.log(error);
        }
    })
}

function pre(){
    $.ajax({
        type:"POST",
        url: "./app/Controllers/client/PreController.php",
        data: {},

        success: function(response){
            $.post("app/views/client/Question2.php", function(data){
                $("#quiz").html(data);
            }),
            console.log(response);
            
        },

        error: function(error){
            console.log(error);
        }
    })
}

function submit(){
    if(confirm("Bạn có muốn nộp bài không?")){
        window.location.href="?url=submitquiz";
    }
}

function deleteQuiz(id){
    if(confirm("Bạn có muốn xóa không ?")){
        window.location.href= `?url=deletequiz&id=${id}`;
    }
}