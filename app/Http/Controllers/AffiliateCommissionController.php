<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;
use App\Models\AffiliateCommission;
use Illuminate\Http\Request;

class AffiliateCommissionController extends Controller
{
    // Método para adicionar uma comissão ao afiliado
    public function create($affiliateId)
    {
        $affiliate = Affiliate::findOrFail($affiliateId);
        return view('affiliate_commissions.create', compact('affiliate'));
    }

    // Método para salvar a comissão
    public function store(Request $request, $affiliateId)
    {
        $validated = $request->validate([
            'value' => 'required|numeric',
            'date' => 'required|date',
            'observations' => 'nullable|string|max:255',
        ]);

        AffiliateCommission::create([
            'affiliate_id' => $affiliateId,
            'value' => $validated['value'],
            'date' => $validated['date'],
            'observations' => $validated['observations'],
        ]);

        return redirect()->route('affiliates.index');
    }

    // Método para excluir a comissão
    public function destroy($id)
    {
        $commission = AffiliateCommission::findOrFail($id);
        $commission->delete();

        return redirect()->route('affiliates.index');
    }

    // Método para visualizar a comissão de um afiliado
    public function show($affiliateId)
    {
        $affiliate = Affiliate::findOrFail($affiliateId);
        $commissions = AffiliateCommission::where('affiliate_id', $affiliateId)->get();

        return view('affiliate_commissions.show', compact('affiliate', 'commissions'));
    }
}

