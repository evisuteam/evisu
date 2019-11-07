<?php
/**
 * Created by PhpStorm.
 * User: LX
 * Date: 2019/11/1
 * Time: 11:23
 */

class DB{
    private $host = 'localhost';
    private $username = 'luo';
    private $password = '111111';
    private $database = 'evisu';

    public $mysqli;//数据库链接 $con

    function __construct()
    {
        $this->connect();
        $this->mysqli->query("set names 'utf8'");
    }

    function connect() {
        $this->mysqli = new mysqli($this->host, $this->username, $this->pwd, $this->database);
        if($this->mysqli->connect_error) {
            die($this->mysqli->connect_error);
        }
    }

    function query($sql)
    {
        $result = $this->mysqli->query($sql);
        //获取执行sql语句的结果的数据类型，进行判断，根据类型返回具体的值
        $datatype = gettype($result);
        if($datatype == 'object') {
            return $result->fetch_all(MYSQLI_ASSOC);
        }else if($datatype == 'boolean'){
            return $result;
        }
    }
}