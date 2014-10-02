<?php

/**
 * ownCloud - LotsOfGroups
 *
 * @author Patrick Paysant <ppaysant@linagora.com>
 * @copyright 2014 CNRS DSI
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

namespace OCA\LotsOfGroups\Lib;

class Helper
{
    /**
     * Verify if filter is enabled (see general settings screen, "Lots of Groups" section)
     * @return boolean
     */
    public static function isLotsOfGroupsFilterEnabled()
    {
        $appConfig = \OC::$server->getAppConfig();
        $result = $appConfig->getValue('lotsofgroups', 'lotsofgroups_filter_enabled', 'no');
        return ($result === 'yes') ? true : false;
    }

    /**
     * Get the filter
     * @return string
     */
    public static function getLotsOfGroupsFilter()
    {
        $result = '';

        if (self::isLotsOfGroupsFilterEnabled()) {
            $appConfig = \OC::$server->getAppConfig();
            $result = $appConfig->getValue('lotsofgroups', 'lotsofgroups_filter', 'GC_');

        }

        return $result;
    }

    /**
     * Set the filter
     * @param string $filter
     */
    public static function setLotsOfGroupsFilter($filter='')
    {
        if (self::isLotsOfGroupsFilterEnabled()) {
            $appConfig = \OC::$server->getAppConfig();
            $appConfig->setValue('lotsofgroups', 'lotsofgroups_filter', $filter);
        }
    }

    /**
     * Add the filter to the group name
     * @param string $gid Group name
     * @return string The filtered grouped name, if filter is enabled
     */
    public static function normalizeGroupName($gid)
    {
        $filter = self::getLotsOfGroupsFilter();

        return $filter . $gid;
    }
}