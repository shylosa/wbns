<?php

namespace app\models;

use wbns\base\Model;

class AppModel extends Model
{
    public function addPost($model):void
    {
            $data = $_POST;
            $model->load($data);

            if(!$model->validate($data)){
                $model->getErrors();
                redirect();
            }

            if($model->save($model->getTable())){
                $_SESSION['success'] = "Вы успешно добавили сообщение!";
            } else {
                $_SESSION['success'] = "Ошибка. Попробуйте снова.";
            }
            redirect();
        }

}