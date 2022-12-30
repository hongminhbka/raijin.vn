<?php
   if ( empty( $settings['title_text'] ) ) {
      return;
   }
   $title_text = $settings['title_text'];
   $sub_title = $settings['sub_title'];
   $description_text = $settings['description_text'];
   $icon_image = '';
   if($settings['icon'] == 'yes'){
      $icon_image = (isset($settings['icon_image']['url']) && $settings['icon_image']['url']) ? $settings['icon_image']['url'] : '';
      if(empty($icon_image)) $icon_image = GAVIAS_VIZEON_PLUGIN_URL . 'elementor/assets/images/icon-heading.png';
   }

   $this->add_render_attribute( 'block', 'class', [ 'align-' . $settings['align'], $settings['style'], 'widget gsc-heading' ] );
   $header_tag = 'h2';

   $this->add_render_attribute( 'title_text', 'class', 'title' );
   $this->add_render_attribute( 'description_text', 'class', 'title-desc' );

   $this->add_inline_editing_attributes( 'title_text', 'none' );
   $this->add_inline_editing_attributes( 'sub_title', 'none' );
   $this->add_inline_editing_attributes( 'description_text' );

   ?>
   <div <?php echo $this->get_render_attribute_string( 'block' ) ?>>
      <div class="content-inner">
         
         <?php if($icon_image){ ?>
            <div class="heading-icon"><img src="<?php echo esc_url($icon_image) ?>" alt="<?php echo esc_html($settings['title_text']) ?>"/></div>
         <?php } ?>
         <?php if($settings['video'] == 'yes' && $settings['video_url']){ ?>
            <div class="heading-video">
            <a class="video-link popup-video" href="<?php echo esc_url($settings['video_url']) ?>"><i class="fa fa-play"></i></a>
            </div>
         <?php } ?>

         <?php if($sub_title){ ?>
            <div class="sub-title"><span><?php echo esc_html($sub_title); ?></span></div>
         <?php } ?>  
         
         <?php if($title_text){ ?>
            <<?php echo esc_attr($header_tag) ?> <?php echo $this->get_render_attribute_string( 'title_text' ); ?>>
               <span><?php echo $settings['title_text'] ?></span>
            </<?php echo esc_attr($header_tag) ?>>
         <?php } ?>
         <?php if( $description_text && !empty(trim($description_text)) ){ ?>
            <div <?php echo $this->get_render_attribute_string( 'description_text' ); ?>><?php echo wp_kses($description_text, true); ?></div>
         <?php } ?>

         <?php if($settings['button_url']['url']){ ?>
            <div class="heading-action">
               <?php $this->gva_render_button('btn-theme btn-cta'); ?>
            </div>
         <?php } ?>

      </div>
   </div>
   <div class="clearfix"></div>
