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
//    function selectProduct(){
//        $sql = "select * from goodlist";
//        $res = $this->db->query($sql);
//        if($res){
//            //查询成功,返回结果
//            //如果返回结果值为0，为所有男装的商品信息
//
//
////            echo json_encode($res);
//        }else{
//            //查询失败,返给前端提示信息
//            echo '{"code":"0"}';
//        }
//    }
}