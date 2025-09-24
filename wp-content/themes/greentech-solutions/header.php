<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <?php wp_head(); ?>
</head>
<body <?php body_class('is-preload'); ?>>

<!-- Wrapper -->
<div id="wrapper">

    <!-- Header -->
    <header id="header">
        <?php if (is_home() || is_front_page()) : ?>
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="<?php bloginfo('name'); ?>" class="logo" />
            </a>
        <?php else : ?>
            <h1><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
        <?php endif; ?>

        <!-- Primary Navigation -->
        <nav class="links">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class'     => '',
                'container'      => '',
                'fallback_cb'    => 'greentech_fallback_menu',
                'items_wrap'     => '<ul>%3$s</ul>',
            ));
            ?>
        </nav>

        <!-- Mobile Navigation and Search -->
        <nav class="main">
            <ul>
                <li class="search">
                    <a class="fa-search" href="#search">Search</a>
                    <form id="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                        <label for="search-input" class="screen-reader-text">Search</label>
                        <input type="text" id="search-input" name="s" placeholder="Search" value="<?php echo get_search_query(); ?>" />
                    </form>
                </li>
                <li class="menu">
                    <a class="fa-bars" href="#menu">Menu</a>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Mobile Menu -->
    <section id="menu">
        <!-- Search -->
        <section>
            <form class="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                <label for="mobile-search-input" class="screen-reader-text">Search</label>
                <input type="text" id="mobile-search-input" name="s" placeholder="Search" value="<?php echo get_search_query(); ?>" />
            </form>
        </section>

        <!-- Mobile Menu Links -->
        <section>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'mobile',
                'menu_class'     => 'links',
                'container'      => '',
                'fallback_cb'    => 'greentech_mobile_fallback_menu',
            ));
            ?>
        </section>

        <!-- Actions -->
        <section>
            <ul class="actions stacked">
                <li><a href="<?php echo wp_login_url(); ?>" class="button large fit">Log In</a></li>
            </ul>
        </section>
    </section>

<?php
/**
 * Fallback function for primary menu
 */
function greentech_fallback_menu() {
    echo '<ul>';
    echo '<li><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
    wp_list_pages(array(
        'title_li' => '',
        'depth'    => 1,
    ));
    echo '</ul>';
}

/**
 * Fallback function for mobile menu
 */
function greentech_mobile_fallback_menu() {
    echo '<ul class="links">';
    echo '<li><a href="' . esc_url(home_url('/')) . '"><h3>Home</h3><p>Back to homepage</p></a></li>';

    $pages = get_pages(array('number' => 4));
    foreach ($pages as $page) {
        echo '<li><a href="' . get_permalink($page->ID) . '">';
        echo '<h3>' . $page->post_title . '</h3>';
        echo '<p>' . wp_trim_words($page->post_content, 8) . '</p>';
        echo '</a></li>';
    }
    echo '</ul>';
}
?>
