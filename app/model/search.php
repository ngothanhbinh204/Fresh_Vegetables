<?php
$html_search = "";

if (isset($_POST["action"])) {

    $dsn = "mysql:host=localhost;dbname=php2";
    $username = "root";
    $password = "";
    $search_input = $_POST["search_input"];

    //var_dump($search_input);
    $pdo = new PDO($dsn, $username, $password);
    $sql = "SELECT `Name` ,`Price`, `Product_id`, `Viewsp` , `image`
    FROM `sanpham` 
    WHERE `Name` LIKE '%$search_input%'";
    // Thực thi truy vấn
    $statement = $pdo->prepare($sql);
    $statement->execute();

    // Lấy kết quả truy vấn
    $result = $statement->fetchAll();
    //var_dump($result);

    foreach ($result as $item) {
        extract($item);
        $html_search .= '
        <div class="col-lg-4 col-md-6 text-center berry">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="/detail?id=' . $Product_id . '"><img src="../../public/assets/img/products/' . $image . '" alt=""></a>
                            </div>
                            <h3>' . $Name . '</h3>
                            <p class="product-price"><span>Per Kg</span> ' . $Price . '$ </p>
                            <a href="/cart?id=' . $Product_id . '" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                        </div>
                    </div>
        ';
    }
    echo $html_search;
}
