<?php
$ed_title = $args['fields']['emergency_departure_title'] ?? '';
$ed_speed = $args['fields']['emergency_departure_speed'] ?? '';
$ed_desc = $args['fields']['emergency_departure_desc'] ?? '';
$ed_discount_title = $args['fields']['emergency_departure_discount_title'] ?? '';
$ed_discount_value = $args['fields']['emergency_departure_discount_value'] ?? '';
$ed_bg_id = $args['fields']['emergency_departure_bg_image'] ?? '';
$ed_phone = carbon_get_theme_option('crb_theme_phone_number');
$ed_schedule = carbon_get_theme_option('crb_theme_phone_time');
$ed_max_link = carbon_get_theme_option('crb_theme_max_link');
?>

<section class="emergency-departure">
  <div class="container">
    <div class="emergency-departure__layout">

      <div class="emergency-departure__left">
        <?php if ($ed_title): ?>
          <div class="emergency-departure__title">
            <?php echo nl2br(wp_kses_post($ed_title)); ?>
          </div>
        <?php endif; ?>

        <?php if ($ed_speed): ?>
          <div class="emergency-departure__speed">
            <span class="emergency-departure__speed-icon"></span>
            <span class="emergency-departure__speed-text">
              <?php echo wp_kses_post($ed_speed); ?>
            </span>
          </div>
        <?php endif; ?>
      </div>

      <div class="emergency-departure__center">
        <?php if ($ed_desc): ?>
          <div class="emergency-departure__desc"><?php echo nl2br(wp_kses_post($ed_desc)); ?></div>
        <?php endif; ?>

        <div class="emergency-departure__contact">
          <span class="emergency-departure__contact-label">Звоните:</span>
          <?php if ($ed_max_link): ?>
            <a href="<?php echo esc_url($ed_max_link); ?>" class="emergency-departure__contact-button">
              <span class="icon icon-max"></span>
            </a>
          <?php endif; ?>
        </div>

        <?php if ($ed_phone): ?>
          <div class="emergency-departure__phone">
            <a href="tel:<?php echo preg_replace('/[^0-9+]/', '', $ed_phone); ?>">
              <?php echo esc_html($ed_phone); ?>
            </a>
          </div>
        <?php endif; ?>

        <?php if ($ed_schedule): ?>
          <div class="emergency-departure__schedule">
            Заявки принимаем <?php echo esc_html($ed_schedule); ?>
          </div>
        <?php endif; ?>
      </div>

      <div class="emergency-departure__right">
        <div class="emergency-departure__discount">
          <?php if ($ed_discount_title): ?>
            <div class="emergency-departure__discount-title"><?php echo nl2br(wp_kses_post($ed_discount_title)); ?></div>
          <?php endif; ?>
          <?php if ($ed_discount_value): ?>
            <div class="emergency-departure__discount-value"><?php echo wp_kses_post($ed_discount_value); ?></div>
          <?php endif; ?>
        </div>
      </div>

    </div>
  </div>
</section>
