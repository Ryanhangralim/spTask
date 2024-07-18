<?php 

namespace App\Core;

class Controller{
    public function view($view, $data = [])
    {
        require_once '../app/views/' . $view .'.php';
    }

    public function model($model){
        $modelClass = 'App\\Models\\' . $model;
        return new $modelClass();
    }
}

?>