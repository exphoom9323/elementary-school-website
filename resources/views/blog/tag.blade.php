@extends('layouts.welcomeindex')
@section('content')

@include('layouts.topsidebar')

<!-- Start events-list Area -->
	<section class="events-list-area section-gap event-page-lists">
		<div class="container">
			<div class="row align-items-center">
				@forelse($posts as $post)
				<div class="col-lg-6 pb-30">
					<div class="single-carusel row align-items-center">
						<div class="col-12 col-md-6 thumb">
							<img src="../../storage/{{$post->image}}" alt="" width="263px" height="220px">
						</div>
						<div class="detials col-12 col-md-6">
							<p>{{$post->created_at}}</p>
							<a href="{{route('blog.show',$post->id)}}"><h4>{{$post->title}}</h4></a>
							<p>
							{{$post->description}}
							</p>
						</div>
					</div>
				</div>
				@empty
			<div class="row d-flex justify-content-center">
						<h3 class="title text-content">ยังไม่มีบทความ</h3>
			</div>
			@endforelse
			</div>
			{{$posts->links()}}
		</div>
	</section>


	<!-- End events-list Area -->

@endsection
