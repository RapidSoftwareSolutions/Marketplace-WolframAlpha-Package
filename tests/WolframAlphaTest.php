<?php
namespace Tests;

require_once(__DIR__ . '/../src/Models/checkRequest.php');

class WolframAlphaTest extends BaseTestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testRoutes($url) {
        $response = $this->runApp("POST", '/api/WolframAlpha/'.$url);

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function dataProvider() {
        return [
            ['createQuery']
        ];
    }
}