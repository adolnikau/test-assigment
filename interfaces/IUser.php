<?php

namespace app\interfaces;

/**
 * Represent user model
 */
interface IUser
{
    /**
     * Return name of user
     *
     * @return string
     */
    public function getName() : string;

    /**
     * Return platform of user
     *
     * @return string
     */
    public function getPlatform() : string;

    /**
     * Return total fork count of user repos
     *
     * @return int
     */
    public function getTotalForkCount() : int;

    /**
     * Return total star count of user repos
     *
     * @return int
     */
    public function getTotalStarCount() : int;

    /**
     * Return total watcher count of user repos
     *
     * @return int
     */
    public function getTotalWatcherCount() : int;

    /**
     * Add repo to user
     *
     * @param string $name
     * @param Repo $repo
     * @return void
     */
    public function addRepo(string $name, IRepo $repo);

    /**
     * Del repo to user
     *
     * @param string $name
     * @return void
     */
    public function delRepo(string $name);
}
