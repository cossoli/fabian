<?php

namespace app\models;
  
use Yii;
use yii\base\Model;


class Query extends Model
{
    public $query;
       

    public Function rules()
    {
        return [
 
            
           ['query', 'match', 'pattern'=>"/^[0-9a-z]+$/i",'message'=>'Solo letras y Numeros']
          
        ];
    }
    
    public function attributelabels()
    {
        return [
            'query' => 'buscar:',
            
        ];
    }
   
}
?>