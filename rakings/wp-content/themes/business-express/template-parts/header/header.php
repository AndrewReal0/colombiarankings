<div class="header" style="background-image:url('<?php esc_url(header_image());?>');">
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
    <div class="row header_title">
      <h1 class="heading98"><?php echo business_express_title(); ?></h1>
    </div>
  </div>
</div>