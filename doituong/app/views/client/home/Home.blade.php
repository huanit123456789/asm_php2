@extends('layout/client.blade.php')
@section('content')
<!-- MAIN -->
<div class="pricing4 py-5 bg-light">
    <div class="container">
        <!-- Row  -->
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1 class="mb-3">Quiz Lmao</h1>
                <h6 class="subtitle font-weight-normal">Khám phá kiến thức, thách thức bản thân và trở thành người chơi xuất sắc tại <b>QuizMaster</b> ! Đắm chìm trong thế giới của sự hiểu biết và trí tuệ</h6>
            </div>
        </div>


        <!-- Row  -->
        <div class="row mt-4">

            <?php
            if (empty($listQuiz)) {
                echo "<h1 style='margin-bottom:350px;'></h1>";
            } else {
                foreach ($listQuiz as $quiz) {
                    echo '
                        <div  class="col-md-4 hover">
                            <div class="card card-shadow border-0 mb-4">
                                <div class="img-container">
                                    <img class="card-img-top" src="' . route($quiz["anh_quiz"]) . '" alt="wrappixel kit">
                                </div>
                                <div class="p-3">
                                    <h5 class="font-weight-medium mb-0">' . $quiz["ten_quiz"] . '</h5>
                                    <h6 class="subtitle font-13">Số câu: ' . $quiz["so_cau"] . '</h6>
                                    <p class="card-text description">' . $quiz["mota_quiz"] . '</p>
                                    <div class="d-flex mt-3 align-items-center">
                                        <div class="ml-auto"><a class="btn btn-danger-gradiant rounded-pill text-white btn-md border-0" href="'. route("quiz/" . $quiz["id_quiz"]) .'">Bắt đầu</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                }
            }
            ?>

        </div>
    </div>
</div>

<style>
    /* Trong file CSS của bạn */
    .img-container {
        height: 250px;
        /* Điều chỉnh chiều cao mong muốn cho container */
        overflow: hidden;
    }

    .img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .description {
        height: 80px;
        /* Điều chỉnh chiều cao mong muốn cho mô tả */
        overflow: hidden;
    }

    .col-md-4 {
        transition: transform 0.3s ease;
        /* Thêm transition cho hiệu ứng mượt mà */
    }

    .hover:hover {
        transform: scale(1.1);
        /* Scale lên 110% khi di chuột vào */
    }
</style>
@endsection