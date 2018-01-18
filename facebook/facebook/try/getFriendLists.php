<?php 
require_once __DIR__.'/Facebook/autoload.php';
require_once __DIR__.'/Facebook/FacebookRequest.php';
require_once __DIR__.'/Facebook/FacebookResponse.php';

session_start();

$fb = new \Facebook\Facebook([
  'app_id' => '318344788669486',
  'app_secret' => '0843db4874a8961ff1508ed41572c00b',
  'default_graph_version' => 'v2.11',
  ]);

/* PHP SDK v5.0.0 */
/* make the API call */

try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get(
    'me/friendlists?fields=id,name',
    'EAAEhiGwLdC4BAOmN1jPXT82dWkljqNYabjXfBcpsYU4fUmhNzXgYtWPZCAuiWPXAZAOTlSTVsZCyxLFZAPqQZBNZAk4BlEZCmNrOZABLauYsyJZBew9vC1wMzbMuoWo7t05RumWoZAqeC1YhdtacpDE31m5iFq1VKkPkIHZB46XWcl16wRX2d65VfehqYxeBkVaXeFpQWQnQFfyOwZDZD'
  );
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

echo '<pre>';
$array = $response->getDecodedBody();
print_r($array);