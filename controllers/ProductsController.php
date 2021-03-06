<?php
/**
 * Created by PhpStorm.
 * User: zhangzenan
 * Date: 2017/7/31
 * Time: 22:19
 */

namespace app\controllers;


use app\models\ProductCollection;
use app\models\ProductPhoto;
use app\models\ProductPopular;
use app\models\User;
use app\models\Products;
use app\models\Recommend;
use app\models\RecommendDetail;
use common\services\RedisService;
use common\services\TokenService;
use yii\db\Exception;
use common\services\QiniuService;

class ProductsController extends BaseController
{

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }


    /**
     * 根据品牌查询商品
     */
    public function actionGetProductByBrand()
    {
        $params = $this->postData;
        if (!is_numeric($params['brandId'])) {
            return $this->renderJSON(-1000, '参数错误');
        }

        $page = $params['page'];
        $query = Products::find()->select('*')
            ->where(['FuiBrandId' => $params['brandId']])
            ->orderBy('product.FuiId desc');
        $offset = ($page - 1) * self::pageSize2;
        $data = $query->offset($offset)->limit(self::pageSize2)->asArray()->all();

        if (count($data) == 0) {
            return $this->renderJSON(-1, 'no data');
        }

        return $this->renderJSON(0, 'ok', $data);
    }

    /**
     * 获取推荐列表
     */
    public function actionGetRecommendList()
    {
        $page = \Yii::$app->request->post('page');
        $query = Recommend::find();

        $offset = ($page - 1) * self::pageSize;
        $data = $query->offset($offset)->limit(self::pageSize)->asArray()->all();
        if (empty($data)) {
            return $this->renderJSON(-1, 'no data');
        }
        return $this->renderJSON(0, 'ok', $data);
    }

    /**
     * 获取推荐详情
     */
    public function actionGetRecommendDetail()
    {
        $recommendId = \Yii::$app->request->post('rid');
        if (!is_numeric($recommendId)) {
            return $this->renderJSON(-1, '无效参数');
        }

        $recommendDetail = RecommendDetail::find()->select('*')
            ->where(['FuiRecommendId' => $recommendId])->all();
        return $this->renderJSON(0, 'ok', $recommendDetail);
    }

    /**
     * 热门租包接口
     */
    public function actionGetHotRent()
    {
        $params = $this->postData;
        $page = isset($params['page']) ? (int)$params['page'] : 1;
        $pageSize = isset($params['pageSize']) ? (int)$params['pageSize'] : 10;

        $query = ProductPopular::find()->select(['p.FuiId as productId', 'p.FstrProductName as productName', 'p.FuiRentPrice as rentPrice',
            'p.FuiBuyPrice as buyPrice', 'p.FstrProductPhoto as productPhoto'])
            ->innerJoin('products p', 'product_popular.FuiProductId = p.FuiId')
            ->where(['product_popular.FuiStatus' => 0]);

        $offset = ($page - 1) * $pageSize;
        $totalCount = $query->count();
        $data = $query->offset($offset)->limit($pageSize)->asArray()->all();

        if (count($data) == 0) {
            return $this->renderJSON(-1000, 'no data');
        }

        return $this->renderJSON(0, 'ok',[
            'totalCount' => $totalCount,
            'list' => $data
        ]);
    }

    /**
     * 热门卖包接口
     */
    public function actionGetHotBuy()
    {
        $params = $this->postData;
        $page = isset($params['page']) ? (int)$params['page'] : 1;
        $pageSize = isset($params['pageSize']) ? (int)$params['pageSize'] : 10;

        $query = ProductPopular::find()->select(['p.FuiId as productId', 'p.FstrProductName as productName', 'p.FuiRentPrice as rentPrice',
            'p.FuiBuyPrice as buyPrice', 'p.FstrProductPhoto as productPhoto'])
            ->innerJoin('products p', 'product_popular.FuiProductId = p.FuiId')
            ->where(['product_popular.FuiStatus' => 0]);

        $offset = ($page - 1) * $pageSize;
        $totalCount = $query->count();
        $data = $query->offset($offset)->limit($pageSize)->asArray()->all();

        if (count($data) == 0) {
            return $this->renderJSON(-1000, 'no data');
        }

        return $this->renderJSON(0, 'ok',[
            'totalCount' => $totalCount,
            'list' => $data
        ]);
    }

    /**
     * 推荐接口
     */
    public function actionRecommend()
    {
        $params = $this->postData;
        $page = isset($params['page']) ? (int)$params['page'] : 1;
        $pageSize = isset($params['pageSize']) ? (int)$params['pageSize'] : 10;

        $query = ProductPopular::find()->select(['p.FuiId as productId', 'p.FstrProductName as productName', 'p.FuiRentPrice as rentPrice',
            'p.FuiBuyPrice as buyPrice', 'p.FstrProductPhoto as productPhoto'])
            ->innerJoin('products p', 'product_popular.FuiProductId = p.FuiId')
            ->where(['product_popular.FuiStatus' => 0]);

        $offset = ($page - 1) * $pageSize;
        $totalCount = $query->count();
        $data = $query->offset($offset)->limit($pageSize)->asArray()->all();

        if (count($data) == 0) {
            return $this->renderJSON(-1000, 'no data');
        }

        return $this->renderJSON(0, 'ok',[
            'totalCount' => $totalCount,
            'list' => $data
        ]);
    }
}