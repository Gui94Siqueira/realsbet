<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;
use Illuminate\Http\Request;

class AffiliateController extends Controller
{

    public function index()
    {
        $affiliates = Affiliate::all();
        return view('affiliates.index', compact('affiliates'));  // Retorna a view com a lista de afiliados
    }


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



    public function edit($id)
    {
        $affiliate = Affiliate::find($id);
        return view('affiliates.edit', compact('affiliate'));
    }


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
    $user = Affiliate::findOrFail($id);
    $user->delete();
    return redirect()->route('affiliates.index'); // Redireciona de volta para a lista de afiliados
}


}


