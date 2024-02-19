function choose1(){
    $.ajax({
        type:"POST",
        url: "http://localhost/dashboard/php/asm_oop_mvc/chooseajax",
        data:{
            choose: 1
        },

        success: function(response){
            $.post("http://localhost/dashboard/php/asm_oop_mvc/app/views/client/quiz/Question2.blade.php", function(data){
                $("#quiz").html(data);
            }),
            console.log(response);
        },

        error: function(error){
            console.log(error);
        }
    })
}

function choose2(){
    $.ajax({
        type:"POST",
        url: "http://localhost/dashboard/php/asm_oop_mvc/chooseajax",
        data:{
            choose: 2
        },

        success: function(response){
            $.post("http://localhost/dashboard/php/asm_oop_mvc/app/views/client/quiz/Question2.blade.php", function(data){
                $("#quiz").html(data);
            }),
            console.log(response);
        },

        error: function(error){
            console.log(error);
        }
    })
}

function choose3(){
    $.ajax({
        type:"POST",
        url: "http://localhost/dashboard/php/asm_oop_mvc/chooseajax",
        data:{
            choose: 3
        },

        success: function(response){
            $.post("http://localhost/dashboard/php/asm_oop_mvc/app/views/client/quiz/Question2.blade.php", function(data){
                $("#quiz").html(data);
            }),
            console.log(response);
        },

        error: function(error){
            console.log(error);
        }
    })
}

function choose4(){
    $.ajax({
        type:"POST",
        url: "http://localhost/dashboard/php/asm_oop_mvc/chooseajax",
        data:{
            choose: 4
        },

        success: function(response){
            $.post("http://localhost/dashboard/php/asm_oop_mvc/app/views/client/quiz/Question2.blade.php", function(data){
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
        url: "http://localhost/dashboard/php/asm_oop_mvc/nextajax",
        data: {},

        success: function(response){
            $.post("http://localhost/dashboard/php/asm_oop_mvc/app/views/client/quiz/Question2.blade.php", function(data){
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
        url: "http://localhost/dashboard/php/asm_oop_mvc/preajax",
        data: {},

        success: function(response){
            $.post("http://localhost/dashboard/php/asm_oop_mvc/app/views/client/quiz/Question2.blade.php", function(data){
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
        window.location.href="http://localhost/dashboard/php/asm_oop_mvc/submit";
    }
}