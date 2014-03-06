<?php
    header("Content-Type: text/html;charset=utf-8");

    // Create our Application instance (replace this with your appId and secret).
    $facebook = new Facebook(array(
      'appId'  => '480874175351370',
      'secret' => '90e7ca3b99ec94cca700082aa8376025',
    ));

    // Get User ID
    $user = $facebook->getUser();
    $facebook->setExtendedAccessToken();
    $access_token = $facebook->getAccessToken();
    //echo "user: ".$user;
    //echo "<br>token: ".$access_token;
    //echo nice_number($data->likes);

    // We may or may not have this data based on whether the user is logged in.
    //
    // If we have a $user id here, it means we know the user is logged into
    // Facebook, but we don't know if the access token is valid. An access
    // token is invalid if the user logged out of Facebook.

    if ($user) {
      try {
        // Proceed knowing you have a logged in user who's authenticated.
        $user_profile = $facebook->api('/me');
      } catch (FacebookApiException $e) {
        error_log($e);
        $user = null;
      }
    }

    // Login or logout url will be needed depending on current user state.
    if ($user) {
      $logoutUrl = $facebook->getLogoutUrl();
    } else {
      $statusUrl = $facebook->getLoginStatusUrl();
      $loginUrl = $facebook->getLoginUrl();
    }

?>