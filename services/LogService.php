<?php
/**
 * yii 日志帮助类
 */
namespace common\services;

use Yii;
use yii\log\Logger;

class LogService{
    /**
     * 所有loggers对象列表
     * @var array
     */
    private static $_loggers = array();

    /**
     * 获取logger对象
     * @param string $logFile 日志文件名
     * @return Logger the logger.
     */
    public static function getLogger($logFile = "") {
        if(empty($logFile)){
            $logFile = "@common/logs/my_".date("Ymd").".log"; //默认日志文件路径
        }else{
            $logFile = "@common/logs/".$logFile.date("Ymd").".log";
        }
        if (isset(self::$_loggers[$logFile])) {
            return self::$_loggers[$logFile];
        }

        $flushInterval = 1; //超过20条记录则写入文件
        $config = [
            'targets' => [
                'file' => [
                    'class' => '\yii\log\FileTarget',
                    'logFile' => $logFile,
                    'maxFileSize' => 102400, //100M
                    'maxLogFiles' => 5, 
                    'exportInterval' => $flushInterval,
                    'logVars' => [],
                ],
            ],
            'logger' => \yii\BaseYii::createObject('yii\log\Logger'),
        ];
        $dispatcher = new \yii\log\Dispatcher($config);
        $dispatcher->setFlushInterval($flushInterval);
        self::$_loggers[$logFile] = $dispatcher->getLogger();

        return self::$_loggers[$logFile];
    }

    /**
     * 记录信息日志
     * @param string $msg 日志信息
     * @param string $logFile 日志文件名
     */
    public static function log($msg,$logFile = "") {
        $logger = self::getLogger($logFile);
        $logger->log($msg,Logger::LEVEL_INFO,"customer_log");
    }
    
    /**
     * 记录错误日志
     * @param string $msg 错误信息
     * @param string $logFile 日志文件名
     */
    public static function error($msg,$logFile = ""){
        $logger = self::getLogger($logFile);
        $logger->log($msg, Logger::LEVEL_ERROR, "customer_log");
    }
}