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
                  <button type="button" class="services__link" data-callback-button>Оставить заявку</button>
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

    <?php
    $promo_title = carbon_get_post_meta(get_the_ID(), 'promo_title');
    $promo_desc = carbon_get_post_meta(get_the_ID(), 'promo_desc');
    $promo_right_title = carbon_get_post_meta(get_the_ID(), 'promo_right_title');
    $promo_right_desc = carbon_get_post_meta(get_the_ID(), 'promo_right_desc');
    $promo_check_items = carbon_get_post_meta(get_the_ID(), 'promo_check_items');
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

    <?php
    $features_title = carbon_get_post_meta(get_the_ID(), 'features_title');
    $features_items = carbon_get_post_meta(get_the_ID(), 'features_items');
    ?>

    <section class="features">
      <div class="container">
        <?php if ($features_title): ?>
        <div class="features__title"><?php echo nl2br(esc_html($features_title)); ?></div>
        <?php endif; ?>

        <?php if ($features_items): ?>
        <ul class="features__list">
          <?php foreach ($features_items as $item): ?>
          <li class="features__item">
            <div class="features__icon<?php echo $item['icon_type'] === 'text'
              ? ' features__icon--text'
              : ''; ?>">
              <?php if ($item['icon_type'] === 'text'): ?>
              <?php echo esc_html($item['icon_text']); ?>
              <?php else: ?>
              <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 7L6.5 12.5L17 1" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              <?php endif; ?>
            </div>
            <div class="features__content">
              <div class="features__text"><?php echo nl2br(wp_kses_post($item['text'])); ?></div>
            </div>
          </li>
          <?php endforeach; ?>
        </ul>
        <?php endif; ?>
      </div>
    </section>

    <?php
    $discount_form_title = carbon_get_post_meta(get_the_ID(), 'discount_form_title');
    $discount_form_desc = carbon_get_post_meta(get_the_ID(), 'discount_form_desc');
    $discount_form_btn_text = carbon_get_post_meta(get_the_ID(), 'discount_form_btn_text');
    $discount_form_image = carbon_get_post_meta(get_the_ID(), 'discount_form_image');
    ?>

    <section class="discount-form">
      <div class="discount-form__container">
        <div class="discount-form__content">
          <?php if ($discount_form_title): ?>
          <div class="discount-form__title">
            <?php echo nl2br(esc_html($discount_form_title)); ?>
          </div>
          <?php endif; ?>
          <?php if ($discount_form_desc): ?>
          <div class="discount-form__desc">
            <?php echo nl2br(esc_html($discount_form_desc)); ?>
          </div>
          <?php endif; ?>
        </div>

        <div class="discount-form__image-wrapper">
          <?php if ($discount_form_image): ?>
          <img class="discount-form__image" src="<?php echo wp_get_attachment_image_url(
            $discount_form_image,
            'full',
          ); ?>" alt="">
          <?php endif; ?>
        </div>

        <div class="discount-form__form-wrap">
          <form
            action="<?php echo admin_url('admin-ajax.php'); ?>"
            class="discount-form__form"
            data-feedback-form
            data-feedback-form-goal=""
            data-feedback-form-action="feedback_form">
            <input type="hidden" name="submitted" value="">
            <input type="hidden" name="nonce" value="<?php echo wp_create_nonce(
              'feedback-nonce',
            ); ?>">
            <input type="hidden" name="page" value="<?php echo esc_html(get_self_link()); ?>">
            <input type="hidden" name="subject" value="Получить скидку">

            <div class="discount-form__row">
              <input type="text" class="discount-form__input" name="phone" value="" data-maska="+ 7 (###) - ### - ## - ##" placeholder="+ 7 (___)  - ___ - __ - __" required>
              <button type="submit" class="discount-form__btn">
                <?php echo esc_html($discount_form_btn_text ?: 'ПОЛУЧИТЬ СКИДКУ -20%'); ?>
              </button>
            </div>

            <div class="discount-form__errors" data-feedback-form-errors></div>

            <div class="discount-form__note">Заполняя поля формы, Вы даете согласие на обработку персональных данных</div>

            <div class="modal-form-success">
              <div class="modal-form-success__title">Сообщение успешно отправлено</div>
              <div class="modal-form-success__desc">Мы свяжемся с вами в ближайшее время</div>
              <button type="button" class="modal-form-success__close" data-feedback-form-reset>Закрыть</button>
            </div>
          </form>
        </div>
      </div>
    </section>

    <?php
    $advantages_title = carbon_get_post_meta(get_the_ID(), 'advantages_title');
    $advantages_caption_title = carbon_get_post_meta(get_the_ID(), 'advantages_caption_title');
    $advantages_caption_desc = carbon_get_post_meta(get_the_ID(), 'advantages_caption_desc');
    $advantages_items = carbon_get_post_meta(get_the_ID(), 'advantages_items');
    $advantages_image = carbon_get_post_meta(get_the_ID(), 'advantages_image');
    ?>

    <?php if (
      $advantages_title ||
      $advantages_caption_title ||
      $advantages_items ||
      $advantages_image
    ): ?>
    <section class="advantages">
      <div class="container">
            <div class="advantages__container">
                    <?php if ($advantages_title): ?>
                    <div class="advantages__title">
                        <?php echo nl2br(esc_html($advantages_title)); ?>
                    </div>
                    <?php endif; ?>

                    <?php if ($advantages_caption_title || $advantages_caption_desc): ?>
                    <div class="advantages__caption-wrapper">
                    <div class="advantages__caption">
                        <?php if ($advantages_caption_title): ?>
                        <div class="advantages__caption-title"><?php echo nl2br(
                          esc_html($advantages_caption_title),
                        ); ?></div>
                        <?php endif; ?>
                        <?php if ($advantages_caption_desc): ?>
                        <div class="advantages__caption-desc"><?php echo nl2br(
                          esc_html($advantages_caption_desc),
                        ); ?></div>
                        <?php endif; ?>
                    </div>
                    </div>
                    <?php endif; ?>

                    <?php if ($advantages_items): ?>
                    <ul class="advantages__list">
                        <?php foreach ($advantages_items as $item): ?>
                        <li class="advantages__item">
                            <div class="advantages__icon-box">
                                <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 4.5L4.5 8L11 1" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="advantages__info">
                                <?php if (!empty($item['title'])): ?>
                                <div class="advantages__item-title"><?php echo nl2br(
                                  esc_html($item['title']),
                                ); ?></div>
                                <?php endif; ?>
                                <?php if (!empty($item['desc'])): ?>
                                <div class="advantages__item-desc"><?php echo nl2br(
                                  esc_html($item['desc']),
                                ); ?></div>
                                <?php endif; ?>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>

                    <?php if ($advantages_image): ?>
                    <div class="advantages__visual">
                        <div class="advantages__image-wrapper">
                            <?php echo wp_get_attachment_image($advantages_image, 'full', false, [
                              'class' => 'advantages__image',
                            ]); ?>
                        </div>
                    </div>
                    <?php endif; ?>
            </div>
            </div>
        </section>
    <?php endif; ?>

    <?php
    $team_title = carbon_get_post_meta(get_the_ID(), 'team_title');
    $team_subtitle = carbon_get_post_meta(get_the_ID(), 'team_subtitle');
    $team_stat_years_number = carbon_get_post_meta(get_the_ID(), 'team_stat_years_number');
    $team_stat_years_label = carbon_get_post_meta(get_the_ID(), 'team_stat_years_label');
    $team_stat_clients_number = carbon_get_post_meta(get_the_ID(), 'team_stat_clients_number');
    $team_stat_clients_label = carbon_get_post_meta(get_the_ID(), 'team_stat_clients_label');
    $team_gallery = carbon_get_post_meta(get_the_ID(), 'team_gallery');
    $team_bottom_text = carbon_get_post_meta(get_the_ID(), 'team_bottom_text');
    ?>

    <?php if ($team_title || $team_subtitle || $team_gallery || $team_bottom_text): ?>
    <section class="team">
        <div class="container">

            <?php if ($team_title): ?>
            <div class="team__header">
                <div class="team__title">
                    <?php echo nl2br(wp_kses_post($team_title)); ?>
                </div>
            </div>
            <?php endif; ?>

            <?php if ($team_subtitle): ?>
            <div class="team__subtitle"><?php echo nl2br(esc_html($team_subtitle)); ?></div>
            <?php endif; ?>

            <?php if ($team_stat_years_number || $team_stat_clients_number): ?>
            <div class="team__stats">
                <?php if ($team_stat_years_number): ?>
                <div class="team__stat">
                    <span class="team__stat-number"><?php echo esc_html(
                      $team_stat_years_number,
                    ); ?></span>
                    <?php if ($team_stat_years_label): ?>
                    <span class="team__stat-label"><?php echo esc_html(
                      $team_stat_years_label,
                    ); ?></span>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                <?php if ($team_stat_clients_number): ?>
                <div class="team__stat">
                    <span class="team__stat-number"><?php echo esc_html(
                      $team_stat_clients_number,
                    ); ?></span>
                    <?php if ($team_stat_clients_label): ?>
                    <span class="team__stat-label"><?php echo esc_html(
                      $team_stat_clients_label,
                    ); ?></span>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <?php if ($team_gallery): ?>
            <div class="team__gallery">
                <?php foreach ($team_gallery as $item): ?>
                <div class="team__card">
                    <?php echo wp_get_attachment_image($item['image'], 'medium', false, [
                      'class' => 'team__image',
                      'alt' => 'Мастер',
                    ]); ?>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <?php if ($team_bottom_text): ?>
            <div class="team__bottom">
                <p class="team__bottom-text"><?php echo nl2br(esc_html($team_bottom_text)); ?></p>
            </div>
            <?php endif; ?>

        </div>
    </section>
    <?php endif; ?>

    <?php
    $steps_title = carbon_get_post_meta(get_the_ID(), 'steps_title');
    $steps_card1_badge = carbon_get_post_meta(get_the_ID(), 'steps_card1_badge');
    $steps_card1_title = carbon_get_post_meta(get_the_ID(), 'steps_card1_title');
    $steps_card1_subtitle = carbon_get_post_meta(get_the_ID(), 'steps_card1_subtitle');
    $steps_card1_btn_text = carbon_get_post_meta(get_the_ID(), 'steps_card1_btn_text');
    $steps_cards = carbon_get_post_meta(get_the_ID(), 'steps_cards');
    $steps_phone = carbon_get_theme_option('crb_theme_phone_number');
    $steps_phone_time = carbon_get_theme_option('crb_theme_phone_time');
    $steps_phone_link = preg_replace('/[^0-9+]/', '', $steps_phone);
    ?>

    <?php if ($steps_title || $steps_card1_title || $steps_cards): ?>
    <section class="steps">
        <div class="container">
            <?php if ($steps_title): ?>
            <div class="steps__title"><?php echo wp_kses_post($steps_title); ?></div>
            <?php endif; ?>

            <div class="steps__grid">

                <?php if ($steps_card1_title): ?>
                <div class="steps__card steps__card--colored">
                    <div class="steps__badge">
                      <?php echo esc_html($steps_card1_badge ?: '01'); ?>
                    </div>
                    <div class="steps__card-title">
                      <?php echo nl2br(esc_html($steps_card1_title)); ?>
                    </div>

                    <div class="steps__contact-group">
                        <div class="steps__contact-schedule">
                            <span class="steps__contact-dot"></span>
                            Заявки принимаем <?php echo esc_html($steps_phone_time); ?>
                        </div>
                        <a href="tel:<?php echo esc_attr(
                          $steps_phone_link,
                        ); ?>" class="steps__contact-phone">
                            <span class="icon icon-phone"></span>
                            <?php echo esc_html($steps_phone); ?>
                        </a>
                    </div>

                    <div class="steps__card-subtitle"><?php echo esc_html(
                      $steps_card1_subtitle,
                    ); ?></div>

                    <form
                      action="<?php echo admin_url('admin-ajax.php'); ?>"
                      class="steps__form"
                      data-feedback-form
                      data-feedback-form-goal=""
                      data-feedback-form-action="feedback_form">
                      <input type="hidden" name="submitted" value="">
                      <input type="hidden" name="nonce" value="<?php echo wp_create_nonce(
                        'feedback-nonce',
                      ); ?>">
                      <input type="hidden" name="page" value="<?php echo esc_html(
                        get_self_link(),
                      ); ?>">
                      <input type="hidden" name="subject" value="Оставить заявку">

                      <div class="steps__input-wrapper">
                        <input type="text" class="steps__input" name="phone" value="" data-maska="+ 7 (###) - ### - ## - ##" placeholder="+ 7 (___)  - ___ - __ - __" required>
                      </div>

                      <div class="steps__errors" data-feedback-form-errors></div>

                      <button type="submit" class="steps__btn"><?php echo esc_html(
                        $steps_card1_btn_text,
                      ); ?></button>
                      <div class="steps__form-note">Заполняя поля формы, Вы даете согласие на обработку персональных данных</div>

                      <div class="modal-form-success">
                        <div class="modal-form-success__title">Сообщение успешно отправлено</div>
                        <div class="modal-form-success__desc">Мы свяжемся с вами в ближайшее время</div>
                        <button type="button" class="modal-form-success__close" data-feedback-form-reset>Закрыть</button>
                      </div>
                    </form>
                </div>
                <?php endif; ?>

                <?php if ($steps_cards): ?>
                <?php foreach ($steps_cards as $card): ?>
                <div class="steps__card">
                    <div class="steps__badge">
                      <?php echo esc_html($card['badge']); ?>
                    </div>
                    <div class="steps__card-title">
                      <?php echo nl2br(esc_html($card['title'])); ?>
                    </div>

                    <?php if (!empty($card['desc'])): ?>
                    <div class="steps__card-desc">
                      <?php echo nl2br(esc_html($card['desc'])); ?>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($card['items'])): ?>
                    <ul class="steps__list">
                        <?php foreach ($card['items'] as $item): ?>
                        <li class="steps__list-item">
                            <div class="steps__list-icon">✓</div>
                            <?php echo esc_html($item['text']); ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>

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
    $contacts_title = carbon_get_theme_option('crb_theme_contacts_title');
    $contacts_subtitle = carbon_get_theme_option('crb_theme_contacts_subtitle');
    $contacts_schedules = carbon_get_theme_option('crb_theme_contacts_schedules');
    $contacts_phone = carbon_get_theme_option('crb_theme_phone_number');
    $contacts_phone_time = carbon_get_theme_option('crb_theme_phone_time');
    $contacts_phone_link = preg_replace('/[^0-9+]/', '', $contacts_phone);
    $contacts_email = carbon_get_theme_option('crb_theme_email');
    $contacts_address = carbon_get_theme_option('crb_theme_address');
    $contacts_card_title = carbon_get_theme_option('crb_theme_contacts_card_title');
    $contacts_card_text = carbon_get_theme_option('crb_theme_contacts_card_text');
    ?>

    <?php if ($contacts_title || $contacts_phone || $contacts_card_title): ?>
    <section class="contacts">
        <div class="container">
            <?php if ($contacts_title): ?>
            <div class="contacts__title"><?php echo esc_html($contacts_title); ?></div>
            <?php endif; ?>

            <div class="contacts__grid">
                <div class="contacts__info">
                    <?php if ($contacts_subtitle): ?>
                    <div class="contacts__subtitle"><?php echo esc_html(
                      $contacts_subtitle,
                    ); ?></div>
                    <?php endif; ?>

                    <?php if ($contacts_phone): ?>
                    <div class="contacts__phone-group">
                        <?php if ($contacts_phone_time): ?>
                        <div class="contacts__phone-schedule">
                            <span class="contacts__dot"></span>
                            <span>Заявки принимаем <?php echo esc_html(
                              $contacts_phone_time,
                            ); ?></span>
                        </div>
                        <?php endif; ?>
                        <a href="tel:<?php echo esc_attr(
                          $contacts_phone_link,
                        ); ?>" class="contacts__phone">
                            <span class="icon icon-phone"></span>
                            <?php echo esc_html($contacts_phone); ?>
                        </a>
                        <?php if ($contacts_schedules): ?>
                        <?php foreach ($contacts_schedules as $item): ?>
                        <div class="contacts__phone-schedule">
                            <span class="contacts__dot"></span>
                            <span><?php echo esc_html($item['text']); ?></span>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>

                    <?php if ($contacts_email): ?>
                    <div class="contacts__email">
                        <span class="icon icon-mail"></span>
                        <a href="mailto:<?php echo esc_attr(
                          $contacts_email,
                        ); ?>"><?php echo esc_html($contacts_email); ?></a>
                    </div>
                    <?php endif; ?>

                    <?php if ($contacts_address): ?>
                    <div class="contacts__address">
                        <span class="icon icon-marker"></span>
                        <span><?php echo esc_html($contacts_address); ?></span>
                    </div>
                    <?php endif; ?>
                </div>

                <?php if ($contacts_card_title || $contacts_card_text): ?>
                <div class="contacts__areas-card">
                    <?php if ($contacts_card_title): ?>
                    <div class="contacts__card-title"><?php echo esc_html(
                      $contacts_card_title,
                    ); ?></div>
                    <?php endif; ?>
                    <?php if ($contacts_card_text): ?>
                    <div class="contacts__card-text"><?php echo nl2br(
                      esc_html($contacts_card_text),
                    ); ?></div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php get_template_part('partials/footer'); ?>
  </div>
</body>

</html>
