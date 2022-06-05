<?php

declare(strict_types=1);

function microtime_float(): float
{
    [$usec, $sec] = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}
