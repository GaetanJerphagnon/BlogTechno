<?php

namespace App\Tests;

use App\Entity\Workout;
use DateTime;
use PHPUnit\Framework\TestCase;

class WorkoutTest extends TestCase
{
    public function testIsTrue(): void
    {
        $workout = new Workout();

        $workout->setName('true')
             ->setRating(5)
             ->setDoneAt($doneAt = new DateTime('now'))
             ->setIsDisplayed(true)
             ->setDescription('description');

            $this->assertTrue($workout->getName() === 'true' );
            $this->assertTrue($workout->getRating() === 5 );
            $this->assertTrue($workout->getIsDisplayed() === true );
            $this->assertTrue($workout->getDescription() === 'description' );
            $this->assertTrue($workout->getDoneAt() === $doneAt );
            $this->assertNotEmpty($workout->getCreatedAt());
    }

    public function testIsFalse(): void
    {
        $workout = new Workout();

        $workout->setName('true')
                ->setRating(5)
                ->setDoneAt(new DateTime('now'))
                ->setIsDisplayed(true)
                ->setDescription('description');

                $this->assertFalse($workout->getName() === 'false' );
                $this->assertFalse($workout->getRating() === 10 );
                $this->assertFalse($workout->getIsDisplayed() === false );
                $this->assertFalse($workout->getDescription() === 'false' );
                $this->assertFalse($workout->getDoneAt() === new DateTime('now') );
                $this->assertNotEmpty($workout->getCreatedAt());
    }

    public function testIsEmpty(): void
    {
        $workout = new Workout();

            $this->assertEmpty($workout->getName() === 'false' );
            $this->assertEmpty($workout->getRating() === 10 );
            $this->assertEmpty($workout->getIsDisplayed() === false );
            $this->assertEmpty($workout->getDescription() === 'false' );
            $this->assertEmpty($workout->getDoneAt() === new DateTime('now') );
            $this->assertEmpty(!$workout->getCreatedAt());
    }
}
