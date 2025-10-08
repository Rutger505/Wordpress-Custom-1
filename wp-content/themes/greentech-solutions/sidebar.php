<!-- Sidebar -->
<section id="sidebar">

    <!-- Intro -->
    <section id="intro">
        <header>
            <h2>GreenTech Solutions</h2>
            <p>Lorem ipsum</p>
        </header>
    </section>

    <!-- Mini Posts -->
    <section>
        <div class="mini-posts">

			<?php
			// Query for recent posts
			$recent_posts = new WP_Query( array(
				'posts_per_page' => 4,
				'post_status'    => 'publish',
			) );

			if ( $recent_posts->have_posts() ) :
				while ( $recent_posts->have_posts() ) : $recent_posts->the_post();
					?>
                    <!-- Mini Post -->
                    <article class="mini-post">
                        <header>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <time class="published"
                                  datetime="<?php echo get_the_date( 'c' ); ?>"><?php echo get_the_date(); ?></time>
                            <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"
                               class="author">
								<?php echo get_avatar( get_the_author_meta( 'ID' ), 48 ); ?>
                            </a>
                        </header>
						<?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php the_permalink(); ?>" class="image">
								<?php the_post_thumbnail( 'thumbnail' ); ?>
                            </a>
						<?php endif; ?>
                    </article>
				<?php
				endwhile;
				wp_reset_postdata();
			endif;
			?>

            <!-- Static Mini Posts Below -->
            <!-- Mini Post -->
            <article class="mini-post">
                <header>
                    <h3><a href="single.html">Vitae sed condimentum</a></h3>
                    <time class="published" datetime="2015-10-20">October 20, 2015</time>
                    <a href="#" class="author"><img
                                src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/avatar.jpg"
                                alt=""/></a>
                </header>
                <a href="single.html" class="image"><img
                            src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/pic04.jpg"
                            alt=""/></a>
            </article>

            <!-- Mini Post -->
            <article class="mini-post">
                <header>
                    <h3><a href="single.html">Rutrum neque accumsan</a></h3>
                    <time class="published" datetime="2015-10-19">October 19, 2015</time>
                    <a href="#" class="author"><img
                                src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/avatar.jpg"
                                alt=""/></a>
                </header>
                <a href="single.html" class="image"><img
                            src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/pic05.jpg"
                            alt=""/></a>
            </article>

            <!-- Mini Post -->
            <article class="mini-post">
                <header>
                    <h3><a href="single.html">Odio congue mattis</a></h3>
                    <time class="published" datetime="2015-10-18">October 18, 2015</time>
                    <a href="#" class="author"><img
                                src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/avatar.jpg"
                                alt=""/></a>
                </header>
                <a href="single.html" class="image"><img
                            src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/pic06.jpg"
                            alt=""/></a>
            </article>

            <!-- Mini Post -->
            <article class="mini-post">
                <header>
                    <h3><a href="single.html">Enim nisl veroeros</a></h3>
                    <time class="published" datetime="2015-10-17">October 17, 2015</time>
                    <a href="#" class="author"><img
                                src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/avatar.jpg"
                                alt=""/></a>
                </header>
                <a href="single.html" class="image"><img
                            src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/pic07.jpg"
                            alt=""/></a>
            </article>

        </div>
    </section>

    <!-- Posts List -->
    <section>
        <ul class="posts">
			<?php
			// Query for recent posts in list format
			$list_posts = new WP_Query( array(
				'posts_per_page' => 5,
				'post_status'    => 'publish',
			) );

			if ( $list_posts->have_posts() ) :
				while ( $list_posts->have_posts() ) : $list_posts->the_post();
					?>
                    <li>
                        <article>
                            <header>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <time class="published"
                                      datetime="<?php echo get_the_date( 'c' ); ?>"><?php echo get_the_date(); ?></time>
                            </header>
							<?php if ( has_post_thumbnail() ) : ?>
                                <a href="<?php the_permalink(); ?>" class="image">
									<?php the_post_thumbnail( array( 51, 51 ), array( 'class' => 'image' ) ); ?>
                                </a>
							<?php endif; ?>
                        </article>
                    </li>
				<?php
				endwhile;
				wp_reset_postdata();
			endif;
			?>

            <!-- Static Posts Below -->
            <li>
                <article>
                    <header>
                        <h3><a href="single.html">Lorem ipsum fermentum ut nisl vitae</a></h3>
                        <time class="published" datetime="2015-10-20">October 20, 2015</time>
                    </header>
                    <a href="single.html" class="image"><img
                                src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/pic08.jpg"
                                alt=""/></a>
                </article>
            </li>
            <li>
                <article>
                    <header>
                        <h3><a href="single.html">Convallis maximus nisl mattis nunc id lorem</a></h3>
                        <time class="published" datetime="2015-10-15">October 15, 2015</time>
                    </header>
                    <a href="single.html" class="image"><img
                                src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/pic09.jpg"
                                alt=""/></a>
                </article>
            </li>
            <li>
                <article>
                    <header>
                        <h3><a href="single.html">Euismod amet placerat vivamus porttitor</a></h3>
                        <time class="published" datetime="2015-10-10">October 10, 2015</time>
                    </header>
                    <a href="single.html" class="image"><img
                                src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/pic10.jpg"
                                alt=""/></a>
                </article>
            </li>
            <li>
                <article>
                    <header>
                        <h3><a href="single.html">Magna enim accumsan tortor cursus ultricies</a></h3>
                        <time class="published" datetime="2015-10-08">October 8, 2015</time>
                    </header>
                    <a href="single.html" class="image"><img
                                src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/pic11.jpg"
                                alt=""/></a>
                </article>
            </li>
            <li>
                <article>
                    <header>
                        <h3><a href="single.html">Congue ullam corper lorem ipsum dolor</a></h3>
                        <time class="published" datetime="2015-10-06">October 7, 2015</time>
                    </header>
                    <a href="single.html" class="image"><img
                                src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/pic12.jpg"
                                alt=""/></a>
                </article>
            </li>
        </ul>
    </section>

    <!-- About -->
    <section class="blurb">
        <h2>About</h2>
        <p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod amet
            placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at phasellus sed ultricies.</p>
        <ul class="actions">
            <li><a href="#" class="button">Learn More</a></li>
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
        <p class="copyright">&copy; Untitled.</p>
    </section>

</section>
