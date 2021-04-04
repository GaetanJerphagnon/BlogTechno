<?php

namespace App\Tests;

use App\Entity\Type;
use PHPUnit\Framework\TestCase;

class TypeTest extends TestCase
{
    public function testIsTrue(): void
    {
        $type = new Type();

        $type->setName('true')
             ->setDescription('description');

            $this->assertTrue($type->getName() === 'true' );
            $this->assertTrue($type->getDescription() === 'description' );
            $this->assertNotEmpty($type->getCreatedAt());
    }

    public function testIsFalse(): void
    {
        $type = new Type();

        $type->setName('true')
             ->setDescription('description');

            $this->assertFalse($type->getName() === 'false' );
            $this->assertFalse($type->getDescription() === 'false' );
            $this->assertFalse(!$type->getCreatedAt());
    }

    public function testIsEmpty(): void
    {
        $type = new Type();

            $this->assertEmpty($type->getName());
            $this->assertEmpty($type->getDescription());
            $this->assertEmpty(!$type->getCreatedAt());
    }
}
