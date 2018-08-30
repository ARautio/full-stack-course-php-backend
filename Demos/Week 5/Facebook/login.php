<?php
session_start();
require __DIR__ . '/vendor/autoload.php';

$app_id = '320031155210398';
$app_secret = 'cd2449dce0250d256ff1e2b311d2e414';

$callbar_url = 'https://ar.kapsi.fi/fullstack/callback.php';

$fb = new Facebook\Facebook([
  'app_id' => $app_id, // Replace {app-id} with your app id
  'app_secret' => $app_secret,
  'default_graph_version' => 'v2.2',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl($callbar_url, $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';

?>
