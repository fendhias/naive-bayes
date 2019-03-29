@extends('index')
@section('content')
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <div class="row" style="padding-bottom: 20px">              
              <div class="col-md-9">
                <h4>Hasil Analisis Tweet</h4>
                <div id="graph"></div>
              </div>
              <div class="col-md-3" style="padding-top: 50px">
                <div class="row" style="padding-bottom: 20px">
                  <div class="col-md-2">
                    <div class="square" style="height: 25px; width: 25px; background-color: #0b62a4;"></div>
                  </div>
                  <div class="col-md-10">Positif</div>
                </div>
                <div class="row" style="padding-bottom: 20px">
                  <div class="col-md-2">
                    <div class="square" style="height: 25px; width: 25px; background-color: #7a92a3;"></div>
                  </div>
                  <div class="col-md-10">Netral</div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <div class="square" style="height: 25px; width: 25px; background-color: #4da74d;"></div>
                  </div>
                  <div class="col-md-10">Negatif</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop

@section('javascript_chart')
    <script type="text/javascript">
        
        Morris.Bar({
      element: 'graph',
      data: [
        {x: "<?php echo $brands['brand1']; ?>", y: "<?php echo $klasifikasi[0]; ?>", z: "<?php echo $klasifikasi[1]; ?>", a: "<?php echo $klasifikasi[2]; ?>"},
        {x: "<?php echo $brands['brand2']; ?>", y: "<?php echo $klasifikasi[3]; ?>", z: "<?php echo $klasifikasi[4]; ?>", a: "<?php echo $klasifikasi[5]; ?>"},
        {x: "<?php echo $brands['brand3']; ?>", y: "<?php echo $klasifikasi[6]; ?>", z: "<?php echo $klasifikasi[7]; ?>", a: "<?php echo $klasifikasi[8]; ?>"},
        {x: "<?php echo $brands['brand4']; ?>", y: "<?php echo $klasifikasi[9]; ?>", z: "<?php echo $klasifikasi[10]; ?>", a: "<?php echo $klasifikasi[11]; ?>"},
      ],
      xkey: 'x',
      ykeys: ['y', 'z', 'a'],
      labels: ['Positif', 'Netral', 'Negatif']
    }).on('click', function(i, row){
      console.log(i, row);
    });

    </script>
@stop