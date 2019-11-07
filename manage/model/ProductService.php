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
        $sql = "select * from goodlist";
        //执行sql语句
        $res = $this->db->query($sql);
        if($res){
            //查询成功，返回结果
            echo json_encode($res);
        }else{
            //查询失败，返回提示信息
            echo '{"code":"0"}';
        }
    }
    //添加商品
    function insertProduct($pro){
        $sql = "insert into goodlist (type1,type2,goodname,size,price,number,count,img,imglist,detail) values ('{$pro->type1}','{$pro->type2}','{$pro->goodname}','{$pro->size}','{$pro->price}','{$pro->number}','{$pro->count}','{$pro->img}','{$pro->imglist}','{$pro->detail}')";
        $res = $this->db->query($sql);
//        var_dump($res);
        if ($res){
            echo  '{"code":"1"}';
        }else{
            echo '{"code":"0"}';
        }

    }
    //修改商品
    function  updateProduct($id,$pro){
        $sql = "update goodlist set Type1='{$pro->Type1}',Type2='{$pro->Type2}',goodname='{$pro->goodname}',size='{$pro->size}',price='{$pro->price}',number='{$pro->number}',count='{$pro->count}',img='{$pro->img}',imglist='{$pro->imglist}',detail='{$pro->detail}' where id='{$id}'";
        $res = $this->db->mysqli->query($sql);
//        var_dump($res);
        if($res){
            echo '{"code":"1"}';//修改成功
//            echo json_encode($res);//返回前端可以识别的json
        }else{
            echo '{"code":"0"}';//修改错误
        }

    }
    //删除商品
    function deleteProduct($id){
        $sql = "delete from goodlist where ID='{$id}'";
        $res = $this->db->mysqli->query($sql);
        if($res){
            echo '{"code":"1"}';//删除成功
        }else{
            echo '{"code":"0"}';//删除失败
        }
    }

}