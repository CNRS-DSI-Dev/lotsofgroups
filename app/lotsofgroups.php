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
use \OCA\LotsOfGroups\Controller\APIGroupsController;
use \OCA\LotsOfGroups\Service\GroupsService;

class LotsOfGroups extends App {

    /**
     * Define your dependencies in here
     */
    public function __construct(array $urlParams=array()){
        parent::__construct('lotsofgroups', $urlParams);

        $container = $this->getContainer();

        $container->registerService('ApiGroupsController', function($c){
            return new APIGroupsController(
                $c->query('AppName'),
                $c->query('Request'),
                $c->query('CoreConfig'),
                $c->query('UserId'),
                $c->query('GroupsService')
            );
        });

        $container->registerService('GroupsService', function($c){
            return new GroupsService(
                $c->query('UserManager')
            );
        });

        /**
         * Core
         */
        $container->registerService('UserManager', function($c) {
            return $c->query('ServerContainer')->getUserManager();
        });

        $container->registerService('UserId', function($c) {
            return \OCP\User::getUser();
        });

        $container->registerService('CoreConfig', function($c) {
            return $c->query('ServerContainer')->getConfig();
        });

    }


}