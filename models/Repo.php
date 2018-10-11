<?php

namespace app\models;

use \yii\base;

use app\interfaces;

/**
 * Repo implementation of interfaces\Repo
 */
class Repo extends base\Model implements interfaces\IRepo
{
    /**
     * Repo ctor
     *
     * @param string $name
     * @param int $forkCount
     * @param int $startCount
     * @param int $watcherCount
     */
    public function __construct($name, $forkCount, $startCount, $watcherCount)
    {
        $this->name = $name;
        $this->forkCount = $forkCount;
        $this->startCount = $startCount;
        $this->watcherCount = $watcherCount;
    }

    /**
     * @inheritDoc
     */
    public function __toString() : string
    {
        return "
            repo {$this->name}:
            🔀 {$this->forkCount}
            ★ {$this->startCount}
            👁️ {$this->watcherCount}
            <br/>
        ";
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
    public function getForkCount() : int
    {
        return $this->forkCount;
    }

    /**
     * @inheritDoc
     */
    public function getStarCount() : int
    {
        return $this->startCount;
    }

    /**
     * @inheritDoc
     */
    public function getWatcherCount() : int
    {
        return $this->watcherCount;
    }

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $forkCount;

    /**
     * @var int
     */
    private $startCount;

    /**
     * @var int
     */
    private $watcherCount;
}
