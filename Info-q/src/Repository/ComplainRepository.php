<?php

namespace App\Repository;

use App\Entity\Complain;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Complain|null find($id, $lockMode = null, $lockVersion = null)
 * @method Complain|null findOneBy(array $criteria, array $orderBy = null)
 * @method Complain[]    findAll()
 * @method Complain[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ComplainRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Complain::class);
    }

    // /**
    //  * @return Complain[] Returns an array of Complain objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Complain
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
