/**
 * ownCloud - LotsOfGroups
 *
 * @author Patrick Paysant <ppaysant@linagora.com>
 * @copyright 2014 CNRS DSI
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

$(document).ready(function() {
    if (!OC.appswebroots.lotsofgroups2) {
        var msg = '"LotsOfGroup" must be installed / enabled with this theme';
        if (OC.theme.name) {
            msg =  msg + ' (' + OC.theme.name + ')';
        }
        OC.dialogs.alert(msg, 'WARNING');
    }
});

if (OC.appswebroots.lotsofgroups) {
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
                $('#searchGroup').addClass('active');
            }
        }

        $scope.deleteGroup = function() {
            var item = $('#groups_value').val();
            if (item) {
                GroupDeleteHandler.mark(item);
            }
        }

    }]);
}
else {
    // fake angular module to avoid any error msg (other than the first displayed on loading)

    var lotsfofgroups = angular.module('lotsofgroups', []);
    lotsfofgroups.controller('groupsController', ['$scope', function($scope) {}]);
}