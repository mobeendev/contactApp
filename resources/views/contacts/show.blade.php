@extends('layouts.master')

@section('content')

<!-- content -->
<div class="container">

    <div class="row">
        @include('includes.sidebar')

        <div class="col-md-9">
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
                @endforeach
            </div> <!-- end .flash-message -->


            <div class="panel panel-default">


                <div class="container">
                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-8  toppad" >


                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title">{{$contact->name}}</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="{{url('images/address_book.png')}}" class="img-circle img-responsive"> </div>

                                        <div class=" col-md-9 col-lg-9 "> 
                                            <table class="table table-user-information">
                                                <tbody>
                                                    <tr>
                                                        <td>Company:</td>
                                                        <td>{{$contact->company}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Date of Birth:</td>
                                                        <td>{{$contact->dob}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Age</td>
                                                        <td>{{$contact->age}}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Email</td>
                                                        <td><a href="mailto:info@support.com">{{$contact->email}}</a></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Gender</td>
                                                        <td>Female</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Home Address</td>
                                                        <td>{{$contact->address}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Phone Number</td>
                                                        <td>{{$contact->phone}}
                                                        </td>

                                                    </tr>

                                                </tbody>
                                            </table>

                                            <a href="{{url('contacts/all')}}" data-original-title="Back" data-toggle="tooltip" type="button" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i></a>
                                            <a href="{{url('contacts/edit/'.$contact->id)}}" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn  btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                                            <a href="{{url('contacts/delete/'.$contact->id)}}" data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
</div>
@endsection

