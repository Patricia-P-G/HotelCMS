<div class="reviews">

    <?php 
    $title = get_field('testimonial_title');
    if ($title): ?>
        <div class="reviews_h">
            <h2><?php echo esc_html($title); ?></h2>
            <div class="reviews_h-number">
                <p><?php echo count(get_field('testimonial')); ?> Reviews:</p>
                <div>
                    <?php 
                    $star = get_field('star_svg'); 
                    if( $star && is_array($star) && isset($star['url']) ){
                        $star_url = $star['url'];
                    } else {
                        $star_url = get_template_directory_uri() . '/images/yellow.svg';
                    }

                    for ($i = 0; $i < 5; $i++): ?>
                        <img src="<?php echo esc_url($star_url); ?>" alt="star">
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="card-container">
        <?php if( have_rows('testimonial') ): ?>
            <?php while( have_rows('testimonial') ): the_row(); 
                $person_name = get_sub_field('person_name');
                $date = get_sub_field('date');
                $person_testimonial = get_sub_field('person_testimonial');
                $person_image = get_sub_field('person_image');
            ?>
                <div class="card">
                    <div class="card-details">
                        <div class="testimonial-image-container">
                            <?php if($person_image): ?>
                                <img class="testimonial-image" src="<?php echo esc_url($person_image['url']); ?>" alt="<?php echo esc_attr($person_name); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="card-person">
                            <p class="testimonial-name"><?php echo esc_html($person_name); ?></p>
                            <p class="testimonial-date"><?php echo esc_html($date); ?></p>
                        </div>
                    </div>

                    <div class="testimonial-rating">
                        <?php 
                        for($i = 0; $i < 5; $i++): ?>
                            <img width="24px" src="<?php echo esc_url($star_url); ?>" alt="star">
                        <?php endfor; ?>
                    </div>

                    <div class="testimonial-text">
                        <?php echo esc_html($person_testimonial); ?>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>