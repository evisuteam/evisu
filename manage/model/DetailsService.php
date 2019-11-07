<?php
//具体的任务执行
require_once ('DB.php');
class DetailsService{
    //数据库链接
    public $db;

    function __construct()
    {
        $this->db = new DB();
    }

    //查找商品详情
    function selectDetails(){
        $sql = "select * from goodlist";
        $res = $this->db->query($sql);
//        var_dump($res);
        if($res){
            //查询成功,返回结果
            echo json_encode($res);
        }else{
            //查询失败,返给前端提示信息
            echo '{"code":"0"}';
        }
    }
    //添加商品详情
    function insertDetails($det){
        $sql = "insert into goodlist (goodname,size,price,number,count,img,imglist,detail) values ('{$det->goodname}','{$det->size}','{$det->price}','{$det->number}','{$det->count}','{$det->img}','{$det->imglist}','{$det->detail}')";
        $res = $this->db->query($sql);
        if($res){
            echo '{"code":"1"}';//添加成功,返回
        }else{
            echo '{"code":"0"}';//添加失败
        }
    }


    //删除商品
    function deleteDetails($goodId){
        $sql = "delete from goodlist where ID='{$goodId}'";
        $res = $this->db->query($sql);
        if($res){
            echo '{"code":"1"}';//删除成功
        }else{
            echo '{"code":"0"}';//删除失败
        }
    }
}