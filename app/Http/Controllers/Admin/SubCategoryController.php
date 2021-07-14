<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Category;

class SubCategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function index()
{

  $subcategories = Category::with('parent')->where('level', '1')->get();
  $categories = Category::all();

  return view('admin.subcategory', compact('subcategories', 'categories'));

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
  $cat = new Category;

  $request->validate([
      'categorynameen' => 'required|max:20',
      'categorynamear' => 'required|max:20',
  ]);

  $cat->name_en = $request->categorynameen;
  $cat->name_ar = $request->categorynamear;
  $cat->parent_id = $request->subcategoryname;
  $cat->level = 1;

  $cat->save();
  return redirect()->back()->with('message', 'Added successfully');

}

/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function show($id)
{
    //
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
