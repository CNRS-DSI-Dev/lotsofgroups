<?php

/**
 * ownCloud - LotsOfGroups
 *
 * @author Patrick Paysant <ppaysant@linagora.com>
 * @copyright 2014 CNRS DSI
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

namespace OCA\LotsOfGroups\Service;

class GroupsService
{

    protected $userManager;
    protected $userSession;

    public function __construct(\OCP\IUserManager $userManager, \OCP\IUserSession $userSession)
    {
        $this->userManager = $userManager;
        $this->userSession = $userSession;
    }

    /**
     * Returns a list of admin and normal groups
     * @param string $search
     * @param string $filter
     * @return array
     */
    public function groups($search='', $filter='')
    {
        $groupManager = \OC::$server->getGroupManager();

        $isAdmin = \OC_User::isAdminUser(\OCP\User::getUser());

        $groupsInfo = new \OC\Group\MetaData(\OC_User::getUser(), $isAdmin, $groupManager, $this->userSession);
        $groupsInfo->setSorting($groupsInfo::SORT_USERCOUNT);
        list($adminGroup, $groups) = $groupsInfo->get($search);

        if (!empty($filter)) {
            foreach($groups as $key => $group) {
                if (strpos($group['id'], $filter) !== false) {
                    unset($groups[$key]);
                }
            }
        }

        return array(
            'adminGroups' => $adminGroup,
            'groups' => $groups,
        );
    }
}
