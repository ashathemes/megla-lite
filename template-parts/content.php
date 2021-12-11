<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Megla Lite
 */
if ( ! is_singular( ) ) : ?>
<div class="col-md-6">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="cover">
            <div class="cover-inner item bg-img" data-background="<?php echo esc_url( wp_get_attachment_url( get_post_thumbnail_id() ) ); ?>" style="background-image: url(<?php echo esc_url( wp_get_attachment_url( get_post_thumbnail_id() ) ); ?>);">
                <div class="content">
                    <div class="info">
                    	<?php
						if ( 'post' === get_post_type() ) : ?>
							<div class="entry-meta">
								<?php 
									megla_posted_by();
									megla_posted_on(); 
								?>
							</div><!-- .entry-meta -->
						<?php endif; ?>
                    </div>
                    <?php the_title( '<h5 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' ); 

                    the_excerpt();
                    echo'<a href="'.esc_url ( get_the_permalink( $post->ID ) ).'" class="underline-text">'.esc_html__('Read More','megla-lite').'</a>'; ?>
                </div>
            </div>
        </div>
	</article>
</div>
<?php else: ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<?php megla_post_thumbnail(); ?>
		<div class="post-content">
			<header class="entry-header">
				<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );

				endif;

				if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php 
							megla_posted_on();
							megla_posted_by(); 
						?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php

				if(is_single( )){
					the_content(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'megla-lite' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post( get_the_title() )
						)
					);
				}
				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'megla-lite' ),
						'after'  => '</div>',
					)
				);
				?>
			</div><!-- .entry-content -->

			<?php if ( is_singular() ) : ?>
				<footer class="entry-footer">
					<?php megla_entry_footer(); ?>
				</footer><!-- .entry-footer -->
			<?php endif; ?>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->
<?php endif; ?>