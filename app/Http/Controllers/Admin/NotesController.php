<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Nota;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class NotesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $data = ['i'];

        $users = User::find(Auth::id());

        $i = 1;

        return view('controle.index', compact($data))->with('users', $users);
    }

    public function create(){
        return view('controle.paginas.create');
    }

    public function store(Request $req){
        $data = $req->except('_token');

        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:50'],
            'text' => ['required', 'string', 'max:100']
        ]);

        if ($validator->fails()) {
            return redirect()->route('painel.notas.create')
                ->withErrors($validator)
                ->withInput();
        }

        $userLogged = auth()->user();

        $note = new Nota();
        $note->name = $req->name;
        $note->text = $req->text;
        $note->users_id = $userLogged->id;
        $note->save();

        return redirect()->route('painel.notas.index');
    }

    public function edit($id){
        $notas = Nota::find($id);

        return view('controle.paginas.edit', compact('notas'));
    }

    public function update(Request $req, $id){
        $notas = Nota::find($id);

        if($notas){
            $data = $req->except('_token');

            $validator = Validator::make($data, [
                'name' => ['required', 'string', 'max:50'],
                'text' => ['required', 'string', 'max:100']
            ]);

            if ($validator->fails()) {
                return redirect()->route('painel.notas.create')
                    ->withErrors($validator)
                    ->withInput();
            }

            $userLogged = auth()->user();

            $notas->name = $data['name'];
            $notas->text = $data['text'];
            $notas->users_id = $userLogged->id;
            $notas->save();
        }

        return redirect()->route('painel.notas.index');
    }

    public function destroy($id){
        $notas = Nota::find($id);
        $notas->delete();

        return redirect()->route('painel.notas.index');
    }
}
