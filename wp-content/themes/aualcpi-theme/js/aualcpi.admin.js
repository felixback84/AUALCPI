jQuery(document).ready(function ($) {
//alert( "ready!" );

	var mediaUploader;
	$('#upload-button').on('click',function(e){
		
		e.preventDefault();
		if(mediaUploader){
			mediaUploader.open();
			return;
		}

		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Choose a Profile Picture',
			button: {
				text: 'Choose Picture'
			},
			multiple: false
		});
		
		mediaUploader.on('select', function(){
			attachment = mediaUploader.state().get('selection').first().toJSON();
			//alert(attachment);
			$('#user_meta_image').val(attachment.url);
			$('#user_meta_image_show').attr('src',attachment.url);
		});

		mediaUploader.open();
	});

	$('#upload-button-file').on('click',function(e){
		
		e.preventDefault();
		if(mediaUploader){
			mediaUploader.open();
			return;
		}

		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Seleccione los archivos',
			button: {
				text: 'Selecionar archivo'
			},
			multiple: true
		});
		
		mediaUploader.on('select', function(){
			var selections = mediaUploader.state().get('selection').map( 
				function( attachment ) {
		    		attachment = attachment.toJSON();
		          	//console.log(attachment);
		          	return attachment;
		          	// Do something with attachment.id and/or attachment.url here
		    });

		    var i;
		    var urls =[];
		    //console.log(selections);
			$('#investigacion_meta_files_show').empty();
		    for (var i = 0; i < selections.length ; i++) {
		    	console.log(selections[i].url);
		    	filename = '<p>'+selections[i].filename+'</p>';
		    	$('#investigacion_meta_files_show').append(filename);
		    	url= selections[i].url;
		    	urls.push(url);
		    }

		    $('#investigacion_meta_files').val(urls);
		});

		mediaUploader.open();
	});

	$('#upload-button-file-publicacion').on('click',function(e){
		
		e.preventDefault();
		if(mediaUploader){
			mediaUploader.open();
			return;
		}

		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Seleccione el archivo',
			button: {
				text: 'Selecionar archivo'
			},
			multiple: false
		});
		
		mediaUploader.on('select', function(){
			var selections = mediaUploader.state().get('selection').map( 
				function( attachment ) {
		    		attachment = attachment.toJSON();
		          	//console.log(attachment);
		          	return attachment;
		          	// Do something with attachment.id and/or attachment.url here
		    });

		    var i;
		    var urls =[];
		    //console.log(selections);
			$('#publicacion_meta_file_show').empty();
		    for (var i = 0; i < selections.length ; i++) {
		    	console.log(selections[i].url);
		    	filename = '<p>'+selections[i].filename+'</p>';
		    	$('#publicacion_meta_file_show').append(filename);
		    	url= selections[i].url;
		    	urls.push(url);
		    }

		    $('#publicacion_meta_file').val(urls);
		});

		mediaUploader.open();
	});

});
