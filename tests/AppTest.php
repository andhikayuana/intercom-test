<?php

use PHPUnit\Framework\TestCase;
use Yuana\App;
use Yuana\Constant;

/**
 * @covers Yuana\App
 * @covers Yuana\Model\Customer::__construct
 * @covers Yuana\Model\Point::__construct
 * @covers Yuana\Helper\GreatCircle::distance
 */
class AppTest extends TestCase
{
    private $app;

    public function setUp() : void
    {
        $this->app = new App;
    }

    public function tearDown() : void
    {
    }

    public function testGivenAppClassShouldSuccessCreateNewApp()
    {
        $this->assertInstanceOf(App::class, $this->app);
    }

    public function testGivenValidFileShouldValidItemCount()
    {
        $data = $this->app->readCustomersFile(Constant::TEST_INPUT_FILE);
        $this->assertIsArray($data);
        $this->assertEquals(32, count($data));
    }

    public function testGivenInvalidFileShouldGetException()
    {
        $this->expectException(\Exception::class);

        $data = $this->app->readCustomersFile('notfoundfile.txt');
    }

    public function testGivenValidFileShouldGetInvitedCustomers()
    {
        $customers = $this->app->readCustomersFile(Constant::TEST_INPUT_FILE);
        
        $this->assertIsArray($customers);
        $this->assertEquals(32, count($customers));

        $invitedCustomers = $this->app->getInvitedCustomers($customers);
        $this->assertIsArray($invitedCustomers);
        $this->assertEquals(16, count($invitedCustomers));
    }
}
