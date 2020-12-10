<?php

function func_alert() {

	if ( isset( $_SESSION[ 'alertMe' ] )) {
		?>
	<div class="alert alert-<?php echo $_SESSION['alert_type']; ?> text-center alert-dismissible" role="alert">
		<?php echo $_SESSION['alert_msg']; ?>
	</div>
	<?php
		unset($_SESSION['alert_type']);
		unset($_SESSION['alert_msg']);
		unset($_SESSION['alertMe']);
	}

}

