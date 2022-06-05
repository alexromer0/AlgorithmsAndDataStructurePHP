<?php

declare(strict_types=1);
ini_set('memory_limit', '-1');
include_once 'common.php';

$data = [];

for ($i = 1; $i <= 99999999; $i++) {
    $data[] = $i;
}

/**
 * Receives an ordered data set and returns the index of the searched element or null if not found
 * @param array $data
 * @param int $elementToSearch
 * @param int $lowLimit
 * @param int $bigLimit
 * @return int|null
 */
function binarySearch(array $data, int $elementToSearch, int $lowLimit, int $bigLimit): ?int
{
    if ($lowLimit <= $bigLimit) {
        $middlePoint = (int)floor($lowLimit + ($bigLimit - $lowLimit) / 2);
        if ($data[$middlePoint] === $elementToSearch) {
            return $middlePoint;
        }
        if ($data[$middlePoint] < $elementToSearch) {
            return binarySearch($data, $elementToSearch, $middlePoint + 1, $bigLimit);
        }

        return binarySearch($data, $elementToSearch, $lowLimit, $middlePoint - 1);
    }
    return null;
}

$elementToSearch = 99999999;
$start = microtime_float();
echo sprintf('Searching: %s', $elementToSearch);
$result = binarySearch($data, $elementToSearch, 0, count($data));
$end = microtime_float();
echo "\n";
echo sprintf('Finished in %s sec: %s', (string)$end - $start, $result ? 'Item found at index ' . $result : 'Item not found');

