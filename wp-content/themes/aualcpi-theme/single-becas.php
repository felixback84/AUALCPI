<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-sm-push-2">
			<?php if( have_posts() ):
			while( have_posts() ): the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="styleSingle">
						<?php the_title('<h1 class="entry-title">','</h1>' ); ?>
						<p>	
							<?php if (class_exists('MultiPostThumbnails')) : 
									MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image', get_the_ID(), array(100,100));
							endif; ?>
							<?php $terms_list=wp_get_post_terms($post->ID,'categoria');
								if(count($terms_list)!=0) { echo ('Categoria: ');
								echo mostrarCategorias($terms_list,'|');}
								$terms_list= NULL;
							?> 
							<?php $terms_list=wp_get_post_terms($post->ID,'ciudad_becas');
								if(count($terms_list)!=0) { echo (' || Ciudad/Pais: ');
								echo mostrarCategorias($terms_list,' |');}
								$terms_list= NULL;
							?> 
							<?php $terms_list=wp_get_post_terms($post->ID,'cantidad_becas');
								if(count($terms_list)!=0) { echo (' || Becas disponibles: ');
								echo mostrarCategorias($terms_list,'\\');}
								$terms_list= NULL;
							?> 
							<?php $terms_list=wp_get_post_terms($post->ID,'tipo_beca');
							if(count($terms_list)!=0) { echo (' || Tipo de beca: ');
								echo mostrarCategorias($terms_list,'\\');}
								$terms_list= NULL;
							?> 
							<?php //$terms_list=wp_get_post_terms($post->ID,'ciudad_becas'); var_dump($terms_list);?>
							
							<?php if( current_user_can('manage_options') ) {
							//echo '|| ';  edit_post_link(); 
							} ?>
						</p>
							
						<?php if( has_post_thumbnail() ): ?>
							<div class="thumbnail"><?php the_post_thumbnail('full'); ?></div>
						<?php endif; ?>
						<?php the_content(); ?>
				
						
						<?php $becasDisponibles = get_post_meta(get_the_ID(),'becasDisponibles',true); 
						if(!empty($becasDisponibles )){ ?>
						<p><em><strong>Total becas disponibles:</strong></em>
						<?php echo $becasDisponibles; }?></p>
						
						<?php $categoriaA = get_post_meta(get_the_ID(),'categoriaA',true); 
						if(!empty($categoriaA )){ ?>
						<p><em><strong>Categoría I (estudiantil):</strong></em>
						<?php echo $categoriaA; }?></p>

						<?php $categoriaB = get_post_meta(get_the_ID(),'categoriaB',true); 
						if(!empty($categoriaB )){ ?>
						<p><em><strong>Categoría II (investigadores y docentes):</strong></em>
						<?php echo $categoriaB; }?></p> 

						<?php $categoriaC = get_post_meta(get_the_ID(),'categoriaC',true);  
						if(!empty($categoriaC )){ ?>
						<p><em><strong>Categoría III (gestores institucionales):</strong></em>
						<?php echo $categoriaC; }?></p> 

						<?php $Definicion = get_post_meta(get_the_ID(),'Definicion',true);  ?>
						<p><?php echo apply_filters('meta_content', $Definicion ); ?></p>
					</div>
					<div class="CompartirRedes">
						<div class="CompartirRedesSociales">
							 <div class="fb-share-button" 
							    data-href="<?php echo esc_url(get_permalink()); ?>" 
							    data-layout="button" 
							    data-mobile-iframe="true">
							 </div>
						</div>
						<div class="CompartirRedesSociales">
							 <a href="https://twitter.com/aualcpi" class="twitter-share-button" data-url="<?php echo esc_url(get_permalink()); ?>" data-text="Aualcpi - <?php echo wp_trim_words(get_the_title(),4,'...'); ?>" data-via="aualcpi" data-hashtags="AUALCPI">Tweet</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
						</div>
						<div class="CompartirRedesSociales">
							<a data-pin-do="buttonBookmark" data-pin-save="true" href="https://www.pinterest.com/pin/create/button/" data-pin-description="AUALCPI: <?php echo get_the_title(); ?>"  data-pin-url="<?php echo esc_url(get_permalink()); ?>" data-pin-media="<?php if(has_post_thumbnail()){the_post_thumbnail_url();}else{echo get_stylesheet_directory_uri().'/images/logo_aualcpi.png';} ?>" ></a>
						</div>
					</div>
					<!-- <div class="fb-share-button" 
					    data-href="http://www.your-domain.com/your-page.html" 
					    data-layout="button_count">
					</div> -->
<!-- <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="box_count" data-size="small" ><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Compartir</a></div>

<div class="fb-like espacioLinkContribuciones" data-href="<?php echo esc_url(get_permalink()); ?>" data-width="450" data-layout="button_count" data-show-faces="false" data-send="false" ></div> -->


				</article>
				<div class="row">
					<div class="col-xs-6 text-left"><?php previous_post_link(); ?></div>
					<div class="col-xs-6 text-right"><?php next_post_link(); ?></div>
				</div>
				<div class="row">
				<div class="col-xs-12">
					
					<?php if( comments_open() ){ 
						//comments_template(); 
					} else {
						//echo '<h5 class="text-center">Sorry, Comments are closed!</h5>';
					} ?>
				</div>
				</div>
			<?php endwhile;
			endif; ?>
		</div>
	</div>
</div>

<script async defer src="//assets.pinterest.com/js/pinit.js"></script>
<?php get_footer(); ?>