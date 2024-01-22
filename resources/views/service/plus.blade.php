@extends('layouts.app')

@section('content')

<h3><b>Taomlar ro'yxati</b></h3>
<p><i>{{$table}} - Stol uchun buyurtma</i></p>
<hr>

<form action="{{ route('service.order.plussession') }}" method="post">
    @csrf
    @method('POST')
    <input type="hidden" name="table" value="{{ $table }}">
    <div class="row">
        @forelse($new_food as $food)
            <div class="card col-md-2 d-flex m-1 bg-warning" >
                <input type="hidden" name="food[]" value="{{ $food['id'] }}">
                <img src="{{ asset($food['image']) }}"  class="img-thumbnail w-100 my-1" alt="..." >
                <div class="card-body d-flex flex-column align-center justify-content-betwen">
                <h6 class="card-title text-center"><b><i>{{ $food['name'] }}</i></b></h6>
                <p class=""><b><i>Narxi:{{ $food['price'] }} so'm</i></b></p>
                <input type="number" class="form-control" name="count[]" value="0">
                </div>
            </div>
        @empty

        @endforelse
    </div>
    <button class="btn btn-primary"><b><i>Buyurtmani saqlash</b></i></button>
</form>


@endsection
