<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartnerUpdateRequest;
use App\Http\Requests\StorePartnerRequest;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerControllers extends Controller
{


public function index()
{

    $Partners = Partner::all();
    return view('admin.ProfilePartner.partner',['Partners'=>$Partners]);
}

public function create()
{

    return view('admin.ProfilePartner.create');

}
public function store(StorePartnerRequest $request ,Partner $partners)
{

        $partners = Partner::create($request->all());

        $partners->addMediaFromRequest('logo')->toMediaCollection('images');
        $partners->save();

        return redirect()->route('admin.DashAdmin');

}

public function edit()
{
    return view('admin.ProfilePartner.update');

}
public function update(PartnerUpdateRequest $request, Partner $partners ){

    $partners->update($request->all());

    if ($request->hasFile('logo')) {
        $partners->clearMediaCollection('images');
        $partners->addMediaFromRequest('logo')->toMediaCollection('images');
    }

    $partners->save();
    return redirect()->route('partners');

}

public function destroy(){


}

public function home(){
    $partners = Partner::all();
    return view('index',['partners'=>$partners]);

}
}
