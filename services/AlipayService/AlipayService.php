<?php
/**
 * Created by PhpStorm.
 * User: zhangzenan
 * Date: 2018/4/18
 * Time: 20:03
 */

namespace common\services\AlipayService;


class AlipayService
{
    /**
     * 支付宝appId
     */
    private $appId = 2017090408557268;

    /**
     * 支付宝公钥
     */
    private $alipayrsaPublicKey = 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAx8aCX5zLVkCse1XKAiTQbuO12qk/DXOTK0pUvXNyicJnePmyOwhAyBLl3RjikI3zqeV3rJKFhvs/bIrvOovwbSC3m6MnNN6gx3vYRC06sbO4M2Z64VFraPS1NapKZ4wvpEwnmfsPgvESEWW7sVBDGF2qaP9P/6oQQ3B/tZbE4ISCEVziERuZ1gAU7qvIxOQYkBJ70ktnID7SBfJaTdqI0iMbm6Hf0k84xtHy/1g9/sNoT576CumGbCSkNr6/7mMW+HNYBgaMb+h0pY4185cu1H/hi+OOySOk/t/WHFLprlCjx2mf07YiX4K/wvF/WCg8mU0jMLkM0ypyjrxtnhMDGwIDAQAB';

    /**
     * RSA私钥
     */
    private $rsaPrivateKey = 'MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQDLcs5i62Io/mj6sRwj5299ALtCeXBOf97hjqQsPpjBhZpgGr9BcoTqIFCLoa2prJgyJZeOh+rmYF0khbH+kqxuau+Dq4JQendhBUmhBo35LRTuLkEcK7bNgRG3J03t1i6WKHdNY4GKhnPFjcodacpLSuzT1JlbdFX69yIyTfCj4Ai7/fZJVqDRprF6Y5V0VFCUCWiH/HPvTC6rf8vNhqXa9Vkjq0BZEWP+ZNvqNbcqSAHbboH09HqnrqIiIfa+/4Oddt5igqy84/USJMdIJizaoz5bkK8WiULu6lpLSL2vRPpqHfAgEFIWxMO/HAbcrgtzIPrI5+HgmPHlXLDn6uXBAgMBAAECggEAaYgc7Izitxb4x4lVan5jg3j8qceqbN3BdEj0egriXAf8gvt81+sabQPkI/nyxj/EFscPLZztSSEVT5uWL9JPZVtM8ITnrO1JvWbrwX5P6L/synvtxDocsc7QrKvTrZpbQgKtl9QU3xFNPl2FSOqWR6YO4Pa3sgvPicXl1Cg/uhDP4AAFumXtwHITFqJ72nGhAmm5gf99Fs49pODRV65oyQtZYEAU/Pxf/KppBJn0ArOj9TeJ/SK5NfHA363VUgbVTAiTo+ABWoaq47iBsXesJCDAsQ6JlN545sup7/KrVrgThuQqX6SCoDIwNS7FZclKMoTOHeZYWeeed8vmURribQKBgQDyxnGkUSUspZGsrbBmX+QJ7Ar43EiD/rWVFkfNE9LbkfbD3NkxBp7twOo2oegXYOJfnbszofx8q0B0a3hwGS/7dhF/+mB/UROsvJONZvvK8kIEw41K3/5lzrsQP8i0PgJnBqZoL9eXOhyIpNwiBNC0d4AVkgVqLX/5Pf2CcwvBZwKBgQDWh/EzeasAtiIFGl94khqwMEiByo4xktae+zsvsU7B2Pgt00yG4jO109pgQAUV6bxVzqyaLIcP1fzDRh7tQIgUcOE161clN2ap9PxDA6cPiGtPSHtRVLtcruQujc29/cD7LpMqgEnxUyqUxACxhL6+T4S5+AYfaO/tWtn3OkhelwKBgQDMAFCyALW6JI6aiYD3JZCbfctifsg4kinHU2eWPhgrBSZUQxoGhke6BSdKLRa3vmO6cPJDWtStdcG9kiksGR4msXnXDm9TzK85sWRTp7vhN1yeYCw0RLCin+q0psRiINEn/YCLf9grbVtYvx9zPpSZcOkiNwdxxzYIHD0QBthT9QKBgQDO1c51hK6cRv3R0bWOd78Hc+XUTUh+/0WxjiNoPhjiyJ+u/vPfcCPPAOygs9izYeFVEahUFO47FGNYmjijIf6RRqu74qTomtt+rVax/cmKLkrX69gJeBoUqAIT6GAe95KiGiuFZJ7l7vs05yyL+qI0tlIPQtQUYIZCX7+anzS7DQKBgELRYjq3r+romEogiLT1ypMbY27uo+VV/MmyygajXXcuSfl6lQPoniXeDuvYRM3Jfz1FvE6M24F1YI11dGWH1oCqD6SBfQTKPFh01htJWZ8nIdNFV+yFZd7mpI+Ml0slU4VSdy1GAVtsdVZEpRv78Pd/IMQymDRHtSIc6aKCegR+';

    /**@var AopClient $aopClient**/
    private $aopClient = null;

    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->aopClient = new AopClient();
        $this->aopClient->appId = $this->appId;
//        $this->aopClient->alipayrsaPublicKey = chunk_split($this->alipayrsaPublicKey, 64, "\n");
//        $this->aopClient->rsaPrivateKey = chunk_split($this->rsaPrivateKey, 64, "\n");
        $this->aopClient->alipayrsaPublicKey = $this->alipayrsaPublicKey;
        $this->aopClient->rsaPrivateKey = $this->rsaPrivateKey;
        $this->aopClient->format = "json";
        $this->aopClient->charset = "UTF-8";
        $this->aopClient->signType = "RSA2";
    }
//
//    /**
//     * 生成支付订单接口
//     * @param string $timeoutExpress 最晚支付时间
//     * @param float $totalAmount 订单总金额，小数点后两位
//     * @param string $productCode 支付宝签约产品码
//     * @param string $body 描述体
//     * @param string $subject 标题
//     * @param string $tradeNumber 商户网站唯一订单号
//     */
//    public function createPayOrder(string $timeoutExpress, float $totalAmount,
//                                   string $productCode, string $body,
//                                   string $subject, string $tradeNumber){
//        //实例化具体API对应的request类,类名称和接口名称对应,当前调用接口名称：alipay.trade.app.pay
//        $request = new AlipayTradeAppPayRequest();
//        //SDK已经封装掉了公共参数，这里只需要传入业务参数
//        $bizcontent = "{\"body\":\"我是测试数据\","
//            . "\"subject\": \"App支付测试\","
//            . "\"out_trade_no\": \"20170125test01\","
//            . "\"timeout_express\": \"30m\","
//            . "\"total_amount\": \"0.01\","
//            . "\"product_code\":\"QUICK_MSECURITY_PAY\""
//            . "}";
////        $data = [];
////        if($timeoutExpress){
////            $data['timeout_express'] = $timeoutExpress;
////        }
////        if($timeoutExpress){
////            $data['total_amount'] = $totalAmount;
////        }
////        if($timeoutExpress){
////            $data['product_code'] = $productCode;
////        }
////        if($timeoutExpress){
////            $data['body'] = $body;
////        }
////        if($timeoutExpress){
////            $data['subject'] = $subject;
////        }
////        if($timeoutExpress){
////            $data['out_trade_no'] = $tradeNumber;
////        }
////
////        $bizcontent = json_encode($data);
//        $request->setNotifyUrl("商户外网可以访问的异步地址");
//        $request->setBizContent($bizcontent);
//        //这里和普通的接口调用不同，使用的是sdkExecute
////        var_dump($this->aopClient->rsaPrivateKey);exit;
//        $response = $this->aopClient->sdkExecute($request);
//        //htmlspecialchars是为了输出到页面时防止被浏览器将关键参数html转义，实际打印到日志以及http传输不会有这个问题
//        echo htmlspecialchars($response);//就是orderString 可以直接给客户端请求，无需再做处理。
//    }

    /**
     * 生成支付订单接口(测试)
     */
    public function createPayOrder(){
        //实例化具体API对应的request类,类名称和接口名称对应,当前调用接口名称：alipay.trade.app.pay
        $request = new AlipayTradeAppPayRequest();
        //SDK已经封装掉了公共参数，这里只需要传入业务参数
        $bizcontent = "{\"body\":\"我是测试数据\","
            . "\"subject\": \"App支付测试\","
            . "\"out_trade_no\": \"20170125test01\","
            . "\"timeout_express\": \"30m\","
            . "\"total_amount\": \"0.01\","
            . "\"product_code\":\"QUICK_MSECURITY_PAY\""
            . "}";
//        $data = [];
//        if($timeoutExpress){
//            $data['timeout_express'] = $timeoutExpress;
//        }
//        if($timeoutExpress){
//            $data['total_amount'] = $totalAmount;
//        }
//        if($timeoutExpress){
//            $data['product_code'] = $productCode;
//        }
//        if($timeoutExpress){
//            $data['body'] = $body;
//        }
//        if($timeoutExpress){
//            $data['subject'] = $subject;
//        }
//        if($timeoutExpress){
//            $data['out_trade_no'] = $tradeNumber;
//        }
//
//        $bizcontent = json_encode($data);
        $request->setNotifyUrl("商户外网可以访问的异步地址");
        $request->setBizContent($bizcontent);
        //这里和普通的接口调用不同，使用的是sdkExecute
//        var_dump($this->aopClient->rsaPrivateKey);exit;
        $response = $this->aopClient->sdkExecute($request);
        //htmlspecialchars是为了输出到页面时防止被浏览器将关键参数html转义，实际打印到日志以及http传输不会有这个问题
        echo htmlspecialchars($response);//就是orderString 可以直接给客户端请求，无需再做处理。
    }


}