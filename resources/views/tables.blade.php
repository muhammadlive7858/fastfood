@extends('layouts.app')

@section('content')

<h3><b>Sto'llar ro'yxati</b></h3>
<hr>

<div class="row">
    <div class="card col-md-4" >
        <img src="{{ asset('1.jpg') }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
</div>


@endsection
