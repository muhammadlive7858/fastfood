@extends('layouts.app')

@section('content')

<h3><b>Oshpazlar ro'yxati</b></h3>
<hr>

<div class="row">
@forelse($chefs as $chef)
    <div class="card col-md-3">
    <img class="card-img-top img-thumbnail" style="" src="{{ $chef->image }}" alt="Card image cap">
    <div class="card-body">
        <h4 class="card-title">{{ $chef->name }}</h4>
        <p class="card-text">{{ $chef->description }}.</p>
    </div>
    <div class="row">
        <a href="{{ route('chef.edit',$chef->id) }}" class="btn btn-primary col-md-6 mx-2 my-1">Tahrirlash</a>
        <form action="{{ route('chef.destroy',$chef->id) }}" method="post" class="col-md-5 my-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">O'chirish</button>
        </form>
    </div>
    </div>
@empty

@endforelse
</div>


@endsection