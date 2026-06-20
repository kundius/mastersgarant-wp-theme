<?php
/*
Template Name: Лендинг
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> itemscope itemtype="http://schema.org/WebSite">

<head>
  <?php get_template_part('partials/head'); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <div class="page-layout">
    <?php get_template_part('partials/header'); ?>

    <section class="intro">
      <?php if ($video_id = carbon_get_post_meta(get_the_ID(), 'intro_bg_video')): ?>
        <?php $poster_id = carbon_get_post_meta(get_the_ID(), 'intro_bg_image'); ?>
        <div class="intro__bg">
          <video class="intro__bg-video" autoplay muted loop playsinline poster="<?php echo $poster_id
            ? wp_get_attachment_image_url($poster_id, 'full')
            : ''; ?>">
            <source src="<?php echo wp_get_attachment_url($video_id); ?>" type="video/mp4">
          </video>
        </div>
      <?php elseif ($image_id = carbon_get_post_meta(get_the_ID(), 'intro_bg_image')): ?>
        <div class="intro__bg">
          <img class="intro__bg-image" src="<?php echo wp_get_attachment_image_url(
            $image_id,
            'full',
          ); ?>" alt="" />
        </div>
      <?php endif; ?>

      <div class="container">
        <div class="intro__content">
          <?php if ($title = carbon_get_post_meta(get_the_ID(), 'intro_title')): ?>
            <h1 class="intro__title"><?php echo nl2br(wp_kses_post($title)); ?></h1>
          <?php endif; ?>

          <?php if ($desc = carbon_get_post_meta(get_the_ID(), 'intro_desc')): ?>
            <div class="intro__desc">
              <span class="intro__desc-text"><?php echo nl2br(wp_kses_post($desc)); ?></span>
            </div>
          <?php endif; ?>

          <?php $advantages = carbon_get_post_meta(get_the_ID(), 'intro_advantages'); ?>
          <?php if ($advantages): ?>
            <ul class="intro__advantages">
              <?php foreach ($advantages as $item): ?>
                <li class="intro__advantages-item">
                  <span class="intro__advantages-marker"></span>
                  <span class="intro__advantages-text"><?php echo nl2br(
                    wp_kses_post($item['text']),
                  ); ?></span>
                </li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>

          <div class="intro__buttons">
            <button type="button" data-callback-button class="intro__button intro__button--calc">
              <span class="intro__button-icon"></span>
              <span class="intro__button-text">Рассчитать стоимость<br> и получить скидку</span>
            </button>
            <?php $phone = carbon_get_theme_option('crb_theme_phone_number'); ?>
            <a href="tel:<?php echo preg_replace(
              '/[^0-9+]/',
              '',
              $phone,
            ); ?>" class="intro__button intro__button--max">
              <span class="intro__button-icon icon icon-max"></span>
              <span class="intro__button-text">Вызов мастера</span>
            </a>
          </div>
        </div>
      </div>
    </section>

    <?php
    $ed_title = carbon_get_post_meta(get_the_ID(), 'emergency_departure_title');
    $ed_speed = carbon_get_post_meta(get_the_ID(), 'emergency_departure_speed');
    $ed_desc = carbon_get_post_meta(get_the_ID(), 'emergency_departure_desc');
    $ed_discount_title = carbon_get_post_meta(get_the_ID(), 'emergency_departure_discount_title');
    $ed_discount_value = carbon_get_post_meta(get_the_ID(), 'emergency_departure_discount_value');
    $ed_bg_id = carbon_get_post_meta(get_the_ID(), 'emergency_departure_bg_image');
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
              <div class="emergency-departure__desc"><?php echo nl2br(
                wp_kses_post($ed_desc),
              ); ?></div>
            <?php endif; ?>

            <div class="emergency-departure__contact">
              <span class="emergency-departure__contact-label">Звоните:</span>
              <?php if ($ed_max_link): ?>
                <a href="<?php echo esc_url(
                  $ed_max_link,
                ); ?>" class="emergency-departure__contact-button">
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
                <div class="emergency-departure__discount-title"><?php echo nl2br(
                  wp_kses_post($ed_discount_title),
                ); ?></div>
              <?php endif; ?>
              <?php if ($ed_discount_value): ?>
                <div class="emergency-departure__discount-value"><?php echo wp_kses_post(
                  $ed_discount_value,
                ); ?></div>
              <?php endif; ?>
            </div>
          </div>

        </div>
      </div>
    </section>

    <?php
    $services_tabs = carbon_get_post_meta(get_the_ID(), 'services_tabs');
    $services_title = carbon_get_post_meta(get_the_ID(), 'services_title');
    $services_callback_title = carbon_get_post_meta(get_the_ID(), 'services_callback_title');
    $phone = carbon_get_theme_option('crb_theme_phone_number');
    $phone_time = carbon_get_theme_option('crb_theme_phone_time');
    $phone_link = preg_replace('/[^0-9+]/', '', $phone);
    ?>

    <?php if ($services_tabs): ?>
    <style>
      <?php for ($i = 1; $i <= count($services_tabs); $i++): ?>
      #services-tab-<?php echo $i; ?>:checked ~ .services__tabs label[for='services-tab-<?php echo $i; ?>'] {
        background-color: #d3eed3;
        color: #155724;
      }
      #services-tab-<?php echo $i; ?>:checked ~ .services__body .services__panel--tab-<?php echo $i; ?> {
        display: block;
      }
      #services-tab-<?php echo $i; ?>:checked ~ .services__body .services__image-wrapper img[data-tab-image="<?php echo $i; ?>"] {
        display: block;
      }
      <?php endfor; ?>
    </style>

    <section class="services">
      <div class="container">
        <?php
        $i = 0;
        foreach ($services_tabs as $tab):
          $i++; ?>
        <input type="radio" class="services__radio" id="services-tab-<?php echo $i; ?>" name="services-tabs" <?php echo $i ===
1
  ? 'checked'
  : ''; ?>>
        <?php
        endforeach;
        ?>

        <?php if ($services_title): ?>
        <div class="services__title"><?php echo nl2br(esc_html($services_title)); ?></div>
        <?php endif; ?>

        <div class="services__tabs">
          <?php
          $i = 0;
          foreach ($services_tabs as $tab):
            $i++; ?>
          <label class="services__tab" for="services-tab-<?php echo $i; ?>">
            <span class="services__tab-icon"></span>
            <span class="services__tab-text"><?php echo nl2br(esc_html($tab['label'])); ?></span>
          </label>
          <?php
          endforeach;
          ?>
        </div>

        <div class="services__body">
          <div class="services__image-wrapper">
            <?php
            $i = 0;
            foreach ($services_tabs as $tab):
              $i++; ?>
              <?php if ($image_id = $tab['image']): ?>
              <img class="services__image" src="<?php echo wp_get_attachment_image_url(
                $image_id,
                'full',
              ); ?>" alt="" data-tab-image="<?php echo $i; ?>">
              <?php endif; ?>
            <?php
            endforeach;
            ?>
          </div>

          <div class="services__content">
            <?php
            $i = 0;
            foreach ($services_tabs as $tab):
              $i++; ?>
            <div class="services__panel services__panel--tab-<?php echo $i; ?>">
              <?php if ($tab['subtitle']): ?>
              <div class="services__subtitle"><?php echo nl2br(esc_html($tab['subtitle'])); ?></div>
              <?php endif; ?>

              <?php if ($tab['items']): ?>
              <ul class="services__list">
                <?php foreach ($tab['items'] as $item): ?>
                <li class="services__item">
                  <span class="services__name"><?php echo esc_html($item['name']); ?></span>
                  <span class="services__price"><?php echo esc_html($item['price']); ?></span>
                  <a href="#" class="services__link">Оставить заявку</a>
                </li>
                <?php endforeach; ?>
              </ul>
              <?php endif; ?>

              <div class="services__callback">
                <div class="services__callback-title"><?php echo nl2br(
                  esc_html($services_callback_title ?: "Вызов мастера и\nдиагностика"),
                ); ?></div>
                <div class="services__callback-info">
                  <div class="services__callback-schedule">
                    <span class="services__callback-dot"></span> Звоните <?php echo esc_html(
                      $phone_time,
                    ); ?>
                  </div>
                  <a href="tel:<?php echo esc_attr(
                    $phone_link,
                  ); ?>" class="services__callback-phone">
                    <span class="icon icon-phone"></span> <?php echo esc_html($phone); ?>
                  </a>
                </div>
              </div>
            </div>
            <?php
            endforeach;
            ?>
          </div>
        </div>
      </div>
    </section>
    <?php endif; ?>

    <div class="page-layout__body">
      <div class="container">
        <div class="page-content">
          <?php the_content(); ?>
        </div>
      </div>
    </div>

    <?php
// get_template_part('partials/services');
?>
    <?php
// get_template_part('partials/reviews');
?>
    <?php
// get_template_part('partials/news');
?>

    <?php get_template_part('partials/footer'); ?>
  </div>
</body>

</html>
