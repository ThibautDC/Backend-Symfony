<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $date = new \DateTimeImmutable(NULL);
        for ($i=0; $i < 30 ; $i++) {
            $category = new Category();
            $category->setTitle($faker->words(rand(1,3),true));
            $category->setDescription($faker->paragraph(3));
            $category->setSlug($i);
            $category->setDescription($faker->paragraph(1));
            $category->setCreatedAt($date);
            $category->setUpdatedAt($date);
            
            $manager->persist($category);
        }
        $manager->flush();
    }
}
