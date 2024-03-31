<?php
headerMapa($data);
headerArtesanias($data);

$arrArtesania = $data['artesania'];
$arrArtesanias = $data['artesanias'];
$arrImages = $arrArtesania['images'];

//dep($data);
?>

<br><br>
<br><br>
<br><br>

<!-- breadcrumb -->
<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="<?= base_url(); ?>" class="stext-109 cl8 hov-cl1 trans-04">
				Inicio
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="<?= base_url().'/tipo/categoria/'.$arrArtesania['categoriaid']. '/' .$arrArtesania['categoria']; ?>" class="stext-109 cl8 hov-cl1 trans-04">
				<?= $arrArtesania['categoria'] ?>
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				<?= $arrArtesania['nombre_artesania'] ?>
			</span>
		</div>
	</div>
		

	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								<?php
								if(!empty($arrImages)){
									for($img=0; $img < count($arrImages) ; $img++){
	
								?>

									<div class="item-slick3" data-thumb="<?= $arrImages[$img]['url_image'];?>">
										<div class="wrap-pic-w pos-relative">
											<img src="<?= $arrImages[$img]['url_image'];?>" alt="<?= $arrArtesania['nombre_artesania']; ?>">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?= $arrImages[$img]['url_image'];?>">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>

								<?php
									}
								} 
								?>

							</div>
						</div>
					</div>
				</div>
					
				<div class="col-md-6 col-lg-5 p-b-30">

					<div class="p-r-50 p-t-5 p-lr-0-lg">

						<h1 class="mtext-105 cl2 js-name-detail p-b-14">
							Información de la artesanía.
						</h1>
						<hr>

						<div class="modal-body">
							<table class="table table-bordered table-responsive">
								<tbody>
									<tr>
										<td class="table-dark">Nombre de la artesanía:</td>
										<td class="D-artesania"> <?= $arrArtesania['nombre_artesania']; ?> </td>
									</tr>

									<tr>
										<td class="table-light">Tipo de artesanía:</td>
										<td class="D-artesania"> <?= $arrArtesania['categoria']; ?> </td>
									</tr>

								</tbody>
							</table>  
       				 	</div>

						<br>
						<br>
						<br>
						<br>
						<br>
						<br>

						<h2 class="mtext-105 cl2 js-name-detail p-b-14">
							Información del artesano.
						</h2>
						<hr>


						<div class="modal-body caja-artesanos">
							<table class="table table-bordered table-responsive">
								<tbody>
									<tr>
										<td class="table-dark">Nombre:</td>
										<td class="D-artesano"> <?= $arrArtesania['nombrecompleto']; ?> </td>
									</tr>

									<tr>
										<td class="table-light">Teléfono:</td>
										<td class="D-artesano"> <?= $arrArtesania['telefono']; ?> </td>
									</tr>

									<tr>
										<td class="table-dark">Cuenta de facebook:</td>
										<td class="D-artesano"><a href='http://www.facebook.com/<?= $arrArtesania['facebook']?>'  target='_blank' ><?= $arrArtesania['facebook']?></a> </td>
									</tr>

									<tr>
										<td class="table-light">Cuenta de twitter:</td>
										<td class="D-artesano"><a href='http://www.twitter.com/<?= $arrArtesania['twitter']?>' target='_blank' ><?= $arrArtesania['twitter']?></a></td>
									</tr>

									<tr>
										<td class="table-dark">Cuenta de instagram:</td>
										<td class="D-artesano"><a href='http://www.instagram.com/<?= $arrArtesania['instagram']?>' target='_blank'><?= $arrArtesania['instagram']?></a> </td>
									</tr>

									<tr>
										<td class="table-light">Sitio web:</td>
										<td class="D-artesano"><a href='http://www.<?= $arrArtesania['sitio_web']?>' target='_blank'><?= $arrArtesania['sitio_web']?></a> </td>
									</tr>

									<tr>
										<td class="table-dark">Empresa:</td>
										<td class="D-artesano"> <?= $arrArtesania['empresa']; ?> </td>
									</tr>

									<tr>
										<td class="table-light">Domicilio:</td>
										<td class="D-artesano"> <?= $arrArtesania['domicilio']; ?> </td>
									</tr>

									<tr>
										<td class="table-dark">Municipio de residencia:</td>
										<td class="D-artesano"> <?= $arrArtesania['municipio']; ?> </td>
									</tr>

								</tbody>
							</table>  
       				 	</div>

						<br></br>
						<br></br>



<!--
						<p class="stext-102 cl3 p-t-23">
							<-?= $arrArtesania['descripcion']; ?>
						</p>
							
							-->					
				

						<!--  -->
						<!--
						<div class="flex-w flex-m p-l-100 p-t-40 respon7">

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
								<i class="fa fa-facebook"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
								<i class="fa fa-twitter"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Instagram">
								<i class="fa fa-instagram"></i>
							</a>
						</div>-->
						


					</div>
				</div>
			</div>

			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<hr>

			<div class="bor10 m-t-50 p-t-43 p-b-40 ">
				<!-- Tab01 -->
				<div class="tab01 ">
				

					<!-- Tab panes -->
					<div class="tab-content p-t-43">
						<!-- - -->
						<div class="tab-pane fade show active" id="description" role="tabpanel">
							<div class="how-pos2 p-lr-15-md">
                                <h3>Descripción detallada de la artesanía</h3>
                                <br>
								<p class="stext-102 cl6">
								<?= $arrArtesania['descripcion']; ?>
									
								</p>
							</div>
						</div>

					</div>
				</div>
			</div>

		
		</div>

			

		<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
            <h3>Artesanias Relacionadas</h3>
		</div>
	</section>


	<!-- Related Products -->
	<section class="sec-relate-product bg0 p-t-45 p-b-105">

		<div class="container">

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">

				<?php
				if(!empty($arrArtesanias)){
					for ($p=0; $p < count($arrArtesanias); $p++) {
						$ruta = $arrArtesanias[$p]['ruta'];
						if(count($arrArtesanias[$p]['images']) > 0 ){
							$portada = $arrArtesanias[$p]['images'][0]['url_image'];
						}else{
							$portada = media().'/images/uploads/product.png';
						}
				?>

					<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img src="<?= $portada; ?>" alt="<?= $arrArtesanias[$p]['nombre_artesania'] ?>">

								<a href="<?= 'http://localhost/Proyecto-Residencia-Profesional-2/tipo/artesania/'.$arrArtesanias[$p]['idartesania'].'/'.$ruta; ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
									Ver artesania
								</a>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="<?= 'http://localhost/Proyecto-Residencia-Profesional-2/tipo/artesania/'.$arrArtesanias[$p]['idartesania'].'/'.$ruta; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										<?= $arrArtesanias[$p]['nombre_artesania'] ?>
									</a>
								</div>
							</div>
						</div>
					</div>
				
				<?php
					}
				}				
				?>

				</div>
			</div>
		</div>
	</section>

<?php
footerArtesanias($data);
?>