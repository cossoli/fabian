<?php
   
   use yii\helpers\Html;
   use yii\widgets\ActiveForm;
   use yii\helpers\Url;
 

 ?>
 <h1> Formulario Validar </h1>

 <a href = "<?= Url::toRoute("site/usuarios") ?>">Lista de usuario ... </a>


 <h3> <?= $mensaje ?> </h3>

  <?php
      $form = ActiveForm::begin([
            "method"=> "post",
            "id"=> "formulario",
            "enableClientValidation"=>true,
            "enableAjaxValidation"=>false

              ]);
    ?>

    <div class = "form-grup">
        <?= $form->field($model, "id")->input("text")?>
            </div>

            <div class = "form-grup">
        <?= $form->field($model, "nombre")->input("text")?>
            </div>
    
    <div class = "form-grup">
        <?= $form->field($model, "email")->input("email")?>
            </div>

    <?= html::submitInput("Enviar",["class"=>"btn btn-primary"]) ?>
 
 <?php
     
    $form->end()

 ?>
