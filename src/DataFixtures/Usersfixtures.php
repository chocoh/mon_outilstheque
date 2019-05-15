<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
Use Faker;

class Usersfixtures extends Fixture
{

     private $passwordEncoder;

     public function __construct(UserPasswordEncoderInterface $passwordEncoder)
     {
        $this->passwordEncoder = $passwordEncoder;
     }

      public function load(ObjectManager $manager)
      {
        for ($i = 0; $i < 5; $i++){
          $faker = Faker\Factory::create('fr_FR');
          $users = new Users();
          $users->setEmail($faker->email);
          $users->setPassword($this->passwordEncoder->encodePassword($users,'admin'));
          $users->setNom($faker->lastName);
          $users->setPrenom($faker->firstName);
          $users->setAdresse($faker->streetAddress);
          $users->setPseudo($faker->userName);
          $users->setAvatar($faker->imageUrl);

          $manager->persist($users);
        }

        $manager->flush();
      }
  }
