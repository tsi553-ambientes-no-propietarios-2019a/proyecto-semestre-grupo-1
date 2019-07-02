<?php

namespace App\Repository;

use App\Entity\Queja;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Queja|null find($id, $lockMode = null, $lockVersion = null)
 * @method Queja|null findOneBy(array $criteria, array $orderBy = null)
 * @method Queja[]    findAll()
 * @method Queja[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuejaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Queja::class);
    }

    // /**
    //  * @return Queja[] Returns an array of Queja objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('q.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Queja
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
