<?php
/*
Template Name: Услуги и цены
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
    $services_tabs = carbon_get_post_meta(get_the_ID(), 'services_tabs');
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

    <?php get_template_part('partials/footer'); ?>
  </div>
</body>

</html>
