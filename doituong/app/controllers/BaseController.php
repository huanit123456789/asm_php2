<?php
    namespace App\Controllers;

    use eftec\bladeone\BladeOne;

    class BaseController{
        protected function render($view, $data = []){
            $blade = new BladeOne(VIEW_DIR,STORAGE_DIR,BladeOne::MODE_DEBUG);
            echo $blade -> run($view, $data);
        }
    }
?>