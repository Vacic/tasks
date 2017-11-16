<div class="modal fade" id="modal">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
				  <?php echo form_open('users/upload/'.$user_id, "class='dropzone drop-zone' id='dropzone'"); ?>
				  <div class="dz-message">Drag and drop your picture here<br>or click to choose</div>
				  <?php echo form_close(); ?>
    	</div>
  	</div>
</div>
<script>
	Dropzone.options.dropzone = {
        maxFiles: 1,
        thumbnailHeight: null,
		thumbnailWidth: null,
		init: function() {
			var _this = this;
			this.on('success', function(){
				setTimeout(function(){
					$('#modal').modal('hide');
				}, 3000);
				var user_id = $('.profile-img').attr('user-id');
				$.ajax({
					url: '<?php echo base_url();?>users/get_img/'+user_id,
					type: 'POST',
					success: function(data){
						if(!data.error) {
							$(".profile-img").attr('src', '<?php echo base_url();?>userimg/'+data);
							$(".message").html('<p class="bg-success text-center">Your image has been changed successfully</p>');
							$('.message').toggle();
							_this.removeFile();
							setTimeout(function(){
								$('.message').slideUp();
							}, 5000);
						}
					}
				});
			});
		}
	}
</script>