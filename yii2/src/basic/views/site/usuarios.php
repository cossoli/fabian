<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<a href = "<?= Url::toRoute("site/frmvalidar") ?>">nuevo ... </a>

<h3> Lista de la tabla usuarios... </h3>

<h3> <?= $mensaje ?></h3>
<?php
    
     $form = ActiveForm::begin ([
        "method" => "get",
        "action" => Url::toRoute ("site/usuarios"),
        "enableClientValidation"=>true,

     ])

?>

<<div class = "form-grup">
        <?= $form->field($model, "querry")->input("search")?>
            </div>
    
    
     <?= html::submitInput("Buscar",["class"=>"btn btn-primary"]) ?>
    
    <?php
     $form ->end();
     ?>


<table class ="table table-bordered">

     <tr>
           <th> 

              codigo:

</th>
          <th>
            
              nombre:
</th>           
          <th>
            
          email:
</th>

            <th>
                Acciones:

</th>

</tr>
<?php foreach ($data as $row): ?>
    <tr>
        <td><?= $row->id ?></td>
        <td><?= $row->nombre?></td>
        <td><?= $row->email ?></td>
        <td><a  href= "<?= Url::toRoute ( ["site/usuarios",'id'=>$row->id ])
        ?>"> Eliminar </a> </td>

</tr>
<?php endforeach ?>

</table>


