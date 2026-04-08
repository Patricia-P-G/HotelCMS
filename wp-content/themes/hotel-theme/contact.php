<!-- <div class="contact_container">
    <div class="contact_text">

        <div>
            <h2 class="contact_title">Contact us</h2>


            <div>
                <h3 class="contact_information">Our Contact Information:</h3>
                <address class="contact_address">
                    <p class="contact_phone">
                        
                    </p>
                    <p class="contact_email">
                        
                    </p>
                    <p class="contact_address">
                        
                    </p>
                </address>
            </div>
        </div>
        <div class="contact_svg">
            <img src="../images/foundation.svg" alt="">
            <img src="../images/steam.svg" alt="">
            <img src="../images/tumblr.svg" alt="">
            <img src="../images/twitter.svg" alt="">
        </div>
    </div>


    <div class="contact_form_container">
        <p>Great vision wihtout great people is irrelevant.</p>
        <p>Let's work together</p>
        <form class="contact_form" action="">
            <input class="contact_input" placeholder="Enter Your Name" type="text" name="" id="">
            <input class="contact_input" placeholder="Enter a valid email address" type="text" name="" id="">
            <textarea class="contact_textarea" rows="4" placeholder="Enter your message" type="text" name="" id=""></textarea>
            <button class="contact_button" type="submit">Send Message</button>
        </form>
    </div>
</div> -->

<div class="contact_container">
    <div class="contact_text">
        <div>
            <h2 class="contact_title"><?php the_field('contact_title'); ?></h2>

            <div>
                <h3 class="contact_information"><?php the_field('contact_info_heading'); ?></h3>
                <address class="contact_address">
                    <?php if (get_field('phone_number')): ?>
                        <p class="contact_phone"><?php the_field('phone_number'); ?></p>
                    <?php endif; ?>

                    <?php if (get_field('email_address')): ?>
                        <p class="contact_email"><?php the_field('email_address'); ?></p>
                    <?php endif; ?>

                    <?php if (get_field('physical_address')): ?>
                        <p class="contact_address"><?php the_field('physical_address'); ?></p>
                    <?php endif; ?>
                </address>
            </div>
        </div>

        <div class="contact_svg">
            <?php if (have_rows('social_icons')): ?>
                <?php while (have_rows('social_icons')): the_row(); ?>
                    <?php 
                    $icon = get_sub_field('icon_image'); 
                    if ($icon): ?>
                        <img width="24px" src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>

    <div class="contact_form_container">
        <p><?php the_field('form_top_text'); ?></p>
        <p><?php the_field('form_sub_text'); ?></p>
        
        <?php if (get_field('form_shortcode')): ?>
            <?php echo do_shortcode(get_field('form_shortcode')); ?>
        <?php else: ?>
            <form class="contact_form" action="">
                <input class="contact_input" placeholder="Enter Your Name" type="text">
                <input class="contact_input" placeholder="Enter a valid email address" type="text">
                <textarea class="contact_textarea" rows="4" placeholder="Enter your message"></textarea>
                <button class="contact_button" type="submit">Send Message</button>
            </form>
        <?php endif; ?>
    </div>
</div>