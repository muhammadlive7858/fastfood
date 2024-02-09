@extends('layouts.app')

@section('content')

<form class="card p-3"> 
  <div class=" form-group">
    <label for="exampleInputEmail1" class="m-2">Sizning (+{{ $phone }}) telefoningizga kod jo'natildi</label>
    <input type="number" class="form-control m-2" id="exampleInputEmail1"  placeholder="Enter kod">
    <small id="emailHelp" class="form-text text-muted m-2">3 daqiqa ichida kodni kiritishingizni so'raymiz</small>
  </div>
  <button type="submit" class="btn btn-primary m-2">Jo'natish</button>
</form>


@endsection
