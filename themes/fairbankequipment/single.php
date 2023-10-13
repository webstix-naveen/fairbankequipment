<?php get_header(); ?>

    <div class="clsInsidePage">
        <main class="wrap">
            <section class="content-area content-thin">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <article class="article-full">        		
                        <?php the_content(); ?>
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