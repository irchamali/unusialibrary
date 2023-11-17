
$(document).ready(function () {
	function bytesToSize(bytes) {
		var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
		if (bytes == 0) return 'n/a';
		var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
		return (bytes / Math.pow(1024, i)).toFixed(2) + ' ' + sizes[i];
	};
	
	$('.file').on('change',function(e) 
	{
		file = this.files[0];
		$this = $(this);

		if(this.files[0] != undefined){
			$('.img-choose').hide();
			$('.image-remove').val(1);
		} else {
			$('.img-choose').show();
			$('.image-remove').val(0);
		}
		
		$this.parent().find('.alert-danger').remove();
		$upload_img = $this.parent().children('.upload-file-thumb');
		
		$upload_img.find('img').remove();
		$upload_img.find('.file-prop').empty();
		$upload_img.hide();
		if ($this.val() == '')
			return false;
		
		name = $this.attr('name');
		max_size = 1024 * 1024 * 2;
		$max_size_elm = $('.' + name + '-max-size');
		if ($max_size_elm.length > 0) {
			max_size = parseInt($max_size_elm.val());
		}

		var reader = new FileReader();

		// Closure to capture the file information.
		
		
		reader.onload = (function(e) {
			
			// Render thumbnail.
			var thumb = '<img class="thumb" src="' + e.target.result +
                            '" title="' + escape(file.name) + '"/>';
			$upload_img.find('.file-prop').before(thumb);

			var removeThumb = '<a href="javascript:void(0)" onclick="btn_remove_thumb();" class="btn-remove-thumb btn btn-danger"><i class="fas fa-times"></i></a>';
			$upload_img.find('.file-prop').before(removeThumb)
			
			var img = new Image;
			img.src = reader.result;
            img.onload = function() {
				var file_prop = '<br><b>Name:</b> ' + file.name + ' <br><b>Size:</b> ' + file_size + ' <br><b>Dimension (W x H):</b> ' + img.width + 'px X ' + img.height + 'px <br><b>Type:</b> ' + file.type;
				$upload_img.show().find('.file-prop').html(file_prop);
            };
		});

		reader.readAsDataURL(file); 
		size = file.size;
		
		file_size = size + ' Bytes';
		if (size > 1024 * 1024) {
			file_size = parseFloat(size / (1024 * 1024)).toFixed(2) + ' Mb';
		} else if (size > 1024) {
			file_size = parseFloat(size / 1024).toFixed(2) + ' Kb';
		}
		
		if (size > max_size) {
			$('<small class="alert alert-danger" style="display:block">Ukuran file maksimal: ' + bytesToSize(max_size) + ', file Anda ' + file_size + '</small>').insertAfter($('.file'));
			return;
		}
	});

	$('.btn-remove-img').on('click',function(){
		$container = $(this).parent().parent().parent();
		input_file_name = $container.find('.file').attr('name');
		$(this).parent().parent().hide();
		$('.' + input_file_name + '-remove').val(1);
	});
});

function btn_remove_thumb() {
	var $upload_img = $('.upload-file-thumb');
	$('.alert-danger').remove();
	$upload_img.find('img').remove();
	$upload_img.find('.file-prop').empty();
	$upload_img.hide();
	$('.img-choose').show();
	$('.image-remove').val(0);
	$('#image').val('');
}