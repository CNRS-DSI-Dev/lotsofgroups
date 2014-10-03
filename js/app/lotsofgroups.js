/**
 * ownCloud - LotsOfGroups
 *
 * @author Patrick Paysant <ppaysant@linagora.com>
 * @copyright 2014 CNRS DSI
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

$(document).ready(function() {
    if (!OC.appswebroots.lotsofgroups) {
        var msg = '"LotsOfGroup" must be installed / enabled with this theme';
        if (OC.theme.name) {
            msg =  msg + ' (' + OC.theme.name + ')';
        }
        OC.dialogs.alert(msg, 'WARNING');
    }
});

if (OC.appswebroots.lotsofgroups) {
    var lotsfofgroups = angular.module('lotsofgroups', ['angucomplete-alt', 'lotsofgroups.service']);

    lotsfofgroups.controller('groupsController', ['$scope', 'dataService', function($scope, dataService) {
        $scope.lotsofgroupsGroupsUrl = OC.generateUrl('/apps/lotsofgroups/api/1.0/groups/');
        $scope.searchPlaceholder = t('lotsofgroups', 'Search group');

        $scope.completeList = true;
        $scope.init = function() {
            dataService.getTotalNbGroups()
                .then(function(response) {
                    // PPA, 20141003
                    // if subadmin, owncloud 7.0.2 returns an array of group objects
                    // if admin, owncloud 7.0.2 returns an object containing object(group id, group object)
                    // yeepee !
                    var mygroups = [];
                    if (!Array.isArray(response.data.groups)) {
                        // using underscore to get values (group objects)
                        mygroups = _.values(response.data.groups);
                    }
                    else {
                        mygroups = response.data.groups;
                    }

                    if (mygroups.length <= 10) {
                        $scope.groups = mygroups;
                    }
                    else {
                        $scope.completeList = false;
                    }
                });
            // dataService.getTotalNbGroups()
            //     .success(function(data) {
            //         console.log(data.groups);
            //         if (data.groups.length <= 10) {
            //             console.log('On montre toute la liste !!')
            //             $scope.groups = data.groups;
            //         }
            //         else {
            //             $scope.completeList = false;
            //         }
            //     });
        }
        $scope.init();

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

        $scope.deleteGroup = function(item) {
            if (!item) {
                var item = $('#groups_value').val();
            }
            GroupDeleteHandler.mark(item);
        }

        $scope.addgroup = function(group) {
            $scope.groups.push(group);
        }

    }]);
}
else {
    // fake angular module to avoid any error msg (other than the first displayed on loading)

    var lotsfofgroups = angular.module('lotsofgroups', []);
    lotsfofgroups.controller('groupsController', ['$scope', function($scope) {}]);
}