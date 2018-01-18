<script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/frontend/web/html2canvas.js" type="text/javascript"></script>
<script>
    
    $(document).ready(function(){
        $('#generate_image_btn').click(function(){
            html2canvas($('#image_generate'), {
				allowTaint: true,
				taintTest: false,
				onrendered: function(canvas) {
					document.body.appendChild(canvas);
					$('canvas').attr('id', 'canvas');
					$('canvas').attr('class', 'canvas_blk');
					var canvas = document.getElementById("canvas");
					//window.location.href = canvas.toDataURL('image/jpeg');
					var images = canvas.toDataURL("image/jpeg"); //.replace("image/png", "image/octet-stream");
					var file_name = Math.floor(Date.now())+'.jpeg';
                                        console.log(images);
					$("#canvas").remove();
                                    
                                        var ajaxUrl = '<?php echo Yii::$app->urlManager->createUrl('canvas_images_save'); ?>';
					$.ajax({
						url: ajaxUrl,
						data:{
							base64: images,
							file_name: file_name,
						},
						type: "post",
						success:function(response){
							response = $.trim(response);
							$('.canvas_blk').hide();
							setTimeout(function(){

								var popup_url = 'https://www.facebook.com/sharer/sharer.php?u=gigdawg.com/artist_show/'+response;
								window.open(popup_url,'facebook-share-dialog','width=400,height=350');
							}, 1000);
						}
					});
					//$('#image_generate').hide();
					$('#canvas').attr('id','null');
				}

			});
        });
    });
</script>