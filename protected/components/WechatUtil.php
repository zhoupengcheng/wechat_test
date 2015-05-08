<?php

class WechatUtil
{
    public $gameInfo;

    public function __construct($gameInfo)
    {
        $this->gameInfo = $gameInfo;
    }

    /**
     * 根据code得到用户的openid,如果没有code,重新进行oauth2验证
     */
    public function auth($code = '')
    {
        $openid = '';
        if ($code) {
            $url = sprintf('https://api.weixin.qq.com/sns/oauth2/access_token?appid=%s&secret=%s&code=%s&grant_type=authorization_code', $this->gameInfo->app_id, $this->gameInfo->app_secret, $code);
            $response = json_decode(CurlUtil::get($url, 'https'), true);

            if (isset($response['openid'])) {
                $openid = $response['openid'];
            }
        } else {
            $redirect_uri = ($_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $url = sprintf('Location: https://open.weixin.qq.com/connect/oauth2/authorize?appid=%s&redirect_uri=%s&response_type=code&scope=snsapi_base&state=1#wechat_redirect', $this->gameInfo->app_id, $redirect_uri);
            header($url);
            exit;
        }

        return $openid;
    }

    public function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        $echostr = $_GET['echostr'];

        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);

        if ($tmpStr == $signature) {
            echo $echostr;
        }
        else {
            echo 'error';
        }

        exit;
    }

    public function responseMsg()
    {
        $data = $GLOBALS["HTTP_RAW_POST_DATA"];
        Yii::trace('Message Data: ' . $data);

        if (empty($data)) {
            exit;
        }

        $request = (array)simplexml_load_string($data, 'SimpleXMLElement', LIBXML_NOCDATA);
        // 更新用户发送消息时间, 客服后台会用到
        UserSubscribe::model()->updateAll(array('recv_time' => NOW_TIME), 'gameid=:gameid and openid=:openid', array(':gameid' => $request['ToUserName'], ':openid' => $request['FromUserName']));
    }
}