@extends('layouts.app')

@section('content')
    <div class="page-title-box">
        <div class="row">
            <div class="col-sm-11">
                <h2>Lead Details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('leads.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $lead->first_name }} {{ $lead->last_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{--{{ $lead->detail }}--}}
            </div>
        </div>
    </div>
@endsection