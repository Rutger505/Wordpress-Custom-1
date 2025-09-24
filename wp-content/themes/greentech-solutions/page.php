<?php
/**
 * Page template
 *
 * This template displays static pages.
 */

get_header(); ?>

<!-- Main -->
<div id="main">

    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>

            <!-- Page -->
            <article class="post">
                <header>
                    <div class="title">
                        <h1><?php the_title(); ?></h1>
                        <?php if (has_excerpt()) : ?>
                            <p><?php echo get_the_excerpt(); ?></p>
                        <?php endif; ?>
                    </div>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="image featured">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>

                <div class="content">
                    <?php the_content(); ?>
                </div>

                <?php
                // Display child pages if this is a parent page
                $child_pages = get_pages(array('child_of' => get_the_ID()));
                if ($child_pages) :
                ?>
                    <footer>
                        <h3><?php _e('Sub Pages:', 'greentech-solutions'); ?></h3>
                        <ul class="actions">
                            <?php foreach ($child_pages as $child) : ?>
                                <li><a href="<?php echo get_permalink($child->ID); ?>" class="button"><?php echo $child->post_title; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </footer>
                <?php endif; ?>
            </article>

            <!-- Comments Section -->
            <?php
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>

        <?php endwhile; ?>

    <?php endif; ?>

</div>

<?php get_footer(); ?>
