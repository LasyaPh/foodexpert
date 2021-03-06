<?php
/**
 * @author        ThimPress
 * @package       LearnPress/Templates
 * @version       2.1.5
 */
if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$user = learn_press_get_current_user();
?>
<?php if ( learn_press_is_course() ): ?>
	<div id="lp-single-course" class="learnpress-content learn-press">
	<?php if ( !learn_press_get_page_link( 'checkout' ) && ( $user->is_admin() || $user->is_instructor() ) ) { ?>
		<?php
		$message = __( 'LearnPress <strong>Checkout</strong> page is not set up. ', 'eduma' );
		if ( $user->is_instructor() ) {
			$message .= __( 'Please contact to administrator for setting up this page.', 'eduma' );
		} else {
			$message .= sprintf( __( 'Please <a href="%s" target="_blank">setup</a> it so user can purchase a course.', 'eduma' ), admin_url( 'admin.php?page=learn-press-settings&tab=checkout' ) );
		}
		?>
		<?php learn_press_display_message( $message, 'error' ); ?>

	<?php } ?>
<?php else: ?>
	<div id="lp-archive-courses">
<?php endif;
