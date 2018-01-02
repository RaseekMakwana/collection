<?php
$layout = 'layouts.front_logout';
if (Auth::user())
{
	$layout = 'layouts.artist';
	if(Auth::user()->role == Config::get('constants.roles.FAN') || Auth::user()->role == Config::get('constants.roles.ADMIN'))
	{
		$layout = 'layouts.front_header_footer';
	}
}
?>
@extends($layout, array('meta_shows' => $shows,'data' => ''))
@section('content')



<link media="all" type="text/css" rel="stylesheet" href="http://gigdawg.com/public/css/frontend/style.css">
<section class="tab-section-contant-part new_add_sec fb-show-frame">
	<?php if (!Auth::user()): ?>
	<div class="container container-small">
		<div class="small-logo"><a href="/"><img src="../public/images/small-logo.png" alt="image"></a></div>
	</div>
	<?php endif; ?>
	<div class="container color-bg-white">
		<div class="row">
			<div class="col-lg-8 col-lg-push-2">
				<div class="col-sm-12 header_set">
					<h2>Shows</h2>

				</div>
				<div class="col-sm-12">
					<div class="fb-shows">
						<div class="headline_title"><?php echo date('d/m/Y', strtotime($arrShow['selected']['time'])); ?></span> @ <span class="event-time"><?php echo date('h:i A', strtotime($arrShow['selected']['time'])); ?></div>
						<span id="artist_venue_image" class="dog-show-image facebook_share_detail">
							<img class="inner-image-main" src="http://gigdawg.com/public/images/khope_blue_back.png" alt="image">

							<div class="cover-frame-box">
								<p class="over-image-part detail">
									<img alt="artist image" src="<?php echo SITE_URL.$arrShow['selected']['artist_pics']; ?>">
								</p>
								<p class="over-image-right-side detail">
									<img alt="venue image" src="<?php echo SITE_URL.$arrShow['selected']['vanue_pics']; ?>">
								</p>
							</div>
							<div class="anchor_text_part deatil-2">
								<div class="col-xs-6 text-center">
									{{--  <span class="bottom-kick-text detail-1">  --}}
									<h3 class="h3_artist_name">
										<a target="_blank" href="{{ SITE_URL.'profile/'.$arrShow['selected']['artist_id'] }}">
											<?php echo $arrShow['selected']['artist']; ?>
										</a>
									</h3>
									{{--  </span>  --}}
								</div>
								<div class="col-xs-6 text-center">
									{{--  <span class="bottom-kick-text detail-1">  --}}
									<h3 class="h3_venue_name">
										<a target="_blank" href="{{ SITE_URL.'profile/'.$arrShow['selected']['vanue_id'] }}">
											<?php echo $arrShow['selected']['vanue']; ?>
										</a>
									</h3>
									{{--  </span>  --}}
								</div>
							</div>
						</span>

					</div>
				</div>

				<div class="col-xs-10 col-xs-push-1 col-sm-8 col-sm-push-2 col-md-8 col-md-push-2">
					<h2 style="text-align: center">ALSO APPEARING ON STAGE</h2>
					<ul class="leaders">
						<?php
						if(isset($arrShow['shows'])){
							foreach ($arrShow['shows'] as $key => $val): ?>
						<li>

							<span><a href="{{ SITE_URL.'profile/'.$val['artist_id'] }}" target="_blank"><?php echo $val['artist']; ?></a></span>
							<span class="budget_span"><?php echo date('d/m/Y', strtotime($val['time'])).' @ '.date('h:i A', strtotime($val['time'])); ?></span>
						</li>
						<?php endforeach;
						} ?>

					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<style>
	#artist_venue_image .anchor_text_part{bottom: 20px;}
	.over-image-part.detail{overflow: hidden; height: 150px; bottom: 122px;}
	.tab-section-contant-part h3 a{font-size: 18px; color:#fff; }
	@media(max-width:767px){
		.mobile-logo{ position: absolute; top:130%; }
		.band-page .navbar-toggle .icon-bar,
		.navbar-toggle .icon-bar{ background: #fff; }
		.leaders span{ display: block; }
		ul.leaders span + span{ float: none; }
		ul.leaders span:first-child {
			padding-right: 0.33em;
			background: white;
			display: block;
			width: 100%;
			float: left;
		}
	}
</style>
@stop
