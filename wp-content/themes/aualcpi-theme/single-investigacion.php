<?php get_header(); ?>
<div class="container">
	<div class="row espacioBotton">
		<div class="col-xs-12 col-sm-8 col-sm-push-2" style="">
			<?php if( have_posts() ):
			while( have_posts() ): the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="singleInvestigaciones">
						<div id="carousel-id" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
									<?php if( has_post_thumbnail() ): ?>
										<div class="thumbnail"><?php the_post_thumbnail('full'); ?></div>
									<?php endif; ?>
									<div class="container">
										<div class="carousel-caption">
											<?php the_title('<h1 class="entry-title">','</h1>' ); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<p>
							<?php $terms_list=wp_get_post_terms($post->ID,'areas');
							if(count($terms_list)!=0) { echo ('Areas de conocimiento: ');
							echo mostrarCategorias($terms_list,'\\'); }
							$terms_list= null;
							?>
							<?php $terms_list=wp_get_post_terms($post->ID,'universidades_investigacion');
							if(count($terms_list)!=0) { echo (' || Universidad: ');
							echo mostrarCategorias($terms_list,'\\'); }
							$terms_list= null;
							?>
							<?php $terms_list=wp_get_post_terms($post->ID,'status_inves');
							if(count($terms_list)!=0) { echo (' || Status: ');
							echo mostrarCategorias($terms_list,'\\');}
							$terms_list= null;
							?>
							<?php $terms_list=wp_get_post_terms($post->ID,'ciudad_investigaciones');
							if(count($terms_list)!=0) { echo (' || Pais/Ciudad: ');
							echo mostrarCategorias($terms_list,' |');}
							$terms_list= null;
							?>
							<?php $terms_list=wp_get_post_terms($post->ID,'tag_investigacion');
							if(count($terms_list)!=0) { echo (' || Tag: ');
							echo mostrarCategorias($terms_list,'\\');}
							$terms_list= null;
							?>
							<?php if( current_user_can('manage_options') ) {
							//echo '|| ';  edit_post_link(); 
							} ?>
						</p>
						<div class="row">
							<div class="col-sx-12 col-md-7">
								<h2>Ideas</h2>
								<?php the_content(); ?>
								<?php //echo get_post_meta( $post->ID, 'investigacionLink', true ); ?>
							</div>
							<div class="col-sx-12 col-md-4 col-md-push-1">
								<div class="singleInvestigacionPanelIzquierdo">
									<h4>Información adicional</h4>
									<?php //var_dump(get_post_meta(get_the_ID(), 'wp_custom_attachment', true));
										$pdf_info = get_post_meta(get_the_ID(), 'wp_custom_attachment', true); 
										$pdf_file = $pdf_info['file'];
										$pdf_link = $pdf_info['url'];
										echo '- <a href="'.$pdf_link = $pdf_info['url'].'" target="_blank">'.basename($pdf_info['url']).'</a>';
									?>
								</div>
								<div class="singleInvestigacionPanelIzquierdo">
									<h5>Apoyado por:</h5>
									<?php if (class_exists('MultiPostThumbnails')) : 
									MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image', get_the_ID(), array(100,100));
									endif; ?>
								</div>
							</div>
						</div>
					</div>
				</article>
				<div class="row">
					<div class="col-xs-6 text-left"><?php previous_post_link(); ?></div>
					<div class="col-xs-6 text-right"><?php next_post_link(); ?></div>
				</div>
				<div class="row">
					<?php if( comments_open() ){ 
						//comments_template(); 
					} else {
						//echo '<h5 class="text-center">Sorry, Comments are closed!</h5>';
					} ?>
				</div>
			<?php endwhile;
			endif; ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>