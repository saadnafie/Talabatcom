@extends('admin.layouts.header')

			@section('content')

			<main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">بيانات المستقل</h1>

					</div>
					<div class="row">
						<div class="col-md-4 col-xl-3">
							<div class="card mb-3">
								<div class="card-header">
									<h5 class="card-title mb-0">الحساب الشخصي</h5>
								</div>
								<div class="card-body text-center">
									<img src="{{url('admin/img/avatars/user.png')}}" alt="Christina Mason" class="img-fluid rounded-circle mb-2" width="60" height="60" />
									<h5 class="card-title mb-0">{{$freelancerDetails->client->user->name_ar}}	</h5>
									<div class="text-muted mb-0">{{$freelancerDetails->client->nationality->name_ar}}</div>
									<div class="text-muted mb-0">{{$freelancerDetails->comp_indv_name}}</div>
									<div class="text-muted mb-0">
									@if($freelancerDetails->client->gender == 'm')
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
										<li class="mb-1"><span data-feather="phone" class="feather-sm me-1"></span> {{$freelancerDetails->client->phone}}</li>

										<li class="mb-1"><span data-feather="mail" class="feather-sm me-1"></span> {{$freelancerDetails->client->user->email}}	</li>
										<li class="mb-1"><span data-feather="map-pin" class="feather-sm me-1"></span> {{$freelancerDetails->client->city->name_ar}} - {{$freelancerDetails->client->city->country->name_ar}}</li>
									</ul>
									</div>
									<hr class="my-0" />
									<div class="card-body text-center">
										@if($freelancerDetails->client->user->isActive == 1)
										<a class="btn btn-danger btn-sm" href="activate/{{$freelancerDetails->client->user->id}}">إيقاف الحساب</a>
										@else
										<a class="btn btn-success btn-sm" href="activate/{{$freelancerDetails->client->user->id}}">تنشيط الحساب</a>
										@endif
										@if($freelancerDetails->isAccept == 0)
										<a class="btn btn-success btn-sm" href="accept/{{$freelancerDetails->id}}">الموافقة علي الطلب</a>
										@endif
						  		</div>
							  	<hr class="my-0" />
							  	<div class="card-body text-center">
									<h5 class="h6 card-title">الملفات</h5><br>
									<a href="#">{{$freelancerDetails->certificates_file}}</a>
									<a href="#">{{$freelancerDetails->experiences_file}}</a>

							</div>

							</div>
						</div>

						<div class="col-md-8 col-xl-9">
							<div class="card">
								<div class="card-header">

									<h5 class="card-title mb-0">خدمات المستقل</h5>
								</div>
								<div class="card-body h-100">

								<table class="table table-striped table-bordered">
                  <thead>
                    <tr>
										<th>#</th>
										<th> العنوان</th>
										<th> السعر</th>
										<th>الاعدادات </th>
                    </tr>
                    </thead>
                  <tbody>
									@foreach($freelancerServices as $index=>$freelancerService)
									<tr>
									<td>{{$index+1}}</td>
									<td>{{$freelancerService->title}}</td>
									<td>{{$freelancerService->price}}</td>
									<td>
									@include('admin.show_freelancer_details_modal')
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
