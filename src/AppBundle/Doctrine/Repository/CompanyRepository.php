<?php


namespace AppBundle\Doctrine\Repository;

use Doctrine\ORM\EntityRepository;

class CompanyRepository extends EntityRepository
{

    public function getList($params)
    {
        $query = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('company.id')
            ->addSelect('company.idno')
            ->addSelect('company.title')
            ->addSelect('company.address')
            ->addSelect('company.director')
            ->from('AppBundle:Company', 'company')
            ->setMaxResults(100)
        ;
        if (isset($params['title'])) {
            $query->andWhere('company.title like :title')
                    ->setParameter('title', '%'.$params['title'].'%');
        }
        
        if (isset($params['address'])) {
            $query->andWhere('company.address like :address')
                    ->setParameter('address', '%'.$params['address'].'%');
        }
        
        if (isset($params['director'])) {
            $query->andWhere('company.director like :director')
                    ->setParameter('director', '%'.$params['director'].'%');
        }
        
        $data = $query->getQuery()->getArrayResult();
//        var_dump($query->getQuery()->getSQL());
//        die();
        
        return $data;
    }
}