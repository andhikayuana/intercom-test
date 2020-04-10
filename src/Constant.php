<?php

namespace Yuana;

class Constant
{
    const DUBLIN_OFFICE = [
        'lat' => 53.339428,
        'lng' => -6.257664
    ];
    const RADIUS_WITHIN = 100; //in KM
    const SAMPLE_CUSTOMER = '{"latitude": "52.986375", "user_id": 12, "name": "Christina McArdle", "longitude": "-6.043701"}';
    const STORAGE_DIR = 'storage';
    const TMP_DIR = 'tmp';
    const INPUT_FILENAME = 'customers.txt';
    const OUTPUT_FILENAME = 'output.txt';
    const TEST_INPUT_FILE = self::STORAGE_DIR . DIRECTORY_SEPARATOR . self::INPUT_FILENAME;
    const TEST_OUTPUT_FILE = self::TMP_DIR . DIRECTORY_SEPARATOR . self::OUTPUT_FILENAME;
}
