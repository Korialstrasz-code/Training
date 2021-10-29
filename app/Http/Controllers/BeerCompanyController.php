<?php

namespace App\Http\Controllers;

use App\models\BeerCompany;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class BeerCompanyController extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    public function index()
    {
        $companyList = BeerCompany::get();
        return view('beercompany.index', compact('companyList'));
    }

    public function create()
    {
        return view('beercompany.create');
    }
    public function store(Request $request)
    {
        $company = BeerCompany::create([
            BeerCompany::NAME => $request->name,
        ]);
        $company->save();
        return redirect(route('beercompany.index'));
    }
    public function edit($id)
    {
        /** @var $company BeerCompany */
        $company = BeerCompany::find($id);

        return view('beercompany.edit', compact('company'));
    }
    public function update($id, Request $request)
    {
        $company = BeerCompany::find($id);
        $company->update([
            BeerCompany::NAME => $request->name,
        ]);
        return redirect(route('beercompany.index'));
    }


    public function destroy($id)
    {
        $type = BeerCompany::findOrFail($id);
        $type->delete();
        return redirect(route('beercompany.index'));
    }
}
