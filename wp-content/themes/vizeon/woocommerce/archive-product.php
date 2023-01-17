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
              
              <?php elseif(is_product_category('ac-quy-pkl')) :?>
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
                                                  <div class="title">Bạn đang tìm ắc quy cho xe mô tô nào</div>
                                                  <div class="title-desc">Hãy chọn hãng xe, sau đó chọn dòng xe</div>                                                 
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
                            <section class="elementor-element elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section product-filter">
                              <div class="elementor-container elementor-column-gap-default">
                                <div class="elementor-row">
                                  <div class="elementor-element elementor-column elementor-col-50 elementor-top-column">
                                    <div class="elementor-column-wrap  elementor-element-populated">
                                      <div class="elementor-widget-wrap">
                                        <div class="elementor-element elementor-element-da4516b elementor-widget elementor-widget-html">
                                          <div class="elementor-widget-container">
                                            <select class="wpcf7-form-control wpcf7-select full-width" id="hang-xe-o-to"
                                              onchange="thayDoiHangXe(this.value)">
                                              <option value="" disabled="" selected="" hidden="">Chọn hãng xe</option>                                              
                                              <?php
                                                $term_id_ac_quy_pkl = 111;
                                                $args_query = array(
                                                  'taxonomy' => 'product_cat', 
                                                  'hide_empty' => false,                                                 
                                                  'child_of' => $term_id_ac_quy_pkl,
                                                  'order' => 'order'                                     
                                                );
                                                $categoriesChildrentOfAcQuyXePKL = get_terms($args_query);
                                                
                                                foreach ( $categoriesChildrentOfAcQuyXePKL as $key => $term ){
                                                  echo '<option value="'.  $term->term_id .'">'.$term->name.'</option>';
                                                }
                                              ?>
                                            </select>                                            
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="elementor-element elementor-element-f577b18 elementor-column elementor-col-50 elementor-top-column"
                                    data-id="f577b18" data-element_type="column">
                                    <div class="elementor-column-wrap  elementor-element-populated">
                                      <div class="elementor-widget-wrap">
                                        <div class="elementor-element elementor-element-151d1c7 elementor-widget elementor-widget-html"
                                          data-id="151d1c7" data-element_type="widget" data-widget_type="html.default">
                                          <div class="elementor-widget-container">
                                            <select class="wpcf7-form-control wpcf7-select full-width" id="dong-xe-o-to"
                                              onchange="layDanhSachSanPham(this.value)">
                                              <option value="" disabled="" selected="" hidden="">Chọn dòng xe</option>
                                              <option value=" 972">MT-03</option>
                                              <option value=" 1069">MT-07</option>
                                              <option value=" 1071">MT-09</option>
                                              <option value=" 1070">MT-09-SP</option>
                                              <option value=" 1073">MT-10</option>
                                              <option value=" 1072">MT-10-SP</option>
                                              <option value=" 973">MT-15</option>
                                              <option value=" 1078">R1</option>
                                              <option value=" 1079">R6</option>
                                              <option value=" 1074">TÉNÉRE 700</option>
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </section>
                            <section class="elementor-element elementor-section-full_width elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section element-product-filter-by-dung-tich">
                              <div class="elementor-container elementor-column-gap-default">
                                <div class="elementor-row">
                                  <div class="elementor-element elementor-column elementor-col-100 elementor-top-column">
                                    <div class="elementor-column-wrap elementor-element-populated">
                                      <div class="elementor-widget-wrap">
                                        <section class="elementor-element elementor-element-33a207e elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section">
                                          <div class="elementor-container elementor-column-gap-default">
                                            <div class="elementor-row">
                                              <div class="elementor-element elementor-column elementor-col-50 elementor-inner-column">
                                                <div class="elementor-column-wrap  elementor-element-populated">
                                                  <div class="elementor-widget-wrap">
                                                    <div class="elementor-element elementor-element-17c7abc elementor-widget elementor-widget-heading">
                                                      <div class="elementor-widget-container">
                                                        <h2 class="elementor-heading-title elementor-size-default"><span
                                                            class="ez-toc-section"
                                                            id="Tim_ac_quy_theo_dung_tich_binh"></span>Tìm ắc quy
                                                          theo dung tích bình<span class="ez-toc-section-end"></span>
                                                        </h2>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="elementor-element elementor-column elementor-col-50 elementor-inner-column">
                                                <div class="elementor-column-wrap  elementor-element-populated">
                                                  <div class="elementor-widget-wrap">
                                                    <div class="elementor-element elementor-widget elementor-widget-html">
                                                      <div class="elementor-widget-container">
                                                        <select class="wpcf7-form-control wpcf7-select full-width"
                                                          id="dung-luong-binh">
                                                          <option value="" disabled="" selected="" hidden="">Chọn dung
                                                            lượng bình</option>
                                                          <option value=" 116">15c-30Ah</option>
                                                          <option value=" 117">200c-100Ah</option>
                                                          <option value=" 1227">44Wh - 5Ah (4Ah)</option>
                                                        </select>
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
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              <?php elseif(is_product_category('ac-quy-o-to')) :?>
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
                                                  <div class="title">Bạn đang tìm ắc quy cho xe ô tô nào</div>
                                                  <div class="title-desc">Hãy chọn hãng xe, sau đó chọn dòng xe</div>                                                 
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
                                  <div class="elementor-element elementor-element-e928eab elementor-column elementor-col-50 elementor-top-column"
                                    data-id="e928eab" data-element_type="column">
                                    <div class="elementor-column-wrap  elementor-element-populated">
                                      <div class="elementor-widget-wrap">
                                        <div class="elementor-element elementor-element-da4516b elementor-widget elementor-widget-html"
                                          data-id="da4516b" data-element_type="widget" data-widget_type="html.default">
                                          <div class="elementor-widget-container">
                                            <select class="wpcf7-form-control wpcf7-select full-width" id="hang-xe-o-to"
                                              onchange="thayDoiHangXe(this.value)">
                                              <option value="" disabled="" selected="" hidden="">Chọn hãng xe</option>
                                              <option value=" 988">BMW</option>
                                              <option value=" 986">Ducati</option>
                                              <option value=" 985">Harley Davidson</option>
                                              <option value=" 964">HONDA</option>
                                              <option value=" 989">Kawasaki</option>
                                              <option value=" 987">KTM</option>
                                              <option value=" 966">SUZUKI</option>
                                              <option value=" 967">TRIUMPH</option>
                                              <option value=" 965">YAMAHA</option>
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="elementor-element elementor-element-f577b18 elementor-column elementor-col-50 elementor-top-column"
                                    data-id="f577b18" data-element_type="column">
                                    <div class="elementor-column-wrap  elementor-element-populated">
                                      <div class="elementor-widget-wrap">
                                        <div class="elementor-element elementor-element-151d1c7 elementor-widget elementor-widget-html"
                                          data-id="151d1c7" data-element_type="widget" data-widget_type="html.default">
                                          <div class="elementor-widget-container">
                                            <select class="wpcf7-form-control wpcf7-select full-width" id="dong-xe-o-to"
                                              onchange="layDanhSachSanPham(this.value)">
                                              <option value="" disabled="" selected="" hidden="">Chọn dòng xe</option>
                                              <option value=" 972">MT-03</option>
                                              <option value=" 1069">MT-07</option>
                                              <option value=" 1071">MT-09</option>
                                              <option value=" 1070">MT-09-SP</option>
                                              <option value=" 1073">MT-10</option>
                                              <option value=" 1072">MT-10-SP</option>
                                              <option value=" 973">MT-15</option>
                                              <option value=" 1078">R1</option>
                                              <option value=" 1079">R6</option>
                                              <option value=" 1074">TÉNÉRE 700</option>
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </section>
                            <section class="elementor-element elementor-section-full_width elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section element-product-filter-by-dung-tich">
                              <div class="elementor-container elementor-column-gap-default">
                                <div class="elementor-row">
                                  <div class="elementor-element elementor-column elementor-col-100 elementor-top-column">
                                    <div class="elementor-column-wrap elementor-element-populated">
                                      <div class="elementor-widget-wrap">
                                        <section class="elementor-element elementor-element-33a207e elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section">
                                          <div class="elementor-container elementor-column-gap-default">
                                            <div class="elementor-row">
                                              <div class="elementor-element elementor-column elementor-col-50 elementor-inner-column">
                                                <div class="elementor-column-wrap  elementor-element-populated">
                                                  <div class="elementor-widget-wrap">
                                                    <div class="elementor-element elementor-element-17c7abc elementor-widget elementor-widget-heading">
                                                      <div class="elementor-widget-container">
                                                        <h2 class="elementor-heading-title elementor-size-default"><span
                                                            class="ez-toc-section"
                                                            id="Tim_ac_quy_theo_dung_tich_binh"></span>Tìm ắc quy
                                                          theo dung tích bình<span class="ez-toc-section-end"></span>
                                                        </h2>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="elementor-element elementor-column elementor-col-50 elementor-inner-column">
                                                <div class="elementor-column-wrap  elementor-element-populated">
                                                  <div class="elementor-widget-wrap">
                                                    <div class="elementor-element elementor-widget elementor-widget-html">
                                                      <div class="elementor-widget-container">
                                                        <select class="wpcf7-form-control wpcf7-select full-width"
                                                          id="dung-luong-binh">
                                                          <option value="" disabled="" selected="" hidden="">Chọn dung
                                                            lượng bình</option>
                                                          <option value=" 116">15c-30Ah</option>
                                                          <option value=" 117">200c-100Ah</option>
                                                          <option value=" 1227">44Wh - 5Ah (4Ah)</option>
                                                        </select>
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
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              <?php elseif(is_product_category('ac-quy-lithium-xe-may-dien')) :?>
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
                                                  <div class="title">Bạn đang tìm ắc quy cho xe máy điện nào</div>
                                                  <div class="title-desc">Hãy chọn hãng xe, sau đó chọn dòng xe</div>                                                 
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
                                  <div class="elementor-element elementor-element-e928eab elementor-column elementor-col-50 elementor-top-column"
                                    data-id="e928eab" data-element_type="column">
                                    <div class="elementor-column-wrap  elementor-element-populated">
                                      <div class="elementor-widget-wrap">
                                        <div class="elementor-element elementor-element-da4516b elementor-widget elementor-widget-html"
                                          data-id="da4516b" data-element_type="widget" data-widget_type="html.default">
                                          <div class="elementor-widget-container">
                                            <select class="wpcf7-form-control wpcf7-select full-width" id="hang-xe-o-to"
                                              onchange="thayDoiHangXe(this.value)">
                                              <option value="" disabled="" selected="" hidden="">Chọn hãng xe</option>
                                              <option value=" 988">BMW</option>
                                              <option value=" 986">Ducati</option>
                                              <option value=" 985">Harley Davidson</option>
                                              <option value=" 964">HONDA</option>
                                              <option value=" 989">Kawasaki</option>
                                              <option value=" 987">KTM</option>
                                              <option value=" 966">SUZUKI</option>
                                              <option value=" 967">TRIUMPH</option>
                                              <option value=" 965">YAMAHA</option>
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="elementor-element elementor-element-f577b18 elementor-column elementor-col-50 elementor-top-column"
                                    data-id="f577b18" data-element_type="column">
                                    <div class="elementor-column-wrap  elementor-element-populated">
                                      <div class="elementor-widget-wrap">
                                        <div class="elementor-element elementor-element-151d1c7 elementor-widget elementor-widget-html"
                                          data-id="151d1c7" data-element_type="widget" data-widget_type="html.default">
                                          <div class="elementor-widget-container">
                                            <select class="wpcf7-form-control wpcf7-select full-width" id="dong-xe-o-to"
                                              onchange="layDanhSachSanPham(this.value)">
                                              <option value="" disabled="" selected="" hidden="">Chọn dòng xe</option>
                                              <option value=" 972">MT-03</option>
                                              <option value=" 1069">MT-07</option>
                                              <option value=" 1071">MT-09</option>
                                              <option value=" 1070">MT-09-SP</option>
                                              <option value=" 1073">MT-10</option>
                                              <option value=" 1072">MT-10-SP</option>
                                              <option value=" 973">MT-15</option>
                                              <option value=" 1078">R1</option>
                                              <option value=" 1079">R6</option>
                                              <option value=" 1074">TÉNÉRE 700</option>
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </section>
                            <section class="elementor-element elementor-section-full_width elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section element-product-filter-by-dung-tich">
                              <div class="elementor-container elementor-column-gap-default">
                                <div class="elementor-row">
                                  <div class="elementor-element elementor-column elementor-col-100 elementor-top-column">
                                    <div class="elementor-column-wrap elementor-element-populated">
                                      <div class="elementor-widget-wrap">
                                        <section class="elementor-element elementor-element-33a207e elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section">
                                          <div class="elementor-container elementor-column-gap-default">
                                            <div class="elementor-row">
                                              <div class="elementor-element elementor-column elementor-col-50 elementor-inner-column">
                                                <div class="elementor-column-wrap  elementor-element-populated">
                                                  <div class="elementor-widget-wrap">
                                                    <div class="elementor-element elementor-element-17c7abc elementor-widget elementor-widget-heading">
                                                      <div class="elementor-widget-container">
                                                        <h2 class="elementor-heading-title elementor-size-default"><span
                                                            class="ez-toc-section"
                                                            id="Tim_ac_quy_theo_dung_tich_binh"></span>Tìm ắc quy
                                                          theo dung tích bình<span class="ez-toc-section-end"></span>
                                                        </h2>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="elementor-element elementor-column elementor-col-50 elementor-inner-column">
                                                <div class="elementor-column-wrap  elementor-element-populated">
                                                  <div class="elementor-widget-wrap">
                                                    <div class="elementor-element elementor-widget elementor-widget-html">
                                                      <div class="elementor-widget-container">
                                                        <select class="wpcf7-form-control wpcf7-select full-width"
                                                          id="dung-luong-binh">
                                                          <option value="" disabled="" selected="" hidden="">Chọn dung
                                                            lượng bình</option>
                                                          <option value=" 116">15c-30Ah</option>
                                                          <option value=" 117">200c-100Ah</option>
                                                          <option value=" 1227">44Wh - 5Ah (4Ah)</option>
                                                        </select>
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