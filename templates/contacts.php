<?php
/*
Template Name: Контакты
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

    <?php if ($contacts_phone || $contacts_card_title): ?>
    <section class="contacts">
        <div class="container">

            <div class="contacts__grid">
                <div class="contacts__info">
                    <div class="contacts__subtitle">Звоните прямо сейчас:</div>

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

    <div class="page-layout__spacer"></div>

    <?php get_template_part('partials/footer'); ?>
  </div>
</body>

</html>
