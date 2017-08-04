<?php get_header(); ?>
<!-- pagina nuestra asociacion-->
<div class="hidden-xs">
	<div id="imagenTop" class="carousel slide espacioBotton" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">
				<?php if(!empty(get_the_post_thumbnail (83,'post-thumbnail', ['class' => 'img-responsive responsive--full', 'title' => 'Feature image']))){ ?>
					<div class="thumbnail"><?php the_post_thumbnail ('post-thumbnail', ['class' => 'img-responsive responsive--full sombraInferior', 'title' => 'Feature image','alt'   => 'imagen de inicio de la publicacion subida']); ?></div>
				<?php } else { ?>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fondoPerfil.png" alt="imagen de inicio de la publicacion"  class="sombraInferior" width="" height="" />
				<?php }?>
				<div class="container">
					<div class="carousel-caption">
						<?php
						$post = get_post(83); 
						$contenido = $post->post_content;
						echo $contenido;
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/highcharts.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/highcharts-3d.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/exporting.js"></script>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-6">

<?php 
$categoria = array();
$cont =0;
//$terms_list=wp_get_post_terms($post->ID,'ciudad_becas'); 
$terms_list = get_terms( 'ciudad_becas' , array( 'orderby' => 'name','parent' => 0,'hide_empty' => false));
foreach ($terms_list as $term) {
		// var_dump($term->name);
		// if(!in_array($term->name,$Paises)){ array_push($Paises,$term->name);
		// 	$cont++;
		// }
		$cont++;
		$categoria[$term->name]= 0;
}
//numero de paises
//var_dump($cont);
//listado de paises
//var_dump($categoria);
//var_dump(count ($categoria));
?>

<?php //$terms_list=wp_get_post_terms($post->ID,'ciudad_becas'); ?>

<?php $args = array (
    'post_type' => 'becas',
    'orderby' => 'id',
    'order'   => 'DESC',
);
$numeroTotal =0;
$lastBlog = new WP_Query ($args);
if($lastBlog->have_posts()):
    while( $lastBlog->have_posts() ): $lastBlog->the_post();?>
            <?php $terms_list=wp_get_post_terms($post->ID,'ciudad_becas',array('parent'=> 0)); 
            //var_dump(count ($terms_list));
            foreach ($categoria as $key => $value) {
             foreach ($terms_list as $term) {
                  // var_dump('key'.$key);
                  // var_dump('name'.$term->name);
                  // var_dump('--');
                  if($key === $term->name){
                    $categoria[$key] = $value+1;
                    $numeroTotal += 1;
                    //$categoria = array_replace($categoria,
                    //var_dump('value'.$value);
                    //var_dump('value'.$categoria[$key]);
                    //echo "--";
                  }
              }
            }
            ?>                             
        <?php  endwhile;
    endif;  
wp_reset_postdata();   ?>

			<div id="GraficoBecasA" style="height: 400px"></div>
				<script type="text/javascript">

Highcharts.chart('GraficoBecasA', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        }
    },
    title: {
        text: 'Becas por pais'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 35,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
    series: [{
        type: 'pie',
        name: 'Porcentaje',
        data: [
            <?php //var_dump($categoria); 
                $primero = '1';
                foreach ($categoria as $key => $value){
                    $porcentaje = porcentaje($value, $numeroTotal);
                    if($primero === '1'){
                        $primero = '2';
                        //echo $key.'-'.$value;
                        echo "{
                            name: '$key',
                            y: $porcentaje,
                            sliced: true,
                            selected: true
                        },";
                    }else{
                        echo "['$key', $porcentaje],";
                    }
                }
            ?>
        ]
    }]
});
		</script>


        </div>

        <div class="col-xs-12 col-sm-6">
<?php 
$categoria = array(); $cont =0;
$terms_list = get_terms( 'categoria' , array( 'orderby' => 'name','parent' => 0,'hide_empty' => false));
foreach ($terms_list as $term) {
        $cont++;
        $categoria[$term->name]= 0;
} ?>
<?php $args = array ( 'post_type' => 'becas', 'orderby' => 'id', 'order'   => 'DESC', );
$numeroTotal =0;
$lastBlog = new WP_Query ($args);
if($lastBlog->have_posts()):
    while( $lastBlog->have_posts() ): $lastBlog->the_post();?>
            <?php $terms_list=wp_get_post_terms($post->ID,'categoria',array('parent'=> 0)); 
            foreach ($categoria as $key => $value) {
             foreach ($terms_list as $term) {
                  if($key === $term->name){$categoria[$key] = $value+1;$numeroTotal += 1;}
              } }?>                             
<?php  endwhile; endif; wp_reset_postdata();   ?>
<div id="GraficoBecasB" style="height: 400px"></div>
<script type="text/javascript">
Highcharts.chart('GraficoBecasB', {
    chart: {type: 'pie', options3d: {enabled: true, alpha: 45,beta: 0}
    },
    title: { text: 'Becas por categorias'},
    tooltip: {pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'},
    plotOptions: {
        pie: {allowPointSelect: true,cursor: 'pointer',depth: 35,dataLabels: {
                enabled: true,format: '{point.name}'
            }
        }
    },
    series: [{ type: 'pie',name: 'Porcentaje',
        data: [
            <?php $primero = '1';
                foreach ($categoria as $key => $value){$porcentaje = porcentaje($value, $numeroTotal);
                    if($primero === '1'){$primero = '2';
                        echo "{ name: '$key',y: $porcentaje,sliced: true,selected: true},";
                    }else{
                        echo "['$key', $porcentaje],";
                    }
                }
            ?>
        ]
    }]
});
        </script>
        </div>

		</div>

        <div class="col-xs-12 col-sm-6">
<?php 
$categoria = array(); $cont =0;
$terms_list = get_terms( 'ciudad_investigaciones' , array( 'orderby' => 'name','parent' => 0,'hide_empty' => false));
foreach ($terms_list as $term) {
        $cont++;
        $categoria[$term->name]= 0;
} ?>
<?php $args = array ( 'post_type' => 'investigacion', 'orderby' => 'id', 'order'   => 'DESC', );
$numeroTotal =0;
$lastBlog = new WP_Query ($args);
if($lastBlog->have_posts()):
    while( $lastBlog->have_posts() ): $lastBlog->the_post();?>
            <?php $terms_list=wp_get_post_terms($post->ID,'ciudad_investigaciones',array('parent'=> 0)); 
            foreach ($categoria as $key => $value) {
             foreach ($terms_list as $term) {
                  if($key === $term->name){$categoria[$key] = $value+1;$numeroTotal += 1;}
              } }?>                             
<?php  endwhile; endif; wp_reset_postdata();   ?>
<div id="GraficoRetosB" style="height: 400px"></div>
<script type="text/javascript">
Highcharts.chart('GraficoRetosB', {
    chart: {type: 'pie', options3d: {enabled: true, alpha: 45,beta: 0}
    },
    title: { text: 'Retos por pais'},
    tooltip: {pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'},
    plotOptions: {
        pie: {allowPointSelect: true,cursor: 'pointer',depth: 35,dataLabels: {
                enabled: true,format: '{point.name}'
            }
        }
    },
    series: [{ type: 'pie',name: 'Porcentaje',
        data: [
            <?php $primero = '1';
                foreach ($categoria as $key => $value){$porcentaje = porcentaje($value, $numeroTotal);
                    if($primero === '1'){$primero = '2';
                        echo "{ name: '$key',y: $porcentaje,sliced: true,selected: true},";
                    }else{
                        echo "['$key', $porcentaje],";
                    }
                }
            ?>
        ]
    }]
});
        </script>
        </div>

        <div class="col-xs-12 col-sm-6">
<?php 
$categoria = array(); $cont =0;
$terms_list = get_terms( 'areas' , array( 'orderby' => 'name','parent' => 0,'hide_empty' => false));
foreach ($terms_list as $term) {
        $cont++;
        $categoria[$term->name]= 0;
} ?>
<?php $args = array ( 'post_type' => 'investigacion', 'orderby' => 'id', 'order'   => 'DESC', );
$numeroTotal =0;
$lastBlog = new WP_Query ($args);
if($lastBlog->have_posts()):
    while( $lastBlog->have_posts() ): $lastBlog->the_post();?>
            <?php $terms_list=wp_get_post_terms($post->ID,'areas',array('parent'=> 0)); 
            foreach ($categoria as $key => $value) {
             foreach ($terms_list as $term) {
                  if($key === $term->name){$categoria[$key] = $value+1;$numeroTotal += 1;}
              } }?>                             
<?php  endwhile; endif; wp_reset_postdata();   ?>
<div id="GraficoRetosA" style="height: 400px"></div>
<script type="text/javascript">
Highcharts.chart('GraficoRetosA', {
    chart: {type: 'pie', options3d: {enabled: true, alpha: 45,beta: 0}
    },
    title: { text: 'Retos por categorias'},
    tooltip: {pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'},
    plotOptions: {
        pie: {allowPointSelect: true,cursor: 'pointer',depth: 35,dataLabels: {
                enabled: true,format: '{point.name}'
            }
        }
    },
    series: [{ type: 'pie',name: 'Porcentaje',
        data: [
            <?php $primero = '1';
                foreach ($categoria as $key => $value){$porcentaje = porcentaje($value, $numeroTotal);
                    if($primero === '1'){$primero = '2';
                        echo "{ name: '$key',y: $porcentaje,sliced: true,selected: true},";
                    }else{
                        echo "['$key', $porcentaje],";
                    }
                }
            ?>
        ]
    }]
});
        </script>
        </div>


        <div class="col-xs-12 col-sm-6">
<?php 
$categoria = array(); $cont =0;
$terms_list = get_terms( 'author_publicaciones' , array( 'orderby' => 'name','parent' => 0,'hide_empty' => false));
foreach ($terms_list as $term) {
        $cont++;
        $categoria[$term->name]= 0;
} ?>
<?php $args = array ( 'post_type' => 'publicacion', 'orderby' => 'id', 'order'   => 'DESC', );
$numeroTotal =0;
$lastBlog = new WP_Query ($args);
if($lastBlog->have_posts()):
    while( $lastBlog->have_posts() ): $lastBlog->the_post();?>
            <?php $terms_list=wp_get_post_terms($post->ID,'author_publicaciones',array('parent'=> 0)); 
            foreach ($categoria as $key => $value) {
             foreach ($terms_list as $term) {
                  if($key === $term->name){$categoria[$key] = $value+1;$numeroTotal += 1;}
              } }?>                             
<?php  endwhile; endif; wp_reset_postdata();   ?>
<div id="GraficoPublicacionesA" style="height: 400px"></div>
<script type="text/javascript">
Highcharts.chart('GraficoPublicacionesA', {
    chart: {type: 'pie', options3d: {enabled: true, alpha: 45,beta: 0}
    },
    title: { text: 'Retos por categorias'},
    tooltip: {pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'},
    plotOptions: {
        pie: {allowPointSelect: true,cursor: 'pointer',depth: 35,dataLabels: {
                enabled: true,format: '{point.name}'
            }
        }
    },
    series: [{ type: 'pie',name: 'Porcentaje',
        data: [
            <?php $primero = '1';
                foreach ($categoria as $key => $value){$porcentaje = porcentaje($value, $numeroTotal);
                    if($primero === '1'){$primero = '2';
                        echo "{ name: '$key',y: $porcentaje,sliced: true,selected: true},";
                    }else{
                        echo "['$key', $porcentaje],";
                    }
                }
            ?>
        ]
    }]
});
        </script>
        </div>

		<div class="col-xs-12 col-sm-6">
<?php 
$categoria = array(); $cont =0;
$terms_list = get_terms( 'tipo_publicaciones' , array( 'orderby' => 'name','parent' => 0,'hide_empty' => false));
foreach ($terms_list as $term) {
        $cont++;
        $categoria[$term->name]= 0;
} ?>
<?php $args = array ( 'post_type' => 'publicacion', 'orderby' => 'id', 'order'   => 'DESC', );
$numeroTotal =0;
$lastBlog = new WP_Query ($args);
if($lastBlog->have_posts()):
    while( $lastBlog->have_posts() ): $lastBlog->the_post();?>
            <?php $terms_list=wp_get_post_terms($post->ID,'tipo_publicaciones',array('parent'=> 0)); 
            foreach ($categoria as $key => $value) {
             foreach ($terms_list as $term) {
                  if($key === $term->name){$categoria[$key] = $value+1;$numeroTotal += 1;}
              } }?>                             
<?php  endwhile; endif; wp_reset_postdata();   ?>
<div id="GraficoPublicacionesB" style="height: 400px"></div>
<script type="text/javascript">
Highcharts.chart('GraficoPublicacionesB', {
    chart: {type: 'pie', options3d: {enabled: true, alpha: 45,beta: 0}
    },
    title: { text: 'Retos por categorias'},
    tooltip: {pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'},
    plotOptions: {
        pie: {allowPointSelect: true,cursor: 'pointer',depth: 35,dataLabels: {
                enabled: true,format: '{point.name}'
            }
        }
    },
    series: [{ type: 'pie',name: 'Porcentaje',
        data: [
            <?php $primero = '1';
                foreach ($categoria as $key => $value){$porcentaje = porcentaje($value, $numeroTotal);
                    if($primero === '1'){$primero = '2';
                        echo "{ name: '$key',y: $porcentaje,sliced: true,selected: true},";
                    }else{
                        echo "['$key', $porcentaje],";
                    }
                }
            ?>
        ]
    }]
});
		</script>
		</div>

	</div>
</div>
<?php get_template_part('targetas-aliados'); ?>
<?php get_footer(); ?>