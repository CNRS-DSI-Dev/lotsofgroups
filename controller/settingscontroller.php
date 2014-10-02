<?php

/**
 * ownCloud - LotsOfGroups
 *
 * @author Patrick Paysant <ppaysant@linagora.com>
 * @copyright 2014 CNRS DSI
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

namespace OCA\LotsOfGroups\Controller;

use \OCP\AppFramework\Controller;
use \OCP\AppFramework\Http\JSONResponse;
use \OCP\IRequest;
use \OCP\IL10N;

use \OCA\LotsOfGroups\lib\Helper;

Class SettingsController extends Controller
{
    protected $trans;

    public function __construct($appName, IRequest $request, IL10N $trans)
    {
        parent::__construct($appName, $request);

        $this->trans = $trans;
    }

    public function getLanguageCode() {
        return $this->trans->getLanguageCode();
    }

    public function filter($lotsofgroups_filter)
    {
        \OC_Util::checkAdminUser();

        $prefix = $_POST['group_custom_name_prefix'];
        try {
            Helper::setLotsOfGroupsFilter($lotsofgroups_filter);

            return new JSONResponse(array(
                'status' => 'success',
                'data' => array(
                    'message' => (string) $this->trans->t('Saved'),
                ),
            ));
        }
        catch(Exception $e) {
            return new JSONResponse(array(
                'status' => 'error',
                'data' => array(
                    'message' => (string) $this->trans->t('Error'),
                ),
            ));
        }
    }
}
