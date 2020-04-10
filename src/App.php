<?php

namespace Yuana;

use Yuana\Model\Customer;
use Yuana\Model\Point;
use Yuana\Constant;
use Yuana\Helper\GreatCircle;

class App
{
    /**
     * Read customers.txt from file
     * @param string $filePath
     */
    public function readCustomersFile($filePath)
    {
        if (!file_exists($filePath)) {
            throw new \Exception("$filePath not found!");
        }

        $lines = file($filePath);
        $results = array_map(function ($item) {
            return $this->parse($item);
        }, $lines);

        return $results;
    }

    /**
     * parse json to Customer Model
     * @param string $line json format
     */
    private function parse($line)
    {
        $decoded = json_decode($line);
        return new Customer(
            $decoded->latitude,
            $decoded->longitude,
            $decoded->name,
            $decoded->user_id
        );
    }

    /**
     * @param array $customers
     */
    public function getInvitedCustomers(array $customers)
    {
        $results = $this->calculateDistance($customers);

        $filtered = $this->filter($results);
        
        $results = array_map(function ($item) {
            unset($item['distance']);
            return $item;
        }, $filtered);

        sort($results);

        $this->writeOutput($results);
        
        return $results;
    }

    /**
     * @param array $customers that invited and to be write to file
     */
    private function writeOutput(array $customers)
    {
        if (!file_exists(Constant::TMP_DIR)) {
            mkdir(Constant::TMP_DIR);
        }

        if (file_exists(Constant::TEST_OUTPUT_FILE)) {
            unlink(Constant::TEST_OUTPUT_FILE);
        }

        foreach ($customers as $customer) {
            file_put_contents(
                Constant::TEST_OUTPUT_FILE,
                json_encode($customer). "\n",
                FILE_APPEND | LOCK_EX
            );
        }
    }

    private function getDublinPoint()
    {
        $dublin = Constant::DUBLIN_OFFICE;
        return new Point($dublin['lat'], $dublin['lng']);
    }

    private function calculateDistance(array $customers)
    {
        return array_map(function ($customer) {
            return [
                'user_id' => $customer->user_id,
                'name' => $customer->name,
                'distance' => GreatCircle::distance($this->getDublinPoint(), $customer->point)
            ];
        }, $customers);
    }

    /**
     * @param array $customes result from method calculateDistance()
     */
    private function filter(array $customers)
    {
        return array_filter($customers, function ($item) {
            return $item['distance'] <= Constant::RADIUS_WITHIN;
        });
    }
}
