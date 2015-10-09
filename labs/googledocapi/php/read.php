<?php
session_start();
$token = json_decode($_SESSION['token'] );
$curl_handle = curl_init();
$base_url ="https://www.googleapis.com/drive/v2";
$action = "/files";
$url_token = "?access_token=".$token->access_token;
$url = $base_url . $action . $url_token;

  curl_setopt($curl_handle, CURLOPT_URL, $url);
  curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl_handle, CURLOPT_FOLLOWLOCATION, 1); // @todo fix this someday, v4 api is throwing a 301 redirect?
  $buffer = curl_exec($curl_handle);

  curl_close($curl_handle);
  
 
 /**
 * Gets the metadata and contents for the given file_id.
 */
$app->get('/svc', function() use ($app, $client, $service) {
  checkUserAuthentication($app);
  checkRequiredQueryParams($app, array('file_id'));
  $fileId = $app->request()->get('file_id');
  try {
    // Retrieve metadata for the file specified by $fileId.
    $file = $service->files->get($fileId);

    // Get the contents of the file.
    $request = new Google_HttpRequest($file->downloadUrl);
    $response = $client->getIo()->authenticatedRequest($request);
    $file->content = $response->getResponseBody();

    renderJson($app, $file);
  } catch (Exception $ex) {
    renderEx($app, $ex);
  }
});