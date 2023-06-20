<?php if (!empty($image['url'])) : ?>
    <img src="<?php echo esc_url($image['url']); ?>"
    <?php if (!empty($class)) : ?>class="<?php echo esc_attr($class); ?>" <?php endif; ?>
    <?php if (!empty($image['alt'])) : ?>alt="<?php echo esc_attr($image['alt']); ?>" <?php endif; ?>>
<?php endif; ?>