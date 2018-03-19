<?php
namespace Isign\Tests\Login;

use Isign\Login\MobileStatus;
use Isign\QueryInterface;
use Isign\Tests\TestCase;

class MobileStatusTest extends TestCase
{
    private $method;

    public function setUp()
    {
        $this->method = new MobileStatus('xxx');
    }
    
    public function testItExtendsAbstractStatusClass()
    {
        $this->assertInstanceOf('Isign\Login\AbstractStatus', $this->method);
    }

    public function testContainsToken()
    {
        $this->assertInstanceOf('Isign\TokenizedQueryInterface', $this->method);
        $this->assertSame('xxx', $this->method->getToken());
    }

    public function testGetFields()
    {
        $result = $this->method->getFields();

        $this->assertArrayHasKey('token', $result);
        $this->assertSame('xxx', $result['token']);
    }

    public function testGetAction()
    {
        $this->assertSame('mobile/login/status', $this->method->getAction());
    }

    public function testGetMethod()
    {
        $this->assertSame(QueryInterface::GET, $this->method->getMethod());
    }

    public function testCreateResult()
    {
        $this->assertInstanceOf('Isign\Login\MobileStatusResult', $this->method->createResult());
    }

    public function testHasValidationConstraints()
    {
        $collection = $this->method->getValidationConstraints();

        $this->assertInstanceOf(
            'Symfony\Component\Validator\Constraints\Collection',
            $collection
        );
    }
}
