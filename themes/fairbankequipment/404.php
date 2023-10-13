<?php 
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress

 */
 get_header(); ?>

<div class="clsInsidePage">
	<main class="wrap">
		<section class="content-area content-thin">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article class="article-full">        		
					<?php the_content(); ?>
				</article>
				
			<?php endwhile; else : ?>
				<article class="article-full clsError404">
						<div class="error-404 not-found default-max-width">
						<div class="page-content">
							<p>We're sorry. We couldn't fetch this page.</p>
							<?php get_search_form(); ?>
						</div><!-- .page-content -->
					</div><!-- .error-404 -->
				</article>
			<?php endif; ?>
		</section>	
	</main>
</div>

<?php get_footer(); ?>
