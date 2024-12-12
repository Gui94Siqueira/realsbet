<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;
use App\Models\AffiliateCommission;
use Illuminate\Http\Request;

class AffiliateCommissionController extends Controller
{
    public function create($affiliateId)
    {
        $affiliate = Affiliate::findOrFail($affiliateId);
        return view('affiliate_commissions.create', compact('affiliate'));
    }


    public function store(Request $request, $affiliateId)
{
    $validated = $request->validate([
        'value' => 'required|numeric',
        'date' => 'required|date',
    ]);

    AffiliateCommission::create([
        'affiliate_id' => $affiliateId,
        'value' => $validated['value'],
        'date' => $validated['date']
    ]);

    return redirect()->route('affiliate_commissions.show', $affiliateId);
}


    public function destroy($id)
    {
        $commission = AffiliateCommission::findOrFail($id);
        $commission->delete();
        return redirect()->route('affiliates.index');
    }

    public function show($affiliateId)
{
    $affiliate = Affiliate::findOrFail($affiliateId);
    $commissions = AffiliateCommission::where('affiliate_id', $affiliateId)->get();
    return view('affiliate_commissions.show', compact('affiliate', 'commissions'));
}

}
