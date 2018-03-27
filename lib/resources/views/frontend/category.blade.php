@extends('frontend.master')

@section('title','Home page')

@section('content')
<h2>Danh mục</h2>
<!-- Post -->
@foreach($list_post as $val)
	<article class="post">
		<header>
			<div class="title">
				<h2><a href="{{asset('bai-viet/'.$val->post_slug.'/'.$val->post_id.'.html')}}">{{$val->post_name}}</a></h2>
			</div>
			<div class="meta">
				<time class="published" datetime="11-01-2015">{{date('d-m-Y H:i',strtotime($val->post_created))}}</time>
				<span class="author"><span class="name">Vietpro</span><img src="images/logo.jpg" alt="" /></span>
			</div>
		</header>
		<a href="#" class="image featured"><img src="{{asset('public/upload/featured/'.$val->post_img)}}" alt="" /></a>
		<p>{{$val->post_sum}}</p>
		<footer>
			<ul class="actions">
				<li><a href="{{asset('bai-viet/'.$val->post_slug.'/'.$val->post_id.'.html')}}" class="button big">Đọc tiếp</a></li>
			</ul>
			<ul class="stats">
				<li><a href="#">{{$val->cat_name}}</a></li>
			</ul>
		</footer>
	</article>
@endforeach


<!-- Pagination -->
<ul class="actions pagination">
	{{$list_post->links()}}
</ul>
@endsection