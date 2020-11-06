@extends('layouts.welcomeindex')
@section('content')


		<section class="post-content-area single-post-area">
			<div class="container">
				<div class="row">



					<div class="col-lg-8 event-details-left">


						<div class="gallery-area">
							<div class="single-imgs relative">


  						@if($postimages->count()>0)



									<div id="carouselExample1" class="carousel slide z-depth-1-half" data-ride="carousel" data-interval="false">
										<div class="carousel-inner">
											<div class="carousel-item active">
												<img class="d-block w-100" src="../../storage/{{$post->image}}" alt="">
											</div>
											@foreach($postimages as $postimage) <!-- $Categort คือ sql จาก web.php  -->
											<div class="carousel-item">
												<img class="d-block w-100" src="../../storage/{{$postimage->image}}" alt="">
											</div>
											@endforeach

										</div>
										<a class="carousel-control-prev" href="#carouselExample1" role="button" data-slide="prev">
											<span class="carousel-control-prev-icon" aria-hidden="true"></span>
											<span class="sr-only">Previous</span>
										</a>
										<a class="carousel-control-next" href="#carouselExample1" role="button" data-slide="next">
											<span class="carousel-control-next-icon" aria-hidden="true"></span>
											<span class="sr-only">Next</span>
										</a>
									</div>

									@else

									<img class="img-fluid" src="../../storage/{{$post->image}}" width="450px" height="250px"  alt="">

									@endif

						</div>
						</div>
						<div class="details-content pb-20">
								<h1>{{$post->title}}</h1>
						</div>
						<div class="details-content pb-40">
							<a href="{{route('blog.category',$post->category->id)}}">
								<h5>{{$post->category->name}}</h5>
							</a>
							<p>{{$post->created_at}}</p>
						</div>
						<div class="gallery-area">
							<div class="single-imgs relative">
									<font size="3"  color="black"> {!!$post->content!!} </font>
										@if($post->tags()->count()>0)
									<div class="widget-wrap">
										<div class=" tag-cloud-widget">
												<ul>
													@foreach($tags as $tag)

														@if($post->hasTag($tag->id))
														<li><a href="{{route('blog.tag',$tag->id)}}">{{$tag->name}}</a></li>
														@endif

													@endforeach
												</ul>
											</div>
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

@endsection



@section('js')



@endsection

@section('css')



@endsection
