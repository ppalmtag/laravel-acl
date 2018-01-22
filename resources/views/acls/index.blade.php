@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">User</th>
                            <th scope="col">Roles</th>
                            <th scope="col">Permissions</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    @foreach($users as $user)
                    <tr><td class="align-top">{{ $user->name }}</td>
                        <td class="align-top">
                            @foreach($roles as $role)
                            <input type="checkbox" @if ($user->hasRole($role)) checked="checked" @endif> {{ $role->name }}<br/>
                            @endforeach
                        </td>
                        <td class="align-top">
                            @foreach($permissions as $permission)
                            <input type="checkbox" @if ($user->hasPermission($permission)) checked="checked" @endif> {{ $permission->name }} <br/>
                            @endforeach
                        </td>
                        <td class="align-bottom">
                            <a class="btn btn-primary" href="{{ route('acls.edit', ['user' => $user->id]) }}" role="button">Edit</a>

                        </td>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
</div>
@endsection
