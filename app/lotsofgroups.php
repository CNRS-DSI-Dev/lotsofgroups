<?php

/**
 * ownCloud - LotsOfGroups
 *
 * @author Patrick Paysant <ppaysant@linagora.com>
 * @copyright 2014 CNRS DSI
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

namespace OCA\LotsOfGroups\App;

use \OCP\AppFramework\App;
use \OCA\LotsOfGroups\Controller\SettingsController;
use \OCA\LotsOfGroups\Controller\APIGroupsController;
use \OCA\LotsOfGroups\Service\GroupsService;

class LotsOfGroups extends App
{
    /**
     * Define your dependencies in here
     */
    public function __construct(array $urlParams=array())
    {
        parent::__construct('lotsofgroups', $urlParams);

        $container = $this->getContainer();

        /**
         * Controllers
         */
        $container->registerService('SettingsController', function($c) {
            return new SettingsController(
                $c->query('AppName'),
                $c->query('Request'),
                $c->query('L10N')
            );
        });

        $container->registerService('APIGroupsController', function($c){
            return new APIGroupsController(
                $c->query('AppName'),
                $c->query('Request'),
                $c->query('CoreConfig'),
                $c->query('UserId'),
                $c->query('GroupsService')
            );
        });

        /**
         * Services
         */
        $container->registerService('GroupsService', function($c){
            return new GroupsService(
                $c->query('UserManager'),
                $c->query('UserSession')
            );
        });

        /**
         * Core
         */
        $container->registerService('UserManager', function($c) {
            return $c->query('ServerContainer')->getUserManager();
        });

        $container->registerService('UserSession', function($c) {
            return $c->query('ServerContainer')->getUserSession();
        });

        $container->registerService('UserId', function($c) {
            return \OCP\User::getUser();
        });

        $container->registerService('CoreConfig', function($c) {
            return $c->query('ServerContainer')->getConfig();
        });
        $container->registerService('L10N', function($c) {
            return $c->query('ServerContainer')->getL10N($c->query('AppName'));
        });

    }
}
