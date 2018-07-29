<?php

namespace src\TrulyBigNumber;

use InvalidArgumentException;

/**
 * @param string $number
 * @return bool
 */
function validate(string $number): bool
{
    return (1 !== preg_match ("/^[1-9][0-9].*?$/", $number));
}

/**
 * @param string $first
 * @param string $second
 * @return string
 */
function sum(string $first, string $second): string
{
    if (!validate($first)) {
        throw new InvalidArgumentException(sprintf('%s, not a valid big number', $first));
    }

    if (!validate($second)) {
        throw new InvalidArgumentException(sprintf('%s, not a valid big number', $second));
    }

    if (\strlen($first) > \strlen($second)) {
        [ $first, $second ] = [ $second, $first ];
    }

    $result = '';

    $n1 = \strlen($first);
    $n2 = \strlen($second);

    $first = strrev($first);
    $second = strrev($second);

    $carry = 0;
    for ($i=0; $i<$n1; $i++)
    {
        $sum = ( (int)$first{$i} + (int)$second{$i} + $carry );
        $result = (string)($sum%10) . $result;
        $carry = intdiv($sum, 10);
    }

    for ($i=$n1; $i<$n2; $i++)
    {
        $sum = ( (int)$second{$i} + (int)$carry );
        $result = (string)($sum%10) . $result;
        $carry = intdiv($sum, 10);
    }

    if ($carry) {
        $result = $carry . $result;
    }

    return $result;
}
