/**
 * ownCloud - LotsOfGroups
 *
 * @author Patrick Paysant <ppaysant@linagora.com>
 * @copyright 2014 CNRS DSI
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

var lotsfofgroups = angular.module('lotsofgroups', ['lotsofgroups.services.groups', "angucomplete-alt"]);


lotsfofgroups.controller('groupsController', ['$scope', 'groupsService', function($scope, groupsService) {
    $scope.lotsofgroupsGroupsUrl = OC.generateUrl('/apps/lotsofgroups/api/1.0/groups/');

    $scope.showGroup = function(item) {
        if (item) {
            GroupList.showGroup(item.originalObject.name);
        }
    }

}]);

angular.module('lotsofgroups.services.groups', [])
    .factory('groupsService', ['$http', function($http){
        var doGetGroups = function() {
            return $http.get(OC.generateUrl('/apps/lotsofgroups/api/1.0/groups'));
        }
        var doGetNbUsers = function() {
            return $http.get(OC.generateUrl('/apps/lotsofgroups/api/1.0/users'));
        }
        return {
            getGroups: function() { return doGetGroups(); },
            getNbUsers: function() { return doGetNbUsers(); },
        };
    }]);