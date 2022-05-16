<?php

declare(strict_types=1);

namespace App\Services\Utilities;

final class CollectorHelper
{
    /**
     * @param iterable<mixed> $items
     *
     * @return iterable<mixed>
     */
    public static function filterByClass(iterable $items, string $class): iterable
    {
        foreach ($items as $item) {
            if ($item instanceof $class) {
                yield $item;
            }
        }
    }
}
