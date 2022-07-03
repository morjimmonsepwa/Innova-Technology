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
        $user=User::all();
        $rol = Role::all();

        $param['users'] = $user;
        $param['roles'] = $rol;

        return view('admin.pages.users.users.index',$param);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
            'email' => 'required|email:dns',
            'passsword' => 'required|min:6|',Password::min(8)
            ->mixedCase()
            ->letters()
            ->numbers()
            ->symbols()
            ->uncompromised(),
            'confirmed' => 'required|min:6|same:passsword',
            'rol' => 'required'
        ],[
            'name.required' => 'El campo nombre es obligatorio',
            'name.regex' => 'El campo nombre solo permite letras',
            'email.required' => 'El campo correo es obligatorio',
            'email.email' => 'El campo correo debe ser un correo valido',
            'passsword.required' =>'El campo contraseña es obligatorio',
            'passsword.min' =>'El campo contraseña debe ser mayor a 6 caracteres',
            'passsword.regex' =>'El campo contraseña es obligatorio',
            'confirmed.required' =>'El campo confirmación es obligatorio',
            'confirmed.min' =>'El campo contraseña debe ser mayor a 6 caracteres',
            'confirmed.same' =>'Las contraseñas no son iguales',
            'rol.required' => 'El campo rol es obligatorio'
        ]);

        
        $new = new User();
        $new->name = $request->input('name');
        $new->email = $request->input('email');
        $new->password = bcrypt($request->input('password'));
        $new->id_rol = $request->input('rol');
        $new->save();

        Alert::toast('Guardado Correctamente','success');

        return redirect()->route('index.users');

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

        if($request->input('password') != ''){
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
        }


        $user = User::find($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
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
