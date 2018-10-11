<?php

namespace app\models;

use \yii\base;

use app\interfaces;

/**
 * User implementation of interfaces\IUser
 */
class User extends base\Model implements interfaces\IUser
{
    /**
     * User ctor
     *
     * @param string $name
     * @param string $platform
     */
    public function __construct(string $name, string $platform)
    {
        $this->name = $name;
        $this->platform = $platform;
        $this->repositories = [];
    }

    /**
     * @inheritDoc
     */
    public function __toString() : string
    {
        $result = "
            user {$this->name} from {$this->platform}:
            🔀 {$this->totalForkCount}
            ★ {$this->totalStarCount}
            👁️ {$this->totalWatcherCount}
            <br/>
        ";
        foreach ($this->repositories as $repository) {
            $result .= (string)$repository;
        }
        return $result;
    }

    /**
     * @inheritDoc
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @inheritDoc
     */
    public function getPlatform() : string
    {
        return $this->platform;
    }

    /**
     * @inheritDoc
     */
    public function getTotalForkCount() : int
    {
        $total = 0;
        foreach ($this->repositories as $repository) {
            $total += $repository->getForkCount();
        }
        return $total;
    }

    /**
     * @inheritDoc
     */
    public function getTotalStarCount() : int
    {
        $total = 0;
        foreach ($this->repositories as $repository) {
            $total += $repository->getStarCount();
        }
        return $total;
    }

    /**
     * @inheritDoc
     */
    public function getTotalWatcherCount() : int
    {
        $total = 0;
        foreach ($this->repositories as $repository) {
            $total += $repository->getWatcherCount();
        }
        return $total;
    }

    /**
     * @inheritDoc
     */
    public function addRepo(string $name, interfaces\IRepo $repo)
    {
        $this->repositories[$name] = $repo;
    }

    /**
     * @inheritDoc
     */
    public function delRepo(string $name)
    {
        unset($this->repositories);
    }

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $platform;

    /**
     * @var interfaces\Repo[]
     */
    private $repositories;
}
