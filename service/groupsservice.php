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

    public function __construct()
    {
        $this->userManager = $userManager;
    }

    /**
     * Returns a list of admin and normal groups
     * @param string $search
     * @param string $filter
     * @return array
     */
    public function groups($search='', $filter='')
    {
        $groupManager = \OC_Group::getManager();

        $isAdmin = \OC_User::isAdminUser(\OC_User::getUser());

        $groupsInfo = new \OC\Group\MetaData(\OC_User::getUser(), $isAdmin, $groupManager);
        $groupsInfo->setSorting($groupsInfo::SORT_USERCOUNT);
        list($adminGroup, $groups) = $groupsInfo->get($search);

        if (!empty($filter)) {
            foreach($groups as $key => $group) {
                if (strpos($group, $filter) !== false) {
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
