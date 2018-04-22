<?php
/**
 * Created by PhpStorm.
 * User: zhangzenan
 * Date: 2018/3/28
 * Time: 22:52
 */

namespace common\services;


use app\config\AppConfig;
use app\models\Products;

class ProductService
{
    public function createProduct(int $uid, array $params){
        $product = new Products();
        $product->FstrProductName = $params['productName'];
        $product->FstrDetails = $params['productDetail'] ?: '';
        $product->FstrDescription = $params['description'] ?: '';
        $product->FuiBuyPrice = $params['buyPrice'] ?: 0;
        $product->FuiRentPrice = $params['rentPrice'] ?: 0;
        $product->FuiUserId = $uid;
        $product->FuiNum = $params['FuiNum'] ?: 1;
        $product->FuiCreateTime = time();
        $product->FuiCanRent = $params['FuiCanRent'] ? $params['FuiCanRent'] : 0;
        $product->FuiAtLeastDays = $params['FuiAtLeastDays'] ? $params['FuiAtLeastDays'] : 0;
        $product->FuiBrandId = $params['FuiBrandId'] ? $params['FuiBrandId'] : 0;
    }

    public function createProductDetail(int $productId, int $num){

    }


}