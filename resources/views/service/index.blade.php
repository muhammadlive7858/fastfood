@extends('layouts.app')

@section('content')

<h3><b>Sto'llar ro'yxati</b></h3>
<hr>


<div class="row">
    @forelse($tables as $table)
        <div class="card col-md-2 d-flex m-1 bg-warning" >
            <img src="{{ asset('1.jpg') }}"  class="img-thumbnail w-100 my-1" alt="..." >
            <div class="card-body d-flex flex-column align-center justify-content-betwen">
                <h6 class="text-center"><b><i>{{ $table->table_number }}-stol</i></b></h6>
                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                <a href="{{ route('service.create',$table->table_number) }}" class="btn btn-primary"><small>Buyurtma</small></a>
                <a href="{{ route('service.show.order',$table->table_number) }}" class="btn btn-success"><small>Buyurtmani ko'rish</small></a>
            </div>
        </div>
    @empty

    @endforelse
</div>


@endsection