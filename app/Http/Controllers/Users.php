<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rules\Password;

class Users extends Controller
{   
        /**
     * Control de Acceso
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.pages.users.users.index');

    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'name' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
            'email' => 'required|email:dns',
            'rol' => 'required'
        ],[
            'name.required' => 'El campo nombre es obligatorio',
            'name.regex' => 'El campo nombre solo permite letras',
            'email.required' => 'El campo correo es obligatorio',
            'email.email' => 'El campo correo debe ser un correo valido',
            'rol.required' => 'El campo rol es obligatorio'
        ]);

       
        if($request->input('passsword') != ''){

            $request->validate([
                'passsword' => 'required|min:6|',Password::min(8)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()
                ->uncompromised(),
                'confirmed' => 'required|min:6|same:passsword'
            ],[
                'passsword.required' =>'El campo contraseña es obligatorio',
                'passsword.min' =>'El campo contraseña debe ser mayor a 6 caracteres',
                'passsword.regex' =>'El campo contraseña es obligatorio',
                'confirmed.required' =>'El campo confirmación es obligatorio',
                'confirmed.min' =>'El campo contraseña debe ser mayor a 6 caracteres',
                'confirmed.same' =>'Las contraseñas no son iguales'
            ]);

            $user->password = bcrypt($request->input('passsword'));

        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->id_rol = $request->input('rol');
        $user->save();

        Alert::toast('Actualizado Correctamente','success');

        return redirect()->route('index.users');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $rol = User::destroy('id', $id);

        Alert::toast('Eliminado Correctamente','success');

        return redirect()->route('index.users');

    }
}
