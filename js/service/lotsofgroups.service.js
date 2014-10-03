angular.module('lotsofgroups.service', [])
    .factory('dataService', ['$http', function($http) {

        // different encoding when post on php script...
        // see http://stackoverflow.com/questions/19254029/angularjs-http-post-does-not-send-data
        // $http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8';

        var doGetTotalNbGroups = function() {
            var promise = $http.get(OC.generateUrl('/apps/lotsofgroups/api/1.0/groups/%25'))
                .success(function(data) {
                    return data;
                });
            return promise;
            // return $http.get(OC.generateUrl('/apps/lotsofgroups/api/1.0/groups/%25'));
        };

        return {
            getTotalNbGroups: function() { return doGetTotalNbGroups(); }
        };
    }]);