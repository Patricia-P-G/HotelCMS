<?php get_header(); ?>

<section class="search-results">
    <h1>Search Results for: <?php echo esc_html(get_search_query()); ?></h1>

    <?php if (have_posts()) : ?>
        <ul>
            <?php 
            while (have_posts()) : the_post(); 
            ?>
                <li>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </li>
            <?php endwhile; ?>
        </ul>

        <?php the_posts_pagination(); ?>

    <?php else : ?>
        <div class="no-results">
            <h2>Nothing Found</h2>
            <p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
            <?php get_search_form(); ?>
        </div>
    <?php endif; ?>
</section>

<?php get_footer(); ?>