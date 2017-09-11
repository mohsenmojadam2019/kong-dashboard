@extends('layout')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Update Api Info
        </div>

        <form action="{{ url('/apis', [$id, 'update'], env('HTTPS_ONLY')) }}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field()  }}

            <input type="hidden" name="json" value="{{ base64_encode(json_encode($api))  }}">

            <div class="panel-body">

                @include('default.errors.error')
                @include('default.errors.list')

                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{ $api['name']  }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">URL</label>
                    <input type="text" name="upstream_url" value="{{ $api['upstream_url']  }}" class="form-control">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </div>

        </form>

    </div>
@endsection