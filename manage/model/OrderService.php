<?php
/**
 * Created by PhpStorm.
 * User: LX
 * Date: 2019/11/1
 * Time: 22:04
 */
require_once ('DB.php');
class OrderService
{
    public $db;
<<<<<<< HEAD
    function __construct(){
=======
    function __construct()
    {
>>>>>>> ab75cd5b5afc9846df37f89885379c62ed3b825f
        $this->db = new DB();
    }
    //查询订单
    function orderSelect(){
        $sql = "select * from goolist";
        $res = $this->db->query($sql);
        if($res){
            echo json_encode($res);//查询成功，将其转换成前端能识别的json字符串,返回
        }else{
            echo '{"code":"0"}'; //查询失败
        }
    }
    //添加订单
    function orderInsert($order){
        $sql = "insert into orderlist (userid,goodlist,timeset,status,number) values ('{$order->uid}','{$order->goodlist}','{$order->timeset}','{$order->status}','{$order->number}')";
        $res = $this->db->query($sql);
        if($res){
            echo '{"code":"1"}';//添加成功
        }else{
            echo '{"code":"0"}';//添加失败
        }
    }
    //删除订单
    function orderDelete($id){
        $sql = "delete from orderlist where ID='{$id}'";
        $res = $this->db->query($sql);
        if($res){
            echo '{"code":"1"}';//删除成功
        }else{
            echo '{"code":"0"}';//删除失败
        }
    }

    //根据状态值查询订单
    //待发货查询
    function waitreceiveSelect($status){
        $sql = "select * from orderlist where status='{$status}'";
        $res = $this->db->query($sql);
        if($res){
            echo json_encode($res);//返回前端可识别的json格式
        }else{
            echo '{"code":"0"}';//查询失败
        }
    }
}