<div class="table-responsive">
    <table class="table table-striped">


        <thead>
            <tr>
                <th>Người Nhận</th>
                <th>Ảnh Sản Phẩm</th>
                <th>Tên Sản Phẩm</th>
                <th>Giá</th>
                <th>Số Lượng</th>
                <th>Tổng Thanh Toán</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;

            for ($i = 0; $i < sizeof($list_order_detail); $i++) {
                $img = '
                <img src="../public/image/products/' . $list_order_detail[$i]['image'] . '"alt="">
                ';
                echo '
                <tr>
                  <td>' . $list_order_detail[$i]['username'] . '</td>
                  <td>' . $img . '</td>
                  <td>' . $list_order_detail[$i]['name_pro']     . '</td>
                  <td>' . $list_order_detail[$i]['price_pro']     . '</td>
                  <td>' . $list_order_detail[$i]['soluong_pro']     . '</td>
                  <td>' . $list_order_detail[$i]['tong_1_sp']     . '</td>

                  
              </tr>';
            }


            ?>

        </tbody>


    </table>
    <th> <a href="/list_order_admin" class="btn btn-success"><i class="far fa-tv style=" color: #ffffff;></i> Quay lại</a></th>

</div>