@extends('index')
@section('content')
	<div class="content-wrapper">
		<div class="row">
			<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 style="padding-bottom:30px">Tambah Brand</h4>
                  <form method="post" action="{{action('BrandController@store')}}">
                  	{{ csrf_field() }}
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nama Brand</label>
                          <div class="col-sm-9">
                            <input type="text" name="brand" class="form-control" placeholder="Xiaomi">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Username</label>
                          <div class="col-sm-9">
                            <input type="text" name="username" class="form-control" placeholder="@xiaomiindonesia">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12" style="padding-top: 20px">
                      	<button type="submit" class="btn btn-success mr-2">Tambah</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
		</div>
		
	</div>
@stop
