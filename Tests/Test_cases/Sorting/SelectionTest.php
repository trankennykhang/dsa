<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class SelectionTest extends TestCase
{
    public function testSelectionWithSmallData(): void
    {
        $a = 1;
        $this->assertSame(1, $a);
    }
}