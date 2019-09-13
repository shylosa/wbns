<?php

namespace app\controllers;

use app\models\Post;
use wbns\Router;

class PostController extends AppController
{
    public function indexAction(): void
    {
        $model = new Post();
        if(!empty($_POST)){
            $model->addPost($model);

            if($this->isAjax()){
                $posts = $model->findAll();
                $this->loadView('table', $posts);
                $this->loadView('form_add');
            } else {
                redirect();
            }
            redirect();
        }

        $posts = $model->findAll();
        $this->set(compact('posts'));
    }

    public function deleteAction(): void
    {
        $model = new Post();
        $postData = $model->currentPostData();
        $model->deletePost($postData['postId']);
        if($this->isAjax()) {
            $posts = $model->findAll();
            $this->loadView('table', $posts);
        } else {
            redirect(PATH);
        }
    }

    public function editAction(): void
    {
        $model = new Post();
        $postData = $model->currentPostData();

        if(!empty($_POST)){
            $model->editPost($postData['postId']);

            if($_SESSION['error']) {
                if($this->isAjax()) {
                    return;
                }
                //Возврат на ту же страницу
                redirect(PATH . "/{$this->controller}/{$this->view}?id={$postData['postId']}");
            } else {
                redirect(PATH);
            }
        }

        $posts = $model->findAll();
        $this->set([
            'currentPost' => $postData['currentPost'],
            'posts' => $posts
        ]);
    }



}