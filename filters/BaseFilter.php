<?php
/**
 * Created by PhpStorm.
 * User: zhangzenan
 * Date: 2018/2/1
 * Time: 22:05
 */

namespace app\filters;
use yii\base\ActionFilter;

class BaseFilter extends ActionFilter
{
    protected $accessId;

    protected $accessKey;

    protected $token;
}