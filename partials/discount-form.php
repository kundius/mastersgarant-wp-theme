<?php
$discount_form_title = $args['fields']['discount_form_title'] ?? '';
$discount_form_desc = $args['fields']['discount_form_desc'] ?? '';
$discount_form_btn_text = $args['fields']['discount_form_btn_text'] ?? '';
$discount_form_image = $args['fields']['discount_form_image'] ?? '';
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
        data-feedback-form-goal="DISCOUNT_FORM"
        data-feedback-form-action="feedback_form">
        <input type="hidden" name="submitted" value="">
        <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('feedback-nonce'); ?>">
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
