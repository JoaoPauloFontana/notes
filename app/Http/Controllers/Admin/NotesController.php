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
        $data = ['users', 'userLogged', 'i'];

        $users = User::find(Auth::id())->with('notas')->paginate(5);

        $userLogged = auth()->user();

        $i = 1;

        return view('controle.index', compact($data));
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

    public function edit(){

    }

    public function update(){

    }

    public function destroy(){

    }
}
