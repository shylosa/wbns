<?php

namespace app\models;

use wbns\base\Model;

class Post extends AppModel
{
    private $author;

    private $publishedAt;

    private $textPost;

    private $popular;

    public $attributes = [
        'author' => '',
        'text_post' => '',
    ];

    public $rules = [
        'required' => [
            ['author'],
            ['text_post'],
        ],
    ];

    /**
     * Post constructor.
     */
    public function __construct()
    {
        Model::__construct();
        $this->table = 'post_table';
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

    /**
     * @return mixed
     */
    public function getTextPost()
    {
        return $this->textPost;
    }

    /**
     * @param mixed $textPost
     */
    public function setTextPost($textPost): void
    {
        $this->textPost = $textPost;
    }

    /**
     * @return mixed
     */
    public function getPopular()
    {
        return $this->popular;
    }

    /**
     * @param mixed $popular
     */
    public function setPopular($popular): void
    {
        $this->popular = $popular;
    }
}
