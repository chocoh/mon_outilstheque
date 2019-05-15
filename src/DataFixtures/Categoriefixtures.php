<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class Categoriefixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
      for ($i = 0; $i < 5; $i++){
        $faker = Faker\Factory::create('fr_FR');
        $categorie = new Categorie();
        $categorie->setDesignation($faker->word);
        $categorie->setType($faker->word);

        $manager->persist($categorie);
      }

        $manager->flush();
    }
}
