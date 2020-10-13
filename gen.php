<?php
/**
 * This file generate user access tokens
 * just change $grantToken value
 * empty the file zcrm_oathtoken.txt
 * run only once in the beginning 
 * 
 * Generate grant token with scopes: 
 * ZohoCRM.modules.ALL,ZohoCRM.settings.ALL,aaaserver.profile.READ
 */

use zcrmsdk\oauth\ZohoOAuth;


if (isset($_GET['code'])){
    include_once 'includes.php';
    // Assign the email id access
    $_SERVER['user_email_id'] = $conf['currentUserEmail'];

    // empty the authtokens file
    $authTokenFile = dirname(__FILE__). "/log/zcrm_oauthtokens.txt";
    $fp = fopen($authTokenFile, 'w');
    fwrite($fp, '');
    fclose($fp);

    //Generating access tokens
    try {
        $oAuthClient = ZohoOAuth::getClientInstance();
        $grantToken = $_GET['code'];
        $oAuthTokens = $oAuthClient->generateAccessToken($grantToken);
        echo 'Token generated and app authorised successfully.';

    } catch (Exception $e) {
        echo "token did not generated:\n" . $e ;
    }
} else {
    $conf = include_once 'config.php';
    $redirect_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    echo "<a href='https://accounts.zoho.com/signin?servicename=AaaServer&serviceurl=%2Fdeveloperconsole' target='_blank'>Create App</a><br>\n";
    echo "redirect url : <code>{$redirect_link}</code> <br><br><br> \n";

    if (($conf['client_id'] == '') || ($conf['client_secret'] == '') || ($conf['redirect_uri'] == '')){
        echo "Please fill the credentials in config.php file.<br>\n";
        echo "<a target='_self' href='{$redirect_link}'>Recheck</a>";
    }else{
        $zcid = $conf['client_id'];
        echo "<a href='https://accounts.zoho.com/oauth/v2/auth?scope=ZohoCRM.modules.ALL,ZohoCRM.settings.ALL,aaaserver.profile.READ&client_id=$zcid&response_type=code&access_type=offline&prompt=consent&redirect_uri=$redirect_link' target='_self'>Click here to Authorize</a>";

    }

}

