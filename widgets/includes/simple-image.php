<?php if (!empty($image['url'])) : ?>
    <img src="<?php echo esc_url($image['url']); ?>" <?php if (!empty($image['alt'])) : ?>alt="<?php echo esc_attr($image['alt']); ?>" <?php endif; ?>>
<?php endif; ?>