
<section class="events-list-area section-gap event-page-lists">
	<div class="widget-wrap">
	<div class="container">
		<div class="single-sidebar-widget search-widget">
			<form class="search-form" action="{{route('blog.search')}}" method="GET">
				<input placeholder="Search" name="search" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'">
				<button type="submit"><i class="fa fa-search"></i></button>
			</form>
		</div>
		<div class="row ">
    <div class="col-md-6">
			<div class="single-sidebar-widget post-category-widget">
				<h4 class="category-title">หัวข้อบทความ</h4>
				<ul class="cat-list">
					@if($category->count()>0)
							@foreach($category as $category)
							<li>
								<a href="{{route('blog.category',$category->id)}}" class="d-flex justify-content-between">
									<p>{{$category->name}}</p>
									<p>{{$category->posts->count()}}</p>
								</a>
							</li>
							@endforeach
					@else
						<li>
							<a class="d-flex justify-content-between">
								<p>ยังไม่มีหัวข้อบทความ</p>
							</a>
						</li>
					@endif
				</ul>
			</div>
    </div>
    <div class="col-md-6">
			<div class="single-sidebar-widget tag-cloud-widget">
				<h4 class="tagcloud-title">แท็ก</h4>
				<ul>
					@foreach($tags as $tag)
						<li><a href="{{route('blog.tag',$tag->id)}}">{{$tag->name}}</a></li>
					@endforeach
				</ul>
			</div>
    </div>
  </div>
	  </div>
		 </div>
</section>
