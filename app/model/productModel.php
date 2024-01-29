<?php

namespace  App\model;

class productModel
{
    private $Product_id = 0;
    private $Name = "";
    private $Price = 0;
    private $Date_import = "";
    private $Viewsp = 0;
    private $Decribe = "";
    private $Quantity = 0;
    private $Sale = 0;
    private $Image = "";

    public function setPrice($Price)
    {
        return  $this->Price = $Price;
    }
    public function getPrice()
    {
        return  $this->Price;
    }
    public function setImage($Image)
    {
        return  $this->Image = $Image;
    }
    public function getImage()
    {
        return  $this->Image;
    }
    public function setSale($Sale)
    {
        return  $this->Sale = $Sale;
    }
    public function getSale()
    {
        return  $this->Sale;
    }

    public function setQuantity($Quantity)
    {
        return  $this->Quantity = $Quantity;
    }
    public function getQuantity()
    {
        return  $this->Quantity;
    }
    public function setDecribe($Decribe)
    {
        return  $this->Decribe = $Decribe;
    }
    public function getDecride()
    {
        return  $this->Decribe;
    }
    public function setViewsp($Viewsp)
    {
        return  $this->Viewsp = $Viewsp;
    }
    public function getViewsp()
    {
        return  $this->Viewsp;
    }
    public function setDate_import($Date_import)
    {
        return  $this->Date_import = $Date_import;
    }
    public function getDate_import()
    {
        return  $this->Date_import;
    }
    public function setName($Name)
    {
        return  $this->Name = $Name;
    }
    public function getName()
    {
        return  $this->Name;
    }
    public function setId($Product_id)
    {
        return $this->Product_id = $Product_id;
    }
    public function getId()
    {
        return $this->Product_id;
    }

    public function reduceQuantity($sp)
    {
        $xl = new xl_database();
        $sql =  "UPDATE sanpham SET Quantity=" . $sp->getQuantity() . "
        WHERE Product_id = " . $sp->getID();
        $result = $xl->readitem($sql);
        return $result;
    }
    public function getmotsp($id)
    {
        $xl = new xl_database();
        $sql = "SELECT * FROM sanpham WHERE Product_id =" . $id;
        $result = $xl->readitem($sql);
        return $result;
    }

    public function get_one_product($product)
    {
        $xl = new xl_database();
        $sql = "SELECT * FROM sanpham WHERE Product_id =" . $product->getId();
        $result = $xl->readitem($sql);
        return $result;
    }

    public function get_sales_sp()
    {
        $xl = new xl_database();
        $sql = "SELECT * FROM `sanpham` 
            WHERE Sale > 0
            ORDER By Sale DESC Limit 0,3";
        $result = $xl->readitem($sql);
        return $result;
    }

    public function get_new_sp()
    {
        $xl = new xl_database();
        $sql = "SELECT * FROM `sanpham` 
        ORDER By Product_id DESC Limit 0,3";
        $result = $xl->readitem($sql);
        return $result;
    }

    public function get_most_view_sp1()
    {
        $xl = new xl_database();
        $sql = "SELECT * FROM `sanpham` 
        WHERE Viewsp > 0
        ORDER By Viewsp DESC Limit 0,1";
        $result = $xl->readitem($sql);
        return $result;
    }

    public function get_most_view_sp2()
    {
        $xl = new xl_database();
        $sql = "SELECT * FROM `sanpham` 
        WHERE Viewsp > 0
        ORDER By Viewsp DESC Limit 1,2";
        $result = $xl->readitem($sql);
        return $result;
    }

    public function get_most_view_sp3()
    {
        $xl = new xl_database();
        $sql = "SELECT * FROM `sanpham` 
        WHERE Viewsp > 0
        ORDER By Viewsp DESC Limit 3,2";
        $result = $xl->readitem($sql);
        return $result;
    }

    public function deleteProduct($sp)
    {
        $xl = new xl_database();
        $sql = "DELETE FROM sanpham WHERE Product_id =" . $sp->getId();
        $xl->execute_item($sql);
    }
    public function getAllProduct()
    {
        $xl = new xl_database();
        $sql = "SELECT DISTINCT * FROM sanpham 
            ORDER BY Product_id desc";
        $result = $xl->readitem($sql);
        return $result;
    }
    public function getdata_limit($st, $stp)
    {
        $xl = new xl_database();
        $sql = "select * from sanpham order by Product_id desc limit " . $st . "," . $stp;
        $result = $xl->readitem($sql);
        return $result;
    }
    function addProduct($sp)
    {
        $xl = new xl_database();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('d-m-y h:i:s');
        $sql =  " INSERT into sanpham 
            VALUES (
            " . $sp->getId() . ",
            '" . $sp->getName() . "',
            " . $sp->getPrice() . ",
            '" . $date . "',0,
            '" . $sp->getDecride() . "',
            " . $sp->getQuantity() . ",
            " . $sp->getSale() . ",
            '" . $sp->getImage() . "')";
        //echo $sql;
        $xl->execute_item($sql);
    }
    function updateProduct($sp)
    {
        $xl = new xl_database();
        if ($sp->getImage() != "") {
            $sql =  "UPDATE sanpham SET Name='" . $sp->getName() . "', 
            Price=" . $sp->getPrice() . ",
            Quantity=" . $sp->getQuantity() . ",
            image='" . $sp->getImage() . "',
            Description ='" . $sp->getDecride() . "' 
            WHERE Product_id = " . $sp->getID();
            echo "Không có ảnh";
        } else {
            $sql =  "UPDATE sanpham SET Name='" . $sp->getName() . "', 
            Price=" . $sp->getPrice() . ",
            Quantity=" . $sp->getQuantity() . ",
            Description ='" . $sp->getDecride() . "' 
            WHERE Product_id = " . $sp->getID();
            echo "Đã Có Image";
        }
        $xl->execute_item($sql);
    }

    function loadItem($result)
    {
        $html_list_product = '';
        $box_sale_price = '';
        $sale_price = '';
        $sale = 0;
        $price_main = 0;
        $text_price = '';

        foreach ($result as $product) {

            extract($product);

            // if ($Sale >= 1) {
            //     $sale = $Price - ($Price * ($Sale / 100));
            //     $price_main = $sale;
            //     $text_price = '
            //         <del>' . $Price . ' VNĐ</del>
            //     ';
            //     $box_sale_price = '
            //     <div class="price_sale">
            //             <div class="inner-price">
            //                 <span class="price">
            //                     <strong>' . $Sale . '%</strong> <br> / kg
            //                 </span>
            //             </div>
            //         </div>
            //     ';
            // } else {
            //     $price_main = $Price;
            // }

            // if ($Sale > 0) {
            //     $box_sale_price = '
            //      <div class="price_sale">
            //              <div class="inner-price">
            //                  <span class="price">
            //                      <strong>' . $Sale . '%</strong> <br> / kg
            //                  </span>
            //              </div>
            //          </div>
            //      ';
            // }
            $html_list_product .= '
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="single-product-item">
                    ' . $box_sale_price . '
                    <div class="product-image">
                    <a href="/detail?id=' . $Product_id . '"><img src="../../public/assets/img/products/' . $image . '" alt=""></a>
                    </div>
                    <h3>' . $Name . '</h3>
                    <p class="product-price"><span>Mỗi Kg</span> ' . $Price . ' VNĐ ' . $text_price . ' <span>Lượt Xem : ' . $Viewsp . '</span> </p>
                    
                    <a href="/cart?id=' . $Product_id . '" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                </div>
            </div>
                ';
        }
        return $html_list_product;
        //return $danhsach;
    }

    function loadItemMostView($result)
    {
        $html_list_product = '';
        $box_sale_price = '';
        $sale_price = '';
        $sale = 0;
        $price_main = 0;
        $text_price = '';
        foreach ($result as $product) {
            extract($product);
            // if ($Sale > 0) {
            //     $sale = $Price - ($Price * ($Sale / 100));
            //     $price_main = $sale;
            //     $text_price = '
            //         <del>' . $Price . ' VNĐ</del>
            //     ';
            //     $box_sale_price = '
            //     <div class="price_sale">
            //             <div class="inner-price">
            //                 <span class="price">
            //                     <strong>' . $Sale . '%</strong> <br> / kg
            //                 </span>
            //             </div>
            //         </div>
            //     ';
            // } else {
            //     $price_main = $Price;
            // }
            // if ($Sale > 0) {
            //     $box_sale_price = '
            //     <div class="price_sale">
            //             <div class="inner-price">
            //                 <span class="price">
            //                     <strong>' . $Sale . '%</strong> <br> / kg
            //                 </span>
            //             </div>
            //         </div>
            //     ';
            // }
            $html_list_product .= '
                <div class="col-lg-6 col-md-6 text-center">
                    <div class="single-product-item">
                    ' . $box_sale_price . '
                    <div class="product-image">
                    <a href="/detail?id=' . $Product_id . '"><img src="../../public/assets/img/products/' . $image . '" alt=""></a>
                    </div>
                    <h3>' . $Name . '</h3>
                    <p class="product-price"><span>Mỗi Kg</span> ' . $Price . ' VNĐ ' . $text_price . ' <span>Lượt Xem : ' . $Viewsp . '</span> </p>
                    
                    <a href="/cart?id=' . $Product_id . '" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                </div>
            </div>
                ';
        }
        return $html_list_product;
    }

    function detail_product()
    {
        $id = $_GET["id"];
        $xl = new xl_database();
        $sql = "select * from sanpham where Product_id =" . $id;
        $result = $xl->readitem($sql);
        return $result;
    }

    function get_product_id_from_url()
    {
        $url = $_SERVER['REQUEST_URI'];
        $url_segments = explode('/', $url);
        return $url_segments[3];
    }

    function load_Search($search_input)
    {
        $id = $_GET["id"];
        $xl = new xl_database();
        $sql = "SELECT *
        FROM `sanpham` 
        WHERE `Name` LIKE '%$search_input%'";
        $result = $xl->readitem($sql);
        return $result;
    }
}
