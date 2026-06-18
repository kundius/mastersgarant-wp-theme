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
          <video class="intro__bg-video" autoplay muted loop playsinline poster="<?php echo $poster_id ? wp_get_attachment_image_url($poster_id, 'full') : ''; ?>">
            <source src="<?php echo wp_get_attachment_url($video_id); ?>" type="video/mp4">
          </video>
        </div>
      <?php elseif ($image_id = carbon_get_post_meta(get_the_ID(), 'intro_bg_image')): ?>
        <div class="intro__bg">
          <img class="intro__bg-image" src="<?php echo wp_get_attachment_image_url($image_id, 'full'); ?>" alt="" />
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
                  <span class="intro__advantages-text"><?php echo nl2br(wp_kses_post($item['text'])); ?></span>
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
            <a href="tel:<?php echo preg_replace('/[^0-9+]/', '', $phone); ?>" class="intro__button intro__button--max">
              <span class="intro__button-icon icon icon-max"></span>
              <span class="intro__button-text">Вызов мастера</span>
            </a>
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

    <?php // get_template_part('partials/services');
    ?>
    <?php // get_template_part('partials/reviews');
    ?>
    <?php // get_template_part('partials/news');
    ?>

    <?php get_template_part('partials/footer'); ?>
  </div>
</body>

</html>
