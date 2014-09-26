<?php

/**
 * ownCloud - LotsOfGroups
 *
 * @author Patrick Paysant <ppaysant@linagora.com>
 * @copyright 2014 CNRS DSI
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

namespace OCA\LotsOfGroups;

use \OCA\LotsOfGroups\App\LotsOfGroups;

$application = new LotsOfGroups();
$application->registerRoutes($this, array(
    'routes' => array(
        array(
            'name' => 'api_groups#groups',
            'url' => '/api/1.0/groups/{search}',
            'default' => array('search' => ''),
            'verb' => 'GET',
        ),
    ),
));