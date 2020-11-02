<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Client;
use Validator;
use Hash;

class ClientController extends Controller
{
    public function register()
    {

        $validator = Validator::make(request()->input(), [
            'name' => 'required',
            'email' => 'required|email|unique:clients',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
//
        request()->merge(['password' => bcrypt(request('password'))]);
        $client = Client::create(request()->input());
        $success['token'] = $client
            ->createToken('tasks api')
            ->accessToken;


        return response()->json($success);
    }

    public function logout()
    {
    	/*/logout de todos los dispositivos del usuario
        auth()->user()->tokens->each(function ($token, $key) {
            $token->delete();
        });
        return response()->json('Logged out successfully', 200);*/

        //logout del disposivo del que mando el request
        auth()->user()->token()->delete();
        return response()->json('Logged out successfully', 200);

    }


    public function login(Request $request)
    {
    	//comprobar si hay registro del cliente
    	$client = Client::where('email',$request->email)->first();

    	if($client){

    		//revisar si el password es correcto
    		if(Hash::check($request->password, $client->password)){

    			//crear el token
	            $success['token'] = $client
	                ->createToken('Passport Api')
	                ->accessToken;

	            return response()->json($success, 200);

    		}else{
    			return response()->json(['error' => 'Error en email o password'], 401);
    		}
    	}

    	return response()->json(['error' => 'Error en email o password'], 401);
    }

    public function info_client()
    {
    	//obtener al cliente
    	$client = Client::where('id',auth()->user()->id)
    			  ->with(['pets' => function($q){
    			  	//$q->where('name','hola');
    			  }])
    			  ->first();

    	return response()->json($client, 200);
    }
}
