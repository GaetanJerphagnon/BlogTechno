<?php

namespace App\Tests;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testIsTrue(): void
    {
        $user = new User();

        $user->setEmail('true@test.com')
             ->setFirstname('prenom')
             ->setLastname('nom')
             ->setPassword('password')
             ->setDetails('details')
             ->setBirthday($bday = new \DateTime());

            $this->assertTrue($user->getEmail() === 'true@test.com' );
            $this->assertTrue($user->getFirstname() === 'prenom' );
            $this->assertTrue($user->getLastname() === 'nom' );
            $this->assertTrue($user->getPassword() === 'password' );
            $this->assertTrue($user->getDetails() === 'details' );
            $this->assertTrue($user->getBirthday() === $bday );
    }

    public function testIsFalse(): void
    {
        $user = new User();

        $user->setEmail('true@test.com')
             ->setFirstname('prenom')
             ->setLastname('nom')
             ->setPassword('password')
             ->setDetails('details')
             ->setBirthday($bday = new \DateTime());

            $this->assertFalse($user->getEmail() === 'false@test.com' );
            $this->assertFalse($user->getFirstname() === 'false' );
            $this->assertFalse($user->getLastname() === 'false' );
            $this->assertFalse($user->getPassword() === 'false' );
            $this->assertFalse($user->getDetails() === 'false' );
            $this->assertFalse($user->getBirthday() === 'false' );
    }

    public function testIsEmpty(): void
    {
        $user = new User();

            $this->assertEmpty($user->getEmail());
            $this->assertEmpty($user->getFirstname());
            $this->assertEmpty($user->getLastname());
            $this->assertEmpty($user->getPassword());
            $this->assertEmpty($user->getDetails());
            $this->assertEmpty($user->getBirthday());
    }
}
