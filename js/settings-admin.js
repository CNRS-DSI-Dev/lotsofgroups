/**
 * ownCloud - LotsOfGroups
 *
 * @author Patrick Paysant <ppaysant@linagora.com>
 * @copyright 2014 CNRS DSI
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

$(document).ready(function() {

    $('#lotsOfGroupsFilterEnabled').change(function() {
        var value = 'no';
        if (this.checked) {
            value = 'yes';
        }
        OC.AppConfig.setValue('lotsofgroups', 'lotsofgroups_filter_enabled', value);

        $("#logFilter").toggleClass('hidden', !this.checked);
    });

    $('#lotsOfGroupsFilter').change(function(){
        OC.msg.startSaving('#lotsofgroups_filter_msg');
        var post = $( "#form_log_filter" ).serialize();
        $.post(OC.generateUrl('apps/lotsofgroups/settings/filter'), post, function(data){
            OC.msg.finishedSaving('#lotsofgroups_filter_msg', data);
        });
    });

});
