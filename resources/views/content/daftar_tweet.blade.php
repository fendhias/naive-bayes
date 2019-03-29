@extends('index')
@section('content')
<div class="content-wrapper">
	<div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <div class="row" style="padding-bottom: 30px">
            <div class="col-md-10">
              <h4>Daftar Tweet yang diambil</h4>
            </div>
            <div class="col-md-2">
              <form method="GET" action="{{ action('TwitterController@bersihkan') }}">
                <button type="submit" class="btn btn-outline-danger btn-sm">
                <i class="mdi mdi-delete"></i>Bersihkan</button>
              </form>
            </div>
          </div>
          <div class="fluid-container"> 
            @foreach($tweets as $tweet)                   
            <div class="row ticket-card mt-3" style="padding-bottom: 20px">
              <div class="col-md-1">
                <img class="img-sm rounded-circle mb-4 mb-md-0" src="images/faces/face.jpg" alt="profile image">
              </div>
              <div class="ticket-details col-md-9">
                <div class="d-flex">
                  <p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap">{{ $tweet->username }} :</p>
                </div>
                <p>{{ $tweet->tweet }}</p>
                <div class="row text-gray d-md-flex d-none">
                  <div class="col-4 d-flex">
                    <small class="mb-0 mr-2 text-muted">Tanggal :</small>
                    <small class="Last-responded mr-2 mb-0 text-muted">{{ $tweet->date_tweet }}</small>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div><br>

      <div class="row">
          <div class="col-md-5"></div>
            <div class="col-md-2">
              <div class="panel-body text-center">
                <form method="post" action="{{action('PreprocessingController@preprocessing')}}">
                  {{ csrf_field() }}
                      <button type="submit" class="btn btn-icons btn-rounded btn-primary" style="width: 100px;height: 100px">Processing
                          </button>
                      </form>
                  </div>
            </div>
          <div class="col-md-5"></div>
      </div>

          <div class="card">
            <div class="card-body">
              <div class="float-right">
                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                  <div class="btn-group" role="group" aria-label="First group">
                    <button type="button" class="btn btn-primary">1</button>
                    <button type="button" class="btn btn-light">2</button>
                    <button type="button" class="btn btn-light">3</button>
                  </div>
                  <div class="btn-group" role="group" aria-label="Second group">
                    <button type="button" class="btn btn-light">5</button>
                    <button type="button" class="btn btn-light">6</button>
                  </div>
                  <div class="btn-group" role="group" aria-label="Third group">
                    <button type="button" class="btn btn-light">8</button>
                  </div>
                </div>
              </div> 
            </div>
          </div>                 
    </div>
            <div class="pagination">
                {!! $tweets->render() !!} 
            </div>
  </div>
</div>
@stop