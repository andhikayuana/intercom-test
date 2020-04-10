<?php

namespace Yuana\Helper;

use Yuana\Model\Point;

class GreatCircle 
{
    public static function distance(Point $pointCenter, Point $pointTarget)
    {
        return ( 6371.009 * acos((cos(deg2rad($pointCenter->lat)) ) * (cos(deg2rad($pointTarget->lat))) * (cos(deg2rad($pointTarget->lng) - deg2rad($pointCenter->lng)) )+ ((sin(deg2rad($pointCenter->lat))) * (sin(deg2rad($pointTarget->lat))))) );
    }
}
