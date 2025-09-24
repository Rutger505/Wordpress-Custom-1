<?php
/**
 * Single post template
 *
 * This template displays individual blog posts.
 */

get_header(); ?>

<!-- Main -->
<div id="main">

    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>

            <!-- Post -->
            <article class="post">
                <header>
                    <div class="title">
                        <h1><?php the_title(); ?></h1>
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
                    <div class="image featured">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>

                <div class="content">
                    <?php the_content(); ?>
                </div>

                <footer>
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

                        $tags = get_the_tags();
                        if ($tags) :
                            foreach ($tags as $tag) :
                        ?>
                                <li><a href="<?php echo get_tag_link($tag->term_id); ?>"><?php echo $tag->name; ?></a></li>
                        <?php
                            endforeach;
                        endif;
                        ?>
                        <li><a href="<?php comments_link(); ?>" class="icon solid fa-comment"><?php echo get_comments_number(); ?></a></li>
                    </ul>

                    <!-- Post Navigation -->
                    <div class="post-navigation">
                        <?php
                        $prev_post = get_previous_post();
                        $next_post = get_next_post();
                        ?>
                        <ul class="actions">
                            <?php if ($prev_post) : ?>
                                <li><a href="<?php echo get_permalink($prev_post->ID); ?>" class="button">&laquo; <?php echo $prev_post->post_title; ?></a></li>
                            <?php endif; ?>
                            <?php if ($next_post) : ?>
                                <li><a href="<?php echo get_permalink($next_post->ID); ?>" class="button"><?php echo $next_post->post_title; ?> &raquo;</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </footer>
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
