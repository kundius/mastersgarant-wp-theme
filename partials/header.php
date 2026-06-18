<div class="header-anchor" data-sticky-header-anchor></div>

<div class="header" data-sticky-header data-mobile-menu="closed">
  <div class="container">
    <div class="header-layout">
      <a href="/" class="header-logo">
        <?php if ($logo_id = carbon_get_theme_option('crb_theme_site_logo')): ?>
          <img src="<?php echo wp_get_attachment_image_url($logo_id, 'full'); ?>" alt="" class="header-logo__image" />
        <?php endif; ?>
        <span class="header-logo__name"><?php echo nl2br(carbon_get_theme_option('crb_theme_site_name') ?: get_bloginfo('name')); ?></span>
      </a>

      <button type="button" class="header-toggle" data-mobile-menu-toggle aria-label="Меню">
        <span class="icon icon-menu"></span>
        <span class="icon icon-close"></span>
      </button>

      <div class="header-overlay">
        <?php wp_nav_menu([
          'theme_location' => 'menu-main',
          'container' => null,
          'menu_class' => 'header-nav',
        ]); ?>
      </div>

      <div class="header-contacts">
        <div class="header-max">
          <a class="header-max__button" href="<?php echo carbon_get_theme_option('crb_theme_max_link'); ?>">
            <span class="header-max__button-icon icon icon-max"></span>
            <span class="header-max__button-text">Вызов мастера</span>
          </a>
        </div>

        <div class="header-phone">
          <div class="header-phone__time">
            Звоните, <?php echo carbon_get_theme_option('crb_theme_phone_time'); ?>
          </div>
          <?php $phone = carbon_get_theme_option('crb_theme_phone_number'); ?>
          <a class="header-phone__number" href="tel:<?php echo preg_replace('/[^0-9+]/', '', $phone); ?>" data-callback-button>
            <span class="header-phone__number-icon icon icon-phone"></span>
            <span class="header-phone__number-text"><?php echo $phone; ?></span>
          </a>
          <div class="header-phone__caption">
            <?php echo carbon_get_theme_option('crb_theme_phone_caption'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
