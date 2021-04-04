<?php

namespace App\Tests;

use App\Entity\Techno;
use PHPUnit\Framework\TestCase;

class TechnoTest extends TestCase
{
    public function testIsTrue(): void
    {
        $techno = new Techno();

        $techno->setName('true')
             ->setImage('true.png');

            $this->assertTrue($techno->getName() === 'true' );
            $this->assertTrue($techno->getImage() === 'true.png' );
            $this->assertNotEmpty($techno->getCreatedAt());
    }

    public function testIsFalse(): void
    {
        $techno = new Techno();

        $techno->setName('true')
             ->setImage('true.png');

            $this->assertFalse($techno->getName() === 'false' );
            $this->assertFalse($techno->getImage() === 'false' );
            $this->assertFalse(!$techno->getCreatedAt());
    }

    public function testIsEmpty(): void
    {
        $techno = new Techno();

            $this->assertEmpty($techno->getName());
            $this->assertEmpty(!$techno->getImage());
            $this->assertEmpty(!$techno->getCreatedAt());
    }
}
