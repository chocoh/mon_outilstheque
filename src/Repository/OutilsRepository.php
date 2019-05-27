<?php

namespace App\Repository;

use App\Entity\Outils;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Outils|null find($id, $lockMode = null, $lockVersion = null)
 * @method Outils|null findOneBy(array $criteria, array $orderBy = null)
 * @method Outils[]    findAll()
 * @method Outils[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OutilsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Outils::class);
    }

    // /**
    //  * @return Outils[] Returns an array of Outils objects
    //  */

    public function allOutilsAndMedia()
    {
      // SELECT * FROM outils LEFT JOIN MEDIA ON outils.id=media.outil_id
      $conn=$this->getEntityManager()->getConnection();
      $sql='SELECT * FROM Outils LEFT JOIN Media ON Outils.id=Media.outil_id';
      $stmt=$conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }


    public function findOneBySomeField($value): ?Outils
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

}
