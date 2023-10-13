<?php get_header(); ?>

    <div class="clsInsidePage">
        <main class="wrap">
            <section class="content-area content-thin">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <article class="article-full">
                        <?php the_title(); ?>        		
                        <?php the_excerpt(); ?>
                        <a href="<?php echo get_permalink(); ?>">Read More</a>
                    </article>
                <?php endwhile; else : ?>
                    <article>
                        <p>Sorry, no page was found!</p>
                    </article>
                <?php endif; ?>
            </section>	
        </main>
    </div>

<?php get_footer(); ?>