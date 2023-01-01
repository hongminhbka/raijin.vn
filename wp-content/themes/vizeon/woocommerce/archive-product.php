<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.4.0
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly
get_header();

$page_id = vizeon_id();

$sidebar_layout_config = vizeon_get_option('woo_sidebar_config', '');
$left_sidebar = vizeon_get_option('woo_left_sidebar', '');
$right_sidebar = vizeon_get_option('woo_right_sidebar', '');

if (is_shop()) {
  $sidebar_layout_config = get_post_meta($page_id, 'vizeon_sidebar_config', true);
  $left_sidebar = get_post_meta($page_id, 'vizeon_left_sidebar', true);
  $right_sidebar = get_post_meta($page_id, 'vizeon_right_sidebar', true);
  if ($sidebar_layout_config == "") {
    $sidebar_layout_config = vizeon_get_option('woo_sidebar_config', '');
  }
  if ($left_sidebar == "") {
    $left_sidebar = vizeon_get_option('woo_left_sidebar', '');
  }
  if ($right_sidebar == "") {
    $right_sidebar = vizeon_get_option('woo_right_sidebar', '');
  }
}

$left_sidebar_config  = array('active' => false);
$right_sidebar_config = array('active' => false);
$main_content_config  = array('class' => 'col-lg-12 col-xs-12');

if (isset($_GET['sb']) && $_GET['sb']) {
  $sidebar_layout_config = $_GET['sb'];
}

$sidebar_config = vizeon_sidebar_global($sidebar_layout_config, $left_sidebar, $right_sidebar);

extract($sidebar_config);

$woo_display = vizeon_display_modes_value();
?>

<section id="wp-main-content" class="clearfix main-page">
  <?php
  /**
   * woocommerce_before_main_content hook
   *
   * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
   * @hooked woocommerce_breadcrumb - 20
   */
  do_action('woocommerce_before_main_content');
  ?>

  <div class="container">
    <div class="main-page-content row">
      <div class="content-page <?php echo esc_attr($main_content_config['class']); ?>">

        <div id="wp-content" class="wp-content">

          <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>

            <h1 class="page-title hidden"><?php woocommerce_page_title(); ?></h1>

          <?php endif; ?>

          <?php do_action('woocommerce_archive_description'); ?>
          <?php woocommerce_product_subcategories(); ?>
          <?php if (have_posts()) : ?>
            <section class="elementor-element elementor-section-full_width elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section">
              <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-row">
                  <div class="elementor-element elementor-column elementor-col-100 elementor-top-column">
                    <div class="elementor-column-wrap elementor-element-populated">
                      <div class="elementor-widget-wrap">
                        <section class="elementor-element elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section">
                          <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-row">
                              <div class="elementor-element elementor-column elementor-col-100 elementor-inner-column">
                                <div class="elementor-column-wrap elementor-element-populated">
                                  <div class="elementor-widget-wrap">
                                    <div class="elementor-element elementor-widget elementor-widget-gva-heading-block">
                                      <div class="elementor-widget-container">
                                        <div class="gva-element-gva-heading-block gva-element">
                                          <div class="align-left style-1 widget gsc-heading">
                                            <div class="content-inner">
                                              <div class="title">Bạn đang tìm sản phẩm cho xe gì</div>
                                              <div class="title-desc">Raijin có đủ sản phẩm cho tất cả các dòng xe</div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </section>
                        <section class="elementor-element elementor-element-bcad63e elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section">
                          <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-row">
                              <div class="elementor-element elementor-column elementor-inner-column">
                                <div class="elementor-column-wrap elementor-element-populated">
                                  <div class="elementor-widget-wrap">
                                    <div class="elementor-element elementor-align-center elementor-widget elementor-widget-button">
                                      <div class="elementor-widget-container">
                                        <div class="elementor-button-wrapper">
                                          <a href="/danh-muc-san-pham/honda/" class="elementor-button-link elementor-button elementor-size-md full-width">
                                            <span class="elementor-button-content-wrapper">
                                              <span class="elementor-button-text">Honda</span>
                                            </span>
                                          </a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="elementor-element elementor-column elementor-col-25 elementor-inner-column">
                                <div class="elementor-column-wrap  elementor-element-populated">
                                  <div class="elementor-widget-wrap">
                                    <div class="elementor-element elementor-align-center elementor-widget elementor-widget-button">
                                      <div class="elementor-widget-container">
                                        <div class="elementor-button-wrapper">
                                          <a href="/danh-muc-san-pham/yamaha/" class="elementor-button-link elementor-button elementor-size-md">
                                            <span class="elementor-button-content-wrapper">
                                              <span class="elementor-button-text">Yamaha</span>
                                            </span>
                                          </a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="elementor-element elementor-column elementor-col-25 elementor-inner-column">
                                <div class="elementor-column-wrap elementor-element-populated">
                                  <div class="elementor-widget-wrap">
                                    <div class="elementor-element elementor-align-center elementor-widget elementor-widget-button">
                                      <div class="elementor-widget-container">
                                        <div class="elementor-button-wrapper">
                                          <a href="/danh-muc-san-pham/piaggio/"
                                            class="elementor-button-link elementor-button elementor-size-md">
                                            <span class="elementor-button-content-wrapper">
                                              <span class="elementor-button-text">Piaggio</span>
                                            </span>
                                          </a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="elementor-element elementor-column elementor-col-25 elementor-inner-column">
                                <div class="elementor-column-wrap elementor-element-populated">
                                  <div class="elementor-widget-wrap">
                                    <div class="elementor-element elementor-align-center elementor-widget elementor-widget-button">
                                      <div class="elementor-widget-container">
                                        <div class="elementor-button-wrapper">
                                          <a href="/danh-muc-san-pham/san-pham-khac/" class="elementor-button-link elementor-button elementor-size-md">
                                            <span class="elementor-button-content-wrapper">
                                              <span class="elementor-button-text">Xe hãng khác</span>
                                            </span>
                                          </a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </section>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <div class="shop-loop-container">
              <div class="gvawooaf-before-products layout-<?php echo esc_attr($woo_display) ?>">
                
                <?php do_action('vizeon_woocommerce_active_filter');  ?>

                <?php woocommerce_product_loop_start(); ?>

                <?php while (have_posts()) : the_post(); ?>

                  <?php wc_get_template_part('content', 'product'); ?>

                <?php endwhile; // end of the loop. 
                ?>

                <?php woocommerce_product_loop_end(); ?>

                <?php
                /**
                 * woocommerce_after_shop_loop hook
                 *
                 * @hooked woocommerce_pagination - 10
                 */
                do_action('woocommerce_after_shop_loop');
                ?>
              </div>
            </div>
          <?php elseif (!woocommerce_product_subcategories(array('before' => woocommerce_product_loop_start(false), 'after' => woocommerce_product_loop_end(false)))) : ?>

            <?php wc_get_template('loop/no-products-found.php'); ?>

          <?php endif; ?>

        </div>

      </div>

      <!-- Left sidebar -->
      <?php if ($left_sidebar_config['active']) : ?>
        <div class="sidebar wp-sidebar sidebar-left <?php echo esc_attr($left_sidebar_config['class']); ?>">
          <?php do_action('vizeon_before_sidebar'); ?>
          <div class="sidebar-inner">
            <?php dynamic_sidebar($left_sidebar_config['name']); ?>
          </div>
          <?php do_action('vizeon_after_sidebar'); ?>
        </div>
      <?php endif ?>

      <!-- Right Sidebar -->
      <?php if ($right_sidebar_config['active']) : ?>
        <div class="sidebar wp-sidebar sidebar-right <?php echo esc_attr($right_sidebar_config['class']); ?>">
          <?php do_action('vizeon_before_sidebar'); ?>
          <div class="sidebar-inner">
            <?php dynamic_sidebar($right_sidebar_config['name']); ?>
          </div>
          <?php do_action('vizeon_after_sidebar'); ?>
        </div>
      <?php endif ?>
    </div>
    <div class="mt-3 mb-3" style="
        font-family: 'Montserrat';
        font-style: normal;
        font-weight: 500;
        font-size: 20px;
        line-height: 28px;
        color: #2E3A5B;
        margin-bottom: 200px;
    ">Ắc quy Lithium xe máy Expert</div>
    <div class="main-page-content row" style="position:relative  ;z-index: 3">
      <div class="content-page <?php echo esc_attr($main_content_config['class']); ?>">

        <div id="wp-content" class="wp-content">

          <!-- <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>

            <h1 class="page-title hidden"><?php woocommerce_page_title(); ?></h1>

          <?php endif; ?>

          <?php do_action('woocommerce_archive_description'); ?>
          <?php woocommerce_product_subcategories(); ?> -->
          <?php if (have_posts()) : ?>
            <div class="shop-loop-container">
              <div class="gvawooaf-before-products layout-<?php echo esc_attr($woo_display) ?>">                

                <?php do_action('vizeon_woocommerce_active_filter');  ?>

                <?php woocommerce_product_loop_start(); ?>

                <?php while (have_posts()) : the_post(); ?>

                  <?php wc_get_template_part('content', 'product'); ?>

                <?php endwhile; // end of the loop. 
                ?>

                <?php woocommerce_product_loop_end(); ?>

                <?php
                /**
                 * woocommerce_after_shop_loop hook
                 *
                 * @hooked woocommerce_pagination - 10
                 */
                do_action('woocommerce_after_shop_loop');
                ?>
              </div>
            </div>
          <?php elseif (!woocommerce_product_subcategories(array('before' => woocommerce_product_loop_start(false), 'after' => woocommerce_product_loop_end(false)))) : ?>

            <?php wc_get_template('loop/no-products-found.php'); ?>

          <?php endif; ?>

        </div>

      </div>

      <!-- Left sidebar -->
      <?php if ($left_sidebar_config['active']) : ?>
        <div class="sidebar wp-sidebar sidebar-left <?php echo esc_attr($left_sidebar_config['class']); ?>">
          <?php do_action('vizeon_before_sidebar'); ?>
          <div class="sidebar-inner">
            <?php dynamic_sidebar($left_sidebar_config['name']); ?>
          </div>
          <?php do_action('vizeon_after_sidebar'); ?>
        </div>
      <?php endif ?>

      <!-- Right Sidebar -->
      <?php if ($right_sidebar_config['active']) : ?>
        <div class="sidebar wp-sidebar sidebar-right <?php echo esc_attr($right_sidebar_config['class']); ?>">
          <?php do_action('vizeon_before_sidebar'); ?>
          <div class="sidebar-inner">
            <?php dynamic_sidebar($right_sidebar_config['name']); ?>
          </div>
          <?php do_action('vizeon_after_sidebar'); ?>
        </div>
      <?php endif ?>
    </div>
    <div style="
      background-color: #222628;
    position: absolute;
    width: 100%;
    height: 375px;
    left: 0px;
    top: 50%;">
    </div>
    <div class="mt-3 mb-3" style="
        font-family: 'Montserrat';
        font-style: normal;
        font-weight: 500;
        font-size: 20px;
        line-height: 28px;
        color: #2E3A5B;
    ">Ắc quy Lithium xe máy Luxury</div>
    <div class="main-page-content row">
      <div class="content-page <?php echo esc_attr($main_content_config['class']); ?>">

        <div id="wp-content" class="wp-content">

          <!-- <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>

            <h1 class="page-title hidden"><?php woocommerce_page_title(); ?></h1>

          <?php endif; ?>

          <?php do_action('woocommerce_archive_description'); ?>
          <?php woocommerce_product_subcategories(); ?> -->
          <?php if (have_posts()) : ?>
            <div class="shop-loop-container">
              <div class="gvawooaf-before-products layout-<?php echo esc_attr($woo_display) ?>">
                <!-- <div class="woocommerce-filter clearfix">
                  <?php
                  /**
                   * woocommerce_before_shop_loop hook
                   *
                   * @hooked woocommerce_result_count - 20
                   * @hooked woocommerce_catalog_ordering - 30
                   */
                  do_action('woocommerce_before_shop_loop');
                  ?>
                </div> -->

                <?php do_action('vizeon_woocommerce_active_filter');  ?>

                <?php woocommerce_product_loop_start(); ?>

                <?php while (have_posts()) : the_post(); ?>

                  <?php wc_get_template_part('content', 'product'); ?>

                <?php endwhile; // end of the loop. 
                ?>

                <?php woocommerce_product_loop_end(); ?>

                <?php
                /**
                 * woocommerce_after_shop_loop hook
                 *
                 * @hooked woocommerce_pagination - 10
                 */
                do_action('woocommerce_after_shop_loop');
                ?>
              </div>
            </div>
          <?php elseif (!woocommerce_product_subcategories(array('before' => woocommerce_product_loop_start(false), 'after' => woocommerce_product_loop_end(false)))) : ?>

            <?php wc_get_template('loop/no-products-found.php'); ?>

          <?php endif; ?>

        </div>

      </div>

      <!-- Left sidebar -->
      <?php if ($left_sidebar_config['active']) : ?>
        <div class="sidebar wp-sidebar sidebar-left <?php echo esc_attr($left_sidebar_config['class']); ?>">
          <?php do_action('vizeon_before_sidebar'); ?>
          <div class="sidebar-inner">
            <?php dynamic_sidebar($left_sidebar_config['name']); ?>
          </div>
          <?php do_action('vizeon_after_sidebar'); ?>
        </div>
      <?php endif ?>

      <!-- Right Sidebar -->
      <?php if ($right_sidebar_config['active']) : ?>
        <div class="sidebar wp-sidebar sidebar-right <?php echo esc_attr($right_sidebar_config['class']); ?>">
          <?php do_action('vizeon_before_sidebar'); ?>
          <div class="sidebar-inner">
            <?php dynamic_sidebar($right_sidebar_config['name']); ?>
          </div>
          <?php do_action('vizeon_after_sidebar'); ?>
        </div>
      <?php endif ?>
    </div>
  </div>
  <div style="background-image: url(/wp-content/uploads/2015/12/bg_sp_2.svg); height: 850px ; width: 100vw ;padding: 10% 25% 20% 7%;">
    <div style="background-color: #ffffff ; padding: 16px 25px;" class="pa-3">
      <div style="
        font-family: 'Montserrat';
        font-style: normal;
        font-weight: 600;
        font-size: 32px;
        line-height: 40px;
        color: #2E3A5B;
        ">
        Consectetur adipisicing elit sed Consectetur adipisicing elit sed
      </div>
      <div class="mt-1 mb-2" style="
        font-family: 'Montserrat';
        font-style: normal;
        font-weight: 600;
        font-size: 32px;
        line-height: 40px;
        color: #2E3A5B;
        ">
        Consectetur adipisicing elit sed Consectetur adipisicing elit sed
      </div>
      <div style="
        font-family: 'Montserrat';
        font-style: normal;
        font-weight: 400;
        font-size: 14px;
        line-height: 20px;
        color: #2E3A5B;
      ">
        Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim incididunt ut labore etConsectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim incididunt ut labore et
        Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim incididunt ut labore et
        Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim incididunt ut labore etConsectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim incididunt ut labore et
        Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim incididunt ut labore et
      </div>
    </div>
  </div>

  <?php
  /**
   * woocommerce_after_main_content hook
   *
   * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
   */
  do_action('woocommerce_after_main_content');
  ?>
</section>

<?php get_footer(); ?>