@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="panel panel-default">
                    <div class="panel-heading">Create a Feed</div>

                    <div class="panel-body">

                        <form method="POST" action="{{ route('feeds.store') }}" class="form-horizontal">
                            {{ csrf_field() }}

                            <div class="form-group {{ $errors->has('url') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">URL</label>

                                <div class="col-md-6">
                                    <input type="text" name="url" value="{{ old('url', request('url')) }}" class="form-control" required />

                                    @if ($errors->has('url'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('url') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button class="btn btn-primary">Create</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
