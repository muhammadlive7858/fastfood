@extends('layouts.app')

@section('content')

<h3><b>Taomni tahrirlash</b></h3>
<hr>
<form method="POST" action="{{ route('chef.update',$chef->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
  <div class="form-group">
    <label for="exampleInputEmail1" class="m-1">Taom nomi:</label>
    <input name="name" type="text" class="form-control"  placeholder="" require value="{{ $chef->name }}">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1" class="m-1">Taom rasmi:</label>
    <input name="image" type="file" class="form-control"  placeholder="" require>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1 " class="m-1">Malumot</label>
    <!-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"> -->
    <textarea name="description" id="" cols="100" rows="10" class="form-control">{{ $chef->description }}</textarea>
  </div>
  <button type="submit" class="btn btn-primary m-2">Submit</button>
</form>


@endsection