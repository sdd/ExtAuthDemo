<?php
/**
 * Copyright 2010 - 2013, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2013, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<div class="users index">
	<h2><?php echo __d('users', 'Users'); ?></h2>

	<?php /*<h3><?php echo __d('users', 'Filter'); ?></h3>
	<?php
	echo $this->Form->create($model, array('action' => 'index'));
		echo $this->Form->input('username', array('label' => __d('users', 'Username')));
		echo $this->Form->input('email', array('label' => __d('users', 'Email')));
	echo $this->Form->end(__d('users', 'Search'));
	?> */ ?>

	<?php echo $this->element('paging'); ?>
	<?php echo $this->element('pagination'); ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo $this->Paginator->sort('username'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('email_verified'); ?></th>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __d('users', 'Actions'); ?></th>
		</tr>
		<?php
		$i = 0;
		foreach ($users as $user):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
			?>
			<tr<?php echo $class;?>>
				<td<?php if ($user[$model]['is_admin']) echo ' class="cf_purple"'?>>
					<?php echo $user[$model]['username']; ?>
				</td>
				<td>
					<?php echo $user[$model]['email']; ?>
				</td>
				<td>
					<?php echo $user[$model]['email_verified'] == 1 ? __d('users', 'Yes') : __d('users', 'No'); ?>
				</td>
				<td>
					<?php echo $user[$model]['active'] == 1 ? __d('users', 'Yes') : __d('users', 'No'); ?>
				</td>
				<td>
					<?php echo $user[$model]['created']; ?>
				</td>
				<td class="actionss">
					<?php echo $this->Html->link(__d('users', 'View'), array('action'=>'view', $user[$model]['id']), array('class' => 'btn btn-info')); ?>
					<?php echo $this->Html->link(__d('users', 'Edit'), array('action'=>'edit', $user[$model]['id']), array('class' => 'btn btn-primary')); ?>
					<?php if (!$user[$model]['is_admin']): ?>
						<?php echo $this->Html->link(__d('users', 'Make Admin'), array('action'=>'administrator', $user[$model]['id'], 1), array('class' => 'btn btn-warning')); ?>
					<?php else: ?>
						<?php echo $this->Html->link(__d('users', 'Revoke Admin'), array('action'=>'administrator', $user[$model]['id'], 0), array('class' => 'btn btn-danger')); ?>
					<?php endif; ?>
					<?php echo $this->Html->link(__d('users', 'Delete'), array('action'=>'delete', $user[$model]['id']), array('class' => 'btn btn-danger'), sprintf(__d('users', 'Are you sure you want to delete # %s?'), $user[$model]['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
	<?php echo $this->element('pagination'); ?>
</div>
<?php echo $this->element('Users/admin_sidebar'); ?>
