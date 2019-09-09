<?php

namespace app\controllers;

use app\models\AppModel;
use wbns\base\Controller;

class AppController extends Controller
{
    public function __construct($route){
        parent::__construct($route);
        new AppModel();
    }

    public function getPopular()
    {
        $model = new AppModel();

        return $model->findBySql(
        'SELECT post_table.* ,
                        (SELECT  COUNT(*) 
                        FROM comment_table 
                        WHERE comment_table.post_id=post_table.id)cnt
                        FROM post_table 
                        ORDER BY cnt DESC 
                        LIMIT 5;');
    }

}