<?php

declare(strict_types=1);

namespace Vjik\PhpErrorHandlerVsPropertyExistsBench;

final class Car
{
    public function __construct(
        public int $id
    ) {
    }
}