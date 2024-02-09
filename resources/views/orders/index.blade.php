@extends('layouts.app')

@section('content')


<div class="pagetitle">
  <h1>Hisobotlar sahifasi:</h1>
  <div class="table-responsive">
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First </th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
            </tbody>
        </table>
  </div>
</div><!-- End Page Title -->





@endsection