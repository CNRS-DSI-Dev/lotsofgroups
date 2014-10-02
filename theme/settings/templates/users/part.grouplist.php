<?php

\OCP\Util::addStyle('lotsofgroups', 'angucomplete-alt');
\OCP\Util::addStyle('lotsofgroups', 'lotsofgroups');

\OCP\Util::addScript('lotsofgroups', 'lib/angular');
\OCP\Util::addScript('lotsofgroups', 'lib/angucomplete-alt');
\OCP\Util::addScript('lotsofgroups', 'app/lotsofgroups');

?>

<ul id="usergrouplist" ng-app="lotsofgroups" ng-controller="groupsController">
	<!-- Add new group -->
	<li id="newgroup-init">
		<a href="#">
			<span><?php p($l->t('Add Group'))?></span>
		</a>
	</li>
	<li id="newgroup-form" style="display: none">
		<form>
			<input type="text" id="newgroupname" placeholder="<?php p($l->t('Group')); ?>..." />
			<input type="submit" class="button icon-add svg" value="" />
		</form>
	</li>
	<!-- Everyone -->
	<li id="everyonegroup" data-gid="_everyone" data-usercount="" class="isgroup" ng-click="showGroup('_everyone')">
		<a href="#">
			<span class="groupname">
				<?php p($l->t('Everyone')); ?>
			</span>
		</a>
		<span class="utils">
			<span class="usercount" id="everyonecount">

			</span>
		</span>
	</li>

	<!-- The Admin Group -->
	<?php foreach($_["adminGroup"] as $adminGroup): ?>
		<li data-gid="admin" data-usercount="<?php if($adminGroup['usercount'] > 0) { p($adminGroup['usercount']); } ?>" class="isgroup" ng-click="showGroup('admin')">
			<a href="#"><span class="groupname"><?php p($l->t('Admins')); ?></span></a>
			<span class="utils">
				<span class="usercount"><?php if($adminGroup['usercount'] > 0) { p($adminGroup['usercount']); } ?></span>
			</span>
		</li>
	<?php endforeach; ?>

	<li id="searchGroup">
		<angucomplete-alt id="groups"
			placeholder="<?php p($l->t('Search group'))?>"
			pause="400"
			selected-object="showSearchGroup"
			remote-url="{{ lotsofgroupsGroupsUrl }}"
			remote-url-data-field="groups"
			minlength = "1"
			title-field="name" ></angucomplete-alt>

		<span class="utils">
			<a href="#" class="action delete" original-title="<?php p($l->t('Delete'))?>" ng-click="deleteGroup()">
				<img src="<?php print_unescaped(image_path('core', 'actions/delete.svg')) ?>" class="svg" />
			</a>
		</span>

	</li>

</ul>
