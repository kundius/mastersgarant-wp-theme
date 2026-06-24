<?php
/*
Template Name: О нас
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

    <div class="page-layout__body">
      <div class="container">
        <ol class="breadcrumbs" itemscope="" itemtype="https://schema.org/BreadcrumbList" aria-label="Хлебные крошки">
          <li class="breadcrumbs__item" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
            <a class="breadcrumbs__link" itemprop="item" href="/">
              <span itemprop="name">Главная</span>
            </a>
            <meta itemprop="position" content="1">
          </li>
          <li class="breadcrumbs__item" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
            <span class="breadcrumbs__text" itemprop="item" aria-current="page">
              <span itemprop="name"><?php the_title(); ?></span>
            </span>
            <meta itemprop="position" content="2">
          </li>
        </ol>

        <h1 class="page-title"><?php the_title(); ?></h1>

        <?php if (get_the_content()): ?>
        <div class="page-content">
          <?php the_content(); ?>
        </div>
        <?php endif; ?>
      </div>
    </div>


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

    <?php get_template_part('partials/footer'); ?>
  </div>
</body>

</html>
