<?php

namespace App\DataFixtures;

use App\Entity\Outils;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class Outilsfixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
      for ($i = 0; $i < 5; $i++){
        $faker = Faker\Factory::create('fr_FR');
        $outils= new Outils();
        $outils->setNomOutil($faker->title);
        $outils->setDescriptifs($faker->text);
        $outils->setDateEnregistrement($faker->dateTime);
        $outils->setDureeEmprunt($faker->randomNumber(1));

        $manager->persist($outils);
      }

        $manager->flush();
    }
}
