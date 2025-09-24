    <!-- Sidebar -->
    <section id="sidebar">

        <!-- Intro -->
        <section id="intro">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="<?php bloginfo('name'); ?>" />
            </a>
            <header>
                <h2><?php bloginfo('name'); ?></h2>
                <p><?php bloginfo('description'); ?></p>
            </header>
        </section>

        <!-- Mini Posts -->
        <section>
            <div class="mini-posts">
                <header>
                    <h2>Recent Posts</h2>
                </header>
                <div class="posts-container">
                    <?php
                    $recent_posts = new WP_Query(array(
                        'posts_per_page' => 5,
                        'post_status' => 'publish'
                    ));

                    if ($recent_posts->have_posts()) :
                        echo '<ul>';
                        while ($recent_posts->have_posts()) : $recent_posts->the_post();
                    ?>
                            <li>
                                <article>
                                    <header>
                                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        <time class="published" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                                    </header>
                                    <?php if (has_post_thumbnail()) : ?>
                                        <a href="<?php the_permalink(); ?>" class="image">
                                            <?php the_post_thumbnail('thumbnail'); ?>
                                        </a>
                                    <?php endif; ?>
                                </article>
                            </li>
                    <?php
                        endwhile;
                        echo '</ul>';
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </section>

        <!-- Widget Area -->
        <?php if (is_active_sidebar('main-sidebar')) : ?>
            <div class="sidebar-widgets">
                <?php dynamic_sidebar('main-sidebar'); ?>
            </div>
        <?php endif; ?>

        <!-- About -->
        <section class="blurb">
            <h2>About</h2>
            <p><?php
                $about_text = get_theme_mod('about_text', 'GreenTech Solutions is a sustainable technology company that offers innovative solutions for greening the industry. With a focus on energy efficiency and circular economy, we provide products and services for sustainable business operations.');
                echo esc_html($about_text);
            ?></p>
            <ul class="actions">
                <li><a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="button">Learn More</a></li>
            </ul>
        </section>

        <!-- Footer -->
        <section id="footer">
            <ul class="icons">
                <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
                <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
                <li><a href="#" class="icon solid fa-rss"><span class="label">RSS</span></a></li>
                <li><a href="#" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
            </ul>
            <p class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
        </section>

    </section>

</div>

<!-- Scripts -->
<?php wp_footer(); ?>

</body>
</html>
