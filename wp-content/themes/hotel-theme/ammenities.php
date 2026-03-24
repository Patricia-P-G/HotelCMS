<div class="ammenities">
    
    <div>
        <h2><?php the_field('ammenities_title'); ?></h2>
    </div>

    <!-- pictures -->
    <div class="picture-container">

        <?php if( have_rows('amenities_card') ): ?>
            
            <?php while( have_rows('amenities_card') ): the_row(); 

                $image = get_sub_field('card_image');
                $title = get_sub_field('card_title');
                $description = get_sub_field('card_paragraph');
                $css_class = get_sub_field('card_class'); // <- THIS
            ?>

                <div>
                    <?php if($image): ?>
                        <img class="pic" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($title); ?>">
                    <?php endif; ?>

                    <div class="<?php echo esc_attr($css_class); ?> pic-text">
                        <h3><?php echo esc_html($title); ?></h3>
                        <p><?php echo esc_html($description); ?></p>
                    </div>
                </div>

            <?php endwhile; ?>

        <?php endif; ?>

    </div>
            
</div>