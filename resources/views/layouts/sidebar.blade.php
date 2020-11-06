

					<!-- ด้านขวา -->
					<div class="col-lg-4 sidebar-widgets">
						<div class="widget-wrap">
							<div class="single-sidebar-widget search-widget">
								<form class="search-form" action="{{route('blog.search')}}" method="GET">
									<input placeholder="Search" name="search" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'">
									<button type="submit"><i class="fa fa-search"></i></button>
							</form>
							</div>
							<div class="single-sidebar-widget user-info-widget ">
								<div class="post-category-widget">
									<h4 class="category-title">ผู้อำนวยการโรงเรียนบ้านทุ่งกระเชาะ</h4><br><br>
								</div>
								<img src="{{asset('img/blog/user-info.jpg')}}" alt="">
								<a>
									<h4>นายมานพ ธาราดรุณีกุล</h4>
								</a>


							</div>

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
		<!-- End post-content Area ข่าวสาร กิจกรรม-->
