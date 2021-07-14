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

					<h1 class="h3 mb-3"> الشكاوي و المقترحات</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">الشكاوي و المقترحات</h5>
								</div>
								<div class="card-body">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
										<th>#</th>
                                        <th>اسم المستخدم</th>
										<th>العنوان</th>
                                        <th>التفاصيل</th>
                                     
                                    </tr>
                                    </thead>
                                    <tbody>
									@foreach($feedbacks as $index=>$feedback)
                                    <tr>
										<td>{{$index+1}}</td>
										<td>{{$feedback->user->name_en}}</td>
                                        <td>{{$feedback->title}}</td>
                                        <td>{{$feedback->description}}</td>
                                       
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
