<?php

namespace App\DataFixtures;

use App\Entity\Emprunt;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;


class Empruntfixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
      for ($i = 0; $i < 5; $i++){
        $faker = Faker\Factory::create('fr_FR');
        $emprunt= new Emprunt();
        $emprunt->setDateDebut($faker->dateTimeBetween);
        $emprunt->setDateFin($faker->dateTimeInInterval);
        $emprunt->setAvis($faker->text);
        $emprunt->setAvis($faker->text);

        $manager->persist($emprunt);
      }

        $manager->flush();
    }
}
