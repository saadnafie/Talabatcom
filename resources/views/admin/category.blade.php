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

					<h1 class="h3 mb-3"> إدارة الأقسام</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">بيانات الأقسام</h5>
								</div>
								<div class="card-body">
								<!-- Button to Open the Modal -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  اضافة قسم
</button>
<br><br>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
	  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <h5 class="modal-title" id="exampleModalLabel">اضافة قسم جديد</h5>

      </div>
      <div class="modal-body">
	  <form method="post">
			@csrf
			<div class="form-group">
			<label for="cat">Department Name</label>
			<input type="text" class="form-control" name="categorynameen" id="cat" required>
		</div>
	  <div class="form-group">
    <label for="cat">اسم القسم</label>
    <input type="text" class="form-control" name="categorynamear" id="cat" required>
 	</div>
	<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadio1" checked>
  <label class="form-check-label" for="flexRadio1">
  قسم
  </label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadio2">
  <label class="form-check-label" for="flexRadio2">
    قسم فرعي
  </label>
</div>
<br>
<div class="form-group" id="subc" style="display:none">
	<label>اسم القسم الفرعي</label>
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

			<script>
			$(document).ready(function(){
			$("#flexRadio1").click(function(){
			$("#subc").hide();
			});
			$("#flexRadio2").click(function(){
			$("#subc").show();
			});
			});
			</script>

    </div>
  </div>
</div>
	<table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
									<th>#</th>
																			<th>Department</th>
                                        <th>القسم </th>
                                        <th> الغئات الرئيسية</th>
                                    </tr>
                                    </thead>
                                    <tbody>
										@foreach($categories as $index=>$category)
									<tr>
											<td>{{$index+1}}</td>
											<td>{{$category->name_en}}</td>
											<td>{{$category->name_ar}}</td>
											<td>
											@foreach($category->child as $subIndex=>$sub_category)
											{{$subIndex+1}} - {{$sub_category->name_ar}} - {{$sub_category->name_en}}
											<br>
											@endforeach
											</td>
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
