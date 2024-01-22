@extends('layouts.app')

@section('content')

<h3><b>Kategoriya tahrirlash</b></h3>
<hr>
<form method="POST" action="{{ route('category.update',$category->id) }}">
    @method('PUT')
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1" class="m-1">Kategoriya nomi:</label>
    <input name="name" type="text" class="form-control"  placeholder="" require value="{{ $category->name }}">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1 " class="m-1">Malumot</label>
    <!-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"> -->
    <textarea name="description" id="" cols="100" rows="10" class="form-control">{{ $category->description }}</textarea>
  </div>
  <button type="submit" class="btn btn-primary m-2">Submit</button>
</form>


@endsection