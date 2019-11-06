<?php
/**
 * Created by PhpStorm.
 * User: LX
 * Date: 2019/11/1
 * Time: 11:23
 */

class DB{
    private $host = 'localhost';
    private $username = 'dage';
    private $password = '123456';
    private $database = 'XAH190603';

    public $mysql;

    function __construct()
    {
        $this->connect();
        //编码格式
        $this->mysqli->query("set names 'utf8'");
    }

    function connect(){
        $this->mysqli = new mysqli($this->host,$this->username,$this->password,$this->database);
        if($this->mysqli->connect_error){
            die($this->mysqli->connect_error);
        }
    }

    function query($sql){
        $result = $this->query($sql);
        //执行sql语句的数据类型
        $database = gettype($result);
//        var_dump($database);
        if($database == 'object'){
            return $result->fetch_all(MYSQLI_ASSOC);
        }else if($database == 'boolean'){
            return $result;
        }
    }
}