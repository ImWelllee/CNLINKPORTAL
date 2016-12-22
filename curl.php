<?php 
function getResource($url){
    $ch = curl_init();
    //永遠抓最新
    $header[] = "Cache-Control: no-cache";
    $header[] = "Pragma: no-cache";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    //等待時間
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
    curl_setopt($ch, CURLOPT_TIMEOUT, 4);
    //Post Data
    $postData="name=".$name."&id=".$id;
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt ($ch, CURLOPT_POSTFIELDS, $postData);
    // 設定referer
    curl_setopt($ch, CURLOPT_REFERER, 'http://www.xuite.net');
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

$url = 'http://xuite.net';
$res = getResource($url)


?>