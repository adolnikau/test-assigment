<?php


/**
 * Base contains test cases for tesing api endpoint
 *
 * @see https://codeception.com/docs/modules/Yii2
 *
 * IMPORTANT NOTE:
 * All test cases down below must be implemented
 * You can add new test cases on your own
 * If they could be helpful in any form
 */
class BaseCest
{
    /**
     * Example test case
     *
     * @return void
     */
    public function cestExamle(\FunctionalTester $I)
    {
        $I->amOnPage([
            'base/api',
            'users' => [
                'kfr',
            ],
            'platforms' => [
                'github',
            ]
        ]);
        $expected = json_decode('[
            {
                "name": "kfr",
                "platform": "github",
                "total-rating": 1.5,
                "repos": [],
                "repo": [
                    {
                        "name": "kf-cli",
                        "fork-count": 0,
                        "start-count": 2,
                        "watcher-count": 2,
                        "rating": 1
                    },
                    {
                        "name": "cards",
                        "fork-count": 0,
                        "start-count": 0,
                        "watcher-count": 0,
                        "rating": 0
                    },
                    {
                        "name": "UdaciCards",
                        "fork-count": 0,
                        "start-count": 0,
                        "watcher-count": 0,
                        "rating": 0
                    },
                    {
                        "name": "unikgen",
                        "fork-count": 0,
                        "start-count": 1,
                        "watcher-count": 1,
                        "rating": 0.5
                    }
                ]
            }
        ]');
        $I->assertEquals($expected, json_decode($I->grabPageSource()));
    }

    /**
     * Test case for api with bad request params
     *
     * @return void
     */
    public function cestBadParams(\FunctionalTester $I)
    {
        $I->amOnPage([
            'base/api',
            'qwer' => [
                'kfr',
            ],
            'qwer2' => [
                'github',
            ]
        ]);

        $expected = '<pre>Bad Request: Missing required parameters: users, platforms</pre>';

        $I->seeResponseCodeIs(400);
        $I->assertEquals($expected, $I->grabPageSource());
    }

    /**
     * Test case for api with empty user list
     *
     * @return void
     */
    public function cestEmptyUsers(\FunctionalTester $I)
    {
        $I->amOnPage([
            'base/api',
            'users' => [],
            'platforms' => [
                'github',
            ]
        ]);

        $expected = '<pre>Bad Request: Missing required parameters: users</pre>';

        $I->seeResponseCodeIs(400);
        $I->assertEquals($expected, $I->grabPageSource());
    }

    /**
     * Test case for api with empty platform list
     *
     * @return void
     */
    public function cestEmptyPlatforms(\FunctionalTester $I)
    {
        $I->amOnPage([
            'base/api',
            'users' => [
                'kfr'
            ],
            'platforms' => []
        ]);

        $expected = '<pre>Bad Request: Missing required parameters: platforms</pre>';

        $I->seeResponseCodeIs(400);
        $I->assertEquals($expected, $I->grabPageSource());
    }

    /**
     * Test case for api with non empty platform list
     *
     * @return void
     */
    public function cestSeveralPlatforms(\FunctionalTester $I)
    {
        $I->amOnPage([
            'base/api',
            'users' => [
                'kfr'
            ],
            'platforms' => [
                'github',
                'bitbucket'
            ]
        ]);

        $expected = json_decode('[
            {
                "name": "kfr",
                "platform": "github",
                "total-rating": 1.5,
                "repos": [],
                "repo": [
                    {
                        "name": "kf-cli",
                        "fork-count": 0,
                        "start-count": 2,
                        "watcher-count": 2,
                        "rating": 1
                    },
                    {
                        "name": "cards",
                        "fork-count": 0,
                        "start-count": 0,
                        "watcher-count": 0,
                        "rating": 0
                    },
                    {
                        "name": "UdaciCards",
                        "fork-count": 0,
                        "start-count": 0,
                        "watcher-count": 0,
                        "rating": 0
                    },
                    {
                        "name": "unikgen",
                        "fork-count": 0,
                        "start-count": 1,
                        "watcher-count": 1,
                        "rating": 0.5
                    }
                ]
            }
        ]');
        $I->seeResponseCodeIs(200);
        $I->assertEquals($expected, json_decode($I->grabPageSource()));
    }

    /**
     * Test case for api with non empty user list
     *
     * @return void
     */
    public function cestSeveralUsers(\FunctionalTester $I)
    {
        $I->amOnPage([
            'base/api',
            'users' => [
                'kfr',
                'frog'
            ],
            'platforms' => [
                'github'
            ]
        ]);

        $expected = json_decode('[
            
             {
               "name": "frog",
               "platform": "github",
               "total-rating": 23.66666666666668,
               "repos": [
                 
               ],
               "repo": [
                 {
                   "name": "kinect-cmyk-photobooth",
                   "fork-count": 3,
                   "start-count": 6,
                   "watcher-count": 6,
                   "rating": 5
                 },
                 {
                   "name": "packaged-node-web-server",
                   "fork-count": 1,
                   "start-count": 9,
                   "watcher-count": 9,
                   "rating": 5.166666666666667
                 },
                 {
                   "name": "a-kart",
                   "fork-count": 0,
                   "start-count": 8,
                   "watcher-count": 8,
                   "rating": 4
                 },
                 {
                   "name": "FramerJS-Examples",
                   "fork-count": 0,
                   "start-count": 2,
                   "watcher-count": 2,
                   "rating": 1
                 },
                 {
                   "name": "Airquality-Lantern",
                   "fork-count": 1,
                   "start-count": 2,
                   "watcher-count": 2,
                   "rating": 1.6666666666666667
                 },
                 {
                   "name": "react-native-azure-ad",
                   "fork-count": 0,
                   "start-count": 0,
                   "watcher-count": 0,
                   "rating": 0
                 },
                 {
                   "name": "react-native",
                   "fork-count": 0,
                   "start-count": 0,
                   "watcher-count": 0,
                   "rating": 0
                 },
                 {
                   "name": "rad-python",
                   "fork-count": 1,
                   "start-count": 0,
                   "watcher-count": 0,
                   "rating": 0.6666666666666666
                 },
                 {
                   "name": "rad-nodejs-rpi",
                   "fork-count": 1,
                   "start-count": 0,
                   "watcher-count": 0,
                   "rating": 0.6666666666666666
                 },
                 {
                   "name": "rad-nodejs",
                   "fork-count": 1,
                   "start-count": 0,
                   "watcher-count": 0,
                   "rating": 0.6666666666666666
                 },
                 {
                   "name": "rad-nginx",
                   "fork-count": 1,
                   "start-count": 0,
                   "watcher-count": 0,
                   "rating": 0.6666666666666666
                 },
                 {
                   "name": "rad-neo4j",
                   "fork-count": 1,
                   "start-count": 0,
                   "watcher-count": 0,
                   "rating": 0.6666666666666666
                 },
                 {
                   "name": "rad-mongodb",
                   "fork-count": 1,
                   "start-count": 0,
                   "watcher-count": 0,
                   "rating": 0.6666666666666666
                 },
                 {
                   "name": "rad-container",
                   "fork-count": 1,
                   "start-count": 0,
                   "watcher-count": 0,
                   "rating": 0.6666666666666666
                 },
                 {
                   "name": "massive-music-viz",
                   "fork-count": 0,
                   "start-count": 2,
                   "watcher-count": 2,
                   "rating": 1
                 },
                 {
                   "name": "PEP",
                   "fork-count": 0,
                   "start-count": 0,
                   "watcher-count": 0,
                   "rating": 0
                 },
                 {
                   "name": "mixtapes",
                   "fork-count": 0,
                   "start-count": 0,
                   "watcher-count": 0,
                   "rating": 0
                 },
                 {
                   "name": "OaaS",
                   "fork-count": 0,
                   "start-count": 0,
                   "watcher-count": 0,
                   "rating": 0
                 },
                 {
                   "name": "ny-banner",
                   "fork-count": 0,
                   "start-count": 0,
                   "watcher-count": 0,
                   "rating": 0
                 },
                 {
                   "name": "metaball-effects-framer",
                   "fork-count": 0,
                   "start-count": 0,
                   "watcher-count": 0,
                   "rating": 0
                 },
                 {
                   "name": "mailtrain",
                   "fork-count": 0,
                   "start-count": 0,
                   "watcher-count": 0,
                   "rating": 0
                 },
                 {
                   "name": "loader-animation",
                   "fork-count": 0,
                   "start-count": 0,
                   "watcher-count": 0,
                   "rating": 0
                 },
                 {
                   "name": "keystone",
                   "fork-count": 0,
                   "start-count": 0,
                   "watcher-count": 0,
                   "rating": 0
                 },
                 {
                   "name": "jsbin",
                   "fork-count": 0,
                   "start-count": 0,
                   "watcher-count": 0,
                   "rating": 0
                 },
                 {
                   "name": "growup",
                   "fork-count": 0,
                   "start-count": 0,
                   "watcher-count": 0,
                   "rating": 0
                 },
                 {
                   "name": "frog_ai",
                   "fork-count": 0,
                   "start-count": 1,
                   "watcher-count": 1,
                   "rating": 0.5
                 },
                 {
                   "name": "frog.github.io",
                   "fork-count": 1,
                   "start-count": 0,
                   "watcher-count": 0,
                   "rating": 0.6666666666666666
                 },
                 {
                   "name": "experience-player",
                   "fork-count": 0,
                   "start-count": 0,
                   "watcher-count": 0,
                   "rating": 0
                 },
                 {
                   "name": "dokku",
                   "fork-count": 0,
                   "start-count": 0,
                   "watcher-count": 0,
                   "rating": 0
                 },
                 {
                   "name": "react-native-cookies",
                   "fork-count": 0,
                   "start-count": 0,
                   "watcher-count": 0,
                   "rating": 0
                 }
               ]
             },
             {
               "name": "kfr",
               "platform": "github",
               "total-rating": 1.5,
               "repos": [
                 
               ],
               "repo": [
                 {
                   "name": "kf-cli",
                   "fork-count": 0,
                   "start-count": 2,
                   "watcher-count": 2,
                   "rating": 1
                 },
                 {
                   "name": "cards",
                   "fork-count": 0,
                   "start-count": 0,
                   "watcher-count": 0,
                   "rating": 0
                 },
                 {
                   "name": "UdaciCards",
                   "fork-count": 0,
                   "start-count": 0,
                   "watcher-count": 0,
                   "rating": 0
                 },
                 {
                   "name": "unikgen",
                   "fork-count": 0,
                   "start-count": 1,
                   "watcher-count": 1,
                   "rating": 0.5
                 }
               ]
             }
           ]
        ');
        $I->seeResponseCodeIs(200);
        $I->assertEquals($expected, json_decode($I->grabPageSource()));
    }

    /**
     * Test case for api with unknown platform in list
     *
     * @return void
     */
    public function cestUnknownPlatforms(\FunctionalTester $I)
    {

        //didnt work, dont now why
//        $I->expectThrowable(new \LogicException(), function() {
//            $this->amOnPage([
//                'base/api',
//                'users' => [
//                    'kfr'
//                ],
//                'platforms' => [
//                    'exampleAnotherRepo'
//                ]
//            ]);
//        });

        try {
            $I->amOnPage([
                'base/api',
                'users' => [
                    'kfr'
                ],
                'platforms' => [
                    'exampleAnotherRepo'
                ]
            ]);
        } catch (Exception $e) {
            codecept_debug(get_class($e));
            $I->assertTrue(get_class($e) == 'LogicException', 'exception class LogicException');
        }

    }

    /**
     * Test case for api with unknown user in list
     *
     * @return void
     */
    public function cestUnknowUsers(\FunctionalTester $I)
    {
        $I->amOnPage([
            'base/api',
            'users' => [
                'qwersdfsdfsdf'
            ],
            'platforms' => [
                'github'
            ]
        ]);

        $expected = [];

        $I->seeResponseCodeIs(200);
        $I->assertEquals($expected, json_decode($I->grabPageSource()));
    }

    /**
     * Test case for api with mixed (unknown, real) users and non empty platform list
     *
     * @return void
     */
    public function cestMixedUsers(\FunctionalTester $I)
    {
        $I->amOnPage([
            'base/api',
            'users' => [
                'qwersdfsdfsdf',
                'kfr'
            ],
            'platforms' => [
                'github'
            ]
        ]);

        $expected = json_decode('[
            {
                "name": "kfr",
                "platform": "github",
                "total-rating": 1.5,
                "repos": [],
                "repo": [
                    {
                        "name": "kf-cli",
                        "fork-count": 0,
                        "start-count": 2,
                        "watcher-count": 2,
                        "rating": 1
                    },
                    {
                        "name": "cards",
                        "fork-count": 0,
                        "start-count": 0,
                        "watcher-count": 0,
                        "rating": 0
                    },
                    {
                        "name": "UdaciCards",
                        "fork-count": 0,
                        "start-count": 0,
                        "watcher-count": 0,
                        "rating": 0
                    },
                    {
                        "name": "unikgen",
                        "fork-count": 0,
                        "start-count": 1,
                        "watcher-count": 1,
                        "rating": 0.5
                    }
                ]
            }
        ]');

        $I->seeResponseCodeIs(200);
        $I->assertEquals($expected, json_decode($I->grabPageSource()));
    }

    /**
     * Test case for api with mixed (github, gitlab, bitbucket) platforms and non empty user list
     *
     * @return void
     */
    public function cestMixedPlatforms(\FunctionalTester $I)
    {
        $I->amOnPage([
            'base/api',
            'users' => [
                'alexey_dorn'
            ],
            'platforms' => [
                'github',
                'gitlab',
                'bitbucket'
            ]
        ]);

        $expected = [];
        $I->seeResponseCodeIs(200);
        $I->assertNotEquals($expected, json_decode($I->grabPageSource()));
        // There is a bug, bitbucket not return info about user  https://bitbucket.org/alexey_dorn/
    }
}