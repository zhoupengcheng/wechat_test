<?php

class WechatController extends Controller
{
    public function actionIndex()
    {
        $gameInfo = GameInfo::model()->getGameInfoById($_GET['g']);

        if (is_null($gameInfo)) {
            Yii::trace('wx_id 错误');
            exit;
        }

        $wechatUtil = new WechatUtil($gameInfo);
        if(isset($_GET['echostr'])) {
            // 第一次绑定验证
            $wechatUtil->checkSignature();
        }

        $wechatUtil->responseMsg();
    }
}