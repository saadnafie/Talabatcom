<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Freelancer;
use App\Models\FreelancerService;
use App\Models\Review;
use App\Models\User;

class FreelancerController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function index()
{

  $freelancers = Freelancer::with('client')->get();

  return view('admin.freelancer', compact('freelancers'));

}


public function activate($freelancer)
{
  $activate = User::find($freelancer);
  if($activate->isActive == '1'){
  $activate->isActive = '0';
  }else {
  $activate->isActive = '1';
  }
  $activate->save();

  return redirect()->back()->with('message', 'Status changed successfully');

}

public function accept($freelancer)
{
  $accepting = Freelancer::find($freelancer);

  $accepting->isAccept = '1';
  $accepting->save();

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
  $freelancerDetails = Freelancer::with('client')->whereHas('client', function($query) use ($id) {
  $query->where('user_id', '=', $id);})
  ->first();

  $freelancerServices = FreelancerService::where('user_id', $id)->get();

  $sumRate = Review::where('reviewee_id', $id)->sum('final_rate');
  $countRate = Review::where('reviewee_id', $id)->count();
  if($sumRate != 0 && $countRate != 0){
  $total = $sumRate / $countRate;
  }else{
  $total = 0;
  }

  return view('admin.freelancerDetails', compact('freelancerDetails', 'freelancerServices', 'total'));

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
