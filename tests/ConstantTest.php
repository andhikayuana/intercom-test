<?php

use PHPUnit\Framework\TestCase;
use Yuana\Constant;

/**
 * @covers Yuana\Constant
 */
class ConstantTest extends TestCase
{
    public function setUp() : void
    {
    }

    public function tearDown() : void
    {
    }

    public function testGivenConstantShouldExpected()
    {
        $ref = new \ReflectionClass(Constant::class);

        //Dublin lat
        $this->assertEquals(53.339428, $ref->getConstant('DUBLIN_OFFICE')['lat']);
        //Dublin lng
        $this->assertEquals(-6.257664, $ref->getConstant('DUBLIN_OFFICE')['lng']);

        // sample customer
        $sample = '{"latitude": "52.986375", "user_id": 12, "name": "Christina McArdle", "longitude": "-6.043701"}';
        $this->assertEquals($sample, $ref->getConstant('SAMPLE_CUSTOMER'));

        //storage directory name
        $this->assertEquals('storage', $ref->getConstant('STORAGE_DIR'));

        //input filename
        $this->assertEquals('customers.txt', $ref->getConstant('INPUT_FILENAME'));

        //test file
        $this->assertEquals('storage/customers.txt', $ref->getConstant('TEST_INPUT_FILE'));
    }
}