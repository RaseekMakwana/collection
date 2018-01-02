@extends('layouts.artist')
@section('content')
<script src="https://code.jquery.com/jquery-migrate-3.0.1.js"></script>
{!! Html::script(config('app.url').'public/js/frontend/html2canvas.js') !!}
{!! Html::script(config('app.url').'public/js/frontend/imgcentering.js') !!}


<section id="mrkt_div" class="post-page-section">
	<div class="container color-bg-white">
		<div class="row">
			<div class="col-sm-12">
				<div class="tab-part-post">
					<div class="post-view">
						<?php
						if (sizeof($data['shows']) > 0)
						{
						?>
						<span class="head-market"> <h2>Marketing Tools</h2></span>
						<div class="col-xs-12 col-sm-3 col-md-4 col-lg-4 no-padding upcmng_gid_mrkt">

							<span class="side-bar-head"><h2>Upcoming Gigs</h2></span>
							<div class="cls_marketing_sidebar">
								<div class="cls-marketing-left-all-select clearfix">
									<input type="checkbox" id="selectAllCheckbox" > <span>MARKET MULTIPLE GIGS TOGETHER</span>
									<div class="sort-part-tab-view">
										<span class="sort-by-text">Sort By:</span>
										<div class="select-box">
											<select id="market_select_sort" class="form-control">
												<option value="start_time">Show Date</option>
												<option value="venue_fname">Venue Name</option>
											</select>
										</div>
									</div>
								</div>

								<ul id="mrkt_left_list" class="nav nav-tabs text-center col-lg-12 no-padding">
									<?php
							foreach ($data['shows'] as $keyS => $valueS) {

									?>
									<li class="<?php echo $keyS == 0 ? 'active' : ''; ?> col-sm-4">
										<input type="checkbox" class="each_action_checkbox" value="{{$valueS->id}}">
										<a data-toggle="tab" class="tab-menu" href="">
											<span><?php echo $valueS->venue_fname . ' ' . $valueS->venue_lname; ?></span><?php echo date("m/d/y @ h:i a", strtotime($valueS->start_time)); ?>
											<?php /*<span class="arrow_set"><img src="{{ url('public/images/arrow-1.png') }}" alt=""></span> */ ?>
										</a>
									</li>
									<?php
							}
									?>
								</ul>
							</div>

						</div>
						<div class="col-sm-9 col-md-8 col-lg-8">
							<div id="mrkt_right_list" class="mrkt_right_list tab-content">

								<div id="" class="tab-pane fade in active">
									<div class="venue-post-inner">
										<span class="venue-inner-head"><h2>Marketing Opportunities</h2></span>
										<div class="col-xs-3 text-center">
											<span class="social-post-ic"><img src="{{ url('public/images/facebook-icon.png') }}" alt=""></span>
										</div>
										<div class="col-xs-9 post_right_text">
											<h2>Post Gig to Facebook! <a href="javascript:void(0);" style="float: right; font-weight: normal; font-size:15px; " id="marketing_fb_edit_btn" >Edit</a></h2>
											<div class="fb_plain_post">
												Write some description for facebook shareing
											</div>

											<div id="fb_edit_post" style="display: none;">

												<textarea id="market_fb_description"><?php echo 'Robert V. Spain, 26/12/2017 @ 12:00 AM'; ?></textarea>
												<a class="btn btn-success" id="fb_edit_btn" href="javascript:void(0);">Update</a>
											</div>
											<br>
											<div class="selected_shows_fb_list" style="display: none;">
												<p class="marketing_show_headline"><span>PLEASE CHOOSE A HEADLINER</span><br>Your headliner choice will determine the graphic used in your post</p>
												<p class="selected_shows_list" ></p>
											</div>
											<span class="post_now-button">
												<a class="btn btn-grey" id="market_fb_showList" href="javascript:void(0);">Post Now</a>
												<a class="btn btn-grey" id="market_fb_share" style="display: none" href="">Post Now</a>
												</div>
										</div>

										<div class="venue-post-inner">
											<div class="col-xs-3 text-center">
												<span class="social-post-ic"><img src="{{ url('public/images/twit.jpg') }}" alt=""></span>
											</div>
											<div class="col-xs-9 post_right_text">
												<h2>Post Gig to Twitter! <a href="javascript:void(0);" style="float: right; font-weight: normal; font-size:15px; " id="marketing_tw_edit_btn" >Edit</a></h2>

												<div class="tw_plain_post">
													Write some description for Twitter shareing
												</div>

												<div id="tw_edit_post" style="display: none;">
													<textarea>Write some description for Twitter shareing</textarea>
													<a class="btn btn-success" id="tw_edit_btn" href="javascript:void(0);">Update</a>
												</div>
												<br>
												<div class="selected_shows_tw_list" style="display: none;">
													<p class="marketing_show_headline"><span>PLEASE CHOOSE A HEADLINER</span><br>Your headliner choice will determine the graphic used in your post</p>
													<p class="selected_shows_list"></p>
												</div>
												<span class="post_now-button">
													<a class="btn btn-grey market_tw_showList" id="ref_tw"  href="javascript:void(0)">Tweet Now</a>
													<a class="btn btn-grey market_tw_share" style="display: none;" id="ref_tw" href="http://twitter.com/home?status=" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=400,width=600');return false;">Tweet Now</a>
												</span>
											</div>
										</div>

										<div class="below_link_set">
											<h2>Copy link below to share this gig anywhere you’d like!</h2>
											<div class="form-group">
												<input type="text" class="form-control" id="sub" placeholder="sharable link..." value="">
											</div>
										</div>
									</div>

									<?php /*
							foreach ($data['shows'] as $keyS => $valueS)
							{
								$show_url = Config::get('app.url') . "show/detail/" . $valueS->show_id;
								$image_url = Config::get('app.url') . 'public/uploads/shows_images/show_' . $valueS->show_id . '.jpg';

								// twitter
								$text_len_left = 140 - strlen($show_url);
								$tweet_detail_text = "GigDawg: New show at " . $valueS->venue_fname . " " . $valueS->venue_lname . " on " . date('M d, Y @ h:i a', strtotime($valueS->start_time));

								if (strlen($tweet_detail_text) >= $text_len_left)
								{
									$tweet_detail_text = substr($tweet_detail_text, 0, $text_len_left-5);
								}
								$tweet_text = $tweet_detail_text . "...";

								// fb
								$fb_text = "GigDawg: New show at " . $valueS->venue_fname . " " . $valueS->venue_lname . ' on ' . date("M d, Y @ h:i a", strtotime($valueS->start_time));
									?>
								<div id="tab<?php echo $keyS+1?>" class="tab-pane fade in <?php echo $keyS==0 ? 'active':''; ?>">
									<div class="venue-post-inner">
										<span class="venue-inner-head"><h2>Marketing Opportunities</h2></span>
										<div class="col-xs-3 text-center">
											<span class="social-post-ic"><img src="{{ url('public/images/facebook-icon.png') }}" alt=""></span>
										</div>
										<div class="col-xs-9 post_right_text">
																					<h2>Post Gig to Facebook! <a href="javascript:void(0);" style="float: right; font-weight: normal; font-size:15px; " id="marketing_fb_edit_btn" >Edit</a></h2>
																							<div class="fb_plain_post">
																								<?php echo $fb_text; ?>
																							</div>

																							<div id="fb_edit_post" style="display: none;">
																								<textarea><?php echo $fb_text; ?></textarea>
																								<a class="btn btn-success" id="fb_edit_btn" href="javascript:void(0);">Update</a>
																							</div>
																					<br>
																						<p class="marketing_show_headline"><span>PLEASE CHOOSE A HEADLINER</span><br>Your headliner choice will determine the graphic used in your post</p>
																						<p class="selected_shows_list selected_shows_fb_list" style="display: none;"></p>
											<span class="post_now-button">
												<a class="btn btn-grey" id="market_fb_showList" href="javascript:void(0);" target="_blank">Post Now</a>
																								<a class="btn btn-grey" id="market_fb_share" style="display: none" href="https://www.facebook.com/sharer/sharer.php?title=<?php echo $fb_text . ' ' . $show_url; ?>&description=<?php echo $fb_text; ?>&picture=<?php echo $image_url; ?>&u=<?php echo $show_url; ?>" target="_blank">Post Now</a>
											</span>
										</div>
									</div>

									<div class="venue-post-inner">
										<div class="col-xs-3 text-center">
											<span class="social-post-ic"><img src="{{ url('public/images/twit.jpg') }}" alt=""></span>
										</div>
										<div class="col-xs-9 post_right_text">
											<h2>Post Gig to Twitter! <a href="javascript:void(0);" style="float: right; font-weight: normal; font-size:15px; " id="marketing_tw_edit_btn" >Edit</a></h2>

																							<div class="tw_plain_post">
																								<?php echo $tweet_text; ?>
																							</div>

																							<div id="tw_edit_post" style="display: none;">
																								<textarea><?php echo $tweet_text; ?></textarea>
																								<a class="btn btn-success" id="tw_edit_btn" href="javascript:void(0);">Update</a>
																							</div>
																						<br>
																						<p class="marketing_show_headline"><span>PLEASE CHOOSE A HEADLINER</span><br>Your headliner choice will determine the graphic used in your post</p>
																						<p class="selected_shows_list selected_shows_tw_list" style="display: none;"></p>
											<span class="post_now-button">
												<a class="btn btn-grey market_tw_showList" id="ref_tw"  href="javascript:void(0)">Tweet Now</a>
												<a class="btn btn-grey market_tw_share" style="display: none;" id="ref_tw" href="http://twitter.com/home?status=<?php echo $tweet_text; ?>+<?php echo urlencode($show_url);?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=400,width=600');return false;">Tweet Now</a>
											</span>
										</div>
									</div>

									<div class="below_link_set">
										<h2>Copy link below to share this gig anywhere you’d like!</h2>
										<div class="form-group">
											<input type="text" class="form-control" id="sub" placeholder="sharable link..." value="<?php echo $show_url; ?>">
										</div>
									</div>
								</div>
								<?php
							}
								*/  ?>
								</div>
							</div>
							<?php
						}
						else
						{
							?>
							<span class="head-market"> <h2>Marketing Tools</h2></span>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding upcmng_gid_mrkt">
								<p style="margin:10%;" class="text-center"><i>-- No shows available --</i></p>
							</div>
							<?php
						}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		</section>

	<!--<a href="https://www.facebook.com/sharer/sharer.php?u=gigdawg.com/market_post_share_with_facebook/20" target="_blank">
Share on Facebook
</a>-->

	<div style="clear:both"></div>
	<div id="image_generate" class="specs_part"></div>

	<script type="text/javascript">

		$('#market_fb_showList').click(function(){
			var check_status = '';
			var check_status1 = '';
			$('.each_action_checkbox:checkbox').each(function() {
				if(this.checked == true){
					check_status1 = 1;
				} else {
					check_status = 0;
				}
			});

			if(check_status1 == 1){
				$(this).hide();
				$('#market_fb_share').show();
				$('.selected_shows_fb_list').show();
			} else {
				notif({
					msg: 'Please select upcoming gigs',
					type: "error",
					position: "center"
				});
				return false;
			}
		});

		function selectedshowgroup(id){
			var desc = $('#selected_headline_details_'+id).val();
			$('.fb_plain_post').text(desc);
			$('#market_fb_description').val(desc);
		};

		$(document).ready(function()
						  {

			$("#market_fb_share").on("click", function(event) {
				event.preventDefault();

				lock_scroll();

				var selectItems = [];
				var Items = [];
				$('.selected_shows_fb_list .ckb_fb_selected').each(function(){
					Items.push($(this).val());
				});

				console.log(Items);
				$('.selected_shows_fb_list .ckb_fb_selected:checked').each(function(){
					selectItems.push($(this).val());
				});

				if(selectItems == ''){
					notif({
						msg: 'Please Choose a Headline',
						type: "error",
						position: "center"
					});
					return false;
				}
				$('.overlay_div').removeClass('hide');
				$.ajax({
					url: app_url + 'share_image_generate',
					data:{Items: Items, selectItems: selectItems},
					type: "post",
					success:function(response){
						$('#image_generate').html(response);
						$('.canvas_blk').show();
						$('#image_generate').show();

						setTimeout(function(){ ajax_image_precess(Items,selectItems); }, 1000);
					}
				});


				setTimeout(function(){
					$('.overlay_div').addClass('hide');
					unlock_scroll();
				}, 3000);

			});

			/* Raseek Code Start */
			var checkBox = '';
			$('.each_action_checkbox').click(function(){
				selected_show();
			});

			$('#selectAllCheckbox').click(function(){
				if(this.checked) {
					$('.each_action_checkbox:checkbox').each(function() {
						this.checked = true;
					});
					selected_show();
				}else {
					$('.each_action_checkbox:checkbox').each(function() {
						this.checked = false;
					});
					selected_show();
				}
			});

			//                Facebook Button


			$('#marketing_fb_edit_btn').click(function(){
				$(this).hide();
				$('.fb_plain_post').hide();
				$('#fb_edit_post').show();
			});

			$('#fb_edit_btn').click(function(){
				/*var selected_show_grp_id = $('input[name=selectedShowGroup]:checked').val();
				if(selected_show_grp_id != undefined && selected_show_grp_id != null && selected_show_grp_id != "") {
					$('#selected_headline_details_'+selected_show_grp_id).val($('#fb_edit_post textarea').val());
				}*/
				$('#fb_edit_post').hide();
				$('.fb_plain_post').show();
				$('#marketing_fb_edit_btn').show();
				$('.fb_plain_post').html($('#fb_edit_post textarea').val());
			});

			//                Twitter Button
			$('.market_tw_showList').click(function(){
				$(this).hide();
				$('.market_tw_share').show();
				$('.selected_shows_tw_list').show();
			});

			$('#marketing_tw_edit_btn').click(function(){
				$(this).hide();
				$('.tw_plain_post').hide();
				$('#tw_edit_post').show();
			});

			$('#tw_edit_btn').click(function(){
				$('#tw_edit_post').hide();
				$('.tw_plain_post').show();
				$('#marketing_tw_edit_btn').show();
				$('.tw_plain_post').html($('#tw_edit_post textarea').val());
			});


			/* Raseek Code End */

			$("#market_select_sort").unbind("change");
			$("#market_select_sort").on('change', function (e){
				list_market_shows($(e.target).val());
			});
		});

		function lock_scroll(){
			var scrollPosition = [
				self.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft,
				self.pageYOffset || document.documentElement.scrollTop  || document.body.scrollTop
			];
			var html = jQuery('html'); // it would make more sense to apply this to body, but IE7 won't have that
			html.data('scroll-position', scrollPosition);
			html.data('previous-overflow', html.css('overflow'));
			html.css('overflow', 'hidden');
			window.scrollTo(scrollPosition[0], scrollPosition[1]);
		}

		function unlock_scroll(){
			var html = jQuery('html');
			var scrollPosition = html.data('scroll-position');
			html.css('overflow', html.data('previous-overflow'));
			window.scrollTo(scrollPosition[0], scrollPosition[1])
		}

		function ajax_image_precess(Items,selectItems){
			$('#image_generate .specs-blk .left-img img').imgCentering({'forceSmart': true});
			$('#image_generate .specs-blk .right-img img').imgCentering({'forceSmart': true});

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
					$("#canvas").remove();
					$.ajax({
						url: app_url + 'canvas_images_save',
						data:{
							base64: images,
							file_name: file_name,
							Items: Items,
							selectItems: selectItems,
							description: $('#market_fb_description').val(),
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
		}
		function urldecode(str) {
			return decodeURIComponent((str+'').replace(/\+/g, '%20'));
		}
		function selected_show(){
			var selectItems = [];
			$('.each_action_checkbox:checked').each(function(){
				selectItems.push($(this).val());
			});

			var ajaxUrl = app_url+'get_selected_shows';

			$.ajax({
				url:ajaxUrl,
				type: 'POST',
				data: {selectItems: selectItems},
				success: function(response){
					$('.selected_shows_list').html(response);
				}
			});
		}

		function list_market_shows(sort_by)
		{
			$.ajax({
				type  : 'POST',
				async : false,
				dataType : 'JSON',
				url : app_url + 'shows/upcoming/market/ajax/' + sort_by,
				success: function(retJson)
				{
					var html = '';
					for (var i = 0; i < retJson.length; i++)
					{
						var time_str = moment(retJson[i]['start_time']).format("MM/DD/YY @ hh:mm a");

						// M d, Y @ h:i a
						var ven_nm = retJson[i]['venue_fname'] + ' ' + retJson[i]['venue_lname'];
						var image_url = app_url + 'public/uploads/shows_images/show_' + retJson[i]['show_id'] + '.jpg';

						var actv_str = i == 0 ? 'active ' : '';

						html += '<li class="' + actv_str + 'col-sm-4"><a data-toggle="tab" class="tab-menu" href="#tab'+parseInt(i+1)+'">' + ven_nm + '<br>'+ time_str;
						html += '<span class="arrow_set"><img src="'+ app_url +'public/images/arrow-1.png" alt=""></span></a></li>';
					}
					$("#mrkt_left_list").html(html);

					// RIGHT PANE
					var html = '';
					for (var i = 0; i < retJson.length; i++)
					{
						var show_url = app_url + "show/detail/" + retJson[i]['show_id'];
						var ven_nm = retJson[i]['venue_fname'] + ' ' + retJson[i]['venue_lname'];
						var image_url = app_url + 'public/uploads/shows_images/show_' + retJson[i]['show_id'] + '.jpg';

						var show_time = moment(retJson[i]['start_time']).format("MM/DD/YY @ hh:mm a");

						// twitter
						var text_len_left = 140 - show_url.length;
						var tweet_detail_text = "GigDawg: New show at " + retJson[i]['venue_fname'] + " " + retJson[i]['venue_lname'] + " on " + show_time;

						if (tweet_detail_text.length >= text_len_left)
						{
							tweet_detail_text = tweet_detail_text;
							// tweet_detail_text = substr($tweet_detail_text, 0, $text_len_left-5);
						}
						var tweet_text = tweet_detail_text + "...";

						// fb
						var fb_text = "GigDawg: New show at " + retJson[i]['venue_fname'] + " " + retJson[i]['venue_lname'] + ' on ' + show_time;

						var actv_str = i == 0 ? 'active ' : '';
						html += '<div id="tab'+parseInt(i+1)+'" class="tab-pane fade in ' + actv_str + '">';
						html += '<div class="venue-post-inner">';
						html += '<span class="venue-inner-head"><h2>Marketing Opportunities</h2></span>';
						html += '<div class="col-xs-3 text-center">';
						html += '<span class="social-post-ic"><img src="' + app_url + 'public//images/facebook-icon.png" alt=""></span>';
						html += '</div>';
						html += '<div class="col-xs-9 post_right_text">';
						html += '<h2>Post Gig to Facebook!</h2>';
						html += '<p>' + fb_text + '</p>';
						html += '<span class="post_now-button">';

						var href_str_fb = 'https://www.facebook.com/sharer/sharer.php?title=' + fb_text + ' ' + show_url + '&description=' + fb_text + '&picture=' + image_url + '&u='+show_url;
						// href_str_fb = 'https://www.facebook.com/sharer/sharer.php?title=' + fb_text + ' ' + show_url + '&description=' + fb_text + '&picture=' + image_url + '&u='+show_url;
						html += '<a class="btn btn-grey" href="' + href_str_fb + '" target="_blank">Post Now</a>';
						html += '</span>';
						html += '</div>';
						html += '</div>';

						html += '<div class="venue-post-inner">';
						html += '<div class="col-xs-3 text-center">';
						html += '<span class="social-post-ic"><img src="'+app_url+'public//images/twit.jpg" alt=""></span>';
						html += '</div>';
						html += '<div class="col-xs-9 post_right_text">';
						html += '<h2>Post Gig to Twitter!</h2>';
						html += '<p>' + tweet_text + '</p>';
						html += '<span class="post_now-button">';

						var href_str_tw = 'http://twitter.com/home?status='+ tweet_text + '+' + encodeURI(show_url);

						// var onclick_str ="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=400,width=600');return false;";

						html += '<a class="btn btn-grey" href="'+href_str_tw+'" target="_blank">Tweet Now</a>';
						html += '</span>';
						html += '</div>';
						html += '</div>';

						html += '<div class="below_link_set">';
						html += '<h2>Copy link below to share this gig anywhere you’d like!</h2>';
						html += '<div class="form-group">';
						html += '<input type="text" class="form-control" id="sub" placeholder="sharable link..." value="'+show_url+'">';
						html += '</div>';
						html += '</div>';
						html += '</div>';
					}
					$(".mrkt_right_list").html(html);
				}
			});
		}
	</script>
	@stop
