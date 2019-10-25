<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;

class ManagementUserController extends Controller
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    /**
     * Redirecionando para uma view 
     * diacordo com o tipo de Usuário
     *
     * @return void
     */
    public function index()
    {
        $typeUser =  auth()->user();

        if ($typeUser->email == 'admin@nti.com.br') {

            $users =   $this->user->whereNotIn('email', ['admin@nti.com.br'])->get();

            return view('auth.index', compact('users'));
        } else {
            return view('auth.profile.profile');
        }
    }
    /**
     * Fazendo o Reset da Senha dos
     * Usuario da SEMUR
     * @param Request $request
     * @return void
     */
    public function resertUser($id)
    {
        $update = $this->user->find($id);
     
        $update->update([
            'password'  =>  bcrypt('12345678'),
        ]);
        if ($update){
            return redirect()
                        ->back()
                        ->with('success', 'A senha do Usuario foi Alterada para 12345678 !');
        }
        return redirect()->back()->with('error', 'Falhar ao atualizar perfil...');
    }
    /**
     * Atulizando Informações do Login 
     * de Usuarios da SEMUR
     * @param Request $request
     * @return void
     */
    public function updateUser(Request $request)
    {
        $data = $request->all();

        if ($data['password'] != null)
            $data['password'] = bcrypt($data['password']);
        else
            unset($data['password']);

        $update = auth()->user()->update($data);

        if ($update)
            return redirect()->back()   
                ->with('success', 'Atualizado com sucesso!');


        return redirect()->back()->with('error', 'Falhar ao atualizar perfil...');
    }
}
