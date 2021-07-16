<?php

namespace App\Repository;

use App\Entity\ListContent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ListContent|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListContent|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListContent[]    findAll()
 * @method ListContent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListContentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListContent::class);
    }

    // /**
    //  * @return ListContent[] Returns an array of ListContent objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ListContent
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
