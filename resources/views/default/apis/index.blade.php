@extends('layout')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            APIs
        </div>
        <div class="panel-body">

            @include('default.messages.message')

            <table class="table table-striped table-responsive">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>URL</th>
                        <th>Https</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($apis as $api)
                        @include("default.apis.api-row", ['api' => $api])
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection