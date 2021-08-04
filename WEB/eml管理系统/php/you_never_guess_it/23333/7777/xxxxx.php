<?PHP
    // 通往新世界的大门
    // 没有内网主机
    $URL = $_GET['url'];
    $CH = curl_init();
    curl_setopt($CH, CURLOPT_URL, $URL);
    curl_setopt($CH, CURLOPT_HEADER, FALSE);
    curl_setopt($CH, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($CH, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($CH, CURLOPT_FOLLOWLOCATION, TRUE);
    $RES = curl_exec($CH);
    curl_close($CH) ;
    echo $RES;
?>