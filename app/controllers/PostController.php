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
        $model = new Post();
        $postId = Router::getParamUrl();
        $this->checkPost($model, $postId);
        $model->deletePost($model, $postId);

        $posts = $model->findBySql('SELECT * FROM post_table;');
        $this->set([
            'posts' => $posts
        ]);
    }

    public function editAction(): void
    {
        $model = new Post();
        $postId = Router::getParamUrl();
        $this->checkPost($model, $postId);
        $currentPost = $model->findOne($postId);

        if(!empty($_POST)){
            $model->editPost($model, $postId);
        }

        $posts = $model->findBySql('SELECT * FROM post_table;');
        $this->set([
            'currentPost' => $currentPost[0],
            'posts' => $posts
        ]);
    }

    protected function checkPost($model, $id)
    {
        $post = $model->findOne($id);
        if(!$post){
            throw new \RuntimeException('Страница не найдена', 404);
        }
        return $post;
    }
}