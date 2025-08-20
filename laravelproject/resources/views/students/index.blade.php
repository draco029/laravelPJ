@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">
        <h2>Student Infromation</h2>
    </div>
    <div class="card-body">
      @if(session('message'))
      <div class="alert alert-success">
      {{session('message')}}
</div>
@endif
        <a href="{{url('students/create')}}" class="btn btn-success btn-sm">Add New <i class="fa fa-plus"></i></a>
        <div class="table-responsive mt-2">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Mobile</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $get)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$get->name}}</td>
                        <td>{{$get->address}}</td>
                        <td>{{$get->mobile}}</td>
                        <td>
                            <a href="{{url('students/'.$get->id)}}" class="btn btn-sm btn-primary">View</a>
                            <a href="{{url('students/'.$get->id.'/edit')}}" class="btn btn-sm btn-primary">Edit</a>
                            <form method="POST" action="{{ url('students/' . $get->id) }}" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button onclick="return confirm('Confirm Delete');" class="btn btn-sm btn-primary">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
              {{$students->links()}};
           </div>  
         
        </div>
    </div>
</div>

@endsection