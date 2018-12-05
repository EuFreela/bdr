<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Model\SystemMessageModel;
use Tymon\JWTAuthExceptions\JWTException;
use Illuminate\Support\Facades\Hash;
use Auth;
use JWTAuth;
use App\User;
use App\Model\TaskModel;

class APIController extends Controller
{
   
    /*
    |--------------------------------------------------------------------------
    | GETTERS
    |--------------------------------------------------------------------------
    | @BDR.
    */
    public function apiGetListTask()
    {
        return response()->json([
            'tasks' => TaskModel::all()], 200);
    }

    
    /*
    |--------------------------------------------------------------------------
    | POSTTERS
    |--------------------------------------------------------------------------
    | @BDR.
    */
    public function apiPostSignin(Request $request)
    {                
        $validator=Validator::make($request->all(),$this->rulesSignin());  
      
        if( $validator->errors()->first() )
            return response()->json(['errors'=>$validator->errors()]);  
           
        try {            
            if (! $token = JWTAuth::attempt(['email'=>$request->email,'password'=>$request->password])) 
                return response()->json(['401' => SystemMessageModel::where('code','=',10)->first()->name], 401);
               
        } catch (JWTException $e) {
            return response()->json(['401' => SystemMessageModel::where('code','=',11)->first()->name], 401);
        }

        
        if ( JWTAuth::setToken($token) ) {           
            return response()->json(compact('token'));
        }
        else {
            return response()->json(['401' => SystemMessageModel::where('code','=',11)->first()->name], 401);
        }
    }

    public function apiPostSignup(Request $request)
    {
        //REGRAS DE VALIDAÇÃO
        $validator=Validator::make($request->all(),$this->rulesSignup()); 
        //VERIFICAÇÃO DE REGRAS - RETORNO DE ERROS CASO NÃO REGRA SEJA QUEBRADA
        if( $validator->errors()->first() )
            return response()->json(['error'=>$validator->errors()]);
        //GRAVAÇÃO DE DADOS DE NOVO USUÁRIO
        $user = User::create([            
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        
        if($user)           
            return response()->json(['success' => SystemMessageModel::where('code','=',1)->first()->name], 200);
               
        return response()->json(['error' => SystemMessageModel::where('code','=',2)->first()->name], 401);
    }

    public function apiPostCreateTask(Request $request)
    {
        $validator=Validator::make($request->all(),$this->rulesTask());  
      
        if( $validator->errors()->first() )
            return response()->json(['errors'=>$validator->errors()]); 
           
        $task = TaskModel::create([
            'name' => $request->name,
            'description' => $request->description,
            'priority_id' => $request->priority
        ]);

        if($task)           
            return response()->json(['success' => SystemMessageModel::where('code','=',1)->first()->name], 200);
               
        return response()->json(['error' => SystemMessageModel::where('code','=',2)->first()->name], 401);
    
    }


    public function apiPutTask(Request $request, $id)
    {
        $validator=Validator::make($request->all(),$this->rulesTask());  
      
        if( $validator->errors()->first() )
            return response()->json(['errors'=>$validator->errors()]); 
           
        $task = TaskModel::where('id','=',$id)
        ->update([
            'name' => $request->name,
            'description' => $request->description,
            'priority_id' => $request->priority
        ]);

        if($task)           
            return response()->json(['success' => SystemMessageModel::where('code','=',3)->first()->name], 200);
               
        return response()->json(['error' => SystemMessageModel::where('code','=',4)->first()->name], 401);
    }

    public function apiDeleteTask($id)
    {
        if(TaskModel::where('id','=',$id)->delete())
            return response()->json(['success' => SystemMessageModel::where('code','=',5)->first()->name], 200);
               
        return response()->json(['error' => SystemMessageModel::where('code','=',6)->first()->name], 401);
    }


    /*
    |--------------------------------------------------------------------------
    | MÉTODOS PRIVADOS
    |--------------------------------------------------------------------------
    | RULES..
    |--------------------------------------------------------------------------  
    */
    public function rulesSignin()
    {
        return [
            'email' => ['email','required'],
            'password' => 'required',           
        ];
    }

    public function rulesSignup()
    {
        return [
            'name' => 'required',
            'email' => 'email|required|unique:users',
            'password' => 'required|min:4|same:rewrite_password',
            'rewrite_password' => 'required|min:4'
        ];
    }

    public function rulesTask()
    {
        return [
            'name' => ['required'],
            'priority' => 'required',           
        ];
    }


}
