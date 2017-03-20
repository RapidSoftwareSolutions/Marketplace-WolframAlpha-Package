<?php

$app->post('/api/WolframAlpha/createQuery', function ($request, $response) {
    /** @var \Slim\Http\Response $response */
    /** @var \Slim\Http\Request $request */
    /** @var \Models\checkRequest $checkRequest */

    $settings = $this->settings;
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'input']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $postData = $validateRes;
    }
    $params['appid'] = $postData['args']['apiKey'];
    $params['input'] = $postData['args']['input'];
    $params['output'] = 'json';


    if (isset($postData['args']['format']) && strlen($postData['args']['format']) > 0) {
        $params['format'] = $postData['args']['format'];
    }
    if (isset($postData['args']['includePodId']) && strlen($postData['args']['includePodId']) > 0) {
        $params['includepodid'] = $postData['args']['includePodId'];
    }
    if (isset($postData['args']['excludePodId']) && strlen($postData['args']['excludePodId']) > 0) {
        $params['excludepodid'] = $postData['args']['excludePodId'];
    }
    if (isset($postData['args']['podTitle']) && strlen($postData['args']['podTitle']) > 0) {
        $params['podtitle'] = $postData['args']['podTitle'];
    }
    if (isset($postData['args']['podIndex']) && strlen($postData['args']['podIndex']) > 0) {
        $params['podindex'] = $postData['args']['podIndex'];
    }
    if (isset($postData['args']['scanner']) && strlen($postData['args']['scanner']) > 0) {
        $params['scanner'] = $postData['args']['scanner'];
    }

    try {
        /** @var GuzzleHttp\Client $client */
        $client = $this->httpClient;
        $vendorResponse = $client->get($settings['apiUrl'], [
            'query' => $params
        ]);
        $vendorResponseBody = $vendorResponse->getBody()->getContents();
        if ($vendorResponse->getStatusCode() == '200') {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = json_decode($vendorResponse->getBody());
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = is_array($vendorResponseBody) ? $vendorResponseBody : json_decode($vendorResponseBody);
        }
    } catch (\GuzzleHttp\Exception\BadResponseException $exception) {
        $vendorResponseBody = $exception->getResponse()->getBody();
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = json_decode($vendorResponseBody);
    }

    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
});