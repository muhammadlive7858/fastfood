@extends('layouts.app')

@section('content')

<div class="alert alert-danger" role="alert">
  {{ $message }}
</div>
<a href="{{ route('user.index') }}" class="btn btn-success">Malumotlarni to'ldirish</a>
@if($phone)
    <a href="{{ route('verify.phone') }}" class="btn btn-danger">Telefon raqamni tekshirish</a>
@endif


@endsection
