<?php
/**
 * Main template file
 *
 * This template displays the main blog posts overview page.
 * It shows all published posts with pagination support.
 */

get_header(); ?>

<!-- Main -->
<div id="main">

    <?php if (have_posts()) : ?>

        <?php
        // Start the WordPress loop to display posts
        while (have_posts()) : the_post();
        ?>

            <!-- Post -->
            <article class="post">
                <header>
                    <div class="title">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <p><?php echo get_the_excerpt(); ?></p>
                    </div>
                    <div class="meta">
                        <time class="published" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="author">
                            <span class="name"><?php the_author(); ?></span>
                            <?php echo get_avatar(get_the_author_meta('ID'), 64); ?>
                        </a>
                    </div>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>" class="image featured">
                        <?php the_post_thumbnail('large'); ?>
                    </a>
                <?php endif; ?>

                <div class="content">
                    <?php the_content('Continue Reading'); ?>
                </div>

                <footer>
                    <ul class="actions">
                        <li><a href="<?php the_permalink(); ?>" class="button large">Continue Reading</a></li>
                    </ul>
                    <ul class="stats">
                        <?php
                        $categories = get_the_category();
                        if ($categories) :
                            foreach ($categories as $category) :
                        ?>
                                <li><a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a></li>
                        <?php
                            endforeach;
                        endif;
                        ?>
                        <li><a href="<?php comments_link(); ?>" class="icon solid fa-comment"><?php echo get_comments_number(); ?></a></li>
                    </ul>
                </footer>
            </article>

        <?php endwhile; ?>

        <!-- Pagination -->
        <div class="pagination">
            <?php
            echo paginate_links(array(
                'mid_size'  => 2,
                'prev_text' => __('&laquo; Previous', 'greentech-solutions'),
                'next_text' => __('Next &raquo;', 'greentech-solutions'),
            ));
            ?>
        </div>

    <?php else : ?>

        <!-- No posts found -->
        <article class="post">
            <header>
                <div class="title">
                    <h2><?php _e('No Posts Found', 'greentech-solutions'); ?></h2>
                    <p><?php _e('Sorry, no posts were found. Please check back later.', 'greentech-solutions'); ?></p>
                </div>
            </header>
        </article>

    <?php endif; ?>

</div>

<?php get_footer(); ?>
