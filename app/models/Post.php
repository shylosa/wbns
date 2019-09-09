<?php

namespace app\models;

use wbns\base\Model;

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
            ['email'],
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
}
