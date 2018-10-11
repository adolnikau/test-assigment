<?php

namespace app\components\platforms;

use Gitlab\Client;
use yii\base;

use app\components\platforms\api;
use app\interfaces;
use app\models;

/**
 * Gitlab implementation of interfaces\IPlatform
 */
class Gitlab extends base\Component implements interfaces\IPlatform
{
    /**
     * Gitlab platform ctor
     */
    public function __construct()
    {
        $this->api = new api\GitlabUsers(Client::create('https://gitlab.com'));
    }

    /**
     * @inheritDoc
     */
    public function findUserInfo(string $userName) : ? interfaces\IUser
    {
        /**
         * @see https://github.com/m4tthumphrey/php-gitlab-api/blob/master/lib/Gitlab/Api/Users.php#L23
         */
        $response = $this->api->all(['username' => $userName]);
        foreach ($response as $user) {
            if ($user['username'] == $userName) {
                return new models\User(
                    $user['id'],
                    $user['username'],
                    'gitlab'
                );
            }
        }
        return null;
    }

    /**
     * @inheritDoc
     */
    public function findUserRepos(string $user) : array
    {
        /**
         * @see https://github.com/m4tthumphrey/php-gitlab-api/blob/master/lib/Gitlab/Api/Users.php#L71
         */
        $result = [];
        $response = $this->api->usersProjects($user);
        foreach ($response as $repo) {
            $result[] = new models\GitlabRepo(
                $repo['name'],
                $repo['forks_count'],
                $repo['star_count']
            );
        }
        return $result;
    }

    /**
     * @var api\components\api\GitlabUsers
     */
    private $api;
}
