<?php

/**
 * ownCloud - LotsOfGroups
 *
 * @author Patrick Paysant <ppaysant@linagora.com>
 * @copyright 2014 CNRS DSI
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

namespace OCA\LotsOfGroups;

// use \OCA\LotsOfGroups\App\LotsOfGroups;

$app = new \OCA\LotsOfGroups\App\LotsOfGroups;
$c = $app->getContainer();

/**
 * register settings
 */
\OCP\App::registerAdmin($c->query('AppName'), 'settings/settings-admin');