@extends('frontend.master')

@section('title','Home page')

@section('content')
<!-- Post -->
<article class="post">
	<header>
		<div class="title">
			<h2>{{$item->post_name}}</h2>
		</div>
		<div class="meta">
			<time class="published" datetime="2015-11-01">{{date('d-m-Y H:i',strtotime($item->post_created))}}</time>
			<span class="author"><span class="name">Vietpro</span><img src="images/logo.jpg" alt="" /></span>
		</div>
	</header>
	<img class="image featured" src="{{asset('public/upload/featured/'.$item->post_img)}}" alt="" />
	<p>
		{!!$item->post_content!!}
	</p>
	<h3>Bình luận</h3>
	<footer>
		<form method="post">
			<div class="row uniform">
				<div class="6u 12u$(xsmall)">
					<input required type="text" name="name" id="demo-name" value="" placeholder="Tên" />
				</div>
				<div class="6u$ 12u$(xsmall)">
					<input required type="email" name="email" id="demo-email" value="" placeholder="Email" />
				</div>
				<div class="12u$">
					<textarea required name="message" id="message" placeholder="Bình luận của bạn" rows="6"></textarea>
				</div>
				{{csrf_field()}}
				<div class="12u$">
					<ul class="actions">
						<li><input type="submit" value="Bình luận" /></li>
						<li><input type="reset" value="Làm mới" /></li>
					</ul>
				</div>
			</div>
		</form>
	</footer>
	@foreach($cmt as $val)
		<div class="row uniform">
			<h4>{{$val->comment_name}}</h4>
			<blockquote>
			{{$val->comment_content}}</blockquote>
		</div>
	@endforeach
</article>
@endsection