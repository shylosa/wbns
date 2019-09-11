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
            $_SESSION['success'] = 'Вы успешно добавили запись!';
        } else {
            $_SESSION['error'] = 'Ошибка. Попробуйте снова.';
        }
        redirect();
    }

    public function editPost($model, $id):void
    {
        $data = $_POST;
        $model->load($data);

        if(!$model->validate($data)){
            $model->getErrors();
            redirect();
        }

        if($model->save($model->getTable(), $id)){
            $_SESSION['success'] = 'Вы успешно изменили запись!';
        } else {
            $_SESSION['error'] = 'Ошибка. Попробуйте снова.';
        }
        redirect(PATH);
    }

    public function deletePost($model, $id):void
    {
        if($model->remove($model->getTable(), $id)){
            $_SESSION['success'] = 'Вы успешно удалили запись!';
        } else {
            $_SESSION['error'] = 'Ошибка. Попробуйте снова.';
        }
        redirect(PATH);
    }
}