<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

add_action('after_setup_theme', function () {
  \Carbon_Fields\Carbon_Fields::boot();
});

add_action('admin_head', function () {
  echo '<style>
    [data-type^="carbon-fields/"] {
      padding: 16px;
      background: #f0f0f0;
      border: 2px solid #007cba;
    }

    [data-type^="carbon-fields/"] .cf-complex__tabs--tabbed-horizontal .cf-complex__tabs-list {
      padding-left: 0;
    }

    [data-type^="carbon-fields/"] .cf-field.cf-media-gallery .cf-field__body {
      background: #ffffff;
    }

    [data-type^="carbon-fields/"] .cf-field.cf-separator .cf-field__body h3 {
      font-size: 20px;
      color: #000;
      font-weight: 500;
    }
  </style>';
});

add_action('carbon_fields_register_fields', 'register_carbon_fields_blocks');
function register_carbon_fields_blocks()
{
  Container::make('post_meta', 'SEO')
    ->where('post_type', '=', 'page')
    ->or_where('post_type', '=', 'post')
    ->add_fields([
      Field::make('text', 'crb_seo_title', 'Заголовок'),
      Field::make('text', 'crb_seo_keywords', 'Ключевые слова'),
      Field::make('textarea', 'crb_seo_description', 'Описание'),
    ]);

  Container::make('theme_options', 'Параметры')->add_tab('Общее', [
    Field::make('image', 'crb_theme_site_logo', 'Логотип'),
    Field::make('textarea', 'crb_theme_site_name', 'Название сайта')->set_rows(2),
    Field::make('text', 'crb_theme_phone_number', 'Телефон / Номер'),
    Field::make('text', 'crb_theme_phone_time', 'Телефон / Время работы'),
    Field::make('text', 'crb_theme_phone_caption', 'Телефон / Подпись'),
    Field::make('text', 'crb_theme_max_link', 'MAX'),
    Field::make('text', 'crb_theme_email', 'E-mail'),
    Field::make('textarea', 'crb_theme_address', 'Адерс')->set_rows(2),
    Field::make('text', 'crb_theme_contacts_title', 'Контакты / Заголовок секции'),
    Field::make('text', 'crb_theme_contacts_subtitle', 'Контакты / Подзаголовок'),
    Field::make(
      'complex',
      'crb_theme_contacts_schedules',
      'Контакты / Доп. расписания',
    )->add_fields([Field::make('text', 'text', 'Текст')]),
    Field::make('text', 'crb_theme_contacts_card_title', 'Контакты / Карточка / Заголовок'),
    Field::make(
      'textarea',
      'crb_theme_contacts_card_text',
      'Контакты / Карточка / Текст (районы)',
    )->set_rows(4),
    Field::make('textarea', 'crb_theme_counters', 'Счетчики')->set_rows(2),
    Field::make('textarea', 'crb_theme_copyright', 'Копирайт')->set_rows(2),
  ]);

  Container::make('post_meta', 'Лендинг')
    ->where('post_type', '=', 'page')
    ->where('post_template', '=', 'templates/landing.php')
    ->add_tab('Начальный экран', [
      Field::make('image', 'intro_bg_image', 'Фоновое изображение'),
      Field::make('file', 'intro_bg_video', 'Фоновое видео'),
      Field::make('textarea', 'intro_title', 'Заголовок')->set_rows(2),
      Field::make('textarea', 'intro_desc', 'Описание')->set_rows(2),
      Field::make('complex', 'intro_advantages', 'Преимущества')->add_fields([
        Field::make('textarea', 'text', 'Текст')->set_rows(2),
      ]),
    ])
    ->add_tab('Срочный выезд', [
      Field::make('textarea', 'emergency_departure_title', 'Заголовок')->set_rows(3),
      Field::make('text', 'emergency_departure_speed', 'Скорость (текст)'),
      Field::make('textarea', 'emergency_departure_desc', 'Описание')->set_rows(5),
      Field::make('textarea', 'emergency_departure_discount_title', 'Скидка / Заголовок')->set_rows(
        3,
      ),
      Field::make('text', 'emergency_departure_discount_value', 'Скидка / Значение'),
      Field::make('image', 'emergency_departure_bg_image', 'Фоновая картинка'),
    ])
    ->add_tab('Преимущества', [
      Field::make('textarea', 'features_title', 'Заголовок')->set_rows(2),
      Field::make('complex', 'features_items', 'Преимущества')->add_fields([
        Field::make('select', 'icon_type', 'Тип иконки')->add_options([
          'svg' => 'Галочка (SVG)',
          'text' => 'Текст (напр. 0 ₽)',
        ]),
        Field::make('text', 'icon_text', 'Текст иконки'),
        Field::make('textarea', 'text', 'Текст преимущества')->set_rows(2),
      ]),
    ])
    ->add_tab('Форма со скидкой', [
      Field::make('textarea', 'discount_form_title', 'Заголовок')->set_rows(2),
      Field::make('textarea', 'discount_form_desc', 'Описание')->set_rows(5),
      Field::make('text', 'discount_form_btn_text', 'Текст кнопки'),

      Field::make('image', 'discount_form_image', 'Изображение (мультиметр)'),
    ])
    ->add_tab('Услуги', [
      Field::make('textarea', 'services_title', 'Заголовок секции')->set_rows(2),
      Field::make('textarea', 'services_callback_title', 'Текст вызова мастера')->set_rows(2),
      Field::make('complex', 'services_tabs', 'Вкладки услуг')->add_fields([
        Field::make('textarea', 'label', 'Ярлык вкладки')->set_rows(2),
        Field::make('textarea', 'subtitle', 'Заголовок вкладки')->set_rows(2),
        Field::make('image', 'image', 'Изображение'),
        Field::make('complex', 'items', 'Услуги')->add_fields([
          Field::make('text', 'name', 'Название'),
          Field::make('text', 'price', 'Цена'),
        ]),
      ]),
    ])
    ->add_tab('Почему выбирают нас', [
      Field::make('textarea', 'advantages_title', 'Заголовок')->set_rows(2),
      Field::make('textarea', 'advantages_caption_title', 'Подпись / Заголовок')->set_rows(2),
      Field::make('textarea', 'advantages_caption_desc', 'Подпись / Описание')->set_rows(3),
      Field::make('image', 'advantages_image', 'Изображение'),
      Field::make('complex', 'advantages_items', 'Преимущества')->add_fields([
        Field::make('textarea', 'title', 'Заголовок')->set_rows(2),
        Field::make('textarea', 'desc', 'Описание')->set_rows(2),
      ]),
    ])
    ->add_tab('Предложение', [
      Field::make('textarea', 'promo_title', 'Заголовок')->set_rows(3),
      Field::make('textarea', 'promo_desc', 'Описание')->set_rows(5),
      Field::make('textarea', 'promo_right_title', 'Дополнительный заголовок')->set_rows(2),
      Field::make('textarea', 'promo_right_desc', 'Дополнительное описание')->set_rows(2),
      Field::make('complex', 'promo_check_items', 'Пункты с галочкой')->add_fields([
        Field::make('textarea', 'text', 'Текст')->set_rows(2),
      ]),
    ])
    ->add_tab('Команда', [
      Field::make('textarea', 'team_title', 'Заголовок (HTML разрешён)')->set_rows(3),
      Field::make('textarea', 'team_subtitle', 'Подзаголовок')->set_rows(2),
      Field::make('text', 'team_stat_years_number', 'Статистика / Лет опыта (число)'),
      Field::make('text', 'team_stat_years_label', 'Статистика / Лет опыта (подпись)'),
      Field::make('text', 'team_stat_clients_number', 'Статистика / Клиентов (число)'),
      Field::make('text', 'team_stat_clients_label', 'Статистика / Клиентов (подпись)'),
      Field::make('complex', 'team_gallery', 'Фото мастеров')->add_fields([
        Field::make('image', 'image', 'Фото'),
      ]),
      Field::make('textarea', 'team_bottom_text', 'Текст внизу')->set_rows(4),
    ])
    ->add_tab('Этапы работы', [
      Field::make('textarea', 'steps_title', 'Заголовок')->set_rows(3),
      Field::make('text', 'steps_card1_badge', 'Карточка 1 / Бейдж'),
      Field::make('textarea', 'steps_card1_title', 'Карточка 1 / Заголовок')->set_rows(2),
      Field::make('text', 'steps_card1_subtitle', 'Карточка 1 / Подзаголовок'),
      Field::make('text', 'steps_card1_btn_text', 'Карточка 1 / Текст кнопки'),
      Field::make('complex', 'steps_cards', 'Карточки 2, 3… (шаги)')->add_fields([
        Field::make('text', 'badge', 'Бейдж'),
        Field::make('textarea', 'title', 'Заголовок')->set_rows(2),
        Field::make('textarea', 'desc', 'Описание')->set_rows(3),
        Field::make('complex', 'items', 'Пункты')->add_fields([
          Field::make('text', 'text', 'Текст'),
        ]),
      ]),
    ]);

  // Block::make('partials_services', 'Блок "Выбирайте отдых для себя"')
  //   ->add_fields([
  //     Field::make('separator', 'separator', 'Блок "Выбирайте отдых для себя"'),
  //   ])
  //   ->set_category('layout')
  //   ->set_mode('edit')
  //   ->set_icon('shortcode')
  //   ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
  //     get_template_part('partials/services', null, [
  //       'fields' => $fields,
  //       'attributes' => $attributes,
  //       'inner_blocks' => $inner_blocks,
  //     ]);
  //   });

  // Block::make('partials_slidwshow', 'Блок "Слайдшоу"')
  //   ->add_fields([
  //     Field::make('separator', 'separator', 'Блок "Слайдшоу"'),
  //     Field::make('text', 'aspect_ratio', 'Соотношение сторон'),
  //     Field::make('media_gallery', 'gallery', 'Фотогалерея'),
  //   ])
  //   ->set_category('layout')
  //   ->set_mode('edit')
  //   ->set_icon('shortcode')
  //   ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
  //     get_template_part('partials/slidwshow', null, [
  //       'fields' => $fields,
  //       'attributes' => $attributes,
  //       'inner_blocks' => $inner_blocks,
  //     ]);
  //   });
}
