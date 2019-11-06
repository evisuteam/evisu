<?php
/**
 * Created by PhpStorm.
 * User: LX
 * Date: 2019/11/4
 * Time: 16:24
 */
require_once ('DB.php');
class AddressService
{
    public $db;

    function __construct()
    {
        $this->db = new DB();
    }

    //查询地址
    function selecteAddress(){
//        $sql = "select "
        $sql = "select * from address";
        $res = $this->db->mysqli->query($sql);
        if($res){
            //查询成功,返回前端识别的json字符串
            echo json_encode($res);
        }else{
            //查询失败,返给前端提示信息
            echo '{"code":"0"}';
        }
    }
    //添加地址
    function insertAddress($add){
        $sql = "insert into (userId,name,tel,region,address,status) values ('{$add->userId}','{$add->name}','{$add->tel}','{$add->region}','{$add->address}','{$add->status}')";
        $res =$this->db->mysqli->query($sql);
        if($res){
            echo json_encode($res);//添加成功,将其转换成前端能识别的json字符串，返回
        }else{
            echo '{"code":"0"}';//添加失败
        }
    }
    //删除地址
    function deleteAddress($id){
        $sql = "delete from address where ID='{$id}'";
        $res = $this->db->mysqli->query($sql);
        if($res){
            echo '{"code":"1"}';//删除成功
        }else{
            echo '{"code":"0"}';//删除失败
        }
    }

    //修改地址
    function updateAddress($id,$add){
        $sql = "update goodlist set Type1='{$add->userId}',Type2='{$add->name}',goodname='{$add->region}',size='{$add->status}',price='{$pro->price}',number='{$pro->number}',count='{$pro->count}',img='{$pro->img}',imglist='{$pro->imglist}',detail='{$pro->detail}',showimglist='{$pro->showimglist}' where id='{$id}'";
        $res = $this->db->mysqli->query($sql);
        var_dump($res);
        if($res){
//            echo '{"code":"1"}';//修改成功
            echo json_encode($res);//返回前端可以识别的json
        }else{
            echo '{"code":"0"}';//修改错误
        }
    }
}