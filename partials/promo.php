<?php
$promo_title = $args['fields']['promo_title'] ?? '';
$promo_desc = $args['fields']['promo_desc'] ?? '';
$promo_right_title = $args['fields']['promo_right_title'] ?? '';
$promo_right_desc = $args['fields']['promo_right_desc'] ?? '';
$promo_check_items = $args['fields']['promo_check_items'] ?? [];
$phone = carbon_get_theme_option('crb_theme_phone_number');
$phone_time = carbon_get_theme_option('crb_theme_phone_time');
$phone_link = preg_replace('/[^0-9+]/', '', $phone);
?>

<section class="promo">
  <div class="container">
    <div class="promo__container">
      <div class="promo__content-left">
        <?php if ($promo_title): ?>
        <div class="promo__title"><?php echo nl2br(esc_html($promo_title)); ?></div>
        <?php endif; ?>
        <?php if ($promo_desc): ?>
        <p class="promo__desc"><?php echo nl2br(esc_html($promo_desc)); ?></p>
        <?php endif; ?>
      </div>

      <div class="promo__content-right">
        <?php if ($promo_right_title): ?>
        <div class="promo__right-title"><?php echo nl2br(esc_html($promo_right_title)); ?></div>
        <?php endif; ?>
        <?php if ($promo_right_desc): ?>
        <div class="promo__right-desc"><?php echo nl2br(esc_html($promo_right_desc)); ?></div>
        <?php endif; ?>
        <?php if ($promo_check_items): ?>
        <ul class="promo__list">
            <?php foreach ($promo_check_items as $item): ?>
            <li class="promo__item promo__item--with-check">
              <span class="promo__check-icon"></span>
              <span><?php echo nl2br(esc_html($item['text'])); ?></span>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <div class="promo__contact">
          <div class="promo__contact-schedule">
            <span class="promo__contact-dot"></span>
            Звоните, <?php echo esc_html($phone_time); ?>
          </div>
          <a href="tel:<?php echo esc_attr($phone_link); ?>" class="promo__contact-phone">
            <span class="icon icon-phone"></span>
            <?php echo esc_html($phone); ?>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
