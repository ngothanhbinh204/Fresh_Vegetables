<?php
$html_list_product = "";
$i = 0;
if (isset($list_product)) {
    foreach ($list_product as $product) {
        extract($product);
        $updateProduct = "/update_product_admin?id=" . $Product_id;
        $delProduct = "/del_product?id=" . $Product_id;
        $image_path = "public/image/products/" . $image;
        //echo $image_path;
        if (is_file($image_path)) {
            $image = "<img src='" . $image_path . "' height='100'>";
        } else {
            $image = "Chưa Có Hình Ảnh Sản Phẩm";
        }
        $html_list_product .= '
        <tr>
        <td>' . $Product_id . '</td>
        <td>' . $Name . '</td>
        <td>' . $image . '</td>
        <td>' . $Price . '</td>
        <td>' . $Date_import . '</td>
        <th>' . $Viewsp . '</th>
        <td>' . $Description . '</td>
        <th>' . $Quantity . '</th>
        <td>' . $Sale . '</td>
        <td>
          <a href="' . $updateProduct . '" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Sửa Thông Tin</a>
         
          <a href="' . $delProduct . '" class="btn btn-danger"><i class="far fa-tv style="color: #ffffff;"></i> Xóa</a></td>
    </tr>
        ';
        $i++;
    }
}
?>
<div class="row">
    <div class="col-lg-12 ">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Danh Sách Sản Phẩm</h4>
                <div class="col-sm-6 col-md-4 col-lg-3">
                </div>

                <?php if (isset($thongbao)) : ?>
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?php echo $thongbao ?>
                    </div>
                <?php endif ?>

                <?php if (isset($alert_del)) : ?>
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?php echo $alert_del ?>
                    </div>
                <?php endif ?>

                <a href="/add_product_admin">
                    <button type="button" class="btn btn-primary">
                        <i class="far fa-plus-square" style="color: #ffffff;"></i>
                        Thêm Sản Phẩm
                    </button>
                </a>

                <div class=" card-tale">
                    <div class="card-body">
                        <p class="mb-4">Số Lượng Sản Phẩm Trong Kho</p>
                        <p class="fs-30 mb-2"><?= $i ?></p>
                        <!-- <p>10.00% (30 days)</p> -->
                    </div>
                </div>


                <div class="table-responsive">
                    <table id="example" class="display expandable-table" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Hình Ảnh</th>
                                <th>Giá</th>
                                <th>Ngày Thêm</th>
                                <th>Lượt Xem</th>
                                <th>Mô Tả</th>
                                <th>Số Lượng</th>
                                <th>Giảm Giá</th>
                                <th>Thao Tác</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?= $html_list_product ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Hình Ảnh</th>
                                <th>Giá</th>
                                <th>Ngày Thêm</th>
                                <th>Lượt Xem</th>
                                <th>Mô Tả</th>
                                <th>Số Lượng</th>
                                <th>Giảm Giá</th>
                                <th>Thao Tác</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <!-- content-wrapper ends -->
    <!-- partial:../partials/_footer.html -->

    <!-- partial -->
</div>