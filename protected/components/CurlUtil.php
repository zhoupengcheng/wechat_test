<?php

class CurlUtil
{
/**
     * curl模拟get请求
     * @param string $url
     * @param string $protocol
     * @return mixed
     */
    public static function get($url, $protocol='http', $agent='', $referer='', $proxy='', $timeout=15) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);    // 要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_HEADER, 0); // 不要http header 加快效率

        if (empty($agent)) {
            $agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22";
        }
        curl_setopt($ch, CURLOPT_USERAGENT, $agent);

        if (empty($referer)) {
            $referer = "http://mp.weixin.qq.com/";
        }
        curl_setopt($ch, CURLOPT_REFERER, $referer);

        if (! empty($proxy)) {
            curl_setopt($ch, CURLOPT_PROXY, $proxy);
        }

        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

        if ($protocol == 'https') {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    // https请求 不验证证书和hosts
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        }

        $output = curl_exec($ch);
        curl_close($ch);

        return $output;
    }

    /**
     * curl模拟post请求
     * @param string $url
     * @param string $params
     * @param string $protocol
     * @return mixed
     */
    public static function post($url, $params, $protocol='http', $timeout=15) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);    // 要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_HEADER, 0); // 不要http header 加快效率
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

        curl_setopt($ch, CURLOPT_POST, 1);    // post 提交方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

        if ($protocol == 'https') {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    // https请求 不验证证书和hosts
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        }

        $output = curl_exec($ch);
        curl_close($ch);

        return $output;
    }
}