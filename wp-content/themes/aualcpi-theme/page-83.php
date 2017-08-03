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
var_dump(count ($categoria));
?>

<?php //$terms_list=wp_get_post_terms($post->ID,'ciudad_becas'); ?>

		


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
            {
                name: 'Chrome',
                y: 12.8,
                sliced: true,
                selected: true
            },
            ['IE', 26.8],
            ['Firefox', 45.0],
            ['Safari', 8.5],
            ['Opera', 6.2],
            ['Others', 0.7],
        ]
    }]
});
		</script>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div id="GraficoBecasB" style="height: 400px"></div>
				<script type="text/javascript">

Highcharts.chart('GraficoBecasB', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        }
    },
    title: {
        text: 'Becas por categorias'
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
            ['Firefox', 45.0],
            ['IE', 26.8],
            {
                name: 'Chrome',
                y: 12.8,
                sliced: true,
                selected: true
            },
            ['Safari', 8.5],
            ['Opera', 6.2],
            ['Others', 0.7]
        ]
    }]
});
		</script>
		</div>
	</div>
</div>
<?php get_template_part('targetas-aliados'); ?>
<?php get_footer(); ?>