

<div class="location-wrapper">

    <?php 
    // We don't call "location_settings" because that is the name of the WHOLE group.
    // We call the individual fields directly.
    $main_title = get_field('section_title'); 
    $map_url    = get_field('map_url');
    $address    = get_field('address');
    $directions = get_field('directions');
    ?>

    <div>
        <h2><?php echo esc_html($main_title); ?></h2>
    </div>

    <div class="location-container">
        <div class="map-container">
            <?php if($map_url): ?>
                <iframe src="<?php echo esc_url($map_url); ?>" width="600" height="450" style="border:0;" loading="lazy"></iframe>
            <?php endif; ?>
        </div>

        <div class="location-details">
            <div>
                <h3 class="location-title">Our Address</h3>
                <p><?php echo esc_html($address); ?></p>
            </div>

            <?php if( have_rows('distances_list') ): ?>
                <div>
                    <h3 class="location-title">Key Distances</h3>
                    <?php while( have_rows('distances_list') ): the_row(); ?>
                        <p>
                            <?php the_sub_field('label'); ?> 
                            (<?php the_sub_field('distance'); ?>)
                        </p>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

            <div>
                <h3 class="location-title">Getting here</h3>
                <p><?php echo esc_html($directions); ?></p>
            </div>
        </div>
    </div>
</div>