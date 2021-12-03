@extends('layouts.adminapp')

@section('content')
<div class="row">
    <div class="container-lg">
        <div class="p-4 justify-content">
            <div class="shadow-lg px-3 pb-3 mb-5 bg-white rounded">
                <form method="GET" action="{{route('searchUsers')}}"class="col-md-12 p-0 m-0">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-11 p-3 mb-2 bg-primary text-white rounded">
                                <input class="form-control" type="text" value ="searchusers" name="searchusers" placeholder="Search User">
                            </div>
                            <div class="col-md-1 p-3">
                                <button type="submit" class="btn btn-primary mb-2">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
                {{-- Users Table --}}
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Reputation</th>
                        <th scope="col">Delete User</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->reputation}}</td>
                            <td>
                                <form method="post" action="{{ route('deleteUser', $user->id) }}" >
                                    @method('DELETE')
                                    @csrf
                                    <input class="btn btn-warning" type="submit" value="Delete" />
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>

@endsection

