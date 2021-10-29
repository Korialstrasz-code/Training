<?php

namespace App\Http\Controllers;

use A\B;
use App\models\Beer;
use App\models\BeerCompany;
use App\models\BeerType;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class BeerController extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    public function index()
    {
        $beerList = Beer::get();
        $beerListTask = Beer::select(
            Beer::TABLE_NAME . '.' . Beer::ID,
            BeerType::TABLE_NAME . '.' . BeerType::NAME . ' as type'
        )
            ->join('beer_types', 'beer_types.id', '=', 'beer.type')

            ->get();
        dump($beerListTask);
        return view('beer.index', compact('beerList'));
    }
    public function create()
    {
        $companies = BeerCompany::get();
        $types = BeerType::get();
        return view('beer.create', compact('companies', 'types'));
    }

    public function store(Request $request)
    {
        $beer = Beer::create([
            Beer::NAME => $request->name,
            Beer::DESCRIPTION => $request->description,
            Beer::TYPE => $request->type,
            Beer::COMPANY => $request->company
        ]);
        $beer->save();
        return redirect(route('beer.index'));
    }
    public function edit($id)
    {
        $beer = Beer::find($id);
        $company = Beer::find($id);
        $type = Beer::find($id);
        return view('beer.edit', compact('beer'), compact('company', compact('type')));
    }
    public function update($id, Request $request)
    {
        $beer = Beer::find($id);
        $beer->update([
            Beer::NAME => $request->name,
        ]);
        return redirect(route('beer.index'));
    }


    public function destroy($id)
    {
        $type = Beer::findOrFail($id);
        $type->delete();
        return redirect(route('beer.index'));
    }
}
