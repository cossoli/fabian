<?php
    use yii\helpers\Url;
    use yii\helpers\Html;

?>

<h1> Formulario </h1>
<h2> <?$mensaje?> </h2>

<?= html::beginForm(
     Url::toRoute('site/sform'),//ruta de acceso
     'get', // metodo
      ['class '=> 'form-inline'] //parametros extras
           )
 ?>
     <div class= "form-group">
     <?= html::label("label del campo ", "campotxt ")?>
     <?= html::textInput("campotxt",null, ["class"=> "form-control"])?>   
        
</div>

  <?= html::submitInput("Enviar form ",["class"=>"btn btn-primary"])?>

  <?= html::endForm()?>