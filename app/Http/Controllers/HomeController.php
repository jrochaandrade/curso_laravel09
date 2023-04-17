<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();

        return view('index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only(['name', 'email', 'password']);

        User::create($data);        
        
        //return redirect()->back(); //adciona o usuário e continua na mesma página
        //return redirect()->route('users');//Aciona o usuário e volta para index
        return redirect()->route('create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /* public function show($id) //Nesse caso ele esta buscando pela ID do usuário
    {
        $user = User::find($id); 

        return view('show', [
            'user' => $user
        ]);
        
    } */

    //Quarta edição
    public function show($user)
    { 
        //dd($user);
        return view('show', [
            'user' => $user
        ]);
        
    }

    //Terceira edição, show busca por usuário e id.
    /* public function show(User $user)
    { 
        return view('show', [
            'user' => $user
        ]);
        
    } */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Quarta edição, buscar por user sem precisar do find
    public function edit($user)
    {
        return view('edit', [
            'user' => $user
        ]);
    }

    /* public function edit($id)
    {
        $user = User::find($id);

        return view('edit', [
            'user' => $user
        ]);
    } */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Quarta edição busca por user sem precisar do find
     public function update(Request $request, $user)
     {         
         $data = $request->only(['name', 'email']);         
         $user->update($data);        
         return redirect()->route('users');
     }

    /* public function update(Request $request, $id)
    {                 
        
        $data = $request->only(['name', 'email']);

        $user = User::find($id);
        
        $user->update($data);        
        return redirect()->route('users');
    } */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Quarta edição busca por user sem precisar do find
    public function destroy($user)
    {
        $user->delete();
        return redirect()->back();
    }

    /* public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();
        return redirect()->back();
    } */
}
