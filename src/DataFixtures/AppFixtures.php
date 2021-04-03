<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $loader = new CustomNativeLoader();
        $fixtures = $loader->loadFile(__DIR__.'/data.yml')->getObjects();

        $fixtures["gaetan"]->setBirthday(new \Datetime('1992-06-03'));

        // Flush each 20th entry
        $batchSize = 20;
        $i=1;
        foreach ($fixtures as $fix) {
            $manager->persist($fix);

            if(($i % $batchSize) === 0){
                $manager->flush();
            }
            $i++;

        };

        $manager->flush();
    }
}
