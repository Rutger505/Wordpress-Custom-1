<?php
/**
 * 404 Error Page Template
 *
 * This template displays the 404 error page when content is not found.
 */

get_header(); ?>

<!-- Main -->
<div id="main">

    <!-- 404 Error -->
    <article class="post">
        <header>
            <div class="title">
                <h1><?php _e('Oops! That page can&rsquo;t be found.', 'greentech-solutions'); ?></h1>
                <p><?php _e('It looks like nothing was found at this location. Maybe try a search?', 'greentech-solutions'); ?></p>
            </div>
        </header>

        <div class="content">
            <p><?php _e('The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'greentech-solutions'); ?></p>

            <!-- Search Form -->
            <div class="search-form">
                <h3><?php _e('Try searching for what you need:', 'greentech-solutions'); ?></h3>
                <?php get_search_form(); ?>
            </div>

            <!-- Recent Posts -->
            <div class="recent-posts">
                <h3><?php _e('Or check out our recent posts:', 'greentech-solutions'); ?></h3>
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
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            <span class="date"> - <?php echo get_the_date(); ?></span>
                        </li>
                <?php
                    endwhile;
                    echo '</ul>';
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>

        <footer>
            <ul class="actions">
                <li><a href="<?php echo esc_url(home_url('/')); ?>" class="button large">Back to Homepage</a></li>
            </ul>
        </footer>
    </article>

</div>

<?php get_footer(); ?>
