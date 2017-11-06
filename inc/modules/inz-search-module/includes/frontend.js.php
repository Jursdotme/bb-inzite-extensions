jQuery('.fl-node-<?php echo $id ?> .searchform-trigger').on('click', function() {
	jQuery('.fl-node-<?php echo $id ?> .searchform-flyout').toggleClass('active');
	jQuery(this).preventdefault;
	jQuery('.fl-node-<?php echo $id ?> .searchform-flyout input[type=search]').focus();
});

jQuery( '.fl-node-<?php echo $id ?> .searchform-flyout input[type=search]' ).blur(function() {
  jQuery('.fl-node-<?php echo $id ?> .searchform-flyout').removeClass('active');
});