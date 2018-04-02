<?php

/**
 * Created by PhpStorm.
 * User: zhangzenan
 * Date: 2017/8/8
 * Time: 21:39
 */

namespace common\services;

use Qiniu\Auth;
use Qiniu\Storage\BucketManager;
use Qiniu\Storage\UploadManager;

class QiniuService
{
    private $accessKey = 'mL01x_H6soXrQQsmAKWufnPaSzyHjt1dqTSaRL_j';

    private $secretKey = 'Jqk3XhlaIeVY1ueyKfMgH_byFUpxFTVJwjg6pClX';

    private $bucket = 'yourbaba';

    private $token = null;

    private $uploadMgr = null;

    private $cndUrl = 'http://oud8x77hv.bkt.clouddn.com';

    function __construct()
    {
        $auth = new Auth($this->accessKey, $this->secretKey);
        $this->token = $auth->uploadToken($this->bucket);
        $this->uploadMgr = new UploadManager();
    }

    public function upload($fileName,$localFile){
        list($ret, $err) = $this->uploadMgr->putFile($this->token, $fileName, $localFile);
        if ($err !== null) {
            return ['ret'=>-1,'msg'=>$err->Err];
        } else {
            $result = array(
                'key'  => $ret['key'],
                'hash' => $ret['hash'],
                'url'  => $this->cndUrl.'/'.$ret['key'],
            );
            return ['ret' => 0,'msg' => 'ok', 'data'=>$result];
        }
    }


}