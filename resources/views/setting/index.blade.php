@extends('layouts.app')

@section('content')


<div class="pagetitle">
  <h1>Sozlamalar sahifasi:</h1>
  {{ $location->countryName }}
  <div>
    <form action="{{ route('setting.update',$setting->id) }}" method="POST" class="row">
        @csrf
        <label for=""  class="col-md-7">
            <span>Kashbek foizi:</span>
            <input class="form-control" type="number" name="cashback" value="{{ $setting->cashback }}">
        </label>
        <label for="" class="col-md-7">
            <span>Sahifalash soni:</span>
            <input class="form-control" type="number" name="pagination" value="{{ $setting->pagination }}">
        </label>
        <label for="" class="col-md-7">
            <span><b>Joylashuvingiz kenglik:</b>{{ $location->latitude }}</span>
            <input class="form-control" type="number" name="location_lat" value="{{ $setting->location_lat }}">
        </label>
        <label for="" class="col-md-7">
            <span><b>Joylashuvi uzunlik:</b>{{ $location->longitude }}</span>
            <input class="form-control" type="number" name="location_lang" value="{{ $setting->location_lang }}">
        </label>
        <p style="color:red">Kenglik va uzunlik telegram bot ximoyalanishi uchun zarur!</p>
        <button class="btn btn-primary col-md-1">Saqlash</button>
    </form>
  </div>
</div><!-- End Page Title -->





@endsection