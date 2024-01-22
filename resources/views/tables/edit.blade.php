@extends('layouts.app')

@section('content')

<h3><b>Stolni tahrirlash</b></h3>
<hr>
<form method="POST" action="{{ route('table.update',$table->id) }}">
    @method('PUT')
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1" class="m-1">Stol raqami:</label>
    <input name="table_number" type="text" class="form-control"  placeholder="" require value="{{ $table->table_number }}">
  </div>
  <button type="submit" class="btn btn-primary m-2">Submit</button>
</form>


@endsection