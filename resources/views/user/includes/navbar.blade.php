<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#"><img src="" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
          <img src="https://raw.githubusercontent.com/gevabriel/assets/main/jawdas.png" alt="" width="135" height="40" >
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('/mahasiswas') }}">Beranda<span class="sr-only"></span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('/rancangan/create') }}">Tambah Kelas<span class="sr-only"></span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('rancangan.index') }}">Rancangan Jadwal<span class="sr-only"></span></a>
        </li>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Mahasiswa
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('rancangan.index') }}">Kartu Rencana Studi</a>
            <a class="dropdown-item" href="{{ url('/nilais') }}">Kartu Hasil Studi</a>
            <a class="dropdown-item" href="{{ url('/absens') }}">Absensi</a>
          </div>
        </li> -->
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form> 
         </li>
      </ul>
    </div>
  </nav>
  <!-- end navbar -->