jQuery(document).ready(function($){
	var mediaUploader;

	$('#upload-button').click(function(e) {
		e.preventDefault();

		if (mediaUploader) {
			mediaUploader.open();
			return;
		}

		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Choose Image',
			button: {
			text: 'Choose'
			}, multiple: false
		});

		mediaUploader.on('select', function() {
			attachment = mediaUploader.state().get('selection').first().toJSON();
			$('#image-url').val(attachment.url);
			
			setTimeout(function(){
				tb_show("Image has been added","#TB_inline?width=500&height=300&inlineId=img",null);
			}, 400);
		});

		mediaUploader.open();
	});
	
	$('#close-img').click(function() {
		tb_remove();
	});
});