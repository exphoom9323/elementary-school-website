@extends('layouts.welcomeindex')
@section('content')

<section class="gallery-area section-gap">
			<div class="container">
				<div class="row">
					@foreach($albumimages as $albumimage)
					<div class="col-lg-4">
						<a href="../storage/{{$albumimage->image}}"  class="img-gal">
							<div class="single-imgs relative">
								<div class="overlay overlay-bg"></div>
								<div class="relative">
									<img width="225px" height="186px" src="../storage/{{$albumimage->image}}" alt="">
								</div>
							</div>
						</a>
					</div>
					@endforeach

				</div>
			</div>
		</section>


@endsection

@section('js')

@endsection

@section('css')


@endsection
