<div class="col-10 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Thêm Sản Phẩm Mới</h4>
            <p class="card-description">
                Thêm Sản Phẩm Mới
            </p>

            <!-- Form Thêm sp -->
            <form action="/xl_add_product_admin" method="post" enctype="multipart/form-data" class="forms-sample">

                <!-- Thông Báo Khi Thêm SP Mới Thành Công -->
                <?php if (isset($alert)) : ?>
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?php echo $alert ?>
                    </div>
                <?php endif ?>
                <!-- Thông Báo Khi Thêm SP Mới Thành Công -->

                <div class="form-group">
                    <label for="exampleInputName1">Tên Sản Phẩm</label>
                    <input type="text" name="name" class="form-control" id="" placeholder="Tên Sản Phẩm" required id="title">
                </div>


                <div class="form-group">
                    <label for="">Giá</label>

                    <input type="number" name="price" class="form-control" id="" placeholder="Giá $$$" required>
                </div>

                <div class="form-group">
                    <label for="">Số Lượng</label>

                    <input type="number" name="quantity" class="form-control" id="" placeholder="Số Lượng" required>
                </div>

                <div class="form-group">
                    <label for="">Mô tả</label>
                    <textarea name="description" class="form-control" id="" rows="4"></textarea>
                </div>

                <div class="form-group">
                    <label>Ảnh Sản Phẩm</label>
                    <div class="input-group col-xs-12">
                        <td>
                            <input class="form-control file-upload-info" name="image" type="file" id="image" size="50" />

                        </td>
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                    </div>
                </div>



                <button type="reset" name="" class="btn btn-primary mr-2" value="Nhập Lại">Nhập Lại</button>

                <button type="submit" name="button_addProduct" class="btn btn-primary mr-2">Gửi</button>
                <a class="btn btn-primary mr-2" href="/list_product_admin"> Danh Sách Sản Phẩm</a>
                <a class="btn btn-light" href="/admin"> Thoát</a>
                <div id="current-time"></div>

            </form>

            <!-- Form Thêm sp -->

        </div>
    </div>
</div>