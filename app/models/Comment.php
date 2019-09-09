<?php

namespace app\models;

use wbns\base\Model;

class Comment extends AppModel
{
    private $author;

    private $textComment;

    private $publishedAt;

    private $post_id;

    public $attributes = [
        'author' => '',
        'text_comment' => '',
        'post_id' => '',
    ];

    public $rules = [
        'required' => [
            ['author'],
            ['text_comment'],
        ],
    ];

    /**
     * @return mixed
     */
    public function getPostId()
    {
        return $this->post_id;
    }

    /**
     * @param mixed $post_id
     */
    public function setPostId($post_id): void
    {
        $this->post_id = $post_id;
    }

    /**
     * Comment constructor.
     */
    public function __construct()
    {
        Model::__construct();
        $this->table = 'comment_table';
    }

    /**
     * @return mixed
     */
    public function getTextComment()
    {
        return $this->textComment;
    }

    /**
     * @param mixed $textComment
     */
    public function setTextComment($textComment): void
    {
        $this->textComment = $textComment;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author): void
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getPublishedAt()
    {
        return $this->publishedAt;
    }

    /**
     * @param mixed $publishedAt
     */
    public function setPublishedAt($publishedAt): void
    {
        $this->publishedAt = $publishedAt;
    }
}