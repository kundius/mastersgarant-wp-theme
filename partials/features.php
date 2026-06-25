<?php
$features_title = $args['fields']['features_title'] ?? '';
$features_items = $args['fields']['features_items'] ?? [];
?>

<section class="features">
    <?php if ($features_title): ?>
    <div class="features__title"><?php echo nl2br(esc_html($features_title)); ?></div>
    <?php endif; ?>

    <?php if ($features_items): ?>
    <ul class="features__list">
      <?php foreach ($features_items as $item): ?>
      <li class="features__item">
        <div class="features__icon<?php echo $item['icon_type'] === 'text' ? ' features__icon--text' : ''; ?>">
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
</section>
