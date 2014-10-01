<?php

/**
 * ownCloud - LotsOfGroups
 *
 * @author Patrick Paysant <ppaysant@linagora.com>
 * @copyright 2014 CNRS DSI
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

?>
<div id="lotsofgroups" class="section">
    <h2><?php p($l->t('Lots of Groups')); ?></h2>

    <p>
        <input type="checkbox" name="lotsofgroups_filter_enabled" id="lotsOfGroupsFilterEnabled"
           value="1" <?php if ($_['lotsOfGroupsFilterEnabled']) print_unescaped('checked="checked"'); ?> />
        <label for="lotsOfGroupsFilterEnabled"><?php p($l->t('Allow to filter the group list (hide some groups) on users admin page.'));?></label>
    </p>

    <div id="logFilter" class="indent <?php if (!$_['lotsOfGroupsFilterEnabled'] || $_['lotsOfGroupsFilterEnabled'] === 'no') p('hidden'); ?>">

        <p>
            <form id="form_log_filter">
                <input type="text" name="lotsofgroups_filter" id="lotsOfGroupsFilter" placeholder="<?php p($l->t('Enter a filter')); ?>" value="<?php p($_['lotsOfGroupsFilter']); ?>" />
                <span id="lotsofgroups_filter_msg" class="msg"></span>
                <br />
                <em><label for="lotsOfGroupsFilter"><?php p($l->t("All groups containing this filter string will be hidden."));?></label></em>
            </form>
        </p>
    </div>
</div>