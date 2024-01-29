<div class="table-responsive">

    <form action="/xl_update_order" method="post">


        <button class="btn btn-success" type="submit" name="updateTrangthai" id="IdTrangthai" disabled>Cập Nhật Trạng Thái</button>


        <table class=" table table-striped">

            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Zipcode</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Tổng Thanh Toán</th>
                    <th>Trạng Thái Đơn Hàng</th>
                    <th>P.T.Thanh Toán</th>
                    <th>Ngày Mua</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $pttt = "";
                $j = 1;

                for ($i = 0; $i < sizeof($list_orders); $i++) {
                    //var_dump($list_orders[$i]);
                    $order_detail = '/list_order_detail_admin?id_dh=' . $list_orders[$i]['id_dh'];
                    if ($list_orders[$i]['trangthai'] == 1) {
                        $list_orders[$i]['trangthai'] = "Đang Chuẩn Bị Hàng";
                    } else if ($list_orders[$i]['trangthai'] == 2) {
                        $list_orders[$i]['trangthai'] = "Đang trên đường giao";
                    } else if ($list_orders[$i]['trangthai'] == 3) {
                        $list_orders[$i]['trangthai'] = "Giao Thành Công";
                    } else {
                        $list_orders[$i]['trangthai'] = "Chưa giao";
                    }

                    switch ($list_orders[$i]['pttt']) {
                        case 1:
                            $pttt = "Thanh Toán Khi Nhận Hàng";
                            break;
                        case 2:
                            $pttt = "Thanh Toán Ngân Hàng";
                            break;
                        case 3:
                            $pttt = "Thanh Toán MoMo";
                            break;
                        default:
                            break;
                    }

                    echo '
                    <tr>
                    <td><input type="checkbox" name="update[]" value =' . $list_orders[$i]['id_dh'] . ' ></td>
                      <td>' . $list_orders[$i]['id_dh'] . '</td>
                      <td>' . $list_orders[$i]['zipcode'] . '</td>
                      <input type="hidden" name="email" value="' . $list_orders[$i]['email']     . '">
                      <td>' . $list_orders[$i]['username'] . '</td>
                      <td>' . $list_orders[$i]['email']     . '</td>
                      <td>' . $list_orders[$i]['phone']     . '</td>
                      <td>' . $list_orders[$i]['tongdh']     . '</td>
                      <td> 
                      <select name="trangthai_' . $list_orders[$i]['id_dh']     . '" class="form-control" id="select_trangthai">
                  <option value="0">' . $list_orders[$i]['trangthai']     . '</option> 
                  <option value="1">Đang Chuẩn Bị Hàng</option>
                  <option value="2">Đang Trên Đường Giao</option>
                  <option value="3">Giao Thành Công</option>
                  </select></td>
                  
                      <td>' .  $pttt    . '</td>
                      <td>' . $list_orders[$i]['ngaydat']     . '</td>
                      <td> 
                      <a style="text-align: center" href="' . $order_detail . '" class="btn btn-success"><i class="far fa-tv style="color: #ffffff;"></i> Xem Chi tiết </a>
                      </td>  
                  </tr>';
                    $j++;
                }


                //     foreach ($list_orders as $order) {
                //         extract($order);
                //         if ($trangthai == 1) {
                //             $trangthai = "Đang Chuẩn Bị Hàng";
                //         } else if ($trangthai == 2) {
                //             $trangthai = "Đang trên đường giao";
                //         } else if ($trangthai == 3) {
                //             $trangthai = "Giao Thành Công";
                //         } else {
                //             $trangthai = "Chưa giao";
                //         }

                //         $order_detail = "/order_detail&order_code=" . $order_code;
                //         // $delAuthor = "index.php?act=delAuthor&id=" . $id;
                //         echo '
                //     <tr>
                //     <td><input type="checkbox" name="update[]" value=' . $id . '  ></td>
                //       <td>' . $order[0]['id'] . '</td>
                //       <td>' . $order[0]['zipcode'] . '</td>
                //       <td>' . $order[0]['username'] . '</td>
                //       <td>' . $order[0]['email']     . '</td>
                //       <td>' . $order[0]['phone']     . '</td>
                //       <td>' . $order[0]['tong_dh']     . '</td>
                //       <td> 
                //       <select name="trangthai_' . $id . '" class="form-control" id="">
                //       <option value="0">' .  $order[0]['trangthai']     . '</option> 
                //       <option value="1">Đang Chuẩn Bị Hàng</option>
                //       <option value="2">Đang Trên Đường Giao</option>
                //       <option value="3">Giao Thành Công</option>
                //       </select></td>
                //       <td>' .  $order[0]['pttt']    . '</td>
                //       <td> <a href="' . $order_detail . '" class="btn btn-success"><i class="far fa-tv style="color: #ffffff;"></i> Xem Chi tiết </a></td>  
                //   </tr>';
                //         $i++;
                //     }
                //     
                ?>

            </tbody>

        </table>
    </form>

</div>

<!-- Script -->
<script>
    const selectElement = document.getElementById("select_trangthai");
    const buttonElement = document.getElementById("IdTrangthai");

    selectElement.addEventListener("change", () => {
        buttonElement.disabled = selectElement.value === "";
    });

    // Initial check on page load:
    buttonElement.disabled = selectElement.value === "";
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        // Check/Uncheck ALl
        $('#checkAll').change(function() {
            if ($(this).is(':checked')) {
                $('input[name="update[]"]').prop('checked', true);
            } else {
                $('input[name="update[]"]').each(function() {
                    $(this).prop('checked', false);
                });
            }
        });

        // Checkbox click
        $('input[name="update[]"]').click(function() {
            var total_checkboxes = $('input[name="update[]"]').length;
            var total_checkboxes_checked = $('input[name="update[]"]:checked').length;

            if (total_checkboxes_checked == total_checkboxes) {
                $('#checkAll').prop('checked', true);
            } else {
                $('#checkAll').prop('checked', false);
            }
        });
    });
</script>