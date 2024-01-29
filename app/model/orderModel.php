<?php

namespace App\model;

class orderModel
{
    private $id_dh = 0;
    private $id_user = 0;
    private $username = "";
    private $email = "";
    private $phone = 0;
    private $address = null;
    private $tong_dh = 0;
    private $ngaydat = "";
    private $pttt = 1;
    private $trangthai = "";
    private $ghichu = "";
    private $zipcode = "";

    public function setIdDh($id_dh)
    {
        return  $this->id_dh = $id_dh;
    }
    public function getIdDh()
    {
        return  $this->id_dh;
    }

    public function setIdUser($id_user)
    {
        return $this->id_user = $id_user;
    }
    public function getIDUser()
    {
        return $this->id_user;
    }
    public function setUserName($username)
    {
        return $this->username = $username;
    }
    public function getUserName()
    {
        return $this->username;
    }
    public function setEmail($email)
    {
        return $this->email = $email;
    }
    public function getEmail()
    {
        return $this->email;
    } // phone
    public function setPhone($phone)
    {
        return $this->phone = $phone;
    }
    public function getPhone()
    {
        return $this->phone;
    }

    // address
    public function setAddress($address)
    {
        return $this->address = $address;
    }
    public function getAddress()
    {
        return $this->address;
    }
    public function setTongDh($tong_dh)
    {
        return $this->tong_dh = $tong_dh;
    }

    public function getTongDh()
    {
        return $this->tong_dh;
    }

    public function setNgatDat($ngaydat)
    {
        return $this->ngaydat = $ngaydat;
    }
    public function getNgayDat()
    {
        return $this->ngaydat;
    }

    public function setPttt($pttt)
    {
        return $this->pttt = $pttt;
    }

    public function getPttt()
    {
        return $this->pttt;
    }
    public function setTrangThai($trangthai)
    {
        return $this->trangthai = $trangthai;
    }
    public function getTrangThai()
    {
        return $this->trangthai;
    }
    public function setGhiChu($ghichu)
    {
        return $this->ghichu = $ghichu;
    }
    public function getGhiChu()
    {
        return $this->ghichu;
    }

    public function setZipCode($zipcode)
    {
        return $this->zipcode = $zipcode;
    }
    public function getZipCode()
    {
        return $this->zipcode;
    }

    public function addOrder($order)
    {
        $xl = new xl_database();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('d-m-y h:i:s');
        $sql =  " INSERT into donhang 
            VALUES (
            " . $order->getIdDh() . ",
            '" . $order->getIdUser() . "',
            '" . $order->getZipCode() . "',
            '" . $order->getUserName() . "',
            '" . $order->getEmail() . "',
            '" . $order->getPhone() . "',
            '" . $order->getAddress() . "',
            " . $order->getTongDh() . ",
            '" . $date . "',
            '" . $order->getPttt() . "',
            '" . $order->getTrangThai() . "',
            '" . $order->getGhiChu() . "')";
        echo $sql;
        $xl->execute_item($sql);
        return true;
    }

    public function getAllOrder()
    {
        $xl = new xl_database();
        $sql = "SELECT *
        FROM donhang
        WHERE 1 ";
        $result = $xl->readItem($sql);
        return $result;
    }

    public function update_trangthai($order)
    {
        $xl = new xl_database();
        $sql =  "UPDATE donhang SET trangthai ='" . $order->getTrangThai() . "'
        WHERE id_dh = " . $order->getIdDh();
        //echo $sql;
        $xl->execute_item($sql);
    }

    public function loadOrderEmail($order)
    {
        $xl = new xl_database();
        $sql = "SELECT *
        FROM donhang
        WHERE id_dh =" . $order->getIdDh();
        $result = $xl->readItem($sql);
        return $result;
    }


    public function lastIdOrder()
    {
        $xl = new xl_database();
        $sql = "SELECT DISTINCT * FROM `donhang`
        ORDER BY id_dh DESC limit 0,1";
        $result = $xl->readItem($sql);
        return $result;
    }

    public function listOrder()
    {
        $xl = new xl_database();
        $sql = "SELECT DISTINCT * FROM `donhang`
        ORDER BY id_dh DESC";
        $result = $xl->readItem($sql);
        return $result;
    }

    function get_orders_by_month($month)
    {
        $xl = new xl_database();

        // Lấy ngày đầu tiên của tháng
        $start_of_month = strtotime("2024-$month-01");
        $end_of_month = strtotime("2024-$month-31");
        // Truy vấn dữ liệu
        $sql = "SELECT *
        FROM donhang
        WHERE ngaydat BETWEEN '{$start_of_month}' AND '{$end_of_month}'";
        echo $sql;
        //$result = $xl->readItem($sql);

        // Trả về kết quả
        //return $result;
    }
}
