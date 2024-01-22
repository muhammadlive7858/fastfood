@extends('layouts.app')

@section('content')

<h3><b>Taom yaratish</b></h3>
<hr>

<form method="POST" action="{{ route('food.store') }}" enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1" class="m-1">Taom nomi:</label>
    <input name="name" type="text" class="form-control"  placeholder="" require>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1" class="m-1">Kategoriya tanlash:</label>
    <select name="category" id="" class="form-control">
        <option value="">Tanlash</option>
        @forelse($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @empty

        @endforelse
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1" class="m-1">Taom rasmi:</label>
    <input name="image" type="file" class="form-control"  placeholder="" require>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1 " class="m-1">Malumot</label>
    <!-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"> -->
    <textarea name="description" id="" cols="100" rows="10" class="form-control"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1 " class="m-1">Narx</label>
    <!-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"> -->
    <input type="number" class="form-control" name="price" placeholder="Taom narxi:">
  </div>
  <button type="submit" class="btn btn-primary m-2">Submit</button>
</form>

@endsection