<?php

namespace app\components\platforms;

use Bitbucket\API;
use yii\base;

use app\interfaces;
use app\models;

/**
 * Bitbucket implementation of interfaces\IPlatform
 */
class Bitbucket extends base\Component implements interfaces\IPlatform
{
    /**
     * Bitbucket platform ctor
     */
    public function __construct()
    {
        $this->api = new Api\Users();
    }

    /**
     * @inheritDoc
     */
    public function findUserInfo(string $userName) : ? interfaces\IUser
    {
        /**
         * @see https://bitbucket.org/gentlero/bitbucket-api/src/8aa84ffbe0846da6a05fc89cdfbc159c622e9a4e/lib/Bitbucket/API/Users.php?at=develop&fileviewer=file-view-default#Users.php-31
         */
        $response = $this->api->get($userName);
        $response = json_decode($response->getContent(), true);
        if (array_key_exists('username', $response)) {
            return new models\User(
                $response['username'],
                $response['username'],
                'bitbucket'
            );
        }
        return null;
    }

    /**
     * @inheritDoc
     */
    public function findUserRepos(string $user) : array
    {
        /**
         * @see https://github.com/KnpLabs/php-github-api/blob/master/doc/repos.md#get-the-repositories-of-a-specific-user
         */
        $result = [];
        $response = $this->api->repositories($user);
        $response = json_decode($response->getContent(), true);
        foreach ($response['values'] as $repo) {
            $result[] = new models\BitbucketRepo(
                $repo['name'],
                count($repo['links']['forks']),
                count($repo['links']['watchers'])
            );
        }
        return $result;
    }

    /**
     * @var Bitbucket\API\Users
     */
    private $api;
}
