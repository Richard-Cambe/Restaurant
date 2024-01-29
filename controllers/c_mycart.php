<?php
require "./views/mycart.php";


class Cart
{
    public function newCart()
    {
        $_SESSION['mycart'] = array();
    }
    public function cartList()
    {
        return !empty($_SESSION['mycart']) ? $_SESSION['mycart'] : NULL;
    }
    public function removeProduct($pro_id)
    {
        if (isset($_SESSION['mycart'][$pro_id])) {
            unset($_SESSION['mycart'][$pro_id]);
        }
    }
    public function addProduct($pro_id, $pro_name, $pro_price)
    {
        $_SESSION['mycart'][$pro_id] = [
            'pro_id' => $pro_id,
            'pro_name' => $pro_name,
            'pro_price' => $pro_price
        ];
        $this->updateTotalPrice('mycart');
    }
    private function updateTotalPrice($pro_id)
    {
        if (isset($_SESSION['panier'])) {
            $_SESSION['panier'][$pro_id]['prix_Total'] = $_SESSION['panier'][$pro_id] * $_SESSION['panier'][$pro_id]['prix_unitaire'];
        }
    }
}
