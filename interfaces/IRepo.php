<?php

namespace app\interfaces;

/**
 * Represent repo model
 */
interface IRepo
{
    /**
     * Return name of repo
     *
     * @return string
     */
    public function getName() : string;

    /**
     * Return fork count of repo
     *
     * @return int
     */
    public function getForkCount() : int;

    /**
     * Return star count of repo
     *
     * @return int
     */
    public function getStarCount() : int;

    /**
     * Return watcher count of repo
     *
     * @return int
     */
    public function getWatcherCount() : int;

}
