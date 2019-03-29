@extends('index')
@section('content')
<div class="content-wrapper">
	<div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <div class="row" style="padding-bottom: 20px">
                    <div class="col-md-10">
                      <h4>Daftar Tweet Hasil Preprocessing</h4>
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
                        <p>{{ $tweet->preprocessing }}</p>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div><br>

            <div class="pagination">
                {!! $tweets->render() !!} 
            </div>
          </div>
         </div>
       </div>
@stop