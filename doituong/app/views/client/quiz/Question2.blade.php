<?php
session_start();
?>

<div id="quiz">
    <div class="quiz">
        <h2 id="question">Câu <?= ($_SESSION["quiz"]["count"] + 1) . " : " . $_SESSION["quiz"]["cauhoi"][$_SESSION["quiz"]["count"]]["nd_ch"] ?></h2>
        <div id="button">
            <button class="btn a" <?php
                                    if (isset($_SESSION["quiz"]["cauhoi"][$_SESSION["quiz"]["count"]]["choose"])) {
                                        if ($_SESSION["quiz"]["cauhoi"][$_SESSION["quiz"]["count"]]["choose"] == 1) {
                                            echo 'style="background:red;"';
                                        }
                                    }
                                    ?> onclick="choose1()">A. <?= $_SESSION["quiz"]["cauhoi"][$_SESSION["quiz"]["count"]]["da1_ch"] ?></button>

            <button class="btn a" <?php
                                    if (isset($_SESSION["quiz"]["cauhoi"][$_SESSION["quiz"]["count"]]["choose"])) {
                                        if ($_SESSION["quiz"]["cauhoi"][$_SESSION["quiz"]["count"]]["choose"] == 2) {
                                            echo 'style="background:red;"';
                                        }
                                    }
                                    ?> onclick="choose2()">B. <?= $_SESSION["quiz"]["cauhoi"][$_SESSION["quiz"]["count"]]["da2_ch"] ?></button>

            <button class="btn a" <?php
                                    if (isset($_SESSION["quiz"]["cauhoi"][$_SESSION["quiz"]["count"]]["choose"])) {
                                        if ($_SESSION["quiz"]["cauhoi"][$_SESSION["quiz"]["count"]]["choose"] == 3) {
                                            echo 'style="background:red;"';
                                        }
                                    }
                                    ?> onclick="choose3()">C. <?= $_SESSION["quiz"]["cauhoi"][$_SESSION["quiz"]["count"]]["da3_ch"] ?></button>


            <button class="btn a" <?php
                                    if (isset($_SESSION["quiz"]["cauhoi"][$_SESSION["quiz"]["count"]]["choose"])) {
                                        if ($_SESSION["quiz"]["cauhoi"][$_SESSION["quiz"]["count"]]["choose"] == 4) {
                                            echo 'style="background:red;"';
                                        }
                                    }
                                    ?> onclick="choose4()">D. <?= $_SESSION["quiz"]["cauhoi"][$_SESSION["quiz"]["count"]]["da4_ch"] ?></button>


        </div>
    </div>



    <div class="navigation">
                <button id="pre" onclick="pre()">Prev</button>
                
                <?php
                    if($_SESSION["quiz"]["count"] == ($_SESSION["quiz"]["socau"] - 1)){
                        echo '
                            <button id="next" onclick="submit()">Nộp bài</button>
                        ';
                    }else{
                        echo '
                            <button id="next" onclick="next()">Next</button>
                        ';
                    }
                ?>

            </div>
</div>