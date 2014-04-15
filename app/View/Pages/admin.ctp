<div class="admin">
	<h2 class="cf_orange"><i class="icon-cogs"></i> Site Admin</h2>
	<ul class="no-bullets inline-block-list-20">

		<li><?php echo $this->Html->link(
				'Users',
				array('admin' => true, 'controller' => 'app_users'),
				array('class' => 'btn btn-info btn-large')
			) ?>
		</li>
	</ul>
</div>
