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

					<h1 class="h3 mb-3"> إدارة الاعلانات</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">تفاصيل الإعلان</h5>
								</div>
								<div class="card-body">

	                            <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
										<th>اسم المستخدم</th>
                                        <td>{{$services->user->name_ar}}</td>
                                    </tr>
                                    <tr>
                                        <th>القسم </th>
                                        <td>{{$services->category->name_ar}}</td>
                                    </tr>
                                    <tr>
                                        <th> نوع العمل</th>
                                        <td>{{$services->job_type->type_ar}}</td>
                                    </tr>
                                    <tr>
										<th> العنوان</th>
                                        <td>{{$services->title}}</td>
                                    </tr>
                                    <tr>
										<th> التفاصيل</th>
                                        <td>{{$services->details}}</td>
                                    </tr>
                                    <tr>
										<th> السعر</th>
                                        <td>{{$services->cost_from}} : {{$services->cost_to}}</td>
                                    </tr>
                                    <tr>
										<th> عدد العروض</th>
                                        <td>3</td>
                                    </tr>
                                    <tr>
										<th> الحالة</th>
                                        <td>{{$services->stat->status_ar}}</td>
                                    </tr>
                                    </thead>
                                </table>
								</div>
							</div>
						</div>
					</div>

                    <div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0"> قائمة العروض</h5>
								</div>
								<div class="card-body">

	                            <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
										<th>#</th>
										<th>اسم المستقل</th>
                                        <th>عنوان العرض </th>
                                        <th>تفاصيل العرض</th>
										<th> السعر المقترح</th>
                                    </tr>
                                    </thead>
                                    <tbody>
																		@foreach($offers as $index=>$offer)
																		<tr>
																		<td>{{$index+1}}</td>
                                    <td>{{$offer->user->name_ar}}</td>
                                    <td>{{$offer->title}}</td>
                                    <td>{{$offer->description}}</td>
                                    <td>{{$offer->price}}</td>
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
