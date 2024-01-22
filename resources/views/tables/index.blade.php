@extends('layouts.app')

@section('content')

<h3><b>Stol ro'yxati</b></h3>
<hr>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Raqami</th>
      <th scope="col">Amallar</th>
    </tr>
  </thead>
  <tbody>
    @forelse($tables as $table)
        <tr>
            <th scope="row" >1</th>
            <td class="w-25">{{ $table->table_number }} - Stol</td>
            <td class="d-flex">
                <a href="{{ route('table.edit',$table->id) }}" class="btn btn-success mx-1">Tahrirlash</a>
                <form action="{{ route('table.destroy',$table->id) }}" method="POst">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger mx-1">O'chirish</button>
                </form>
            </td>
        </tr>
    @empty

    @endforelse
  </tbody>
</table>




@endsection