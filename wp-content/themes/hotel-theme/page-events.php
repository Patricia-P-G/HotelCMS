<?php
/*
  Template Name: Events
*/

get_header();

if (have_posts()) {
    the_post();
}

function get_acf_image_url($image)
{
    if (empty($image)) {
        return '';
    }

    if (is_array($image) && !empty($image['url'])) {
        return $image['url'];
    }

    if (is_numeric($image)) {
        return wp_get_attachment_image_url($image, 'full');
    }

    if (is_string($image)) {
        return $image;
    }

    return '';
}

$eventsTitle = '';
$eventsParagraph = '';
$eventsImage = '';
$eventsImageUrl = '';

$indoorGroup = [];
$outdoorGroup = [];

$indoorTitle = '';
$indoorParagraph = '';
$indoorButton = '';
$indoorImageUrl = '';

$outdoorTitle = '';
$outdoorParagraph = '';
$outdoorButton = '';
$outdoorImageUrl = '';

if (function_exists('get_field')) {
    $eventsTitle = get_field('events_title');
    $eventsParagraph = get_field('events_paragraph');
    $eventsImage = get_field('events_image');

    $indoorGroup = get_field('event_indoor_cards');
    $outdoorGroup = get_field('event_outdoor_cards');
}

$eventsImageUrl = get_acf_image_url($eventsImage);

/* Indoor group fields */
if (!empty($indoorGroup) && is_array($indoorGroup)) {
    $indoorTitle = !empty($indoorGroup['events_indoors_title']) ? $indoorGroup['events_indoors_title'] : '';
    $indoorParagraph = !empty($indoorGroup['events_indoors_paragraph']) ? $indoorGroup['events_indoors_paragraph'] : '';
    $indoorButton = !empty($indoorGroup['events_indoors_button']) ? $indoorGroup['events_indoors_button'] : '';
    $indoorImageUrl = !empty($indoorGroup['events_indoors_image']) ? get_acf_image_url($indoorGroup['events_indoors_image']) : '';
}

/* Outdoor group fields */
if (!empty($outdoorGroup) && is_array($outdoorGroup)) {
    $outdoorTitle = !empty($outdoorGroup['events_outdoors_title']) ? $outdoorGroup['events_outdoors_title'] : '';
    $outdoorParagraph = !empty($outdoorGroup['events_outdoors_paragraph']) ? $outdoorGroup['events_outdoors_paragraph'] : '';
    $outdoorButton = !empty($outdoorGroup['events_outdoors_button']) ? $outdoorGroup['events_outdoors_button'] : '';
    $outdoorImageUrl = !empty($outdoorGroup['events_outdoors_image']) ? get_acf_image_url($outdoorGroup['events_outdoors_image']) : '';
}
?>

<div class="events-page">
    <div class="events-hero" style="background-image: url('<?php echo esc_url($eventsImageUrl); ?>');">
        <div class="events-hero-overlay"></div>
        <div class="events-hero-content">
            <h1 class="events-hero-title"><?php echo esc_html($eventsTitle); ?></h1>
            <p class="events-hero-paragraph"><?php echo esc_html($eventsParagraph); ?></p>
        </div>
    </div>

    <div class="events-container">
        <div class="events-page-content">
            <?php the_content(); ?>
        </div>

        <?php get_template_part('template-parts/event-list'); ?>

        <!-- Indoor Events -->
        <div class="events-row">
            <div class="events-col">
                <?php if (!empty($indoorImageUrl)) : ?>
                    <img src="<?php echo esc_url($indoorImageUrl); ?>" class="events-image" alt="<?php echo esc_attr($indoorTitle ?: 'Indoor Events'); ?>">
                <?php endif; ?>
            </div>

            <div class="events-col">
                <div class="events-text-wrap">
                    <h2 class="events-title"><?php echo esc_html($indoorTitle); ?></h2>
                    <p class="events-text"><?php echo esc_html($indoorParagraph); ?></p>
                    <a href="#" class="events-button"><?php echo esc_html($indoorButton ?: 'View More'); ?></a>
                </div>
            </div>
        </div>

        <!-- Outdoor Events -->
        <div class="events-row">
            <div class="events-col">
                <div class="events-text-wrap">
                    <h2 class="events-title"><?php echo esc_html($outdoorTitle); ?></h2>
                    <p class="events-text"><?php echo esc_html($outdoorParagraph); ?></p>
                    <a href="#" class="events-button"><?php echo esc_html($outdoorButton ?: 'View More'); ?></a>
                </div>
            </div>

            <div class="events-col">
                <?php if (!empty($outdoorImageUrl)) : ?>
                    <img src="<?php echo esc_url($outdoorImageUrl); ?>" class="events-image" alt="<?php echo esc_attr($outdoorTitle ?: 'Outdoor Events'); ?>">
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<style>
    .events-page {
        width: 100%;
    }

    .events-hero {
        position: relative;
        min-height: 420px;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .events-hero-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.45);
    }

    .events-hero-content {
        position: relative;
        z-index: 2;
        max-width: 900px;
        padding: 40px 20px;
        text-align: center;
        color: #fff;
    }

    .events-hero-title {
        margin: 0 0 16px;
        font-size: 48px;
        line-height: 1.1;
    }

    .events-hero-paragraph {
        margin: 0;
        font-size: 18px;
        line-height: 1.6;
    }

    .events-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 60px 20px;
    }

    .events-page-content {
        margin-bottom: 50px;
    }

    .events-list {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
        margin-bottom: 60px;
    }

    .event-item {
        padding: 24px;
        border: 1px solid #e5e5e5;
        border-radius: 12px;
        background: #fff;
    }

    .event-item h2 {
        margin: 0 0 12px;
        font-size: 24px;
    }

    .events-row {
        display: flex;
        align-items: center;
        gap: 40px;
        margin-bottom: 50px;
    }

    .events-col {
        flex: 1 1 50%;
    }

    .events-image {
        width: 100%;
        height: auto;
        display: block;
        border-radius: 12px;
    }

    .events-text-wrap {
        width: 100%;
    }

    .events-title {
        margin: 0 0 20px;
        font-size: 32px;
        line-height: 1.2;
        color: #111;
    }

    .events-text {
        margin: 0 0 24px;
        font-size: 16px;
        line-height: 1.8;
        color: #222;
    }

    .events-button {
        display: inline-block;
        padding: 12px 24px;
        background: #0b79b7;
        color: #fff;
        text-decoration: none;
        border-radius: 8px;
        transition: background 0.2s ease;
    }

    .events-button:hover {
        background: #095f90;
        color: #fff;
    }

    @media (max-width: 768px) {
        .events-list {
            grid-template-columns: 1fr;
        }

        .events-row {
            flex-direction: column;
            gap: 24px;
        }

        .events-col {
            width: 100%;
        }

        .events-hero {
            min-height: 320px;
        }

        .events-hero-title {
            font-size: 34px;
        }
    }
</style>

<?php get_footer(); ?>