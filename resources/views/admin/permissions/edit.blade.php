@extends('admin.master')


@section('main-content')

<h2>Edit permission</h2>

<form id="create-form" style="width: 50%; margin: 3em auto;" action="{{ $url }}" method="POST">

    @csrf
    @method('PUT')

    <div class="form-row" style="display: flex; justify-content: center">

        <div class="form-group col-md-6">
          <label for="name">Action</label>
          <input type="text" class="form-control" id="name" value="{{ $permission->action }}" name="action">
        </div> 
  
    </div>

   <div class="mt-5" style="display: flex; justify-content: center">
       <button type="submit" 
       style="background-color: #28a745; border: 1px solid #28a745; border-radius: 5%; color: white; padding: 1em">
       Edit permission</button>
   </div>


  </form>


@endsection