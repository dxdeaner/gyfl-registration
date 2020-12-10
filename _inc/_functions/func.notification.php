<?php

function func_notificationUser($notifType, $notifMsg) {
    ?>
	<div class="alert alert-<?php echo $notifType; ?> text-center alert-dismissible" role="alert"><?php echo $notifMsg; ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
	</div>
	<?php
}
//func_notificationUser($notifType, $notifMsg);
