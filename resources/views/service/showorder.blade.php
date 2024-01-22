@extends('layouts.app')

@section('content')

<h3><b>Taomlar ro'yxati</b></h3>
<p><i>{{$table}} - Stol uchun buyurtma</i></p>
<a href="{{ route('service.order.plus',$table) }}" class="btn btn-primary">Yangi taom qo'shish</a>
<a href="{{ route('service.order.destroy',$table) }}" class="btn btn-danger">Taomlarni tozalash</a>

<hr>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nomi</th>
      <th scope="col">Baxosi</th>
      <th scope="col">Soni</th>
      <th scope="col">Amallar</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $i = 1;
        $summa = 0;
    ?>
        @forelse($newdata as $data)
        <tr>
            <th scope="row">{{ $i }}</th>
            <td>{{ $data['name'] }}</td>
            <td>{{ $data['price'] }}</td>
            <td>{{ $data['count'] }}</td>
            <td>
                <form action="{{  route('service.edit.order') }} " method="get">
                    <input type="hidden" name="table" value="{{ $table }}">
                    <input type="hidden" name="id" value="{{ $data['id'] }}" >
                    <input type="hidden" name="count" value="{{ $data['count'] }}" >

                    <button class="btn btn-primary">Tahrirlash</button>
                </form>
                <form action="{{ route('service.delete.food') }}" method="get">
                    @csrf
                    <input type="hidden" name="table" value="{{ $table }}">
                    <input type="hidden" name="id" value="{{ $data['id'] }}" >
                    <input type="hidden" name="count" value="{{ $data['count'] }}" >

                    <button class="btn btn-danger">O'chirish</button>
                </form>
            </td>
        </tr>
        <?php
            $summa = $summa + ($data['price'] * $data['count']);
            $i++;
        ?>
        @empty

        @endforelse
 
        <thead class="thead-dark">
            <tr>
                <th> - </th>
                <th scope="row">Jami:{{ $i - 1 }}</th>
                <th>Summa:{{ $summa }}</th>
                <th> <a href="{{ route('order.create',$table) }}" class="btn btn-warning">Buyurtmani tugallash</a> </th>
                <th></th>
            </tr>
        </thead>
        
  </tbody>
</table>





@endsection
