<?php
$advantages_title = $args['fields']['advantages_title'] ?? '';
$advantages_caption_title = $args['fields']['advantages_caption_title'] ?? '';
$advantages_caption_desc = $args['fields']['advantages_caption_desc'] ?? '';
$advantages_items = $args['fields']['advantages_items'] ?? [];
$advantages_image = $args['fields']['advantages_image'] ?? '';
?>

<?php if ($advantages_title || $advantages_caption_title || $advantages_items || $advantages_image): ?>
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
        <div class="advantages__caption-title"><?php echo nl2br(esc_html($advantages_caption_title)); ?></div>
        <?php endif; ?>
        <?php if ($advantages_caption_desc): ?>
        <div class="advantages__caption-desc"><?php echo nl2br(esc_html($advantages_caption_desc)); ?></div>
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
            <div class="advantages__item-title"><?php echo nl2br(esc_html($item['title'])); ?></div>
            <?php endif; ?>
            <?php if (!empty($item['desc'])): ?>
            <div class="advantages__item-desc"><?php echo nl2br(esc_html($item['desc'])); ?></div>
            <?php endif; ?>
          </div>
        </li>
        <?php endforeach; ?>
      </ul>
      <?php endif; ?>

      <?php if ($advantages_image): ?>
      <div class="advantages__visual">
        <div class="advantages__image-wrapper">
          <?php echo wp_get_attachment_image($advantages_image, 'full', false, ['class' => 'advantages__image']); ?>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php endif; ?>
