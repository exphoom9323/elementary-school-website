@extends('layouts.welcomeindex')
@section('content')


		<section class="post-content-area single-post-area">
			<div class="container">
				<div class="row">

					<div class="col-sm-8 posts-list">
						<!-- <div class="row d-flex justify-content-center">
							<div class="menu-content pb-70 col-lg-8">
								<div class="title text-center">

								</div>
							</div>
						</div> -->
					<div class="container pb-70">
						<div class="row d-flex justify-content-center">
							<div class="menu-content pb-70 col-lg-8">
								<div class="title text-center">
									<h2 class="mb-10">บทความ</h2>

								</div>
							</div>
						</div>
						@if($posts->count()>0)
						<div class="row">
							<div class="active-popular-carusel">
								@foreach($posts as $post)
								<div class="single-popular-carusel">
										<div class="text-right">
												<p>{{$post->category->name}}</p>
										</div>
									<div class="thumb-wrap relative">
										<div class="thumb relative ">
											<div class="overlay overlay-bg"></div>
											<img src="storage/{{$post->image}}" alt="" width="100px" height="100px">
										</div>
									</div>
									<div class="details">
										<a href="{{route('blog.show',$post->id)}}">
											<h4>
												{{$post->title}}
											</h4>
										</a>
									</div>
								</div>
								@endforeach
							</div>
						</div>
						@else
						<div >
									<h3 class="title text-content">ยังไม่มีบทความ</h3>
						</div>
					@endif
					</div>


					<div class="container">
						<div class="row d-flex justify-content-center">
							<div class="menu-content pb-70 col-lg-8">
								<div class="title text-center">
									<h2 class="mb-10">อัลบั้มรูปภาพ</h2>

								</div>
							</div>
						</div>
							@if($albums->count()>0)
						<div class="row">
							<div class="active-popular-carusel">
								@foreach($albums as $album)
								@if(isset($album->albumimages[0]->image))
								<div class="single-popular-carusel">
									<div class="thumb-wrap relative">
										<div class="thumb relative ">
											<div class="overlay overlay-bg"></div>
											<img src="storage/{{$album->albumimages[0]->image}}" alt="" width="100px" height="100px">
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

							</div>
						</div>
						@else
						<div>
									<h3 class="title text-content">ยังไม่มีอัลบั้ม</h3>
						</div>
					@endif
					</div>

					<div class="overlay overlay-bg"></div>
					<div class="container">
						<div class="row d-flex justify-content-center">
							<div class="menu-content pb-70 col-lg-8">
								<div class="title text-center">
									<h1 class="mb-10">ไฟล์เอกสาร</h1>
								</div>
							</div>
						</div>
						<div class="row">
							@if($files->count()>0)
							<div class="active-review-carusel">
								@foreach($files as $files)
								<div class="single-review item">
									<div class="title justify-content-start d-flex">
										<a href="{{ route('files.show',$files->id) }}">
											<h3>{{$files->title}}</h3>
										</a>
									</div>
									<div class="meta d-flex justify-content-between">
										<a href="{{ route('files.show',$files->id) }}">
											<h6>{{$files->name}} </h6>
										</a>
										<p>{{$files->created_at}}</p>
									</div>
									<p>
										{{$files->description}}
									</p>
								</div>
								@endforeach
							</div>
							@else
							<div >
										<h3 class="title text-content">ยังไม่มีไฟล์เอกสาร</h3>
							</div>
							@endif
						</div>
					</div>


					</div>

					<!-- ด้านขวา -->

					@include('layouts.sidebar')




			</div>
				</div>
		</section>
		<!-- End post-content Area ข่าวสาร กิจกรรม-->

		<!-- Start cta-one Area -->
		<!-- <section class="cta-one-area relative section-gap">
			<div class="container">
				<div class="overlay overlay-bg"></div>
				<div class="row justify-content-center">
					<div class="wrap">
						<h1 class="text-white">Become an instructor</h1>
						<p>
							There is a moment in the life of any aspiring astronomer that it is time to buy that first telescope. It’s exciting to think about setting up your own viewing station whether that is on the deck.
						</p>
						<a class="primary-btn wh" href="#">Apply for the post</a>
					</div>
				</div>
			</div>
		</section> -->
		<!-- End cta-one Area -->



		<!-- Start review Area -->


@endsection
