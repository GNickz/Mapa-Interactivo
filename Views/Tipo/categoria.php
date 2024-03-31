<?php
	headerMapa($data);
	headerArtesanias($data);
	
	$arrArtesanias = $data['artesanias'];
	//dep($arrArtesanias);
?>
	

<br><br>
<br><br>
<br><br>
 <!-- Product -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<h3><?=$data['page_title']?></h3>
				</div>
			</div>

			<div class="row isotope-grid">

			<?php
				if(!empty($arrArtesanias)){
					for ($p=0; $p < count($arrArtesanias); $p++){
						$ruta = $arrArtesanias[$p]['ruta'];
						if(count($arrArtesanias[$p]['images']) > 0){
							$portada = $arrArtesanias[$p]['images'][0]['url_image'];
						}else{
							$portada = media().'/images/uploads/product.png';
						}
			?>

				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<!-- Block2 -->
					<div class="block2">

						<div class="block2-pic hov-img0">
							<img src="<?= $portada?>" alt="<?= $arrArtesanias[$p]['nombre_artesania'] ?>">

							<a href="<?= 'http://localhost/Proyecto-Residencia-Profesional-2/tipo/artesania/'.$arrArtesanias[$p]['idartesania'].'/'.$ruta; ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
								Ver arteania
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
				}else{
					?>
					<thead>
						<tr>
							<td colspan="9" style="text-align: center; font-size: 1.5em;">No existen artesanias para mostrar.</td>
						</tr>
				
					</thead>
					<tbody>
						<tr>
							<th colspan="9" style="text-align: center;">
								<img src="http://localhost/Proyecto-Residencia-Profesional-2/images/Cerrado.png" alt="Imagen de artesanía" style="max-width: 100%; height: 260px;">
							</th>
						</tr>
					</tbody>
					<?php
					//echo"No existen artesanias para mostrar.";
				}
			?>

			</div>

		</div>
	</div>

	<br></br>
	<br></br>
	<br></br>


		


<?php footerArtesanias($data);
footerMapa($data);?>




<script>Swal.fire({title:"<strong style='color:darkorange'>" + 'Atención' + "</strong>",
allowOutsideClick:false,
iconColor:'#FF8000',
icon: 'info',
html:
' </b>Si usted es artesano y no puede visualizar sus artesanías registradas ni su información en esta sección, le sugerimos que verifique y actualice los datos de su perfil, esto lo podrá realizar accediendo a su cuenta <a href="http://localhost/Proyecto-Residencia-Profesional-2/login">aquí</a>, una vez ingresado al sistema diríjace al módulo perfil ubicado en el parte superior derecha de su pantalla y actualice sus datos.',

showCloseButton: true,
confirmButtonColor:'#00913f',
focusConfirm: false, 
confirmButtonText:
'<i class="fa fa-thumbs-up"></i> Entendido',
})</script>



