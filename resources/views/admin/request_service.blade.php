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
									<h5 class="card-title mb-0">إدارة الاعلانات</h5>
								</div>
								<div class="card-body">

	<table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
										<th>#</th>
										<th>اسم المستخدم</th>
                                        <th>القسم </th>
                                        <th> نوع العمل</th>
										<th> العنوان</th>
										<th> التفاصيل</th>
										<th> السعر</th>
										<th> عدد العروض</th>
										<th>الاعدادات </th>
                                    </tr>
                                    </thead>
                                    <tbody>
																			@foreach($services as $index=>$service)
																		<tr>
																		   	<td>{{$index+1}}</td>
																				<td>{{$service->user->name}}</td>
																				<td>{{$service->category->name}}</td>
																				<td>{{$service->job_type->type}}</td>
																				<td>{{$service->title}}</td>
																				<td>{{Str::limit($service->details,30)}}</td>
																				<td>{{$service->cost_from}} : {{$service->cost_to}}</td>
																				<td>3</td>
																				<td>
																				<a type="button" href="mrequestservice/{{$service->id}}" class="btn btn-info">
																				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye align-middle"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
																			</a>
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
