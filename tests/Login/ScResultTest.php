<?php


namespace Isign\Login;

use Isign\Tests\TestCase;
use Isign\Tests\TestResultFieldsTrait;

class ScResultTest extends TestCase
{
    private $method;

    public function setUp()
    {
        $this->method = new ScResult();
    }

    use TestResultFieldsTrait;

    public function expectedFields()
    {
        return [
            ['status'],
            ['dtbs'],
            ['token'],
            ['name'],
            ['surname'],
            ['code'],
            ['country'],
            ['certificate'],
            ['algorithm'],
        ];
    }
}
