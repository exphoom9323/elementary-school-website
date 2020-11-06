@extends('layouts.welcomeindex')
@section('content')

<section class="popular-courses-area section-gap courses-page">
		<div class="container">
			<!-- <div class="row d-flex justify-content-center">
				<div class="menu-content pb-70 col-lg-8">
					<div class="title text-center">
						<h1 class="mb-10">Popular Courses we offer</h1>
						<p>There is a moment in the life of any aspiring.</p>
					</div>
				</div>
			</div> -->

			<div class="row">
				@if($albums->count()>0)
				@foreach($albums as $album)
				@if(isset($album->albumimages[0]->image))
				<div class="single-popular-carusel col-lg-3 col-md-6">
					<div class="thumb-wrap relative">
						<div class="thumb relative">
							<div class="overlay overlay-bg"></div>
							<img  src="storage/{{$album->albumimages[0]->image}}" width="225px" height="186px" alt="">
						</div>
					</div>
					<div class="details">
						<a href="{{route('showalbum',$album->id)}}">
							<h4>
								{{$album->name}}
							</h4>
						</a>
					</div>
				</div>
				@endif
				@endforeach
				@else
						<h3 class="title text-content">ยังไม่มีอัลบั้ม</h3>
				@endif


			</div>

		</div>
	</section>


@endsection

@section('js')

@endsection

@section('css')


@endsection
