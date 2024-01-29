<?php
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
    extract($user);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/login_register/fonts/material-icon/css/material-design-iconic-font.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>


</head>

<style>
    body {
        margin: 0;
        padding-top: 40px;
        color: #2e323c;
        background: #f5f6fa;
        position: relative;
        height: 100%;
    }

    .account-settings .user-profile {
        margin: 0 0 1rem 0;
        padding-bottom: 1rem;
        text-align: center;
    }

    .account-settings .user-profile .user-avatar {
        margin: 0 0 1rem 0;
    }

    .account-settings .user-profile .user-avatar img {
        width: 90px;
        height: 90px;
        -webkit-border-radius: 100px;
        -moz-border-radius: 100px;
        border-radius: 100px;
    }

    .account-settings .user-profile h5.user-name {
        margin: 0 0 0.5rem 0;
    }

    .account-settings .user-profile h6.user-email {
        margin: 0;
        font-size: 0.8rem;
        font-weight: 400;
        color: #9fa8b9;
    }

    .account-settings .about {
        margin: 2rem 0 0 0;
        text-align: center;
    }

    .account-settings .about h5 {
        margin: 0 0 15px 0;
        color: #007ae1;
    }

    .account-settings .about p {
        font-size: 0.825rem;
    }

    .form-control {
        border: 1px solid #cfd1d8;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        font-size: .825rem;
        background: #ffffff;
        color: #2e323c;
    }

    .card {
        background: #ffffff;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        border: 0;
        margin-bottom: 1rem;
    }
</style>

<body>
    <div class="container">
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <!-- xử lí upload avatar -->
                        <form action="/xl_upload_avata" method="post" enctype="multipart/form-data">
                            <div class="account-settings">

                                <?php
                                $avatar = "";
                                if (isset($_SESSION["user"])) {
                                    //var_dump($_SESSION["user"]['avata']);
                                    if ($user[0]['avata'] == "") {
                                        $avatar = '<img src="../../public/uploads/no_avata.png" alt="">';
                                    } else {
                                        $avatar = '<img src="../../public/uploads/' . $user[0]['avata'] . '" alt="">';
                                    }

                                    // $avatar = '<img src="../../public/uploads/' . $avata . '" alt="">';
                                }
                                ?>
                                <input name="id_user" type="hidden" class="form-control" id="website" placeholder="" value="<?= $user[0]['id_user'] ?>">

                                <button disabled type="submit" id="button-submit" name="button_upload_avata" class="btn "><i class="zmdi zmdi-edit"></i></button>

                                <div class="user-profile">
                                    <div class="user-avatar">
                                        <?= $avatar ?>
                                    </div>

                                    <input class="form-control" type="file" name="avata" id="input-file" value="Chọn Avata">

                                    <h5 class="user-name"><?= $user[0]['username'] ?></h5>
                                    <h6 class="user-email"><?= $user[0]['email'] ?></h6>

                                </div>
                                <div class="about">
                                    <h5>About</h5>
                                    <p>I'm Yuki. Full Stack Designer I enjoy creating user-centric, delightful and human experiences.</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card h-100">

                    <form action="/xl_edit_user" method="post">

                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 text-primary">Personal Details</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="fullName">User Name</label>
                                        <input name="username" type="text" class="form-control" id="fullName" placeholder="Enter username" value="<?= $user[0]['username'] ?>">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="fullName">Full Name</label>
                                        <input name="fullname" type="text" class="form-control" id="fullName" placeholder="Enter full name" value="<?= $user[0]['fullname'] ?>">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="eMail">Email</label>
                                        <input name="email" type="email" class="form-control" id="eMail" placeholder="Enter email ID" value="<?= $user[0]['email'] ?>">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input name="phone" type="text" class="form-control" id="phone" placeholder="Enter phone number" value="<?= $user[0]['phone'] ?>">
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="website">Address</label>
                                        <input name="address" type="text" class="form-control" id="website" placeholder="Address" value="<?= $user[0]['address'] ?>">

                                        <input name="id_user" type="hidden" class="form-control" id="website" placeholder="" value="<?= $user[0]['id_user'] ?>">
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mt-3 mb-2 text-primary">Address</h6>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="Street">Street</label>
                                    <input type="name" class="form-control" id="Street" placeholder="Enter Street">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="ciTy">City</label>
                                    <input type="name" class="form-control" id="ciTy" placeholder="Enter City">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="sTate">State</label>
                                    <input type="text" class="form-control" id="sTate" placeholder="Enter State">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="zIp">Zip Code</label>
                                    <input type="text" class="form-control" id="zIp" placeholder="Zip Code">
                                </div>
                            </div>
                        </div> -->

                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <a class="btn btn-secondary" href="/change_password">Thay Đổi Mật Khẩu</a>
                                    <div class="text-right">
                                        <button type="submit" id="submit" name="button_cancel" class="btn btn-secondary">Cancel</button>
                                        <button type="submit" id="submit" name="button_update" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

</body>

<script>
    const inputFile = document.querySelector("#input-file");
    const buttonSubmit = document.querySelector("#button-submit");

    inputFile.addEventListener("change", () => {
        if (inputFile.files.length === 0) {
            buttonSubmit.disabled = true;
        } else {
            buttonSubmit.disabled = false;
        }
    });
</script>

</html>