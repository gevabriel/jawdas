<div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href=# class="simple-text logo-normal">
        <img src="https://raw.githubusercontent.com/gevabriel/assets/main/jawdas.png" alt="" width="180" height="50">
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ route('mahasiswa.index') }}">
              <i class="material-icons">person</i>
              <p>Mahasiswa</p>
            </a>
          </li>
          <li class="nav-item ">
          <li class="nav-item ">
            <a class="nav-link" href="{{ route('jadwal.index') }}">
              <i class="material-icons">library_books</i>
              <p>Jadwal</p>
            </a>
          </li>
            <!-- <li class="nav-item ">
          <li class="nav-item ">
            <a class="nav-link" href="{{ route('kelas.index') }}">
              <i class="material-icons">school</i>
              <p>Kelas Angkatan</p>
            </a>
          </li> -->
          <li class="nav-item ">
          <li class="nav-item ">
            <a class="nav-link" href="{{ route('matkul.index') }}">
              <i class="material-icons">class</i>
              <p>Mata Kuliah</p>
            </a>
          </li>
          <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Master Data
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('kelas.index') }}" style="color: black;">Kelas</a>
              <a class="dropdown-item" href="{{ route('matkul.index') }}" style="color: black;">Matakuliah</a>
              <a class="dropdown-item" href="{{ route('prodi.index') }}" style="color: black;">Program Studi</a>
            </div>
          </li> -->
          <li class="nav-item ">
          <li class="nav-item ">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="material-icons">logout</i>
              <p>Logout</p>
            </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
              </form>
          </li>
        </ul>
      </div>
    </div>