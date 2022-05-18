<?php
class Controller
{
  // model function use to hold the methods from models folder
   public function model($model)
   {
     require_once '../app/models/'. $model .'.class.php';
     return new $model();
   }
   
   // view function use to load the page from the views folder
   public function view($view ,$data = [] , $data_new_post = [] , $data_comment = [] , $Edit_data = [] , $change_pass_data = [])
   {
     require_once '../app/views/'. $view .'.php';
   }

}
