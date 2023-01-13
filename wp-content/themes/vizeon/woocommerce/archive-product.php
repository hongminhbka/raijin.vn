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

          <?php if (have_posts()) : ?>                                      
            <?php if (is_shop()) : ?>              
              <?php show_products_per_category(); ?>            
            <?php else: ?>
              <!-- hien thi trang danh muc xe may -->
              <?php if (is_product_category('ac-quy-lithium-xe-may') ): ?>
                
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
                                                  <div class="title-desc">Raijin có đủ sản phẩm cho tất cả các dòng xe máy</div>                                                 
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
                            <section class="elementor-element elementor-element-bcad63e elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section product-filter">
                              <div class="elementor-container elementor-column-gap-default">
                                <div class="elementor-row">
                                  <?php
                                    $term_id_ac_quy_xe_may = 80;
                                    $args_query_honda = array(
                                      'taxonomy' => 'product_cat', 
                                      'hide_empty' => false, 
                                      'name' => 'HONDA',
                                      'child_of' => $term_id_ac_quy_xe_may,                                     
                                    );
                                    $hondaCategory = get_terms($args_query_honda);
                                    
                                    $childrentOfHonda = [];
                                    if(is_array($hondaCategory) && count($hondaCategory)>0){
                                      $args_query_childrent_of_honda = array(
                                        'taxonomy' => 'product_cat', 
                                        'hide_empty' => false, 
                                        'child_of' => $hondaCategory[0]->term_id,
                                        'order' => 'order'
                                      );
                                      $childrentOfHonda = get_terms($args_query_childrent_of_honda);
                                      echo '<div class="elementor-element elementor-column elementor-col-25 elementor-inner-column">
                                              <div class="elementor-column-wrap elementor-element-populated">
                                                <div class="elementor-widget-wrap">
                                                  <div class="elementor-element elementor-align-center elementor-widget elementor-widget-button">
                                                    <div class="elementor-widget-container">
                                                      <div class="dropdown">
                                                        <a class="dropbtn" href="">'.$hondaCategory[0]->name.'</a>
                                                        <div class="dropdown-content">';
                                                          foreach ( $childrentOfHonda as $key => $term ){
                                                            echo '<a href="'. get_term_link( $term->term_id, 'product_cat' ) .'">'.$term->name.'</a>';
                                                          }                                                                                                                    
                                                  echo '</div>
                                                      </div>                                                      
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>';
                                    }

                                    $args_query_yamaha = array(
                                      'taxonomy' => 'product_cat', 
                                      'hide_empty' => false, 
                                      'name' => 'YAMAHA',
                                      'child_of' => $term_id_ac_quy_xe_may,                                     
                                    );
                                    $yamahaCategory = get_terms($args_query_yamaha);
                                    $childrentOfYamaha = [];
                                    if(is_array($yamahaCategory) && count($yamahaCategory) > 0){
                                      $args_query_childrent_of_yamaha = array(
                                        'taxonomy' => 'product_cat', 
                                        'hide_empty' => false, 
                                        'child_of' => $yamahaCategory[0]->term_id,
                                        'order' => 'order'
                                      );
                                      $childrentOfYamaha = get_terms($args_query_childrent_of_yamaha);
                                      echo '<div class="elementor-element elementor-column elementor-col-25 elementor-inner-column">
                                              <div class="elementor-column-wrap elementor-element-populated">
                                                <div class="elementor-widget-wrap">
                                                  <div class="elementor-element elementor-align-center elementor-widget elementor-widget-button">
                                                    <div class="elementor-widget-container">
                                                      <div class="dropdown">
                                                        <a class="dropbtn" href="">'.$yamahaCategory[0]->name.'</a>
                                                        <div class="dropdown-content">';
                                                          foreach ( $childrentOfYamaha as $key => $term ){
                                                            echo '<a href="'. get_term_link( $term->term_id, 'product_cat' ) .'">'.$term->name.'</a>';
                                                          }                                                                                                                    
                                                  echo '</div>
                                                      </div>                                                      
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>';
                                    }
                                    $args_query_piaggio = array(
                                      'taxonomy' => 'product_cat', 
                                      'hide_empty' => false, 
                                      'name' => 'PIAGGIO',
                                      'child_of' => $term_id_ac_quy_xe_may,                                     
                                    );
                                    $piaggioCategory = get_terms($args_query_piaggio);

                                    $childrentOfPiaggio = [];
                                    if(is_array($piaggioCategory) && count($piaggioCategory) > 0){
                                      $args_query_childrent_of_piaggio = array(
                                        'taxonomy' => 'product_cat', 
                                        'hide_empty' => false, 
                                        'child_of' => $piaggioCategory[0]->term_id,
                                        'order' => 'order'
                                      );
                                      $childrentOfPiaggio = get_terms($args_query_childrent_of_piaggio);
                                      echo '<div class="elementor-element elementor-column elementor-col-25 elementor-inner-column">
                                              <div class="elementor-column-wrap elementor-element-populated">
                                                <div class="elementor-widget-wrap">
                                                  <div class="elementor-element elementor-align-center elementor-widget elementor-widget-button">
                                                    <div class="elementor-widget-container">
                                                      <div class="dropdown">
                                                        <a class="dropbtn" href="">'.$piaggioCategory[0]->name.'</a>
                                                        <div class="dropdown-content">';
                                                          foreach ( $childrentOfPiaggio as $key => $term ){
                                                            echo '<a href="'. get_term_link( $term->term_id, 'product_cat' ) .'">'.$term->name.'</a>';
                                                          }                                                                                                                    
                                                  echo '</div>
                                                      </div>                                                      
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>';
                                    }
                                    
                                    $args_query_other = array(
                                      'taxonomy' => 'product_cat', 
                                      'hide_empty' => false,                                    
                                      'child_of' => $term_id_ac_quy_xe_may,
                                      'order' => 'order'                                                                           
                                    );

                                    $allCategoryChildrentOfAcQuyXeMay = get_terms($args_query_other);
                                    $otherCategory = [];
                                    foreach($allCategoryChildrentOfAcQuyXeMay as $key => $term ){
                                      if($term->parent == $term_id_ac_quy_xe_may && !in_array($term->term_id,[$hondaCategory[0]->term_id, $yamahaCategory[0]->term_id, $piaggioCategory[0]->term_id])){
                                        array_push($otherCategory, $term);
                                      }                                     
                                    }
                                    if(count($otherCategory) > 0){
                                      echo '<div class="elementor-element elementor-column elementor-col-25 elementor-inner-column">
                                            <div class="elementor-column-wrap elementor-element-populated">
                                              <div class="elementor-widget-wrap">
                                                <div class="elementor-element elementor-align-center elementor-widget elementor-widget-button">
                                                  <div class="elementor-widget-container">
                                                    <div class="dropdown">
                                                      <a class="dropbtn" href="">XE HÃNG KHÁC</a>
                                                      <div class="dropdown-content">';                                                      
                                                        foreach ( $otherCategory as $key => $term ){
                                                          echo '<a href="'. get_term_link( $term->term_id, 'product_cat' ) .'">'.$term->name.'</a>';
                                                        }                                                                                                                                                                                                                       
                                              echo    '</div>                                            
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>';
                                          '</div>';
                                    }                                    
                                    ?>                                                             
                                </div>
                              </div>
                            </section>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              <?php else: ?>
                <?php do_action('woocommerce_archive_description'); ?>
              <?php endif; ?>
              
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
            <?php endif; ?>            
            
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