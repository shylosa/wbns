<?php

namespace app\controllers;

use app\models\Comment;
use app\models\Post;
use wbns\Router;

class CommentController extends AppController
{

    public function indexAction(): void
    {
        $model = new Comment();
        $this->layout = 'default';
        $postId = Router::getParamUrl();

        $model->setPostId($postId);
        $model->attributes['post_id'] = $postId;
//var_dump($model);
        if(!empty($_POST)){
            $model->addPost($model);
        }

        $modelPost = new Post();
        $posts = $modelPost->findOne($postId);

        $comments = $model->findBySql(
            "SELECT
                        id,
                        author,
                        published_at,
                        text_comment
                    FROM comment_table
                    WHERE post_id = $postId
                    ORDER BY published_at ASC"
        );

        $popularPosts = $this->getPopular();
        $this->set(compact('posts', 'comments', 'popularPosts'));

    }

}