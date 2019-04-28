<?php

namespace App;

use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [ 
        'firstName', 'lastName', 'email'
    ];

    protected $guarded = ['id'];

/**
  * Se usa para guardar el usuario en la base de datos
  *
  * @param request es el dato que posee todos los campos de la vista
  * @param idUser es la id del usuario que se desea modificar
  *
  */
  public static function saveUser($request, $idUser = null)
  {

    //Se analiza el tipo de metodo es usado en la ruta si es post o put
    if($request->isMethod('post')){
      $user = new User();
    }
    
    //guarda el dato en la base de datos
    $user->firstName = $request['firstName'];
    $user->lastName = $request['lastName'];
    $user->email = $request['email'];

    
    $user->save();
  }

    /**
     * Guardar el nombre en minúscula
     * @param firstName
    */

    public function setFirstNameAttribute($valor)
    {
        $this->attributes['firstName'] = strtolower($valor);
    }
    /**
     * Guardar el apellido en minúscula
     * @param lastName
    */

    public function setLastNameAttribute($valor)
    {
        $this->attributes['lastName'] = strtolower($valor);
    }

    /**
     * Guardar el email en minúscula
     * @param email
    */
    public function setEmailAttribute($valor)
    {
        $this->attributes['email'] = strtolower($valor);
    }


}
