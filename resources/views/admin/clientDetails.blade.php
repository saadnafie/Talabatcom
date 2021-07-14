@extends('admin.layouts.header')

			@section('content')

			<main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">بيانات العميل</h1>

					</div>
					<div class="row">
						<div class="col-md-4 col-xl-3">
							<div class="card mb-3">
								<div class="card-header">
									<h5 class="card-title mb-0">الحساب الشخصي</h5>
								</div>
								<div class="card-body text-center">
									<img src="{{url('admin/img/avatars/user.png')}}" alt="Christina Mason" class="img-fluid rounded-circle mb-2" width="60" height="60" />
									<h5 class="card-title mb-0">{{$clientDetails->user->name_ar}}	</h5>
									<div class="text-muted mb-0">{{$clientDetails->nationality->name_ar}}</div>
									<div class="text-muted mb-0">
									@if($clientDetails->gender == 'm')
                  ذكر
									@else
                  انثي
									@endif
									</div>
									<span data-feather="star" class="feather-sm me-1"></span> {{$total}}
								</div>

								<hr class="my-0" />
								<div class="card-body">
									<h5 class="h6 card-title">بيانات التواصل</h5><br>
									<ul class="list-unstyled mb-0">
										<li class="mb-1"><span data-feather="phone" class="feather-sm me-1"></span> {{$clientDetails->phone}}</li>

										<li class="mb-1"><span data-feather="mail" class="feather-sm me-1"></span> {{$clientDetails->user->email}}	</li>
										<li class="mb-1"><span data-feather="map-pin" class="feather-sm me-1"></span> {{$clientDetails->city->name_ar}} - {{$clientDetails->city->country->name_ar}}</li>

									</ul>
									</div>
									<hr class="my-0" />
									<div class="card-body text-center">
										@if($clientDetails->user->isActive == 1)
										<a class="btn btn-danger btn-sm" href="activate/{{$clientDetails->user->id}}">إيقاف الحساب</a>
										@else
										<a class="btn btn-success btn-sm" href="activate/{{$clientDetails->user->id}}">تنشيط الحساب</a>
										@endif
								</div>

							</div>
						</div>

						<div class="col-md-8 col-xl-9">
							<div class="card">
								<div class="card-header">

									<h5 class="card-title mb-0">إعلانات العميل</h5>
								</div>
								<div class="card-body h-100">

								<table class="table table-striped table-bordered">
                  <thead>
                    <tr>
										<th>#</th>
                    <th>القسم </th>
										<th> العنوان</th>
										<th> السعر</th>
										<th> الحالة</th>
										<th>الاعدادات </th>
                    </tr>
                    </thead>
                  <tbody>
									@foreach($services as $index=>$service)
									<tr>
									<td>{{$index+1}}</td>
									<td>{{$service->category->name_ar}}</td>
									<td>{{$service->title}}</td>
									<td>{{$service->cost_from}} : {{$service->cost_to}}</td>
									<td>{{$service->stat->status_ar}}</td>
									<td>
									@include('admin.show_client_details_modal')
									<button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye align-middle"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
								</button>
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
