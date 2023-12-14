@extends('user.layouts.login')

@section('content')
<div id="jumbotron">
    <div class="container">
      <div class="row d-flex"> 
        <div class="col-md-7 text-white text-center align-self-center">
          <p class="mb-4"><strong>JAWDAS</strong></p>
          <hr>
          <p>JADWAL CERDAS</p>
        </div>
        <div class="col-md-5">
          <div class="login">
          <img src="https://raw.githubusercontent.com/gevabriel/assets/main/jawdas-biru.png" alt="" width="170" height="50" style="display: block; margin-left: auto; margin-right: auto;">
            <h3 class="text-center">LOGIN</h3>
            @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
            @endif
            <form class="user" action="{{route('login2')}}" method="post">
            @csrf
              <div class="form-group">
                <input type="text" name="username" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="NIM">
              </div>
              <div class="form-group">
                <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
              </div>
              <button type="submit" class="btn btn-primary">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- end jumbotron -->
@endsection