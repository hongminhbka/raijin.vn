<?php
/**
 * Description tab
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post;

?>

<?php if ( $heading ): ?>
  <h2 class="tab-title hidden">Mô tả sản phẩm</h2>
<?php endif; ?>

<?php the_content(); ?>