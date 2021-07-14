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

					<h1 class="h3 mb-3"> إدارة المحتوي</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">إدارة المحتوي</h5>
								</div>
								<div class="card-body">
                                <div class="row">
                                @foreach($pages as $value)
                                <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                     <center>
                                    <a href="#">{{$value->page}}</a>
                                    </center>
                                    </div>
                                </div>
                                </div>
                                @endforeach
                                </div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>

			@endsection
