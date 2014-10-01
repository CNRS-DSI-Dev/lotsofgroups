<?php

/**
 * ownCloud - LotsOfGroups
 *
 * @author Patrick Paysant <ppaysant@linagora.com>
 * @copyright 2014 CNRS DSI
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

namespace OCA\LotsOfGroups;

use OCA\LotsOfGroups\App\LotsOfGroups;

\OC_Util::checkAdminUser();

$app = new LotsOfGroups;
$c = $app->getContainer();

// \OCP\Util::addScript('lotsofgroups', 'settings-admin');
$c->query('API')->addScript('settings-admin');

$tmpl = new \OCP\Template($c->query('AppName'), 'settings-admin');
$tmpl->assign('lotsOfGroupsFilterEnabled', Lib\Helper::isLotsOfGroupsFilterEnabled());
$tmpl->assign('lotsOfGroupsFilter', Lib\Helper::getLotsOfGroupsFilter());

return $tmpl->fetchPage();