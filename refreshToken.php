<?php

require_once(__DIR__ . '/vendor/autoload.php');
use QuickBooksOnline\API\DataService\DataService;



function refreshToken()
{

    // Create SDK instance
    $config = include('qb-config.php');
    $qbAuth = new QBAuth(__DIR__ . '/log/');

     /*
     * Retrieve the accessToken value from session variable
     */
    $accessToken = $qbAuth->getToken();
    $dataService = DataService::Configure(array(
        'auth_mode' => 'oauth2',
        'ClientID' => $config['client_id'],
        'ClientSecret' =>  $config['client_secret'],
        'RedirectURI' => $config['oauth_redirect_uri'],
        'baseUrl' => "development",
        'refreshTokenKey' => $accessToken->getRefreshToken(),
        'QBORealmID' => "The Company ID which the app wants to access",
    ));

    /*
     * Update the OAuth2Token of the dataService object
     */
    $OAuth2LoginHelper = $dataService->getOAuth2LoginHelper();
    $refreshedAccessTokenObj = $OAuth2LoginHelper->refreshToken();
    $dataService->updateOAuth2Token($refreshedAccessTokenObj);

    $qbAuth->setToken($refreshedAccessTokenObj);

    print_r($refreshedAccessTokenObj);
    return $refreshedAccessTokenObj;
}

return refreshToken();
