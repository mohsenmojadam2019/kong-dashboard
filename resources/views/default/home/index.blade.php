@extends('layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <form method="POST" action="{{ url('/apis',[], env('HTTPS'))  }}">

                {{ csrf_field()  }}

                <div class="panel panel-default">

                    <div class="panel-heading">
                        Kong API
                    </div>

                    <div class="panel-body">

                        <div class="form-group">
                            <label for="">Api Admin Link</label>
                            <input value="{{ env('KONG_API_URL')  }}" type="text" name="link" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </div>

                </div>
            </form>

        </div>
    </div>
@endsection
