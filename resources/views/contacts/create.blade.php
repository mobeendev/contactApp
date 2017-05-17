@extends('layouts.master')

@section('content')

<!-- content -->
<div class="container">
    <div class="row">

        @include('includes.sidebar')


        <div class="col-md-9">

            <div class="panel panel-default">
                <form class="form-horizontal" role="form" novalidate method="POST" action="{{ route('contacts/save') }}">
                    <div class="panel-heading">
                        <strong>Add Contact</strong>
                    </div>           
                    <div class="panel-body">
                        {{ csrf_field() }}

                        <div class="form-horizontal">
                            <div class="row">
                                <div class="col-md-10">

                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-3 control-label">Name</label>

                                        <div class="col-md-8">
                                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                            @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-3 control-label">E-Mail Address</label>

                                        <div class="col-md-8">
                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                            @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                                        <label for="dob" class="col-md-3 control-label">Date of Birth</label>

                                        <div class="col-md-8">
                                            <input id="dob" type="text" class="form-control" name="dob" value="{{ old('dob') }}" required autofocus>

                                            @if ($errors->has('dob'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('dob') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
                                        <label for="company" class="col-md-3 control-label">Company/Organization</label>

                                        <div class="col-md-8">
                                            <input id="company" type="text" class="form-control" name="company" value="{{ old('company') }}" required autofocus>

                                            @if ($errors->has('company'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('company') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                        <label for="phone" class="col-md-3 control-label">Phone</label>

                                        <div class="col-md-8">
                                            <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}">

                                            @if ($errors->has('phone'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                        <label for="address" class="control-label col-md-3">Address</label>

                                        <div class="col-md-8">
                                            <textarea name="address" id="address" rows="3" class="form-control">{{ old('address') }}</textarea>

                                            @if ($errors->has('address'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-6">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <a href="{{url('/contacts')}}" class="btn btn-default">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>

<script>
    $('#dob input').datepicker({
        format: "1111-11-11",
        todayBtn: true
    });
</script>

@endsection
