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
use app\models\ProductsDetail;
use yii\db\Exception;

class ProductService
{
    /**
     * 保存商品总览记录
     * @param int $uid
     * @param array $params
     * @return int
     * @throws Exception
     */
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
        $product->FuiCanRent = $params['canRent'] ?: 0;
        $product->FuiAtLeastDays = $params['atLeastDays'] ?: 0;
        $product->FuiBrandId = $params['brandId'] ?: 0;
        $product->FstrPhotoUrl = $params['photoUrl'] ?: 0;

        if(!$product->save()){
            throw new Exception($product->getErrorMsg(), -10000);
        }

        return $product->FuiId;
    }

    /**
     * 保存每一条商品记录
     * @param int $productId
     * @param int $num
     * @return bool
     * @throws Exception
     */
    public function createProductDetail(int $productId, int $num){
        $time = time();
        for ($i = 0;$i < $num; $i++){
            $productDetail = new ProductsDetail();
            $productDetail->FuiProductId = $productId;
            $productDetail->FuiCreateTime = $time;

            if(!$productDetail->save()){
                throw new Exception($productDetail->getErrorMsg(), -10000);
            }
        }

        return true;
    }


}