<?php

namespace App\Repository;

use App\Entity\Registreren;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Registreren|null find($id, $lockMode = null, $lockVersion = null)
 * @method Registreren|null findOneBy(array $criteria, array $orderBy = null)
 * @method Registreren[]    findAll()
 * @method Registreren[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RegistrerenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Registreren::class);
    }

    // /**
    //  * @return Registreren[] Returns an array of Registreren objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Registreren
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
