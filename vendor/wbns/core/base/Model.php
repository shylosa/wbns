<?php

namespace wbns\base;

use wbns\Db;
use Valitron\Validator;

abstract class Model
{
    protected $pdo;
    protected $table;
    protected $pk = 'id';
    protected $sort = 'NO_SORT';

    public $attributes = [];
    public $errors = [];
    public $rules = [];

    public function __construct(){
        $this->pdo = Db::instance();
    }

    /**
     * @return mixed
     */
    public function getTable()
    {
        return $this->table;
    }

    public function query($sql){
        return $this->pdo->execute($sql);
    }

    public function findAll(){
        $sql = "SELECT * FROM ($this->table)";
        return $this->pdo->query($sql);
    }

    public function findOne($id, $field = ''){
        $field = $field ?: $this->pk;
        $sql = "SELECT * FROM ($this->table) WHERE $field = ?";

        return $this->pdo->query($sql, [$id]);
    }

    public function findBySql($sql, $params = []){
        return $this->pdo->query($sql, $params);
    }

    /**
     * Загрузка данных из формы
     *
     * @param mixed
     */
    public function load($data){
        foreach ($this->attributes as $name => $value){
            if(isset($data[$name])){
                $this->attributes[$name] = $data[$name];
            }
        }
    }

    public function validate($data)
    {
        $v = new Validator($data);
        $v->rules($this->rules);
        if($v->validate()){
            return true;
        }
        $this->errors = $v->errors();
        return false;
    }

    /**
     * Запись данных из формы в базу
     *
     * @param $table
     * @return bool
     */
    public function save($table, $id = ''){
        $tbl = $this->pdo;
        $set = '';
        foreach ($this->attributes as $name => $value){
            $tbl->$name = $value;
            $set.="`".str_replace("`","``",$name)."`". "=:$name, ";
           // $set.= $name . "=" . "`" . $value . "`" . ", ";
        }
        $set = substr($set, 0, -2);

        $query = empty($id) ? "INSERT INTO $table SET $set" : "UPDATE $table SET $set WHERE id = $id";

        return $tbl->execute($query, $this->attributes);
    }

    public function getErrors()
    {
        $errors = '<ul>';
        foreach ($this->errors as $error) {
            foreach ($error as $item){
                $errors .= "<li>$item</li>";
            }
        }
        $errors .= '</ul>';
        $_SESSION['error'] = $errors;
    }
}