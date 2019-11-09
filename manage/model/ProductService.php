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

    //查找商品详情
    function selectProduct(){
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
    function insertProduct($pro){
        $sql = "insert into goodlist (type1,type2,goodname,size,price,number,count,img,imglist,detail)values ('{$pro->type1}','{$pro->type2}','{$pro->goodname}','{$pro->size}','{$pro->price}','{$pro->number}','{$pro->count}','{$pro->img}','{$pro->imglist}','{$pro->detail}')";
        $res = $this->db->query($sql);
        if($res){
            echo '{"code":"1"}';//添加成功,返回
        }else{
            echo '{"code":"0"}';//添加失败
        }
    }


    //删除商品
    function deleteProduct($id){
        $sql = "delete from goodlist where ID='{$id}'";
        $res = $this->db->query($sql);
        if($res){
            echo '{"code":"1"}';//删除成功
        }else{
            echo '{"code":"0"}';//删除失败
        }
    }

    //修改商品
    function updateProduct($id,$pro){
        //接收
        $sql = "update goodlist set type1 = '{$pro->type1}',type2 = '{$pro->type2}',goodname = '{$pro->goodname}',size = '{$pro->size}',price = '{$pro->price}',number = '{$pro->number}',count='{$pro->count}',img = '{$pro->img}',imglist = '{$pro->imglist}',detail = '{$pro->detail}' where ID='{$id}'";

        $res = $this->db->query($sql);
        if($res){
            echo '{"code":"1"}';
        }else{
            echo '{"code":"0"}';
        }
    }

}


