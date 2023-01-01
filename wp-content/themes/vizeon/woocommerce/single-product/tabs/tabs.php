<?php

/**
 * Single Product tabs
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if (!defined('ABSPATH')) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters('woocommerce_product_tabs', array());

$_count = 0;

if (!empty($tabs)) : ?>
	<div class="filter-product-detail">
		<div class="container">
			<h2 class="question">Bạn đang tìm sản phẩm cho xe gì</h2>
			<div class="question-description">Raijin có đủ sản phẩm cho tất cả các dòng xe</div>
			<div class="row filter-theo-hang">
				<div class="col-xs-1 col-sm-6 col-md-3 col-lg-3">
					<a href="/danh-muc-san-pham/honda/">Honda</a>
				</div>
				<div class="col-xs-1 col-sm-6 col-md-3 col-lg-3">
					<a href="/danh-muc-san-pham/yamaha">Yamaha</a>
				</div>
				<div class="col-xs-1 col-sm-6 col-md-3 col-lg-3">
					<a href="/danh-muc-san-pham/piaggio">Piaggio</a>
				</div>
				<div class="col-xs-1 col-sm-6 col-md-3 col-lg-3">
					<a href="/danh-muc-san-pham/san-pham-khac">Xe hãng khác</a>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="woocommerce-tabs-inner clear fix container">
			<div class="tab-content col-xs-12 container">
				<?php foreach (array_reverse($tabs) as $key => $tab) : ?>
					<?php if ($key != 'description') : ?>
						<div class="title">Thông số kỹ thuật</div>
					<?php endif; ?>
					<div class="tab-pane<?php echo esc_attr(' active'); ?>" id="tab-<?php echo esc_attr($key); ?>">
						<?php call_user_func($tab['callback'], $key, $tab) ?>
					</div>
				<?php
				endforeach; ?>
			</div>

		</div>
	</div>

<?php endif; ?>