<?php

use PHPUnit\Framework\TestCase;
use Yuana\Helper\GreatCircle;
use Yuana\Constant;
use Yuana\Model\Point;

/**
 * @covers Yuana\Helper\GreatCircle
 * @covers Yuana\Model\Point::__construct
 */
class GreatCircleTest extends TestCase
{
    public function setUp() : void
    {
    }

    public function tearDown() : void
    {
    }

    public function testGivenValidDataShouldSuccessCalculate()
    {
        $dublin = Constant::DUBLIN_OFFICE;
        $pointCenter = new Point($dublin['lat'], $dublin['lng']);
        
        //sample point
        $pointTarget = new Point(52.986375, -6.043701);

        //calculate
        $distance = GreatCircle::distance($pointCenter, $pointTarget);

        $this->assertEquals(41.768784505523, $distance);   
    }

    public function testGivenInvalidDataShouldGetException()
    {
        $this->expectException(\TypeError::class);

        $distance = GreatCircle::distance(null, null);
    }
}
