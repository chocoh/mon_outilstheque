<?php

namespace App\DataFixtures;

use App\Entity\Messages;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class Messagesfixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
      for ($i = 0; $i < 5; $i++){
        $faker = Faker\Factory::create('fr_FR');
        $messages= new Messages();
        $messages->setMessage($faker->text);
        $messages->setDateEnvoi($faker->dateTime);
        // $messages->setPreteur($faker->);
        // $messages->setEmprunteur($faker->);

        $manager->persist($messages);
      }

        $manager->flush();
    }
}
