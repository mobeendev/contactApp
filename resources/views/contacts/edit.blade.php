@extends('layouts.master')

@section('content')

<!-- content -->
<div class="container">
    <div class="row">

        @include('includes.sidebar')


        <div class="col-md-9">

                @if ($contact===null)
                <div class="alert alert-danger">
                    <strong>Info!</strong> You are not allowed to update other's contacts!
                </div>
                @else


            <div class="panel panel-default">
                <form class="form-horizontal" role="form" novalidate method="POST"  action="{{route('contacts/update')}}">
                    <div class="panel-heading">
                        <strong>Edit Contact</strong>
                    </div>           
                    <div class="panel-body">
                        {{ csrf_field() }}

                        <input type="hidden" name="contact_id" value="{{$contact->id}}">

                        <div class="form-horizontal">
                            <div class="row">
                                <div class="col-md-10">

                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-3 control-label">Name</label>

                                        <div class="col-md-8">
                                            <input type="text" name="name" value="{{ old('name', $contact->name)}}" id="name" class="form-control">

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
                                            <input type="text" disabled="disabled" name="email" value="{{ old('email', $contact->email)}}" id="email" class="form-control">

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
                                            <input type="text" name="dob" value="{{ old('dob', $contact->dob)}}" id="dob" class="form-control">

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
                                            <input type="text" name="company" value="{{ old('company', $contact->company)}}" id="company" class="form-control">

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
                                            <input type="text" name="phone" value="{{ old('phone', $contact->phone)}}" id="phone" class="form-control">

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
                                            <textarea name="address" id="address" rows="3" class="form-control">{{ old('address', $contact->address)}}</textarea>

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
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="{{url('/contacts/all')}}" class="btn btn-default">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

                @endif;
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
