<?php
$loop = new WP_Query(array(
    'post_type'      => 'event',
    'posts_per_page' => -1,
));
?>

<?php if ($loop->have_posts()) : ?>
    <div class="events-list">
        <?php while ($loop->have_posts()) : $loop->the_post(); ?>
            <article class="event-item">
                <h2><?php the_title(); ?></h2>
                <div><?php the_excerpt(); ?></div>
                <a href="<?php the_permalink(); ?>" class="events-button">View event</a>
            </article>
        <?php endwhile; ?>
    </div>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>