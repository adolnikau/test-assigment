<?php

namespace app\models;

use \yii\base;
use yii\helpers\Html;

use app\interfaces;

/**
 * User implementation of interfaces\IUser
 */
class User extends base\Model implements interfaces\IUser
{
    /**
     * User ctor
     *
     * @param string $identifier
     * @param string $name
     * @param string $platform
     */
    public function __construct(string $identifier, string $name, string $platform)
    {
        $this->identifier = $identifier;
        $this->name = $name;
        $this->platform = $platform;
        $this->repositories = [];
    }

    /**
     * @inheritDoc
     */
    public function __toString() : string
    {
        $result = sprintf(
            "%-50s %4d 🏆\n%'=48s\n",
            $this->fullName,
            $this->totalRating,
            ""
        );
        foreach ($this->repositories as $repository) {
            $result .= (string)$repository . "\n";
        }
        return $result;
    }

    /**
     * @inheritDoc
     */
    public function getIdentifier() : string
    {
        return $this->identifier;
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
    public function getFullName() : string
    {
        return "{$this->name} ({$this->platform})";
    }

    /**
     * @inheritDoc
     */
    public function getTotalRating() : float
    {
        $rating = 0.0;
        foreach ($this->repositories as $repository) {
            $rating += $repository->getRating();
        }
        return $rating;
    }

    /**
     * Add repo to user
     *
     * @param interfaces\IRepo[] $repos
     * @return void
     */
    public function addRepos(array $repos)
    {
        $this->repositories = array_merge($this->repositories, $repos);
        usort($this->repositories, function ($repo1, $repo2) {
            return $repo2->getRating() - $repo1->getRating();
        });
    }

    /**
     * @var string
     */
    private $identifier;

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
