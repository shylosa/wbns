<?php

namespace app\controllers;

use app\models\Post;
use wbns\Router;

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

    public function deleteAction(): void
    {
        $this->layout = 'default';
        $postId = Router::getParamUrl();
        var_dump($postId);
    }

    public function editAction(): void
    {
        $model = new Post();
        $postId = Router::getParamUrl();
        $currentPost = $model->findOne($postId);
        if(!$currentPost){
            throw new \RuntimeException('Страница не найдена', 404);
        }
        if(!empty($_POST)){
            $currentPostID =$currentPost[0]['id'];
            $model->editPost($model, $currentPostID);
        }

        $posts = $model->findBySql('SELECT * FROM post_table;');
        $this->set([
            'currentPost' => $currentPost[0],
            'posts' => $posts]);


    }
}