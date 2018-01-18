<?php

session_start();
require_once __DIR__ . '/Facebook/autoload.php';
require_once __DIR__ . '/Facebook/FacebookRequest.php';
require_once __DIR__ . '/Facebook/FacebookResponse.php';


$fb = new \Facebook\Facebook([
    'app_id' => '318344788669486',
    'app_secret' => '0843db4874a8961ff1508ed41572c00b',
    'default_graph_version' => 'v2.11',
]);

echo '<pre>';
try {
    // Returns a `Facebook\FacebookResponse` object
    $response = $fb->get('/me?fields=id,name,cover,email', 'EAAEhiGwLdC4BAOmN1jPXT82dWkljqNYabjXfBcpsYU4fUmhNzXgYtWPZCAuiWPXAZAOTlSTVsZCyxLFZAPqQZBNZAk4BlEZCmNrOZABLauYsyJZBew9vC1wMzbMuoWo7t05RumWoZAqeC1YhdtacpDE31m5iFq1VKkPkIHZB46XWcl16wRX2d65VfehqYxeBkVaXeFpQWQnQFfyOwZDZD');
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

$user = $response->getGraphUser();


print_r($user);
//$imgway = 'http://graph.facebook.com/' . $user['id'] . '/picture?type=small';
$imgway = 'https://graph.facebook.com/'.$user['id'].'/picture?height=160&width=160';
echo "<img src='" . $imgway . "'> ";


/**
 * pics type
 
 * @normal
 * @small
 * @large
   
 * @p160x160
 * @p40x40
 * @p32x32
 * @p24x24
 */

