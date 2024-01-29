<?php
   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      //  $user = new user();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $tk = $user::mot_taikhoan("taikhoan",$username,$password);
        $_SESSION['dangnhap'] = $tk;
        if($tk[0]["position"] == 0 ){
            header("Location: /admin");
        }
        if($tk[0]["position"] == 1 ){
            header("Location: /");
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/dangnhap_info" method="post" enctype="multipart/form-data">
        username: <br>
        <input type="text" name = "username" ><br>
        password: <br>
        <input type="password" name="password"><br>
        <button>Submit</button>
    </form>
</body>
</html>