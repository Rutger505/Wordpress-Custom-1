<?php
/**
 * Search results template
 *
 * This template displays search results.
 */

get_header(); ?>

<!-- Main -->
<div id="main">

    <?php if (have_posts()) : ?>

        <header class="page-header">
            <div class="title">
                <h1><?php printf(__('Search Results for: %s', 'greentech-solutions'), '<span>' . get_search_query() . '</span>'); ?></h1>
                <p><?php printf(__('Found %s results for your search.', 'greentech-solutions'), $wp_query->found_posts); ?></p>
            </div>
        </header>

        <?php while (have_posts()) : the_post(); ?>

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

                <div class="content">
                    <?php the_excerpt(); ?>
                </div>

                <footer>
                    <ul class="actions">
                        <li><a href="<?php the_permalink(); ?>" class="button large">Read More</a></li>
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

        <!-- No results found -->
        <article class="post">
            <header>
                <div class="title">
                    <h1><?php _e('Nothing Found', 'greentech-solutions'); ?></h1>
                    <p><?php printf(__('Sorry, no results found for "%s". Please try a different search.', 'greentech-solutions'), get_search_query()); ?></p>
                </div>
            </header>
            <div class="content">
                <p><?php _e('It seems we can\'t find what you\'re looking for. Perhaps searching can help.', 'greentech-solutions'); ?></p>
                <?php get_search_form(); ?>
            </div>
        </article>

    <?php endif; ?>

</div>

<?php get_footer(); ?>
