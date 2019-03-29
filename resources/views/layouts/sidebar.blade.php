<ul class="nav">
  <li class="nav-item nav-profile">
    <div class="nav-link">
      <!-- <form method="POST" action="{{ action('TwitterController@unduh') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn btn btn-success btn-rounded btn-fw btn-block">
        <i class="mdi mdi-cloud-download"></i>Unduh Tweet</button>
      </form> -->
    </div>
  </li>                          
  <li class="nav-item">
    <a class="nav-link" href="{{ URL('/') }}">
      <i class="menu-icon mdi mdi-television"></i>
      <span class="menu-title">Beranda</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ URL('/brand') }}" >
      <i class="menu-icon mdi mdi-cloud-download"></i>
      <span class="menu-title">Unduh Brand</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ URL('/daftar_tweet') }}" >
      <i class="menu-icon mdi mdi-twitter-box"></i>
      <span class="menu-title">Daftar Tweet</span>
    </a>
  </li>
  <!-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-chart-gantt"></i>
              <span class="menu-title">Data Latih</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="{{ URL('/data_latih_positif') }}">Positif</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ URL('/data_latih_negatif') }}">Negatif</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ URL('/data_latih_netral') }}">Netral</a>
                </li>
              </ul>
            </div>
          </li> -->
  <li class="nav-item">
    <a class="nav-link" href="{{ URL('/hasil_preprocessing') }}">
      <i class="menu-icon mdi mdi-broom"></i>
      <span class="menu-title">Hasil Preprocessing</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ URL('/analisis') }}">
      <i class="menu-icon mdi mdi-chart-line"></i>
      <span class="menu-title">Analisis</span>
    </a>
  </li>          
</ul>