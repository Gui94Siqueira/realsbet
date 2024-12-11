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
        'observations' => 'nullable|string|max:255',
    ]);

    AffiliateCommission::create([
        'affiliate_id' => $affiliateId,
        'value' => $validated['value'],
        'date' => $validated['date']
    ]);

    return redirect()->route('affiliate_commissions.show', $affiliateId);
}

    // Method to delete a commission
    public function destroy($id)
    {
        // Find the commission by ID, or fail if not found
        $commission = AffiliateCommission::findOrFail($id);

        // Delete the commission
        $commission->delete();

        // Redirect back to the affiliates list or commissions page
        return redirect()->route('affiliates.index');
    }

    public function show($affiliateId)
{
    $affiliate = Affiliate::findOrFail($affiliateId);
    $commissions = AffiliateCommission::where('affiliate_id', $affiliateId)->get();
    return view('affiliate_commissions.show', compact('affiliate', 'commissions'));
}

}
