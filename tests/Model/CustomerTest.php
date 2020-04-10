<?php

use PHPUnit\Framework\TestCase;
use Yuana\Model\Customer;
use Yuana\Model\Point;
use Yuana\Constant;

/**
 * @covers Yuana\Model\Customer
 * @covers Yuana\Model\Point
 */
class CustomerTest extends TestCase
{
    public function setUp() : void
    {
    }

    public function tearDown() : void
    {
    }

    public function testGivenValidPropertiesShouldSuccessConstructNewObject()
    {
        $customerSample = json_decode(Constant::SAMPLE_CUSTOMER);
        $customerModel = new Customer(
            $customerSample->latitude,
            $customerSample->longitude,
            $customerSample->name,
            $customerSample->user_id
        );

        $this->assertInstanceOf(Customer::class, $customerModel);
        $this->assertInstanceOf(Point::class, $customerModel->point);

        $this->assertIsString($customerModel->name);
        $this->assertIsInt($customerModel->user_id);

        $this->assertEquals($customerSample->name, $customerModel->name);
        $this->assertEquals($customerSample->user_id, $customerModel->user_id);
    }

    public function testGivenInvalidTypePropertiesShourldGetTypeError()
    {
        $this->expectException(\TypeError::class);

        $customerModel = new Customer(null, null, null, null);
    }

    public function testGivenInvalidPropertyButValidTypeShouldGetException()
    {
        $this->expectException(\Exception::class);

        $customerModel = new Customer(123, 123, "", 0);
    }

    public function testGivenInvalidPropertyButValidTypeShouldGetException2()
    {
        $this->expectException(\Exception::class);

        $customerModel = new Customer(123, 123, "a", 0);
    }
}
