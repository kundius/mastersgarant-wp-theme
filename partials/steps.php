<?php
$steps_title = $args['fields']['steps_title'] ?? '';
$steps_card1_badge = $args['fields']['steps_card1_badge'] ?? '';
$steps_card1_title = $args['fields']['steps_card1_title'] ?? '';
$steps_card1_subtitle = $args['fields']['steps_card1_subtitle'] ?? '';
$steps_card1_btn_text = $args['fields']['steps_card1_btn_text'] ?? '';
$steps_cards = $args['fields']['steps_cards'] ?? [];
$steps_phone = carbon_get_theme_option('crb_theme_phone_number');
$steps_phone_time = carbon_get_theme_option('crb_theme_phone_time');
$steps_phone_link = preg_replace('/[^0-9+]/', '', $steps_phone);
?>

<?php if ($steps_title || $steps_card1_title || $steps_cards): ?>
<section class="steps">
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
                  data-feedback-form-goal="STEPS_FORM"
                  data-feedback-form-action="feedback_form">
                  <input type="hidden" name="submitted" value="">
                  <input type="hidden" name="nonce" value="<?php echo wp_create_nonce(
                    'feedback-nonce',
                  ); ?>">
                  <input type="hidden" name="page" value="<?php echo esc_html(get_self_link()); ?>">
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
</section>
<?php endif; ?>
