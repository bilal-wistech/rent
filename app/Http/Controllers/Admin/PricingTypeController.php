<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PricingTypeDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PricingType;

class PricingTypeController extends Controller
{
   public function index(PricingTypeDataTable $dataTable)
{
    return $dataTable->render('admin.pricingType.view');
}

    public function add()
    {
        return view('admin.pricingType.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'days'   => 'required|integer|min:0',
            'status' => 'required|in:0,1',
        ]);

        PricingType::create($request->only('name', 'days', 'status'));

        return redirect()->route('pricing-type.index')
                         ->with('success', 'Pricing Type added successfully.');
    }

    public function edit($id)
    {
        $pricingType = PricingType::findOrFail($id);
        return view('admin.pricingType.edit', compact('pricingType'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'days'   => 'required|integer|min:0',
            'status' => 'required|in:0,1',
        ]);

        $pricingType = PricingType::findOrFail($id);
        $pricingType->update($request->only('name', 'days', 'status'));

        return redirect()->route('pricing-type.index')
                         ->with('success', 'Pricing Type updated successfully.');
    }

    public function destroy($id)
    {
        $pricingType = PricingType::findOrFail($id);
        $pricingType->delete();

        return redirect()->route('pricing-type.index')
                         ->with('success', 'Pricing Type deleted successfully.');
    }
}
