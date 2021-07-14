<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;
use App\Models\RequestService;
use App\Models\Review;

class ClientController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function index()
{

  $clients = Client::with('user')->whereHas('user', function($query) {
  $query->where('user_type_id', '=', '3');
  })->get();

  return view('admin.clients', compact('clients'));

}

public function activate($client)
{
  $activate = User::find($client);
  if($activate->isActive == '1'){
  $activate->isActive = '0';
  }else {
  $activate->isActive = '1';
  }
  $activate->save();

  return redirect()->back()->with('message', 'Status changed successfully');

}

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
public function create()
{
    //
}

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request)
{
    //
}

/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function show($id)
{
  $clientDetails = Client::with('user', 'city', 'nationality')->where('user_id' , $id)->first();
  $services = RequestService::with('user','category','job_type')->get();

  $sumRate = Review::where('reviewee_id', $id)->sum('final_rate');
  $countRate = Review::where('reviewee_id', $id)->count();
  if($sumRate != 0 && $countRate != 0){
  $total = $sumRate / $countRate;
  }else{
  $total = 0;
  }
  return view('admin.clientDetails', compact('clientDetails', 'services', 'total'));

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
