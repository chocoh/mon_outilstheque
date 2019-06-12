<?php

namespace App\DataFixtures;

use App\Entity\Media;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;


class Mediafixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
      for ($i = 0; $i < 5; $i++){
        $faker = Faker\Factory::create('fr_FR');
        $media= new Media();
        $media->seturlMedia($faker->imageUrl);

        $manager->persist($media);
      }

        $manager->flush();
    }
}
