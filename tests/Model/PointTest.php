<?php

use PHPUnit\Framework\TestCase;
use Yuana\Model\Point;
use Yuana\Constant;

/**
 * @covers Yuana\Model\Point
 */
class PointTest extends TestCase
{
    public function setUp() : void
    {
    }

    public function tearDown() : void
    {
    }

    public function testGivenValidPropertiesShouldSuccessConstructNewObject()
    {
        $pointSample = Constant::DUBLIN_OFFICE;
        $pointModel = new Point($pointSample['lat'], $pointSample['lng']);

        $this->assertInstanceOf(Point::class, $pointModel);

        $this->assertIsFloat($pointModel->lat);
        $this->assertIsFloat($pointModel->lng);

        $this->assertEquals($pointSample['lat'], $pointModel->lat);
        $this->assertEquals($pointSample['lng'], $pointModel->lng);
        
    }

    public function testGivenInvalidTypePropertiesShourldGetTypeError()
    {
        $this->expectException(\TypeError::class);

        $pointModel = new Point(null, null);
    }

    public function testGivenInvalidPropertyButValidTypeShouldGetException()
    {
        $this->expectException(\Exception::class);

        $pointModel = new Point(floatval(null), floatval(null));
    }

    public function testGivenInvalidPropertyButValidTypeShouldGetException2()
    {
        $this->expectException(\Exception::class);

        $pointModel = new Point(floatval(1), floatval(null));
    }
}
