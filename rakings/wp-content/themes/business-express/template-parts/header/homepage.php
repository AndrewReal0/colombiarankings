<div class="header-homepage" style="background-image:url('<?php echo business_express_homepage_header(); ?>');">
  <div class="top-bar">
   <div class="gridContainer">
    <div class="row">
     <div class="top-bar-left">
       <?php business_express_print_contact(); ?>
     </div>
     <div class="top-bar-right">
      <?php

        $business_express_social = array(
          'facebook',
          'twitter',
          'google-plus',
          'youtube',
          'skype',
          'behance'
        );



        foreach ($business_express_social as $name) {
          $value = get_theme_mod("business_express_".$name, '');

          if (current_user_can('edit_theme_options')) {
            if ( empty( $value )) {
              $value = '#';
            }
          }

          if (!empty($value)) {
            printf('<a href="%1$s" target="_blank"><i class="font-icon-9 fa fa-%2$s"></i></a>', esc_url($value), $name);
          }
        }
      ?>
     </div>
    </div>
   </div>
  </div>

  <div class="menu-top-bar">
    <div class="gridContainer">
      <div class="row border_bottom">
        <div class="logo_col">
          <?php echo business_express_logo(); ?>
        </div>
        <div class="main_menu_col">
          <?php 
            wp_nav_menu(array(
              'theme_location' => 'primary',
              'menu_id'        => 'drop_mainmenu',
              'menu_class' => 'fm2_drop_mainmenu',
              'container_id' => 'drop_mainmenu_container',
              'fallback_cb' => 'business_express_nomenu_cb'
            ));
          ?>
        </div>
      </div>
    </div>
  </div>
  <div class="gridContainer">
    <div class="row header_description">
      <h1 class="heading8">
        <?php echo wp_kses_post(get_bloginfo('description')); ?>
      </h1>
    </div>
  </div>
</div>