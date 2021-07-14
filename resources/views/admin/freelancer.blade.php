@extends('admin.layouts.header')

			@section('content')
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
			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"> إدارة المستقلين</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">بيانات المستقلين</h5>
								</div>
								<div class="card-body">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
																			  <th>#</th>
																				<th>Name</th>
                                        <th>الاسم </th>
                                        <th>البريد الالكتروني </th>
                                        <th>التليفون </th>
                                        <th>الحالة </th>
                                        <th>الاعدادات </th>
                                    </tr>
                                    </thead>
                                    <tbody>
																			@foreach($freelancers as $index=>$freelancer)
                                    <tr>
  																			<td>{{$index+1}}</td>
																				<td>{{$freelancer->client->user->name_en}}</td>
                                        <td>{{$freelancer->client->user->name_ar}}</td>
                                        <td>{{$freelancer->client->user->email}}</td>
                                        <td>{{$freelancer->client->phone}}</td>
                                        <td>
																				@if($freelancer->client->user->isActive == 1)
																				مفعل
																				@else
																				غير مفعل
																				@endif
																				</td>
                                        <td>
                                        <a type="button" href="mfreelancer/{{$freelancer->client->user_id}}" class="btn btn-info">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye align-middle"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
																			  </a>
																				@if($freelancer->client->user->isActive != 1)
                                        <a type="button" href="mfreelancer/activate/{{$freelancer->client->user->id}}" class="btn btn-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check align-middle"><polyline points="20 6 9 17 4 12"></polyline></svg>
																			  </a>
																				@endif
																				@if($freelancer->client->user->isActive == 1)
                                        <a type="button" href="mfreelancer/activate/{{$freelancer->client->user->id}}" class="btn btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-slash align-middle"><circle cx="12" cy="12" r="10"></circle><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line></svg>
																				@endif
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
