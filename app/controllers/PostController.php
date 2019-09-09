<?php

namespace app\controllers;

use app\models\Post;

class PostController extends AppController
{
    public function indexAction(): void
    {
        $model = new Post;

        if(!empty($_POST)){
            $model->addPost($model);
        }

        $posts = $model->findBySql('SELECT * FROM post_table;');
        $this->set(compact('posts'));
    }




}