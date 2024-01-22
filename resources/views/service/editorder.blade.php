@extends('layouts.app')

@section('content')

<h3><b>Taomni tahrirlash</b></h3>
<hr>

<form action="{{ route('service.update.order') }}" method="post">
    @csrf
    @method('POST')
    <div class="row">
            <div class="card col-md-2 d-flex m-1 bg-warning" >
                <input type="hidden" name="table" value="{{ $table }}">
                <input type="hidden" name="food" value="{{ $food->id }}">
                <img src="{{ asset($food->image) }}"  class="img-thumbnail w-100 my-1" alt="..." >
                <div class="card-body d-flex flex-column align-center justify-content-betwen">
                <h6 class="card-title text-center"><b><i>{{ $food->name }}</i></b></h6>
                <p class=""><b><i>Narxi:{{ $food->price }} so'm</i></b></p>
                <input type="number" class="form-control" name="count" value="{{ $count }}">
                </div>
            </div>
    </div>
    <button class="btn btn-primary"><b><i>O'zgarishni saqlash</b></i></button>
</form>


@endsection
