<?php

headerMapa($data);
headerArtesanias($data);

$arrArtesanos = $data['artesanos'];
//dep($arrArtesanos);

?>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>




<div class=" Contenedor-tabla-artesanos">
<table class="table table-bordered  tabla-artesanos ">


    <thead class="table-light">
        <tr>
            <th>Municipio</th>
            <th>Nombre</th>
            <th>Telefono <i class="fa fa-phone"></th>
            <th>Facebook <i class="fa fa-facebook-f"></i></th>
            <th>Twitter <i class="fa fa-twitter"></i></th>
            <th>Instagram <i class="fa fa-instagram"></i></th>
            <th>Sitio Web <i class="fa fa-globe"></i></th>
            <th>Domicilio <i class="fa fa-home"></i></th>
            <th>Empresa <i class="fa fa-industry"></i></th>
        </tr>
       
    </thead>




<?php
if(!empty($arrArtesanos)){
for ($a=0; $a < count($arrArtesanos); $a++) { 
?>  

    <tbody>
        <tr>
            <td><?= $arrArtesanos[$a]['municipio']?></td>
            <td><?= $arrArtesanos[$a]['nombrecompleto']?></td>
            <td><?= $arrArtesanos[$a]['telefono']?></td>
            <!--<td><a><-?= $arrArtesanos[$a]['facebook']?></a></td>-->
            <td><a href='http://www.facebook.com/<?= $arrArtesanos[$a]['facebook']?>'  target='_blank' ><?= $arrArtesanos[$a]['facebook']?></a></td>
            <td><a href='http://www.twitter.com/<?= $arrArtesanos[$a]['twitter']?>' target='_blank' ><?= $arrArtesanos[$a]['twitter']?></a></td>
            <td><a href='http://www.instagram.com/<?= $arrArtesanos[$a]['instagram']?>' target='_blank'><?= $arrArtesanos[$a]['instagram']?></a></td>
            <td><a href='http://www.<?= $arrArtesanos[$a]['sitio_web']?>' target='_blank'><?= $arrArtesanos[$a]['sitio_web']?></a></td>
            <td><?= $arrArtesanos[$a]['domicilio']?></td>
            <td><?= $arrArtesanos[$a]['empresa']?></td>
            
        </tr>

        
    </tbody>

    
       
    

<?php
}
}else{
    echo "Lo sentimos aun no existen registros de artesanos en este municipio :( .  <hr><br><br><br>";
}
?>


<br>

</table>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


<?php
footerMapa($data);
footerArtesanias($data);

?>

<script>Swal.fire({title:"<strong style='color:darkorange'>" + 'Atención' + "</strong>",


  allowOutsideClick:false,
  iconColor:'#FF8000',
  icon: 'info',
  html:
    ' </b>Si usted es artesano y no puede visualizar su información de contacto en la siguiente tabla, le sugerimos que verifique y actualice los datos de su perfil, esto lo podrá realizar accediendo a su cuenta <a href="http://localhost/Proyecto-Residencia-Profesional-2/login">aquí</a>, una vez ingresado al sistema diríjace al módulo perfil ubicado en el parte superior derecha de su pantalla y actualice sus datos.',
  
  showCloseButton: true,
  confirmButtonColor:'#00913f',
  focusConfirm: false, 
  confirmButtonText:
    '<i class="fa fa-thumbs-up"></i> Entendido',
    })</script>

