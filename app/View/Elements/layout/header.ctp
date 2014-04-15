<header>
	<div class="relbox">
	    <h1><a href="/">Demo</a></h1>
		<div class="right">
			<?php if ($this->Session->read('Auth.User')) {
				if ($this->Session->read('Auth.User')['is_admin']) {
					echo $this->element('layout/header/admin_menu');
				} else {
					echo $this->element('layout/header/user_menu');
				}
			} else {
				echo $this->element('layout/header/guest_menu');
			} ?>
		</div>
	</div>
</header>
