<?php

namespace App\Repository;

use App\Entity\Project;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Cache\Adapter\RedisAdapter;

/**
 * @extends ServiceEntityRepository<Project>
 *
 * @method Project|null find($id, $lockMode = null, $lockVersion = null)
 * @method Project|null findOneBy(array $criteria, array $orderBy = null)
 * @method Project[]    findAll()
 * @method Project[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjectRepository extends ServiceEntityRepository
{
    private readonly RedisAdapter $cache;
    public function __construct(ManagerRegistry $managerRegistry)
    {
        parent::__construct($managerRegistry, Project::class);
        $this->cache = new RedisAdapter(
            RedisAdapter::createConnection($_ENV['REDIS_URL'])
        );
    }

    public function add(Project $project, bool $flush = true): void
    {
        $this->_em->persist($project);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function remove(Project $project, bool $flush = true): void
    {
        $this->_em->remove($project);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function findAllCached(): array
    {
        return $this->cache->get('allProjects', fn() => $this->findAll());
    }
}
