<?php

namespace app\models;

use wbns\Router;

class Post extends AppModel
{
    private $firstName;

    private $secondName;

    private $email;

    public $attributes = [
        'first_name' => '',
        'second_name' => '',
        'email' => ''
    ];

    public $rules = [
        'required' => [
            ['first_name'],
            ['second_name'],
            ['email']
            ],
        'email' => [
            ['email']
        ]
    ];

    /**
     * Post constructor.
     */
    public function __construct()
    {
        AppModel::__construct();
        $this->table = 'post_table';
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param $firstName
     */
    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getSecondName()
    {
        return $this->secondName;
    }

    /**
     * @param $secondName
     */
    public function setSecondName($secondName): void
    {
        $this->secondName = $secondName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function addPost():void
    {
        $data = $_POST;
        $this->load($data);

        if(!$this->validate($data)){
            $this->getErrors();
            return;
        }

        if($this->save($this->getTable())){
            $_SESSION['success'] = 'Вы успешно добавили запись!';
        } else {
            $_SESSION['error'] = 'Ошибка. Попробуйте снова.';
        }
    }

    public function editPost($id):void
    {
        $data = $_POST;
        $this->load($data);

        if(!$this->validate($data)){
            $this->getErrors();
            return;
        }

        if($this->save($this->getTable(), $id)){
            $_SESSION['success'] = 'Вы успешно изменили запись!';
        } else {
            $_SESSION['error'] = 'Ошибка. Попробуйте снова.';
        }
    }

    public function deletePost($id):void
    {
        if($this->remove($this->getTable(), $id)){
            $_SESSION['success'] = 'Вы удалили запись!';
        } else {
            $_SESSION['error'] = 'Ошибка. Попробуйте снова.';
        }
    }

    public function currentPostData()
    {
        $postId = Router::getParamUrl();
        $currentPost = $this->checkPost($postId);
        $posts = $this->findAll();

        return ['postId' => $postId,
            'currentPost' => $currentPost[0]
        ];
    }

    public function checkPost($id)
    {
        $post = $this->findOne($id);
        if(!$post){
            throw new \RuntimeException('Страница не найдена', 404);
        }
        return $post;
    }
}
