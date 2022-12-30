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
	<div style="background-color: #2E3A5B; padding: 40px 0px ">
		<div class="container" style="padding: 40px;">
			<div style="font-family: 'Montserrat';
				font-style: normal;
				font-weight: 600;
				font-size: 32px;
				color: white;
				line-height: 40px;">
				Bạn đang tìm sản phẩm cho xe gì
			</div>
			<div style="
				font-family: 'Montserrat';
				font-style: normal;
				font-weight: 400;
				font-size: 16px;
				line-height: 24px;
				color: white;
				padding: 20px 0px
				">
				Raijin có đủ sản phẩm cho tất cả các dòng xe
			</div>
			<div class=" row" style="justify-content: space-between;">

				<div class="col-lg-3 col-md-6  col-sm-12 mt-2">
					<button type="button" class="btn btn-lg" style="background-color: white; width: 100% ; height:auto; color: '#2E3A5B'">
						<span style="color: #2E3A5B">
							Honda
						</span>
					</button>

				</div>
				<div class="col-lg-3 col-md-6  col-sm-12 mt-2">

					<button type="button" class="btn btn-lg" style="background-color: white; width: 100% ; height:auto; color:'#2E3A5B'">
						<span style="color: #2E3A5B">
							Yamaha
						</span></button>
				</div>
				<div class="col-lg-3 col-md-6  col-sm-12 mt-2">
					<button type="button" class="btn btn-lg" style="background-color: white; width: 100% ; height:auto; color:'#2E3A5B'">
						<span style="color: #2E3A5B">
							Piagio
						</span></button>
				</div>
				<div class="col-lg-3 col-md-6  col-sm-12 mt-2">

					<button type="button" class="btn btn-lg" style="background-color: white; width: 100% ; height:auto; color:'#2E3A5B'">
						<span style="color: #2E3A5B">
							Xe hãng khác
						</span>
					</button>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="woocommerce-tabs-inner clear fix container">
			<div class="tab-content col-xs-12 container">
				<?php foreach (array_reverse($tabs) as $key => $tab) : ?>
					<?php $text = $key != 'description'   ? "Thông số kỹ thuật" : 'Nội dung' ?>
					<div style="font-family: 'Montserrat';
						font-style: normal;
						font-weight: 500;
						font-size: 20px;
						color: #2E3A5B;
						padding: 10px 0px;
						line-height: 28px;">
						<?php echo $text ?>
					</div>
					<div class="tab-pane<?php echo esc_attr(' active'); ?>" id="tab-<?php echo esc_attr($key); ?>">
						<?php call_user_func($tab['callback'], $key, $tab) ?>
					</div>
				<?php
				endforeach; ?>
			</div>

		</div>
	</div>

<?php endif; ?>