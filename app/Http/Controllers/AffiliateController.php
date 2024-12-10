<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;
use Illuminate\Http\Request;

class AffiliateController extends Controller
{
    // Método para listar todos os afiliados
    public function index()
    {
        $affiliates = Affiliate::all(); // Recupera todos os afiliados
        return view('affiliates.index', compact('affiliates'));  // Retorna a view com a lista de afiliados
    }

    // Método para exibir o formulário de criação de afiliado
    public function create()
    {
        return view('affiliates.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'cpf' => 'required|string|unique:affiliates,cpf|max:255',
        'email' => 'required|email|unique:affiliates,email|max:255',
        'phone' => 'required|string|max:15',
        'address' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'state' => 'required|string|max:2',
    ]);

    // O Laravel irá automaticamente preencher created_at e updated_at
    Affiliate::create([
        'name' => $validated['name'],
        'cpf' => $validated['cpf'],
        'email' => $validated['email'],
        'phone' => $validated['phone'],
        'address' => $validated['address'],
        'city' => $validated['city'],
        'state' => $validated['state'],
    ]);

    return redirect()->route('affiliates.index');
}


    // Método para exibir o formulário de edição de afiliado
    public function edit($id)
    {
        $affiliate = Affiliate::findOrFail($id);
        return view('affiliates.edit', compact('affiliate'));
    }

    // Método para atualizar as informações de um afiliado
    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:affiliates,email,' . $id . '|max:255',
        'phone' => 'required|string|max:15',
        'address' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'state' => 'required|string|max:2',
    ]);

    $affiliate = Affiliate::findOrFail($id);
    $affiliate->update([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'phone' => $validated['phone'],
        'address' => $validated['address'],
        'city' => $validated['city'],
        'state' => $validated['state'],
    ]);

    return redirect()->route('affiliates.index');
}


public function destroy($id)
{

    // Recupera o usuário a ser excluído
    $user = Affiliate::findOrFail($id);

    // Exclui o usuário
    $user->delete();



    return redirect()->route('affiliates.index'); // Redireciona de volta para a lista de afiliados
}


}


