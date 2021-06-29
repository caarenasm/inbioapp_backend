<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//*******agregar esta linea******//
use Illuminate\Support\Str;
use Validator;
use DB;
use App\Models\User;
use App\Models\Users_datos;
//*******************************//

class AuthController extends Controller
{
    //
    public function registro(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'sexo' => 'required|numeric',
            'dia' => 'required',
            'mes' => 'required',
            'anio' => 'required',
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'estatura' => 'required|numeric',
            'peso_actual' => 'required|numeric',
            'peso_deseado' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                //'message' => $validator->errors()->first(), 
                'message' => $validator->getMessageBag()->toArray(), 
                'status' => false
            ], 500);
        }

        DB::beginTransaction();
  
        try {

            $name = $request->nombre.' '.$request->apellido;
            $fecha_nacimiento = $request->anio.'-'.$request->mes.'-'.$request->dia;

            $password = Str::random(30);

            $tab_user = new User;
            $tab_user->name = $name;
            $tab_user->email = $request->email;
            $tab_user->password = bcrypt($password);
            $tab_user->save();

            $tab_user_datos = new Users_datos;
            $tab_user_datos->users_id = $tab_user->id;
            $tab_user_datos->sexo_id = $request->sexo;
            $tab_user_datos->fecha_nacimiento = $fecha_nacimiento;
            $tab_user_datos->nombre = $request->nombre;
            $tab_user_datos->apellido = $request->apellido;
            $tab_user_datos->estatura = $request->estatura;
            $tab_user_datos->peso_actual = $request->peso_actual;
            $tab_user_datos->peso_deseado = $request->peso_deseado;
            $tab_user_datos->save();

            DB::commit();

            return response()->json([
                'message' => 'Usuario creado con exito!',
                'data' => $request->all()
            ], 200);

        }catch (\Illuminate\Database\QueryException $e){

            DB::rollback();

            /*$response['errors']  = array('ERROR ('.$e->getCode().'):'=> $e->getMessage());

            return response()->json([
                $response
            ], 400);*/

            return response()->json([
                'message' => 'Error en operacion!'
            ], 400);
        }

    }

    public function login(Request $request)
    {
        
        /*$loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);*/

        $validator = Validator::make($request->all(), [
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->getMessageBag()->toArray(), 
                'status' => false
            ], 500);
        }

        if (!auth()->attempt($request->all())) {
            return response(['message' => 'Credentiales invalidas']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['user' => auth()->user(), 'access_token' => $accessToken]);

    }
}
