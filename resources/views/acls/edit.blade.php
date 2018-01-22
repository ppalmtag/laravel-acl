@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <h2 class="ml-3">{{ $user->name }}</h2>

                <form action="{{ route('acls.update', ['user' => $user->id]) }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                {{ method_field('PUT') }}

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Roles</th>
                            <th scope="col">Permissions</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tr>
                        <td class="align-top">
                            @foreach($roles as $role)
                            <input type="checkbox" name="roles[{{ $role->name }}]" value ="{{ $role->id }}"> {{ $role->name }}<br/>
                            @endforeach
                        </td>
                        <td class="align-top">
                            @foreach($permissions as $permission)
                            <input type="checkbox" name="permissions[{{ $permission->name }}]" value ="{{ $permission->id }}"> {{ $permission->name }}<br/>
                            @endforeach
                        </td>
                        <td class="align-bottom">
                            <button type="submit" class="btn btn-primary">Speichern</button>
                        </td>
                    </tr>

                </table>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
