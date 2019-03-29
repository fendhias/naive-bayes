@extends('index')
@section('content')
  <div class="content-wrapper">
	<div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <div class="row" style="padding-bottom: 20px">
                    <div class="col-md-10">
                      <h4>Pilih Brand Untuk diklasifikasi</h4>
                    </div>
                  </div>
                  <div class="fluid-container">
                    <form method="POST" action="{{action('KlasifikasiController@klasifikasi')}}">
                      {{ csrf_field() }}
                      <div class="row">
                      	<div class="col-md-3">
                          <select class="form-control" name="brand1">
                            <option value="" disabled selected hidden>Pilih Brand</option>
                            @foreach($brand as $item)
                              <option value="{{$item->brand}}">{{$item->brand}}</option>
                            @endforeach
                          </select>
                      	</div>
                      	<div class="col-md-3">
                      		<select class="form-control" name="brand2">
                            <option value="" disabled selected hidden>Pilih Brand</option>
                            @foreach($brand as $item)
                              <option value="{{$item->brand}}">{{$item->brand}}</option>
                            @endforeach
                          </select>
                      	</div>
                      	<div class="col-md-3">
                      		<select class="form-control" name="brand3">
                            <option value="" disabled selected hidden>Pilih Brand</option>
                            @foreach($brand as $item)
                              <option value="{{$item->brand}}">{{$item->brand}}</option>
                            @endforeach
                          </select>
                      	</div>
                      	<div class="col-md-3">
                      		<select class="form-control" name="brand4">
                            <option value="" disabled selected hidden>Pilih Brand</option>
                            @foreach($brand as $item)
                              <option value="{{$item->brand}}">{{$item->brand}}</option>
                            @endforeach
                          </select>
                      	</div>
                        <div class="col-md-5"></div>
                        <div class="col-md-2" style="padding-top: 20px">
                        <button type="submit" class="btn btn-icons btn-rounded btn-primary" style="width: 100px;height: 100px">Analisis
                        </button>
                      </div>
                      <div class="col-md-5"></div>
                      </div>
                    </form>
                  </div>

                </div>
              </div><br>
          </div>

         </div>
       </div>
@stop