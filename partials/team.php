<?php
$team_title = $args['fields']['team_title'] ?? '';
$team_subtitle = $args['fields']['team_subtitle'] ?? '';
$team_stat_years_number = $args['fields']['team_stat_years_number'] ?? '';
$team_stat_years_label = $args['fields']['team_stat_years_label'] ?? '';
$team_stat_clients_number = $args['fields']['team_stat_clients_number'] ?? '';
$team_stat_clients_label = $args['fields']['team_stat_clients_label'] ?? '';
$team_gallery = $args['fields']['team_gallery'] ?? [];
$team_bottom_text = $args['fields']['team_bottom_text'] ?? '';
?>

<?php if ($team_title || $team_subtitle || $team_gallery || $team_bottom_text): ?>
<section class="team">

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
                <span class="team__stat-number"><?php echo esc_html($team_stat_years_number); ?></span>
                <?php if ($team_stat_years_label): ?>
                <span class="team__stat-label"><?php echo esc_html($team_stat_years_label); ?></span>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            <?php if ($team_stat_clients_number): ?>
            <div class="team__stat">
                <span class="team__stat-number"><?php echo esc_html($team_stat_clients_number); ?></span>
                <?php if ($team_stat_clients_label): ?>
                <span class="team__stat-label"><?php echo esc_html($team_stat_clients_label); ?></span>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <?php if ($team_gallery): ?>
        <div class="team__gallery">
            <?php foreach ($team_gallery as $item): ?>
            <div class="team__card">
                <?php echo wp_get_attachment_image($item['image'], 'medium', false, ['class' => 'team__image', 'alt' => 'Мастер']); ?>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php if ($team_bottom_text): ?>
        <div class="team__bottom">
            <p class="team__bottom-text"><?php echo nl2br(esc_html($team_bottom_text)); ?></p>
        </div>
        <?php endif; ?>

</section>
<?php endif; ?>
