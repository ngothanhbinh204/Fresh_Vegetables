<?php

namespace App\model;

class Cart
{
    function checkcart($id)
    {
        for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
            if ($_SESSION['cart'][$i][0] == $id[0]) {
                return $i;
            }
        }
        return -1;
    }
}
