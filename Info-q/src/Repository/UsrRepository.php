<?php

namespace App\Repository;

use App\Entity\Usr;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Usr|null find($id, $lockMode = null, $lockVersion = null)
 * @method Usr|null findOneBy(array $criteria, array $orderBy = null)
 * @method Usr[]    findAll()
 * @method Usr[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsrRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Usr::class);
    }

    // /**
    //  * @return Usr[] Returns an array of Usr objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Usr
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
