@extends('layouts.app')

@section('content')

<h3><b>Taomlar ro'yxati</b></h3>
<hr>

<div class="row">
@forelse($foods as $food)
    <div class="card col-md-3">
    <img class="card-img-top img-thumbnail" style="" src="{{ $food->image }}" alt="Card image cap">
    <div class="card-body">
        <h4 class="card-title">{{ $food->name }}</h4>
        <p class="card-text">{{ $food->description }}.</p>
    </div>
    <div class="card-body">
        <span class="card-title bold">Narxi:{{ $food->price }}</span>
    </div>
    <div class="row">
        <a href="{{ route('food.edit',$food->id) }}" class="btn btn-primary col-md-6 mx-2 my-1">Tahrirlash</a>
        <form action="{{ route('food.destroy',$food->id) }}" method="post" class="col-md-5 my-1">
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