<?php
/**
 * Created by PhpStorm.
 * User: LX
 * Date: 2019/11/1
 * Time: 19:36
 */
require_once ('DB.php');
class UserService{
    //数据库链接
    public $db;

    function __construct()
    {
        $this->db = new DB();
    }

    //登录
    function userLogin($name,$pswd){
        $sql = "select * from userlist where password='{$pswd}' and username='{$name}'";
        $res = $this->db->query($sql);
//        var_dump($res);
        if($res->num_rows == 0){
            echo '{"code":"0"}';//用户未注册
        }else if($res->num_rows > 0){
            $obj = mysqli_fetch_assoc($res);
            $p = $obj['password'];
            if($pswd === $p){
                echo '{"code":"2"}';//用户登录成功
            }else{
                echo '{"code":"3"}';//密码错误
            }
        }else{
            echo '{"code":"1"}';//服务器错误
        }
    }

    //注册
    function addUser($user){
        $sql = "insert into userlist (username,password,tel,sex) values ('{$user->username}','{$user->password}','{$user->tel}','{$user->sex}')";
        $res = $this->db->query($sql);
//        var_dump($res); //true
        if($res){
            echo '{"code":"1"}';//成功
        }else{
            echo '{"code":"0"}';//失败
        }
    }
}