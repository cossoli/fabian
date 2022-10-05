<?php

namespace app\models;
  
use Yii;
use yii\base\Model;


class FrmValidar extends Model
{
    public $id;
    public $nombre;
    public $email;

    public Function rules()
    {
        return [
            ['nombre', 'required', 'message'=>'El nombre es requerido'],
            ['nombre', 'match', 'pattern'=>"/^.{3,50}$/",'message'=>'debe ser de 3 a 50 caracteres'],
            ['nombre', 'match', 'pattern'=>"/^[0-9a-z]+$/i",'message'=>'Solo letras y Numeros'],
            ['email', 'required', 'message'=>"El email es requerido"],
            ['email', 'email', 'message'=>'El email no es valido'],
        ];

    }
    public function attrbutelabels()
    {
        return [
            'id' => 'codigo:',
            'nombre'=> 'label de nombres:',
            'email'=>'label de Email:'
        ];
    }
   
}
?>