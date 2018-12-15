@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
    @if(session()->get('success'))
        <div class="alert alert-success">
        {{ session()->get('success') }}  
        </div><br />
    @endif
    <div class="card">
        <ul class="nav nav-pills card-header-pills">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('share.create') }}">ADD Share</a>
            </li>
        </ul>
    </div>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Stock Name</td>
          <td>Stock Price</td>
          <td>Stock Quantity</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($shares as $share)
        <tr>
            <td>{{$share->id}}</td>
            <td>{{$share->share_name}}</td>
            <td>{{$share->share_price}}</td>
            <td>{{$share->share_qty}}</td>
            <td><a href="{{ route('share.edit',$share->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('share.destroy', $share->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection