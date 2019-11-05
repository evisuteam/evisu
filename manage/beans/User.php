<?php
/**
 * Created by PhpStorm.
 * User: LX
 * Date: 2019/11/1
 * Time: 19:41
 */
class User
{
    public $username; // 用户名
    public $password; // 密码
//    public $avatar; // 头像路径
    public $sex; // 性别
    public $tel; // 电话号码

    function __construct($username, $password, $sex, $tel)
    {
        $this->username = $username;
        $this->password = $password;
//        $this->avatar = $avatar;
        $this->sex = $sex;
        $this->tel = $tel;
    }
}