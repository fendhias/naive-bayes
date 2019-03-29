@extends('index')
@section('content')
	<div class="content-wrapper">
		<div class="row" style="padding-bottom:10px">
	        <div class="col-md-6">
	          <h4>Daftar Brand yang akan diunduh</h4>
	        </div>
	        <div class="col-md-6 pull-right">
	        	<a href="brand/create" class="btn btn-success pull-right"><i class="mdi mdi-plus-circle"></i>Tambah Brand</a>
            </div>
		</div>
		@foreach(array_chunk($brands, 2) as $oke)
			<div class="row">
				@foreach($oke as $brand)			
		            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 grid-margin stretch-card">
		              <div class="card card-statistics">
		                <div class="card-body">
		                  <div class="clearfix">
		                    <div class="float-left">
		                      <i class="mdi mdi-cellphone-iphone text-success icon-lg"></i>
		                    </div>
		                    <div class="float-right">
		                      <p class="mb-0 text-right">{{ $brand->username}}</p>
		                      <div class="fluid-container">
		                        <h3 class="font-weight-medium text-right mb-0">{{ $brand->brand}}</h3>
		                      </div>
		                    </div>
		                  </div>
		                  <div>
	                        <div class="rounded-button float-right">
		                    	<form action="{{ route('brand.destroy', $brand->id) }}" method="post">
		                            {{ csrf_field() }}
		                            {{ method_field('DELETE') }}
		                            <button type="submit" class="btn btn-icons btn-rounded btn-danger">
			                        <i class="mdi mdi-delete"></i>
			                    	</button>
		                        </form>
	                    	</div>
		                  	<div class="rounded-button float-right"  style="padding-right: 10px">
		                  		<a href="{{ URL::to('brand/' . $brand->id . '/edit') }}" class="btn btn-icons btn-rounded btn-success">
		                        <i class="mdi mdi-pencil"></i>
		                        </a>
	                        </div>
                        </div>
		                </div>
		              </div>
		            </div>	          
		        @endforeach
	        </div>
          @endforeach

		<div class="row">
			<div class="col-md-5"></div>
			<div class="col-md-2">
				<div class="panel-body text-center">
					<form method="post" action="{{action('TwitterController@unduh')}}">
						{{ csrf_field() }}
		            <button type="submit" class="btn btn-icons btn-rounded btn-warning" style="width: 100px;height: 100px">Unduh
                    </button>
                </form>
		        </div>
			</div>
			<div class="col-md-5"></div>
		</div>

	</div>
	
@stop