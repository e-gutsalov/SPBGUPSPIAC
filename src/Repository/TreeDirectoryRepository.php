<?php

namespace App\Repository;

use App\Entity\TreeDirectory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TreeDirectory>
 *
 * @method TreeDirectory|null find($id, $lockMode = null, $lockVersion = null)
 * @method TreeDirectory|null findOneBy(array $criteria, array $orderBy = null)
 * @method TreeDirectory[]    findAll()
 * @method TreeDirectory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TreeDirectoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TreeDirectory::class);
    }

//    /**
//     * @return TreeDirectory[] Returns an array of TreeDirectory objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TreeDirectory
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
