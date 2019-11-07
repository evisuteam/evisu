<?php
//具体的任务执行
require_once ('DB.php');
class ProductService{
    //数据库链接
    public $db;

    function __construct()
    {
        $this->db = new DB();
    }

    //查找商品
    function selectProduct(){
        $sql = "select * from product";
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
    //添加商品
    function insertProduct($pro){
        $sql = "insert into product (goodname,price,intro,size,img,count) values ('{$pro->goodname}','{$pro->price}','{$pro->intro}','{$pro->size}','{$pro->img}','{$pro->count}')";
        $res = $this->db->query($sql);
        if($res){
            echo '{"code":"1"}';//添加成功,返回
        }else{
            echo '{"code":"0"}';//添加失败
        }
    }
    //修改商品
    function  updateProduct($id,$pro){
        $sql = "update product set goodname='{$pro->goodname}',price='{$pro->price}',intro='{$pro->intro}',size='{$pro->size}',img='{$pro->img}',count='{$pro->count}' where id='{$id}'";
        $res = $this->db->query($sql);
//        var_dump($res);
        if($res){
            echo json_encode($res);//返回前端可以识别的json
        }else{
            echo '{"code":"0"}';//修改错误
        }
    }
    //删除商品
    function deleteProduct($id){
        $sql = "delete from product where ID='{$id}'";
        $res = $this->db->query($sql);
        if($res){
            echo '{"code":"1"}';//删除成功
        }else{
            echo '{"code":"0"}';//删除失败
        }
    }
}