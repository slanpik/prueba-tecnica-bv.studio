<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use DataTables;

use App\User;


class UserController extends Controller
{
    /**
     * Sirve para llevar al usuario a la vista para mostrar todos los usuarios registrados
     *
     * @param request viene la consulta del datatable
     * @return view me envia a la vista para ver todos los usuarios
     */
    public function showAllUsers( Request $request ) {
  
        if(request()->ajax()) {
            return datatables()->of(User::select('*'))
                    ->addIndexColumn()
                    ->make(true);
        }
        
        return view('users.showUsers');

    }

    /**
     * Es el que me permite crear un nuevo usuario estudiante en la plataforma
     * 
     * @param $request ['firstName','lastName', 'email']
     * @return redirect me lleva al showAllUsers
     */
    public function storeUser(Request $request ) {
        
        /** @var inputs guardamos lo que viene en el request */
        $inputs = $request->all();

        /** @var validator realizamos la validacion para comprobar todos los campos de la peticion */
        $validator = Validator::make($inputs, [
            'firstName' => 'required|string',
            'email' => 'required|email|string',
            'g-recaptcha-response' => 'required|recaptcha', 
        ]);

        // Si pasa la validación guardamos el usuario.
        if ($validator->passes()) {

            /** @var user creamos un nuevo usuario */
            $user = new User();

            // guarda el dato en la base de datos
            $user->firstName = $inputs['firstName'];
            $user->lastName = $inputs['lastName'];
            $user->email = $inputs['email'];

            
            $user->save();

            
            return response()->json(['success'=>'Added new user.']);
            
        }
       

        return response()->json(['error' => $validator->errors()]);


        // return redirect(route('user.showAllUsers'));
    }

     /**
     * Sirve llevar al usuario a la vista con el formulario de creacion de un usuario
     * 
     * @return view me envia a la vista de crear un usuario
     */
    public function createUser() {

        return view('users.createUser');
    }

}
