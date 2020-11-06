@extends('layouts.welcomeindex')
@section('content')


<section class="contact-page-area section-gap">
			<div class="row d-flex justify-content-center">
				<div class="menu-content pb-70 col-lg-8">
					<div class="title text-center">
						<h1 class="mb-10">แผนที่</h1>
							<a  target ="_blank" href="https://goo.gl/maps/PMXFKjgjUU9gUySB7" class="genric-btn primary circle arrow " style="font-size: 20px;;">นำทางโดย Google Map<span class="lnr lnr-arrow-right"></span></a>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="container-fluid pb-70">

							<!-- <iframe
								src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7630.156754778282!2d99.00257671910836!3d17.01982517130654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30ddcdf311aed859%3A0x69f114799ce27b41!2z4LmC4Lij4LiH4LmA4Lij4Li14Lii4LiZ4Lia4LmJ4Liy4LiZ4LiX4Li44LmI4LiH4LiB4Lij4Liw4LmA4LiK4Liy4Liw!5e0!3m2!1sth!2sth!4v1584889610487!5m2!1sth!2sth"
								width="100%" height="450" allowfullscreen>
							</iframe> -->
							<div  id="map"></div>
							<!-- <div id="result"></div> -->

					</div>

					<div class="col d-flex flex-column address-wrap">
						<div class="single-contact-address d-flex flex-row">
							<div class="icon">
								<span class="lnr lnr-home"></span>
							</div>
							<div class="contact-details">
								<h5>อำเภอ:บ้านตาก จังหวัด:ตาก 63120</h5>
								<p>
									หมู่ที่ 3 ตำบล:บ้านบ้านล้อง
								</p>
							</div>
						</div>
					</div>
					<div class="col d-flex flex-column address-wrap">
						<div class="single-contact-address d-flex flex-row">
							<div class="icon">
								<span class="lnr lnr-phone-handset"></span>
							</div>
							<div class="contact-details">
								<h5>เบอร์โทรศัพท์ 055 - 555255</h5>
								<!-- <p>Mon to Fri 9am to 6 pm</p> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

@endsection

@section('js')
		<script type="text/javascript" src="https://api.longdo.com/map/?key=bb18c14f8e96c6c5752f736c6d8daeb8"></script>
		<script>

					longdo.MapTheme.ui.layerSelectorOption.th.button.pop(2);
          function init() {
            var map = new longdo.Map({
              placeholder: document.getElementById('map'),
							zoom: 15,
							lastView: false,
							location: {
								lat: 17.017387,
								lon:	99.005478
							}
            });


            map.Route.add(new longdo.Marker({ lon: 99.005478, lat: 17.017387  },
                {
                    title: 'โรงเรียนบ้านทุ่งกระเชาะ ',

                }
            ));


          }
        </script>
@endsection

@section('css')

<style>

					#map {
						width: 100%;
 			     height: 500px;
				 }


</style>
@endsection
