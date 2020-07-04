<?php

declare(strict_types=1);

namespace App\Domain\ValueObject\Document;

interface DocumentInterface
{
    public function getNumber(): string;

    public static function isValidNumber(string $number): bool;
}