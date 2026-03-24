<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo esc_html(get_the_title() ?: 'Hero Section'); ?></title>
    <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>">
</head>

<body>

    <?php
    if (function_exists('get_field')) {
        $heroTitle = get_field('hero_title');
        $heroParagraph = get_field('hero_paragraph');
        $heroButton = get_field('hero_button');
        $heroImage = get_field('hero_image');
    } else {
        $heroTitle = 'Enable Advanced Custom Fields';
        $heroParagraph = 'Install/activate ACF and configure hero_title, hero_paragraph, hero_button, hero_image fields.';
        $heroButton = '';
        $heroImage = '';
    }

    $heroTitle = !empty($heroTitle) ? $heroTitle : 'Welcome to our hotel';
    $heroParagraph = !empty($heroParagraph) ? $heroParagraph : 'Experience comfort and luxury with us.';

    $heroButtonUrl = '';
    $heroButtonText = 'View More';
    $heroButtonTarget = '_self';

    if (!empty($heroButton)) {
        if (is_array($heroButton) && !empty($heroButton['url'])) {
            $heroButtonUrl = $heroButton['url'];
            $heroButtonText = !empty($heroButton['title']) ? $heroButton['title'] : $heroButtonText;
            $heroButtonTarget = !empty($heroButton['target']) ? $heroButton['target'] : $heroButtonTarget;
        } elseif (is_string($heroButton)) {
            $heroButtonText = $heroButton;
        }
    }

    $heroImageUrl = '';
    if (!empty($heroImage)) {
        if (is_array($heroImage) && !empty($heroImage['url'])) {
            $heroImageUrl = $heroImage['url'];
        } elseif (is_string($heroImage)) {
            $heroImageUrl = $heroImage;
        }
    }
    ?>

    <div class="container-hero" <?php if ($heroImageUrl): ?>style="background-image: url('<?php echo esc_url($heroImageUrl); ?>');" <?php endif; ?>>
        <div class="container-hero-overlay"></div>
        <div class="container-hero-content">
            <h1><?php echo esc_html($heroTitle); ?></h1>
            <p><?php echo wp_kses_post($heroParagraph); ?></p>

            <?php if (!empty($heroButtonUrl) || !empty($heroButtonText)): ?>
                <a class="hero-btn" href="<?php echo esc_url($heroButtonUrl ?: '#'); ?>" target="<?php echo esc_attr($heroButtonTarget); ?>"><?php echo esc_html($heroButtonText); ?></a>
            <?php endif; ?>
        </div>
    </div>

</body>

</html>