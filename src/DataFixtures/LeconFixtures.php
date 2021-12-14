<?php

namespace App\DataFixtures;

use App\Entity\Lecon;
use DateTimeImmutable;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker\Factory;

class LeconFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $date = new \DateTimeImmutable(NULL);
        for ($i=0; $i < 10 ; $i++) {
            $lecon = new Lecon();
            $lecon->setNom($faker->words(rand(1,3),true));
            $lecon->setDescription($faker->paragraph(1));
            $lecon->setSlug($i);
            $lecon->setCreatedAt($date);
            $lecon->setUpdatedAt($date);
            $manager->persist($lecon);
        }
        
        $manager->flush();
    }
}
