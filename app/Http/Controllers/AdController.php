<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Http\Requests\SaveAd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ad::all();
        return view('pages.ads.index', ['ads' => $ads]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user = Auth::user();

        $now = date('Y-m-d H:i:s ', time());
        $signuptime = $user->created_at;
        $datetime1 = strtotime($signuptime);
        $datetime2 = strtotime($now);

        $secs = ($datetime2 - $datetime1)/60;// == <seconds between the two times>

        if($secs > $user->subscription){
            return redirect()->route('ads.index')->with(session()->flash('alert-danger', "Your free offer is over!"));
        }

        return view('pages.ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveAd $request)
    {
        $ad = new Ad();
        $ad->title = $request['title'];
        $ad->description = $request['desc'];
        $ad->name = $request['seller'];
        $ad->email = $request['seller_email'];
        $ad->phone = $request['seller_phone'];
        $ad->category = $request['category'];
        $ad->save();

        return redirect()->route('ads.index')->with(session()->flash('alert-success', 'Company Created!'));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ad = Ad::find($id);
        return view('pages.ads.show', ['ad' => $ad]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
