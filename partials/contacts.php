<?php
$contacts_title = $args['fields']['contacts_title'] ?? '';
$contacts_subtitle = $args['fields']['contacts_subtitle'] ?? '';
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
        <?php if ($contacts_title): ?>
        <div class="contacts__title"><?php echo esc_html($contacts_title); ?></div>
        <?php endif; ?>

        <div class="contacts__grid">
            <div class="contacts__info">
                <?php if ($contacts_subtitle): ?>
                <div class="contacts__subtitle"><?php echo esc_html($contacts_subtitle); ?></div>
                <?php endif; ?>

                <?php if ($contacts_phone): ?>
                <div class="contacts__phone-group">
                    <?php if ($contacts_phone_time): ?>
                    <div class="contacts__phone-schedule">
                        <span class="contacts__dot"></span>
                        <span>Заявки принимаем <?php echo esc_html($contacts_phone_time); ?></span>
                    </div>
                    <?php endif; ?>
                    <a href="tel:<?php echo esc_attr($contacts_phone_link); ?>" class="contacts__phone">
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
                    <a href="mailto:<?php echo esc_attr($contacts_email); ?>"><?php echo esc_html($contacts_email); ?></a>
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
                <div class="contacts__card-title"><?php echo esc_html($contacts_card_title); ?></div>
                <?php endif; ?>
                <?php if ($contacts_card_text): ?>
                <div class="contacts__card-text"><?php echo nl2br(esc_html($contacts_card_text)); ?></div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
</section>
<?php endif; ?>
