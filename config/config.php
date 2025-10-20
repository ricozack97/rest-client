<?php
function http_request_get($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    // ✅ Tambahkan identitas aplikasi kamu di sini
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'User-Agent: RicoAditioNewsClient/1.0 (+http://localhost/rest-client3)'
    ]);

    $output = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Curl error: ' . curl_error($ch);
    }

    curl_close($ch);
    return $output;
}
?>
