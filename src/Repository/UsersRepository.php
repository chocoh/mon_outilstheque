<?php

namespace App\Repository;

use App\Entity\Users;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Users|null find($id, $lockMode = null, $lockVersion = null)
 * @method Users|null findOneBy(array $criteria, array $orderBy = null)
 * @method Users[]    findAll()
 * @method Users[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsersRepository extends ServiceEntityRepository{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Users::class);
    }

    // /**
    //  * @return Users[] Returns an array of Users objects
    //  */

    public function allInfoUser()
    {
      $conn=$this->getEntityManager()->getConnection();
      $sql='SELECT `nom`,`prenom`,`adresse`,`zip_code`,`name`,`pseudo`,`avatar`
            FROM villes
            LEFT JOIN users ON villes.id = users.ville_id
            WHERE users.id';
      $stmt=$conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
        ;
    }



    // public function findOneBySomeField($value): ?Users
    // {
    //     return $this->createQueryBuilder('u')
    //         ->andWhere('u.exampleField = :val')
    //         ->setParameter('val', $value)
    //         ->getQuery()
    //         ->getOneOrNullResult()
    //     ;
    // }

}
