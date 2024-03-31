<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">

				<div class="col-sm-6 col-lg-4 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						CATEGORÍAS
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="http://localhost/Proyecto-Residencia-Profesional-2/tipo/categoria/1/alfareria" class="stext-107 cl7 hov-cl1 trans-04">
								Alfarería
							</a>
						</li>

						<li class="p-b-10">
							<a href="http://localhost/Proyecto-Residencia-Profesional-2/tipo/categoria/2/madera" class="stext-107 cl7 hov-cl1 trans-04">
								Madera
							</a>
						</li>

						<li class="p-b-10">
							<a href="http://localhost/Proyecto-Residencia-Profesional-2/tipo/categoria/3/palma" class="stext-107 cl7 hov-cl1 trans-04">
								Palma
							</a>
						</li>

						<li class="p-b-10">
							<a href="http://localhost/Proyecto-Residencia-Profesional-2/tipo/categoria/4/talavera" class="stext-107 cl7 hov-cl1 trans-04">
								Talavera
							</a>
						</li>

						<li class="p-b-10">
							<a href="http://localhost/Proyecto-Residencia-Profesional-2/tipo/categoria/5/textil" class="stext-107 cl7 hov-cl1 trans-04">
								Textil
							</a>
						</li>

						<li class="p-b-10">
							<a href="http://localhost/Proyecto-Residencia-Profesional-2/tipo/categoria/6/vidrio-soplado" class="stext-107 cl7 hov-cl1 trans-04">
								Vidrio Soplado
							</a>
						</li>

						<li class="p-b-10">
							<a href="http://localhost/Proyecto-Residencia-Profesional-2/tipo/categoria/7/juguetes" class="stext-107 cl7 hov-cl1 trans-04">
							    Juguetes
							</a>
						</li>
					</ul>
					
				</div>


				<div class="col-sm-6 col-lg-4 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Contacto
					</h4>

					<p class="stext-107 cl7 size-201">
						Cualquier duda presentarse en Av. Rafael Ávila Camacho Ote. 3509, Barrio la Fátima, 75910 Ajalpan, Pue.
						<br>
						ó comunicarse al 236 381 2162.
					</p>

					<div class="p-t-27">
						<a href="https://facebook.com/TecAjalpan" target="_blanck" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>
					</div>
				</div>

				<div class="col-sm-6 col-lg-4 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Nosotros
					</h4>

					<form>
						<div class="wrap-input1 w-full p-b-4">
							<p style="color: white">dir_dsnegraajalpan@tecnm.mx</p>
						</div>
					</form>
				</div>

			</div>

			<div class="p-t-40">

				<p class="stext-107 cl6 txt-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</p>
			</div>
		</div>
	</footer>


	

	

<!--===============================================================================================-->	
	<script src="<?= media() ?>/artesanias/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= media() ?>/artesanias/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= media() ?>/artesanias/vendor/bootstrap/js/popper.js"></script>
	<script src="<?= media() ?>/artesanias/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= media() ?>/artesanias/vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="<?= media() ?>/artesanias/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?= media() ?>/artesanias/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?= media() ?>/artesanias/vendor/slick/slick.min.js"></script>
	<script src="<?= media() ?>/artesanias/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="<?= media() ?>/artesanias/vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="<?= media() ?>/artesanias/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="<?= media() ?>/artesanias/vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= media() ?>/artesanias/vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	
	</script>
<!--===============================================================================================-->
	<script src="<?= media() ?>/artesanias/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="<?= media() ?>/artesanias/js/main.js"></script>

	<script src="<?= media();?>/js/menu_desplegable.js"></script>

	<script src="https://www.google.com/recaptcha/api.js" async defer></script>