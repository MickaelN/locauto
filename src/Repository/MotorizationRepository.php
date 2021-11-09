<?php

namespace App\Repository;

use App\Entity\Motorization;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Motorization|null find($id, $lockMode = null, $lockVersion = null)
 * @method Motorization|null findOneBy(array $criteria, array $orderBy = null)
 * @method Motorization[]    findAll()
 * @method Motorization[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MotorizationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Motorization::class);
    }

    // /**
    //  * @return Motorization[] Returns an array of Motorization objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Motorization
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
