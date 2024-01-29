<?php

namespace App\model;

class orderDetailModel
{
    private $id_chitiet = 0;
    private $id_sp = 0;
    private $id_dh = 0;
    private $soluong = 0;
    private $tong_dh = 0;

    public function setId_chitiet($id_chitiet)
    {
        return  $this->id_chitiet = $id_chitiet;
    }
    public function getId_chitiet()
    {
        return  $this->id_chitiet;
    }

    public function setId_sp($id_sp)
    {
        return  $this->id_sp = $id_sp;
    }
    public function getId_sp()
    {
        return  $this->id_sp;
    }

    public function setIdDh($id_dh)
    {
        return  $this->id_dh = $id_dh;
    }
    public function getIdDh()
    {
        return  $this->id_dh;
    }

    public function setQuantity($soluong)
    {
        return  $this->soluong = $soluong;
    }
    public function getQuantity()
    {
        return  $this->soluong;
    }

    public function setTongDh($tong_dh)
    {
        return  $this->tong_dh = $tong_dh;
    }
    public function getTongDh()
    {
        return  $this->tong_dh;
    }

    public function addOrder_deltail($order_detail)
    {
        $xl = new xl_database();
        $sql =  " INSERT into dh_chitiet 
            VALUES (
            " . $order_detail->getId_chitiet() . ",
            '" . $order_detail->getId_sp() . "',
            '" . $order_detail->getIdDh() . "',
            '" . $order_detail->getQuantity() . "',
            '" . $order_detail->getTongDh() . "')";
        echo $sql;
        $xl->execute_item($sql);
        return true;
    }

    public function loadOrder_DetailEmail($order)
    {
        $xl = new xl_database();
        $sql = "SELECT  tk.username as username, sp.image as image, sp.Name as name_pro, sp.Price as price_pro, dhct.soluong as soluong_pro , dhct.tong_dh as tong_1_sp
        FROM dh_chitiet as dhct 
        INNER JOIN donhang as dh on dh.id_dh = dhct.id_dh
        INNER JOIN sanpham as sp on sp.Product_id = dhct.id_sp
        INNER JOIN taikhoan as tk on tk.id_user = dh.id_user
        WHERE dh.id_dh =" . $order->getIdDh();
        $result = $xl->readItem($sql);
        return $result;
    }

    public function orderDetail($order)
    {
        $xl = new xl_database();
        $sql = "SELECT *
        FROM dh_chitiet 
        WHERE id_dh =" . $order->getIdDh();
        $result = $xl->readItem($sql);
        return $result;
    }
}
