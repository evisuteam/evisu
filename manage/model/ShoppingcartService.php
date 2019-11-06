<?php
/**
 * Created by PhpStorm.
 * User: LX
 * Date: 2019/11/6
 * Time: 9:10
 */
require_once ('DB.php');

class ShoppingcartService{
    public $db;

    function __construct()
    {
        $this->db = new DB();
    }

    //查询购物车
    function selectShopping(){
        $sql = "selete * from shoppingcart";
        $res = $this->db->mysqli->query($sql);
        if($res){
            echo json_encode($res);//返回json格式的数据
        }else{
            echo '{"code":"0"}';//查询失败
        }
    }
    //添加
    function insertShopping($shop){
        $sql = "insert into (userId,goodId,size,count) values ('{$shop->userId}','{$shop->goodId}','{$shop->size}','{$shop->count}')";
        $res = $this->db->mysqli->query($sql);
        if($res){
            echo json_encode($res);
        }else{
            echo '{"code":"0"}';//添加失败
        }
    }
    //删除
    function deleteShopping($id){
        $sql = "delete from shoppingcart where ID='{$id}'";
        $res = $this->db->mysqli->query($sql);
        if($res){
            echo '{"code":"1"}';//删除成功
        }else{
            echo '{"cdoe":"0"}';//删除失败
        }
    }
}