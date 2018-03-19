<?php
/**
 * Created by PhpStorm.
 * User: panxiao
 * Date: 2018/3/19
 * Time: 下午6:07
 */

// 初始化
$ch = curl_init();

// CURLOPT_URL  设置访问网页的url
curl_setopt($ch, CURLOPT_URL, 'http://www.baidu.com');
// 执行之后不打印页面
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// 使用session 之前必须设置好时区
date_default_timezone_get('PRC');
// Cookie相关设置, 这部分设置要在说有回话之前开始之前设置
curl_setopt($ch, CURLOPT_COOKIESESSION, true);

curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookiefile');
curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookiefile');
curl_setopt($ch, CURLOPT_COOKIE, session_name() . '=' . session_name());
curl_setopt($ch, CURLOPT_HEADER, 0);
// 这样能够让cURL支持网页链接跳转
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

// 网页访问方法 post/get
curl_setopt($ch, CURLOPT_POST, 1);
// 设置访问网页时的数据
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
// header头部内容设置
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "application/x-www-form-urlencoded;charset=utf-8",
    "Content-length:" . strlen($data)
));
// 执行
curl_exec($ch);

//关闭
curl_close();
