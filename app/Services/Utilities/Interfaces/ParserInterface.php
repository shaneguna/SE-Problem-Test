<?php

namespace App\Services\Utilities\Interfaces;

interface ParserInterface
{
    public function parse(array $data): bool|string;
}