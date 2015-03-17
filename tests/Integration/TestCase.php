<?php
namespace Isign\Tests\Integration;

use Isign\Client;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

/**
 * Base test case
 */
class TestCase extends \PHPUnit_Framework_TestCase
{
    /** @var Client */
    protected $client;

    public function setUp()
    {
        $params = [
            'apiKey' => SANDBOX_API_KEY,
            'sandbox' => true,
        ];

        if (defined('SANDBOX_URL')) {
            $params['sandboxUrl'] = SANDBOX_URL;
        }

        $this->client = Client::create($params);
    }

    protected function sign($dtbs)
    {
        openssl_sign(base64_decode($dtbs), $signatureValue, PRIVATE_KEY_LOGIN, OPENSSL_ALGO_SHA1);

        return base64_encode($signatureValue);
    }
}
