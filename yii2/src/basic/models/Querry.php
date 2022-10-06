<?php

namespace app\models;
  
use Yii;
use yii\base\Model;


class Querry extends Model
{
    public $querry;
       

    public Function rules()
    {
        return [
 
            
           ['querry', 'match', 'pattern'=>"/^[0-9a-z]+$/i",'message'=>'Solo letras y Numeros']
          
        ];
    }
    
    public function attributelabels()
    {
        return [
            'querry' => 'buscar:',
            
        ];
    }
   
}
?>