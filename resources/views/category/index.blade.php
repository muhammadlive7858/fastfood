@extends('layouts.app')

@section('content')

<h3><b>Kategoriya ro'yxati</b></h3>
<hr>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nomi</th>
      <th scope="col">Malumot</th>
      <th scope="col">Amallar</th>
    </tr>
  </thead>
  <tbody>
    @forelse($categories as $category)
        <tr>
            <th scope="row" >1</th>
            <td class="w-25">{{ $category->name }}</td>
            <td class="w-50">{{ $category->description }}</td>
            <td class="d-flex">
                <a href="{{ route('category.edit',$category->id) }}" class="btn btn-success mx-1">Tahrirlash</a>
                <form action="{{ route('category.destroy',$category->id) }}" method="POst">
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