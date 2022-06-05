<?php

declare(strict_types=1);

ini_set('memory_limit', '-1');
include_once 'common.php';

$data = [];

for ($i = 1; $i <= 99999999; $i++) {
    $data[] = $i;
}


/**
 * Receives a data set and returns the index of the searched element or null if not found
 * @param array $data
 * @param int $elementToSearch
 * @return int|null
 */
function linearSearch(array $data, int $elementToSearch): ?int
{
    foreach ($data as $index => $value) {
        if ($value === $elementToSearch) {
            return $index;
        }
    }
    return null;
}

$elementToSearch = 99999999;
$start = microtime_float();
echo sprintf('Searching: %s', $elementToSearch);
$result = linearSearch($data, $elementToSearch);
$end = microtime_float();
echo "\n";
echo sprintf('Finished in %s sec: %s', (string)$end - $start, $result ? 'Item found at index ' . $result : 'Item not found');

