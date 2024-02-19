<?php
    // DATABASE
    const DB_SEVER = "localhost";
    const DB_USER = "root";
    const DB_PASS = "";
    const DB_NAME = "web_quiz";

    // BLADE ONE
    const VIEW_DIR = "./app/views/";
    const STORAGE_DIR = "./storage/";

    // IMAGE
    const IMAGE_DIR = "public/images/";

    // ARRAY ROUTE
    

    // FUNCTION ROUTE
    const BASE_URL = "http://localhost/dashboard/php/asm_oop_mvc/";

    function route($url){
        return BASE_URL . $url;
    }
?>