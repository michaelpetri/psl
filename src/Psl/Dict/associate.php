<?php

declare(strict_types=1);

namespace Psl\Dict;

use Psl;
use Psl\Vec;

use function count;

/**
 * Returns a new dict where each element in `$keys` maps to the
 * corresponding element in `$values`.
 *
 * @template Tk of array-key
 * @template Tv
 *
 * @param iterable<Tk> $keys
 * @param iterable<Tv> $values
 *
 * @throws Psl\Exception\InvariantViolationException If $keys and $values have different length.
 *
 * @return array<Tk, Tv>
 */
function associate(iterable $keys, iterable $values): array
{
    if (!is_array($keys)) {
        $keys = Vec\values($keys);
    }

    if (!is_array($values)) {
        $values = Vec\values($values);
    }

    if (count($keys) !== count($values)) {
        Psl\invariant_violation('Expected length of $keys and $values to be the same');
    }

    return array_combine($keys, $values);
}
