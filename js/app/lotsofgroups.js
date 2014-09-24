/**
 * ownCloud - LotsOfGroups
 *
 * @author Patrick Paysant <ppaysant@linagora.com>
 * @copyright 2014 CNRS DSI
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

var lotsfofgroups = angular.module('lotsofgroups', ['angucomplete-alt']);


lotsfofgroups.controller('groupsController', ['$scope', function($scope) {
    $scope.lotsofgroupsGroupsUrl = OC.generateUrl('/apps/lotsofgroups/api/1.0/groups/');

    $scope.showGroup = function(item) {
        if (item) {
            GroupList.showGroup(item);
            $('#groups_value').val('');
        }
    }

    $scope.showSearchGroup = function(item) {
        if (item) {
            GroupList.showGroup(item.originalObject.name);
        }
    }

}]);
