<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//*******agregar esta linea******//
use Illuminate\Support\Str;
use Carbon\Carbon;
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
            'respuestas' => 'required',
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

            $dia = date("d",strtotime($request->dia));
            $mes = date("m",strtotime($request->mes));
            $anio = date("Y",strtotime($request->anio));

            /*$fecha_nacimiento = $request->anio.'-'.$request->mes.'-'.$request->dia;*/
            $fecha_nacimiento = $anio.'-'.$mes.'-'.$dia;
            $quiz = $request->respuestas;

            foreach ($quiz as $key => $value) {
                if(is_array($value)){
                    $respuesta[$key] =  $value;
                }else{
                    $respuesta[$key] =  $value;
                }
            }

            /*dd($respuesta);*/

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
                'status' => true,
                //'data' => $request->all()
            ], 200);

        }catch (\Illuminate\Database\QueryException $e){

            DB::rollback();

            /*$response['errors']  = array('ERROR ('.$e->getCode().'):'=> $e->getMessage());

            return response()->json([
                $response
            ], 400);*/

            return response()->json([
                /*'message' => 'Error en operacion!',*/
                'message' => array('ERROR ('.$e->getCode().'):'=> $e->getMessage()),
                'status' => false,
            ], 400);
        }

    }

    public function login(Request $request)
    {

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
            //return response(['message' => 'Credentiales invalidas']);
            return response()->json([
                'message' => 'Credentiales invalidas'
            ], 401);
        }

        /*$accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response(['user' => auth()->user(), 'access_token' => $accessToken]);*/

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me){
            $token->expires_at = Carbon::now()->addWeeks(1);
        }
        $token->save();

        return response()->json([
            'message' => 'Usuario autenticado correctamente',
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);

    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Cerrar sesión correctamente'
        ]);
    }

        /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {

        $User = User::select('users.id', 'name', 'email', 'profile_photo_path',
        'sexo_id', 'fecha_nacimiento', 'nombre', 'apellido', 'estatura', 'peso_actual', 
        'peso_deseado', 'imc', 'pgc', 'tdee', 'objetivo')
        ->leftJoin('users_datos as t01','users.id','=','t01.users_id')
        ->where('users.id','=', $request->user()->id )
        ->first();

        return response()->json($User);
        //return response()->json($request->user());
    }

    public function email(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|unique:users',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->getMessageBag()->toArray(), 
                'status' => false
            ], 500);
        }

        return response()->json([
            'status' => true
        ], 200);
    }
}
