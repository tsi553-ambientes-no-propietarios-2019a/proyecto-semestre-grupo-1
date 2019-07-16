<?php

namespace App\Repository;

use App\Entity\City;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method City|null find($id, $lockMode = null, $lockVersion = null)
 * @method City|null findOneBy(array $criteria, array $orderBy = null)
 * @method City[]    findAll()
 * @method City[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CityRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, City::class);
    }

    public function findByProvinceId($provincia_id)
    {

        $query = $this->getEntityManager()->createQuery("
        SELECT name, id
        FROM BackendBundle:DbMunicipio muni
        LEFT JOIN muni.provincia provin
        WHERE provin.id = :provincia_id
    ")->setParameter('provincia_id', $provincia_id);

        return $query->getArrayResult();
    }

    public function findByCountry($country_id)
    {
        return $this->createQueryBuilder('city')
            ->andWhere('city.country = :country')
            ->setParameter('country', $country_id)
            ->orderBy('city.name', 'ASC')
            ->getQuery()
            ->getArrayResult()
            ;
    }

// /**
//  * @return City[] Returns an array of City objects
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
    public function findOneBySomeField($value): ?City
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
