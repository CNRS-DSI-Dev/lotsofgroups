<?php

/**
 * ownCloud - LotsOfGroups
 *
 * @author Patrick Paysant <ppaysant@linagora.com>
 * @copyright 2014 CNRS DSI
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

namespace OCA\LotsOfGroups\Controller;

use \OCP\AppFramework\APIController;
use \OCP\AppFramework\Http\JSONResponse;
use \OCP\IRequest;
use \OCP\IConfig;

use \OCA\LotsOfGroups\lib\Helper;

class APIGroupsController extends APIController
{

    protected $settings;
    protected $userId;
    protected $groupsService;

    public function __construct($appName, IRequest $request, IConfig $settings, $userId, $groupsService)
    {
        parent::__construct($appName, $request, 'GET');
        $this->settings = $settings;
        $this->userId = $userId;
        $this->groupsService = $groupsService;
    }

    /**
     * Return list of groups
     * @NoAdminRequired
     * @NoCSRFRequired
     * @CORS
     */
    public function groups($search='')
    {
        $groups = array();

        \OC_JSON::checkSubAdminUser();

        try {
            $groups = $this->groupsService->groups($search, Helper::getLotsOfGroupsFilter());
        } catch (Exception $e) {
            $response = new JSONResponse();
            return $response->setStatus(\OCA\AppFramework\Http::STATUS_NOT_FOUND);
        }

        return new JSONResponse($groups);
    }

}