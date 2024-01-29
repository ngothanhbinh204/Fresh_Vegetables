<?php

namespace App\model;

class Pagination
{

  //thuoc tinh
  public $start; //vị trí bắt đầu
  public $total; //tổng số sản phẩm
  public $limit = 3; //ở đây mình lấy 3 sản phẩm trên 1 trang
  public $next; //button next
  public $back; //button back
  public $page_current; //trang hien tai
  public $page; //lấy page bên file phantrang.php đưa vào
  public function __construct($page = NULL)
  {

    // parent::__construct();

    if ($page != NULL) {

      $this->page = $page;

      $this->getPage(); //gọi hàm getPage

    }
  }

  public function getPage()
  {

    if ($this->page != 1) {

      $this->start = ($this->page - 1) * $this->limit;

      $this->page_current = $this->page;
    } else {

      $this->start = $this->page - 1;

      $this->page_current = $this->page;
    }
  }

  public function totalRow()
  {
    $xl = new xl_database();
    $sql = "SELECT * FROM sanpham 
            ORDER BY Product_id desc";
    $result = $xl->readitem($sql);
    if (count($result) > 0) {

      $this->total = ceil(count($result) / $this->limit);

      return $this->total;
    }
  }


  public function select_product()
  {
    $xl = new xl_database();
    $sql = "SELECT * FROM sanpham 
            ORDER BY Product_id desc  $this->start,$this->limit ";
    $result = $xl->readitem($sql);

    $count = count($result);

    $str = "";

    foreach ($result as $item) {
      extract($item);
      $str .= "<div class=\"sp1\">";

      $str .= "<img src=\"public/images/" . $image . "\" width=\"196\" height=\"150\">";

      $str .= "<h1 style=\"font-size:16px\">" . $Name . "</h1>";

      $str .= "</div>";
    }

    // while ($row = productModel::fetch_array_table()) {

    //   $str .= "<div class=\"sp1\">";

    //   $str .= "<img src=\"public/images/" . $row['hinhdt'] . "\" width=\"196\" height=\"150\">";

    //   $str .= "<h1 style=\"font-size:16px\">" . $row['tendt'] . "</h1>";

    //   $str .= "</div>";
    // }

    return $str;
  }

  public function nut_phantrang()
  {

    $link = "<ul class=\"phantrang\">";

    if ($this->page_current > 1) {

      $this->back = $this->page_current - 1;

      $link .= "<li page='$this->back'>back</li>";
    }

    for ($i = 1; $i <= $this->totalRow(); $i++) {

      if ($i == $this->page_current) {

        $link .= "<li page='$i' class=\"active\">" . $i . "</li>";
      } else {

        $link .= "<li page='$i'>" . $i . "</li>";
      }
    }

    if ($this->page_current < $this->totalRow()) {

      $this->next = $this->page_current + 1;

      $link .= "<li page='$this->next'>next</li>";
    }
    $link .= "</ul>";
    return $link;
  }
}
