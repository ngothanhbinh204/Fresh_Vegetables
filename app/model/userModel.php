<?php

namespace App\model;

class userModel
{
    private $id_user = 0;
    private $username = "";
    private $password = "";
    private $email = "";
    private $fullname = "";
    private $phone = 0;
    private $address = null;
    private $position = null;
    private $avata = "";
    public function setIdUser($id_user)
    {
        return $this->id_user = $id_user;
    }
    public function getIdUser()
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


    // password
    public function setPassWord($password)
    {
        return $this->password = $password;
    }
    public function getPassWord()
    {
        return $this->password;
    }

    // email
    public function setEmail($email)
    {
        return $this->email = $email;
    }
    public function getEmail()
    {
        return $this->email;
    }
    // fullname
    public function setFullName($fullname)
    {
        return $this->fullname = $fullname;
    }
    public function getFullName()
    {
        return $this->fullname;
    }

    // phone
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

    // position
    public function setPosition($position)
    {
        return $this->position = $position;
    }
    public function getPosition()
    {
        return $this->position;
    }
    // Avata
    public function setAvata($avata)
    {
        return $this->avata = $avata;
    }
    public function getAvata()
    {
        return $this->avata;
    }

    // {

    //     if( empty($this->username) || empty($this->password) || empty($this->email) || empty($this->phone) || empty($this->fullname) )
    //     {
    //         return false;
    //     }

    //     if(!filter_var($this->email, FILTER_VALIDATE_EMAIL))
    //     {
    //         return false;
    //     }

    //     if(strlen($this->password) < 8)
    //     {
    //         return false;
    //     }
    // }

    // function validate_register($data) {

    //     // Kiểm tra tên người dùng
    //     if (empty($data['username'])) {
    //         $errors['username'] = 'Tên người dùng không được để trống.';
    //     } else if (strlen($data['username']) < 5) {
    //         $errors['username'] = 'Tên người dùng phải có ít nhất 5 ký tự.';
    //     } else if (strlen($data['username']) > 20) {
    //         $errors['username'] = 'Tên người dùng không được vượt quá 20 ký tự.';
    //     }

    //     // Kiểm tra email
    //     if (empty($data['email'])) {
    //         $errors['email'] = 'Email không được để trống.';
    //     } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    //         $errors['email'] = 'Email không hợp lệ.';
    //     }

    //     // Kiểm tra mật khẩu
    //     if (empty($data['password'])) {
    //         $errors['password'] = 'Mật khẩu không được để trống.';
    //     } else if (strlen($data['password']) < 8) {
    //         $errors['password'] = 'Mật khẩu phải có ít nhất 8 ký tự.';
    //     }

    //     // Kiểm tra xác nhận mật khẩu
    //     if ($data['password'] != $data['confirm_password']) {
    //         $errors['confirm_password'] = 'Mật khẩu xác nhận không khớp.';
    //     }

    //     // Trả về kết quả
    //     return $errors;
    // }

    public function login($user)
    {
        $xl = new xl_database();
        $sql = "SELECT DISTINCT * FROM `taikhoan`
         WHERE username='" . $user->getUserName() . "' 
         AND password ='" . $user->getPassWord() . "'";
        //echo $sql;
        $result = $xl->readitem($sql);
        return $result;
    }

    public function get_user_by_id($user)
    {
        $xl = new xl_database();
        $sql = "SELECT * FROM `taikhoan`
         WHERE id_user='" . $user->getIdUser() . "' ";
        //echo $sql;
        $result = $xl->readitem($sql);
        return $result;
    }

    public function getAllUser()
    {
        $xl = new xl_database();
        $sql = "SELECT * FROM `taikhoan`
         WHERE 1 ";
        //echo $sql;
        $result = $xl->readitem($sql);
        return $result;
    }

    public function addUser($user)
    {
        $xl = new xl_database();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('d-m-y h:i:s');
        $sql =  " INSERT INTO taikhoan (username, password, fullname, email, phone)
            VALUES ('" . $user->getUserName() . "',
            '" . $user->getPassWord() . "',
            '" . $user->getFullName() . "',
            '" . $user->getEmail() . "',
            '" . $user->getPhone() . "'
           )";
        //echo $sql;
        $xl->execute_item($sql);
    }

    public function updateUser($user)
    {
        $xl = new xl_database();
        $sql =  "UPDATE taikhoan SET username ='" . $user->getUserName() . "', 
        fullname='" . $user->getFullName() . "',
        email='" . $user->getEmail() . "',
        phone='" . $user->getPhone() . "',
        address='" . $user->getAddress() . "'
        WHERE id_user = " . $user->getIdUser();
        //echo $sql;
        $xl->execute_item($sql);
    }

    public function changePass($user)
    {
        $xl = new xl_database();
        $sql =  "UPDATE taikhoan SET `password` = '" . $user->getPassWord() . "'
        WHERE id_user = '" . $user->getIdUser() . "' ";
        // echo $sql;
        $result = $xl->readitem($sql);
        return $result;
    }

    public function updatePass($user)
    {
        $xl = new xl_database();
        $sql =  "UPDATE taikhoan SET `password` = '" . $user->getPassWord() . "'
        WHERE email = '" . $user->getEmail() . "' ";
        // echo $sql;
        $result = $xl->readitem($sql);
        return $result;
    }

    public function updateAvata($user)
    {
        $xl = new xl_database();
        $sql =  "UPDATE taikhoan SET `avata` = '" . $user->getAvata() . "'
        WHERE id_user = '" . $user->getIdUser() . "' ";
        //echo $sql;
        $xl->execute_item($sql);
    }

    public function uploadAvata()
    {
        $target_dir = "public/uploads/";
        $target_file = $target_dir . basename($_FILES["avata"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Kiểm tra dữ liệu của avata có đúng là hình ảnh không
        if (isset($_FILES["avata"])) {
            $check = getimagesize($_FILES["avata"]["tmp_name"]);
            if ($check === false) {
                echo "File này không phải file hình ảnh ";
                $uploadOk = 0;
            }
        }

        // Kiểm tra xem hình ảnh đã tồn tại trong file chưa
        if (file_exists($target_file)) {
            echo "File đã tồn tại.";
            $uploadOk = 0;
        }

        // kiểm tra kích cỡ file
        // if ($_FILES["avata"]["size"] > 500000) {
        //     echo "File quá lớn.";
        //     $uploadOk = 0;
        // }

        // Format của avata user
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "Chỉ được upload file có kiểu JPG, PNG, và JPEG .";
            $uploadOk = 0;
        }

        // Kiểm tra $uploadOk có bị trả về 0 do lỗi hay không
        if ($uploadOk == 0) {
            echo "File của bạn không upload được.";
            exit();
            // Mọi thứ OK -> Upload avata
        } else {
            if (move_uploaded_file($_FILES["avata"]["tmp_name"], $target_file)) {
                echo "Hình ảnh " . basename($_FILES["avata"]["name"]) . " Đã được cập nhật.";
            } else {
                echo "Đã có lỗi trong quá trình upload avata user.";
            }
        }

        return $target_file;
    }
}
