@extends('admin.layouts.header')

			@section('content')


			<main class="content">
				@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
       @endif
			 @if (count($errors) > 0)
   <div class = "alert alert-danger">
      <ul>
         @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
         @endforeach
      </ul>
   </div>
@endif
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"> إدارة الفئات الفرعية</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">بيانات الفئات الفرعية</h5>
								</div>
								<div class="card-body">
								<!-- Button to Open the Modal -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  اضافة فئة فرعية
</button>
<br><br>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
	  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <h5 class="modal-title" id="exampleModalLabel">اضافة فئة جديد</h5>

      </div>
      <div class="modal-body">
	  <form method="post">
			@csrf
			<div class="form-group">
			<label for="cat">الفئة الفرعية (en)</label>
			<input type="text" class="form-control" name="categorynameen" id="cat" required>
		</div>
	  <div class="form-group">
    <label for="cat">الفئة الفرعية (ar)</label>
    <input type="text" class="form-control" name="categorynamear" id="cat" required>
 	</div>

<div class="form-group" >
	<label>الفئة الرئيسية</label>
   <select class="form-control" name="subcategoryname">
	<option value="">....</option>
	@foreach($categories as $category)
	<option value="{{$category->id}}">{{$category->name}}</option>
	@endforeach
</select>
</div>
	 <br>
	  <button type="submit" class="btn btn-primary">حفظ</button>
	  </form>
      </div>
    </div>
  </div>
</div>
	<table class="table table-striped table-bordered">
                    <thead>
                      <tr>
									    <th>#</th>
									    <th>الفئة الرئيسية (en)</th>
                      <th>الفئة الرئيسية (ar)</th>
                      <th> الغئات الفرعية (en)</th>
                      <th> الغئات الفرعية (ar)</th>
                      </tr>
                      </thead>
                      <tbody>
										  @foreach($subcategories as $index=>$subcategory)
    									<tr>
											<td>{{$index+1}}</td>
											<td>{{$subcategory->parent->name_en}}</td>
											<td>{{$subcategory->parent->name_ar}}</td>
											<td>{{$subcategory->name_en}}</td>
											<td>{{$subcategory->name_ar}}</td>
										</tr>
										@endforeach
                    </tbody>
                  </table>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>

			@endsection
