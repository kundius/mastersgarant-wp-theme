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

    <section class="services">
        <!-- Скрытые радио-кнопки для переключения вкладок (CSS Only) -->
        <input type="radio" class="services__radio" id="services-tab-1" name="services-tabs" checked>
        <input type="radio" class="services__radio" id="services-tab-2" name="services-tabs">

        <h2 class="services__title">Мы лицензированная компания. 10 лет оказываем услуги</h2>

        <div class="services__tabs">
            <label class="services__tab" for="services-tab-1">
                <span class="services__tab-icon">✓</span>
                <span class="services__tab-text">Аварийный<br>ремонт</span>
            </label>
            <label class="services__tab" for="services-tab-2">
                <span class="services__tab-icon">✓</span>
                <span class="services__tab-text">Монтажные<br>работы</span>
            </label>
        </div>

        <div class="services__body">
            <!-- Изображение -->
            <div class="services__image-wrapper">
                <img class="services__image" src="https://images.unsplash.com/photo-1558403194-611308249627?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Электрик">
            </div>

            <!-- Контентная область -->
            <div class="services__content">

                <!-- Панель 1: Аварийный ремонт -->
                <div class="services__panel services__panel--tab1">
                    <h3 class="services__subtitle">Аварийный ремонт</h3>
                    <ul class="services__list">
                        <li class="services__item">
                            <span class="services__name">Диагностика проводки</span>
                            <span class="services__price">от 350 ₽</span>
                            <a href="#" class="services__link">Оставить заявку</a>
                        </li>
                        <li class="services__item">
                            <span class="services__name">Короткого замыкания</span>
                            <span class="services__price">от 500 ₽</span>
                            <a href="#" class="services__link">Оставить заявку</a>
                        </li>
                        <li class="services__item">
                            <span class="services__name">Устранение обрыва</span>
                            <span class="services__price">от 450 ₽</span>
                            <a href="#" class="services__link">Оставить заявку</a>
                        </li>
                        <li class="services__item">
                            <span class="services__name">Ремонт выключателя</span>
                            <span class="services__price">от 250 ₽</span>
                            <a href="#" class="services__link">Оставить заявку</a>
                        </li>
                        <li class="services__item">
                            <span class="services__name">Ремонт светильников и люстр</span>
                            <span class="services__price">от 400 ₽</span>
                            <a href="#" class="services__link">Оставить заявку</a>
                        </li>
                        <li class="services__item">
                            <span class="services__name">Искрит розетка</span>
                            <span class="services__price">от 150 ₽</span>
                            <a href="#" class="services__link">Оставить заявку</a>
                        </li>
                        <li class="services__item">
                            <span class="services__name">Искрит выключатель</span>
                            <span class="services__price">от 150 ₽</span>
                            <a href="#" class="services__link">Оставить заявку</a>
                        </li>
                        <li class="services__item">
                            <span class="services__name">Нет света</span>
                            <span class="services__price">от 600 ₽</span>
                            <a href="#" class="services__link">Оставить заявку</a>
                        </li>
                        <li class="services__item">
                            <span class="services__name">Ремонт розетки</span>
                            <span class="services__price">от 250 ₽</span>
                            <a href="#" class="services__link">Оставить заявку</a>
                        </li>
                        <li class="services__item">
                            <span class="services__name">Искрит щиток</span>
                            <span class="services__price">от 450 ₽</span>
                            <a href="#" class="services__link">Оставить заявку</a>
                        </li>
                    </ul>

                    <div class="services__callback">
                        <div class="services__callback-title">Вызов мастера и<br>диагностика</div>
                        <div class="services__callback-info">
                            <div class="services__callback-schedule">
                                <span class="services__callback-dot"></span> Заявки принимаем Пн-Вс: 8:00-22:00
                            </div>
                            <a href="tel:+79266316386" class="services__callback-phone">📞 +7 (926) 631-63-86</a>
                        </div>
                    </div>
                </div>

                <!-- Панель 2: Монтажные работы (скрыта по умолчанию, переключается CSS) -->
                <div class="services__panel services__panel--tab2">
                    <h3 class="services__subtitle">Монтажные работы</h3>
                    <ul class="services__list">
                        <li class="services__item">
                            <span class="services__name">Монтаж люстры</span>
                            <span class="services__price">от 500 ₽</span>
                            <a href="#" class="services__link">Оставить заявку</a>
                        </li>
                        <li class="services__item">
                            <span class="services__name">Монтаж точечных светильников</span>
                            <span class="services__price">от 300 ₽</span>
                            <a href="#" class="services__link">Оставить заявку</a>
                        </li>
                        <li class="services__item">
                            <span class="services__name">Монтаж розеток</span>
                            <span class="services__price">от 250 ₽</span>
                            <a href="#" class="services__link">Оставить заявку</a>
                        </li>
                        <li class="services__item">
                            <span class="services__name">Монтаж выключателей</span>
                            <span class="services__price">от 200 ₽</span>
                            <a href="#" class="services__link">Оставить заявку</a>
                        </li>
                        <li class="services__item">
                            <span class="services__name">Монтаж проводки под гипсокартон</span>
                            <span class="services__price">от 400 ₽</span>
                            <a href="#" class="services__link">Оставить заявку</a>
                        </li>
                        <li class="services__item">
                            <span class="services__name">Замена старой проводки (за м)</span>
                            <span class="services__price">от 800 ₽</span>
                            <a href="#" class="services__link">Оставить заявку</a>
                        </li>
                        <li class="services__item">
                            <span class="services__name">Сборка и подключение щитка</span>
                            <span class="services__price">от 1500 ₽</span>
                            <a href="#" class="services__link">Оставить заявку</a>
                        </li>
                    </ul>

                    <!-- Блок вызова мастера продублирован для второй вкладки -->
                    <div class="services__callback">
                        <div class="services__callback-title">Вызов мастера и<br>диагностика</div>
                        <div class="services__callback-info">
                            <div class="services__callback-schedule">
                                <span class="services__callback-dot"></span> Заявки принимаем Пн-Вс: 8:00-22:00
                            </div>
                            <a href="tel:+79266316386" class="services__callback-phone">📞 +7 (926) 631-63-86</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

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
