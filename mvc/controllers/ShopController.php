<?php
require_once dirname(__DIR__) . "/models/Shop.php";

class ShopController
{
    public function showShop(){
        $shopModel= new Shop();
        $resultShop = $shopModel->getShop();
        view('partials/footer', compact('resultShop'));
        
    }
}

?>
