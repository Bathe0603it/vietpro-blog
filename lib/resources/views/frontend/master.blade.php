<!DOCTYPE HTML>
<html>
	<head>
		<title>@yield('title','Home')</title>
		<base href="{{asset('public/Layout/frontend').'/'}}">
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-alpha.3/dist/css/bootstrap.min.css">
		<!-- Scripts -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="bootstrap-4.0.0-alpha.3/dist/js/bootstrap.min.js"></script>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		<script src="assets/js/main.js"></script>
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>
		<!-- Wrapper -->
			<div id="wrapper">
				<!-- Header -->
				<header id="header">
					<h1><a href="#">Vietpro Blog</a></h1>
					<nav class="links">
						<ul>
							@foreach($cat_list as $value)
								<li><a href="{{asset('danh-muc/'.$value->cat_id.'/'.$value->cat_slug.'.html')}}">{{$value->cat_name}}</a></li>
							@endforeach
						</ul>
					</nav>
					<nav class="main">
						<ul>
							<li class="search">
								<a class="fa-search" href="#search">Search</a>
								<form id="search" method="post">
									<input onblur="reset_html()" type="text" name="query" placeholder="Search" onkeyup="load_ajax(this.value)" />
									{{csrf_field()}}
									<div id="kq">

									</div>
									<script type="text/javascript">
										function load_ajax(x){
				                            var url = "{{asset('search')}}";
											$.get(
                                                url,
                                                {key:x},
                                                function(result){
                                                    $('#kq').html(result);
                                                }
                                            );
										}
                                        function reset_html(){
                                            $('#kq').html('');
                                        }
										/*$(document).ready(function(){
											function load_ajax(){
												alert('hello');
											}
										});*/
									</script>
								</form>
							</li>
						</ul>
					</nav>
				</header>
				<!-- Main -->
				<div id="main">
					@yield('content')
				</div>

				<!-- Sidebar -->
					<section id="sidebar">
						<!-- Intro -->
							<section id="intro">
								<a href="#" class="logo"><img src="images/logo.jpg" alt="" /></a>
								<header>
									<h2>Vietpro Blog</h2>
									<p>Sản phẩm nghiên cứu cho học viên khóa PHP nâng cao</p>
								</header>
							</section>
						<!-- Mini Posts -->
							<section>
								<div class="mini-posts">
								<h2>Bài viết nổi bật</h2>
									<!-- Mini Post -->
									@foreach($post_featured as $val)
										<article class="mini-post">
											<header>
												<h3><a href="{{asset('bai-viet/'.$val->post_slug.'/'.$val->post_id.'.html')}}">{{$val->post_name}}</a></h3>
												<time class="published" datetime="2015-11-01">{{date('d-m-Y H:i',strtotime($val->post_created))}}</time>
												<span class="author"><span class="name"></span><img src="images/logo.jpg" alt="" /></span>
											</header>
											<a href="{{asset('bai-viet/'.$val->post_slug.'/'.$val->post_id.'.html')}}" class="image"><img src="{{asset('public/upload/featured/'.$val->post_img)}}" alt="" /></a>
										</article>
									@endforeach
									
									
								</div>
							</section>
						<!-- About -->
							<section class="blurb">
								<h2>About</h2>
								<p>Chào mừng bạn đến với trang quản trị của Vietpro Blog. Đây là sản phẩm phục vụ mục đích học tập của các học viên khóa học lập trình PHP nâng cao tại Học viện công nghệ Vietpro. Vietpro Blog được viết trên nền framework Laravel 5.3 (mới nhất ở thời điểm hiện tại).</p>
            					<p>Vietpro Blog hiện đang ở phiên bản 1.0 nên còn nhiều hạn chế. Chúng tôi sẽ sớm khắc phục và cập nhật những tính năng mới trong thời gian tới.</p>
								<ul class="actions">
									<li><a href="http://hocthietkeweb.net.vn/" class="button">Learn More</a></li>
								</ul>
							</section>

						<!-- Footer -->
							<section id="footer">
								<ul class="icons">
									<li><a href="#" class="fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="fa-facebook"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href="#" class="fa-rss"><span class="label">RSS</span></a></li>
									<li><a href="#" class="fa-envelope"><span class="label">Email</span></a></li>
								</ul>
								<p class="copyright">&copy; Powered by: <a href="http://hocthietkeweb.net.vn/">Vietpro Education</a>.</p>
							</section>

					</section>

			</div>

		

	</body>
</html>