<?php

namespace App\Http\Controllers;

use App\Http\Requests\BeerTypeRequest;
use App\models\BeerCompany;
use App\models\BeerType;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class BeerTypeController extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    public function index()
    {
        $typeList = BeerType::get();
        return view('beertype.index', compact('typeList'));
    }
    public function create()
    {
        return view('beertype.create');
    }
    public function store(BeerTypeRequest $request)
    {
        $type = BeerType::create([
            BeerType::NAME => $request->name,
        ]);
        $type->save();
        return redirect(route('beertype.index'));
    }
    public function edit($id)
    {
        $type = BeerType::find($id);
        return view('beertype.edit', compact('type'));
    }

    public function update($id, Request $request)
    {
        $type = BeerType::find($id);
        $type->update([
            BeerType::NAME => $request->name,
        ]);
        return redirect(route('beertype.index'));
    }

    public function destroy($id)
    {
        $type = BeerType::findOrFail($id);
            $type->delete();
        return redirect(route('beertype.index'));
    }
}
