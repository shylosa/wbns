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

        $posts = $model->findBySql(
            'SELECT post_table.* ,
                        (SELECT  COUNT(*) 
                        FROM comment_table 
                        WHERE comment_table.post_id=post_table.id)comment_qty
                        FROM post_table 
                        ORDER BY published_at DESC;');

        $popularPosts = $this->getPopular();
        $this->set(compact('posts','popularPosts'));
    }




}