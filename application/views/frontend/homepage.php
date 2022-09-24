<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<script type="text/javascript" src="<?php echo base_url('assets/js/popper.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.5.1.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/font-awsome/css/fontawesome.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/hover-min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/hover-min.css') ?>">
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/images/fav.png') ?>"/>
	<title>TechSpot Educa</title>
</head>
<body>
<div class="main-navbar">
	<nav class="navbar navbar-expand-md navbar-light p-0">
		<div class="col-2">
			<?php if(!empty($liveStatus['live'])){ ?>
			<a onclick="openStream()" class="navbar-brand live stream">
				<button type="button" class="btn btn-danger">Live</button>
			</a>
			<?php } ?>
		</div>
		<div class="col-8">
			<div class="header text-center">
				<div class="navbar-nav text-center m-auto">
					<a href="#" class="nav-item nav-link active" id="headerTxt">TechSpot Educa</a>
				</div>
			</div>
		</div>
		<div class="col-2">
			<a data-toggle="modal" data-target="#remoteButton" class="navbar-brand float-right">
				<img src="<?php echo base_url('assets/images/remote.png') ?>" height="28">
			</a>
		</div>
	</nav>
</div>
<div class="wrapper">
	<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContentHome">
		<div class="tab-pane fade show active" id="navHome" role="tabpanel">
			<div class="container-fluid p-0">
				<div class="banner-image" style="background-image: url('<?php echo base_url('assets/images/new_banner.JPEG') ?>')"></div>
			</div>
			<div class="container-fluid">
				<section id="tabs">
					<div class="row">
						<div class="col-xs-12 col-md-12 col-lg-12 col-sm-12 p-0">
							<nav>
								<div class="nav nav-tabs nav-fill mt-2" id="nav-tab" role="tablist">
									<!-- <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">VIDEO RECIENTES</a> -->
									<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Video</a>
									<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Herramientas</a>
								</div>
							</nav>
							<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
								<div class="tab-pane fade show active mb-5" id="nav-home" role="tabpanel">
									<div class="row videosContent">
										<?php if(isset($videos)){ foreach ($videos as $video){ ?>
										<div class="col-md-3 col-lg-3 col-xl-3 col-sm-6 col-xs-6">
											<img class="responsive video-btn" data-src="https://www.youtube.com/embed/<?php if(isset($video['link'])){echo $video['link'];}  ?>"  data-toggle="modal" data-target="#myModal" src="<?php if(isset($video['img'])){echo $video['img'];} ?>">
										</div>
										<div class="col-md-3 col-lg-3 col-xl-3 col-sm-6 col-xs-6">
											<label><?php if(isset($video['title'])){echo $video['title'];} ?></label>
											<p>
												<?php if(isset($video['desc'])){echo $video['desc'];}  ?>
											</p>
										</div>
										<?php  } }else{ ?>  <?php } ?>
									</div>
								</div>
								<div class="tab-pane fade" id="nav-profile" role="tabpanel">
										<div class="row videosContent heramieantes">
											<?php if(isset($heramieantes['videos'])){ foreach ($heramieantes['videos'] as $heram){ ?>
											<div class="col-md-6 col-sm-12 col-xs-12 col-lg-4 col-xl-4 text-center">
												<img class="responsive w-100" onclick="getProductDetail(this)" alt="<?php if(isset($heram['handle'])){echo $heram['handle'];} ?>" src="<?php if(isset($heram['images'][0]['src'])){echo $heram['images'][0]['src'];} ?>">
												<label><?php if(isset($heram['title'])){echo $heram['title'];} ?></label>
												<p><?php if(isset($heram['variants'][0]['price'])){echo  '$'.$heram['variants'][0]['price'];}  ?></p>
												<input type="hidden" id="title" value="<?php if(isset($heram['variants'][0]['title'])){echo $heram['variants'][0]['title'];} ?>">
												<input type="hidden" id="desc" value="<?php if(isset($heram['body_html'])){echo htmlspecialchars($heram['body_html']);}  ?>">
												<input type="hidden" id="price" value="<?php if(isset($heram['variants'][0]['price'])){echo  '$'.$heram['variants'][0]['price'];}  ?>">
												<input type="hidden" id="slug" value="https://shop.repairspots.com/products/<?php if(isset($heram['handle'])){echo $heram['handle'];} ?>?pr_prod_strat=collection_fallback&pr_rec_pid=<?php if(isset($heram['id'])){echo $heram['id'];}  ?>">
											</div>
											<?php  } } ?>
										</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
		<div class="tab-pane fade" id="navVideo" role="tabpanel">
			<div class="tab-pane fade show active mb-5" id="nav-home" role="tabpanel">
					<div class="row videosContent">
						<?php if(isset($videos)){ foreach ($videos as $video){ ?>
						<div class="col-md-3 col-lg-3 col-xl-3 col-sm-6 col-xs-6">
							<img class="responsive video-btn" data-toggle="modal" data-src="https://www.youtube.com/embed/<?php if(isset($video['link'])){echo $video['link'];}  ?>" data-target="#myModal" src="<?php if(isset($video['img'])){echo $video['img'];} ?>">
						</div>
						<div class="col-md-3 col-lg-3 col-xl-3 col-sm-6 col-xs-6">
							<label><?php if(isset($video['title'])){echo $video['title'];} ?></label>
							<p>
								<?php if(isset($video['desc'])){echo $video['desc'];}  ?>
							</p>
						</div>
						<?php  } } ?>
					</div>
			</div>
		</div>
		<div class="tab-pane fade" id="navSetting" role="tabpanel">

				<div class="row videosContent ToolsSetting text-center">
					<?php if(isset($heramieantes['Tools'])){ foreach ($heramieantes['Tools'] as $video){ ?>
					<div class="col-md-6 ToolsContent col-lg-4 col-xl-4 col-sm-12 col-xs-12 text-center toolsPage">
						<img class="responsive tellersImage" onclick="getProductDetail(this)" alt="<?php if(isset($video['handle'])){echo $video['handle'];} ?>"  src="<?php if(isset($video['images'][0]['src'])){echo $video['images'][0]['src'];} ?>">
						<label><?php if(isset($video['title'])){echo $video['title'];} ?></label>
						<p>
							<?php if(isset($video['variants'][0]['price'])){echo  '$'.$video['variants'][0]['price'];}  ?>
						</p>
						<input type="hidden" id="title" value="<?php if(isset($video['title'])){echo $video['title'];} ?>">
						<input type="hidden" id="desc" value="<?php if(isset($video['body_html'])){echo htmlspecialchars($video['body_html']);}  ?>">
						<input type="hidden" id="price" value="<?php if(isset($video['variants'][0]['price'])){echo  '$'.$video['variants'][0]['price'];}  ?>">
						<input type="hidden" id="slug" value="https://shop.repairspots.com/products/<?php if(isset($video['handle'])){echo $video['handle'];} ?>?pr_prod_strat=collection_fallback&pr_rec_pid=<?php if(isset($video['id'])){echo $video['id'];}  ?>">

					</div>
					<?php  } } ?>
				</div>

		</div>
		<div class="tab-pane fade" id="navBusiness" role="tabpanel">
			<section id="tabs">
				<div class="row">
					<div class="col-xs-12 col-md-12 col-lg-12 col-sm-12 p-0">
						<nav>
							<div class="nav nav-tabs nav-fill mt-2" id="nav-tab" role="tablist">
								<a class="nav-item nav-link active" id="nav-login-tab" data-toggle="tab" href="#nav-login" role="tab" aria-controls="nav-home" aria-selected="true">LOGIN</a>
								<a class="nav-item nav-link" id="nav-info-tab" data-toggle="tab" href="#nav-info" role="tab" aria-controls="nav-profile" aria-selected="false">INFORMATION</a>
							</div>
						</nav>
						<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
							<div class="tab-pane fade show active mb-5" id="nav-login" role="tabpanel">
								<object type="text/html" data="https://repairspots.org/login/" width="100%" height="100%" style="overflow:auto; height: -webkit-fill-available;"></object>
							</div>
							<div class="tab-pane fade" id="nav-info" role="tabpanel">
								<object type="text/html" data="https://repairspots.com/" width="100%" height="100%" style="overflow:auto; height: -webkit-fill-available;"></object>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<div class="tab-pane fade" id="navShipping" role="tabpanel">
			<section id="tabs">
				<div class="row">
					<div class="col-xs-12 col-md-12 col-lg-12 col-sm-12 p-0">
						<nav>
							<div class="nav nav-tabs nav-fill mt-2" id="nav-tab" role="tablist">
								<a class="nav-item nav-link active" id="nav-service-tab" data-toggle="tab" href="#nav-service" role="tab" aria-controls="nav-home" aria-selected="true">Talleres</a>
								<a class="nav-item nav-link" id="nav-nego-tab" data-toggle="tab" href="#nav-nego" role="tab" aria-controls="nav-profile" aria-selected="false">Servicios Negocios</a>
							</div>
						</nav>
						<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
							<div class="tab-pane fade show active mb-5" id="nav-service" role="tabpanel">
									<div class="row videosContent">
										<?php if(isset($heramieantes['Taller'])){ foreach ($heramieantes['Taller'] as $video){ ?>
										<div class="col-md-3 col-lg-3 col-xl-3 col-sm-6 col-xs-6 shipping-images">
											<img class="responsive tellersImage" onclick="getShippingDetail(this)" alt="<?php if(isset($video['handle'])){echo $video['handle'];} ?>"  src="<?php if(isset($video['images'][0]['src'])){echo $video['images'][0]['src'];} ?>">
											<input type="hidden" id="title" value="<?php if(isset($video['title'])){echo $video['title'];} ?>">
											<input type="hidden" id="desc" value="<?php if(isset($video['body_html'])){echo htmlspecialchars($video['body_html']);}  ?>">
											<input type="hidden" id="price" value="<?php if(isset($video['variants'][0]['price'])){echo  '$'.$video['variants'][0]['price'];}  ?>">
											<input type="hidden" id="slug" value="https://shop.repairspots.com/products/<?php if(isset($video['handle'])){echo $video['handle'];} ?>?pr_prod_strat=collection_fallback&pr_rec_pid=<?php if(isset($video['id'])){echo $video['id'];}  ?>">
										</div>
										<div class="col-md-3 col-lg-3 col-xl-3 col-sm-6 col-xs-6 html-content">
											<label><?php if(isset($video['title'])){echo $video['title'];} ?></label>
											<p>
												<?php if(isset($video['body_html'])){echo $video['body_html'];}  ?>
											</p>
										</div>
										<?php  } } ?>
									</div>
							</div>
							<div class="tab-pane fade" id="nav-nego" role="tabpanel">
								<div class="row videosContent">
									<?php if(isset($heramieantes['Negocios'])){ foreach ($heramieantes['Negocios'] as $video){ ?>
									<div class="col-md-3 col-lg-3 col-xl-3 col-sm-6 col-xs-6 shipping-images">
										<img class="responsive tellersImage" onclick="getShippingDetail(this)" alt="<?php if(isset($video['handle'])){echo $video['handle'];} ?>"  src="<?php if(isset($video['images'][0]['src'])){echo $video['images'][0]['src'];} ?>">
										<input type="hidden" id="title" value="<?php if(isset($video['title'])){echo $video['title'];} ?>">
										<input type="hidden" id="desc" value="<?php if(isset($video['body_html'])){echo htmlspecialchars($video['body_html']);}  ?>">
										<input type="hidden" id="price" value="<?php if(isset($video['variants'][0]['price'])){echo  '$'.$video['variants'][0]['price'];}  ?>">
										<input type="hidden" id="slug" value="https://shop.repairspots.com/products/<?php if(isset($video['handle'])){echo $video['handle'];} ?>?pr_prod_strat=collection_fallback&pr_rec_pid=<?php if(isset($video['id'])){echo $video['id'];}  ?>">
									</div>
									<div class="col-md-3 col-lg-3 col-xl-3 col-sm-6 col-xs-6 html-content">
										<label><?php if(isset($video['title'])){echo $video['title'];} ?></label>
										<p>
											<?php if(isset($video['body_html'])){echo $video['body_html'];}  ?>
										</p>
									</div>
									<?php  } } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="footer">
		<nav>
			<div class="nav nav-tabs nav-fill mt-2" id="nav-tabHome" role="tablist">
				<a class="navbar-brand nav-item nav-link active" data-toggle="tab" onclick="getAlt(this)" alt="TechSpot Educa" id="navHome-tab" href="#navHome" role="tab" aria-controls="navHome" aria-selected="true">
					<img src="<?php echo base_url('assets/images/home_icon.png') ?>" height="28">
				</a>
				<a class="navbar-brand nav-item nav-link" data-toggle="tab" onclick="getAlt(this)" id="navVideo-tab" alt="Videos Recientes" href="#navVideo" role="tab" aria-controls="navVideo" aria-selected="false">
					<img src="<?php echo base_url('assets/images/videos_icon.png') ?>" height="28">
				</a>
				<a class="navbar-brand nav-item nav-link" data-toggle="tab" onclick="getAlt(this)" id="navSetting-tab" alt="Tools" href="#navSetting" role="tab" aria-controls="Setting" aria-selected="false">
					<img src="<?php echo base_url('assets/images/tools_icon.png') ?>" height="28">
				</a>
				<a class="navbar-brand nav-item nav-link" data-toggle="tab" onclick="getAlt(this)" id="navBusiness-tab" alt="POS" href="#navBusiness" role="tab" aria-controls="Business" aria-selected="false">
					<img src="<?php echo base_url('assets/images/buisness_icon.png') ?>" height="28">
				</a>
				<a class="navbar-brand nav-item nav-link" data-toggle="tab" onclick="getAlt(this)" id="navShipping-tab" alt="Talleras Activos" href="#navShipping" role="tab" aria-controls="Shipping" aria-selected="false">
					<img src="<?php echo base_url('assets/images/shipping_icon.png') ?>" height="28">
				</a>
			</div>
		</nav>
	</div>
</div>
<div class="modal fade" id="remoteButton" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Podcasts</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-sm-12 detail text-center">
							<img class="splash2" src="<?php echo base_url('assets/images/splash2.png') ?>" id="splash2">
							<span class="mb-10 mt-10">@techspoteduca</span>
							<ul class="techspoteducaCustom ul li">
								<a target="_blank" href="https://podcasts.apple.com/us/podcast/techspot-educa/id1541063457?at=11lo6V&ct=podnews_podcast">
								<li>Apple Podcasts</li>
								</a>
								<a target="_blank" href="https://podcasts.google.com/feed/aHR0cHM6Ly90ZWNoc3BvdHByLmxpYnN5bi5jb20vcnNz">
								<li>Google Podcasts</li>
								</a>
								<a target="_blank" href="https://open.spotify.com/show/1svkR7JixyRm6amHq6FsvR">
								<li>Spotify Podcasts</li>
								</a>
								<a href="https://techspoteduca.com">
								<li>TechSpot Educa</li>
								</a>
								<li><a onclick="activaTab()">Point of Sale</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="getProductDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Product Detail</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="col-md-12 col-sm-12 detail text-center">
					<img src="" id="filldetailImage">
					<label  id="titleFill"></label>
					<div id="descFill"></div>
					<label  id="priceFill"></label>
					<a id="priceFillbuyNow" href="">
						<button  id="priceFillbuyNow">buy Now</button>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="getShippingDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Product Detail</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-content">
			<div class="modal-body">
				<div class="col-md-12 col-sm-12 detail text-center">
					<img src="" id="fillShippingdetailImage">
					<label id="ShippingtitleFill"></label>
					<div id="ShippingdescFill"></div>
					<div  id="ShippingpriceFill"></div>
					<a id="ShippingpriceFillbuyNow" href="">
						<button class="btn btn-warning"  id="ShippingpriceFillbuyNow">Buy Now</button>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- 16:9 aspect ratio -->
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="tellersModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- 16:9 aspect ratio -->
				<div class="embed-responsive embed-responsive-16by9">
					<object type="text/html" data="https://shop.repairspots.com/collections/talleres/products/taller-seguimiento" width="100%" height="100%" style="overflow:auto; height: -webkit-fill-available;"></object>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="liveButton" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" id="liveStreamModal" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Accesso Limitado</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body live stream text-center" id="clearBody">
				<div class="InnerBody" id="InnerBody">
				<?php if(!empty($liveStatus['message'])){ ?>				
				    <div class="col-md-12 col-lg-12 col-sm-12">
					<p id="codeMessage"><?php echo $liveStatus['message']; ?></p>
					</div>
				<?php } ?>	
					<div class="col-md-12 col-lg-12 col-sm-12">
						<div class="alert alert-danger" id="alertError" style="display: none">
							<strong>Revise que el codigo este bien escrito y intenta nuevamente.</strong>
						</div>
						<input type="text" id="CodeStream" class="form-control" name="code" placeholder="código de acceso">
					</div>
					<button type="button" onclick="submitCode()" class="btn btn-info btn-lg">Ingresar</button>
					<div class="spinner-border text-center" id="loader" role="status" style="display: none">
						<span class="sr-only">Loading...</span>
					</div>
				</div>
				<div id="IframeYoutube" style="display: none">
					<iframe class="embed-responsive-item" src="" id="IframeYoutubeVideo" style=" width: 100%;height:400px;"  allowscriptaccess="always" frameborder="0" allowfullscreen allow="autoplay"></iframe>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal" onclick="closeStream()">Cancelar</button>
			</div>
		</div>
	</div>
</div>
<script type="application/javascript">

	function activaTab(){
		$('.nav-tabs a[href="#navBusiness"]').tab('show');
		$('.nav-tabs a[href="#nav-info"]').tab('show');
		$('#remoteButton').modal('hide')
	};

	function getShippingDetail(element) {
		console.log(element);
		$('#fillShippingdetailImage').attr('src',$(element).attr('src'))
		$('#ShippingtitleFill').html($(element).next().val())
		$('#ShippingdescFill').html($(element).next().next().val())
		$('#ShippingpriceFill').html($(element).next().next().next().val())
		$('#ShippingpriceFillbuyNow').attr('href',$(element).next().next().next().next().val())
		$('#getShippingDetail').modal('show')
	}

	function getProductDetail(element) {
		$('#filldetailImage').attr('src',$(element).attr('src'))
		$('#titleFill').html($(element).next().next().next().val())
		$('#descFill').html($(element).next().next().next().next().val())
		$('#priceFill').html($(element).next().next().next().next().next().val())
		$('#priceFillbuyNow').attr('href',$(element).next().next().next().next().next().next().val())
		$('#getProductDetail').modal('show')
	}

	function getAlt(element){
		$('#headerTxt').text($(element).attr('alt'))
	}
	function openStream(){
		$('#CodeStream').val('')
		$('#IframeYoutube').css('display','none')
		$('#InnerBody').css('display','block')
		$('#liveButton').modal('show')
	}
	function closeStream() {
		$('#CodeStream').val('')
		setTimeout(function () {
			$('#CodeStream').val('')
			$('#IframeYoutube iframe').attr('src','');
			$('#liveStreamModal').removeClass('modal-lg').addClass('modal-md')
		},700)
	}
	function submitCode() {
		var CodeStream = $('#CodeStream').val();
		$('#loader').css('display','block')
		var url = '<?php echo base_url("index.php/Welcome/liveStream"); ?>';
		$.ajax({
			type    : 'post',
			url     : url,
			dataType: 'json',
			data: {CodeStream:CodeStream},
			success : function(data){
				if(data['responce']=='success'){
					setTimeout(function () {
						$('#InnerBody').css('display','none')
						$('#IframeYoutube').css('display','block')
						$('#liveStreamModal').removeClass('modal-md').addClass('modal-lg')
						$("#IframeYoutubeVideo").attr('src',"https://www.youtube.com/embed/"+data['url']+""+"?autoplay=1&amp;modestbranding=1&amp;showinfo=0" );
						$('#loader').css('display','none')
					},3000)
				}else{
					$('#loader').css('display','none')
					$('#alertError').css('display','block')
					setTimeout(function () {
						$('#alertError').css('display','none')
					},4000)
				}
			}
		});
	}

	function clickImage(){
		$('#tellersModal').modal('show')
	}
	function hideModal(){
		$('#tellersModal').modal('hide')
	}

	$(document).ready(function() {
		var $videoSrc2;
		$('.tellers').click(function() {
			$videoSrc2 = $(this).attr( "alt" );
		});
		$('#tellersModal').on('shown.bs.modal', function (e) {
			$("#videotellers").attr('src',$videoSrc2 + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0" );
		})
		$('#tellersModal').on('hide.bs.modal', function (e) {
			// a poor man's stop video
			$("#videotellers").attr('src',$videoSrc2);
		})
	});
	$(document).ready(function() {
		var $videoSrc;
		$('.video-btn').click(function() {
			$videoSrc = $(this).data( "src" );
		});
		$('#myModal').on('shown.bs.modal', function (e) {
			$("#video").attr('src',$videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0" );
		})
		$('#myModal').on('hide.bs.modal', function (e) {
			// a poor man's stop video
			$("#video").attr('src',$videoSrc);
		})
	});

</script>
</body>
</html>
