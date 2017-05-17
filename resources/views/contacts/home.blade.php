@extends('layouts.master')

@section('content')

<!-- content -->

<div class="container">
    <div class="row">
        @include('includes.sidebar')
        <div class="col-md-9">
            <div class="container-fluid">
                <div class="row">
                    <img src="{{url('images/contact.png')}}" class="img-responsive">
                </div>
            </div>


            <!-- Set the first background image using inline CSS below. -->

            <div class="thumbnail">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1>Welcome to Contacts Management Application</h1>
                        <p class="lead">Latest records are shown below!!</p>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
                @endforeach
            </div> <!-- end .flash-message -->


            @if (count($contacts)=== 0)
            <div class="alert alert-info">
                <strong>Info!</strong> Please create contacts!
            </div>
            @endif

            <div class="panel panel-default">



                <table class="table">
                    @foreach ($contacts as $contact)

                    <tr id="contact-{{$contact->id}}">
                        <td class="middle">
                            <div class="media">
                                <div class="media-left">

                                    <div class="wrapper">
                                        <img class="img-responsive" src="{{url('images/address_book.png')}}" alt="...">
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">{{ $contact->name}} 
                                        | 
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                        {{$contact->phone }}
                                        | <i class="fa fa-envelope" aria-hidden="true"></i> {{ $contact->email }}
                                    </h4>
                                    <address>
                                        <strong>Company</strong> <i class="fa fa-building" aria-hidden="true"></i>
                                        <strong>{{ $contact->company }}</strong> <br>

                                        <strong>Address</strong> <i class="fa fa-address-card" aria-hidden="true"></i>
                                        {{ $contact->address }}<br>
                                        <!--<strong>DOB</strong> <i class="fa fa-birthday-cake" aria-hidden="true"></i>{{ $contact->dob }} ({{$contact->age}})-->
                                        <br>
                                    </address>
                                </div>
                            </div>
                        </td>
                        <td width="130" class="middle">
                            <div>
                                <a href="{{url('contacts/edit/'.$contact->id)}}"  class="btn btn-circle btn-primary btn-default btn-xs" title="Edit">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                                <a href="{{url('contacts/show/'.$contact->id)}}" class="btn btn-circle btn-default btn-xs" title="View">
                                    <i class="fa fa-eye"></i>
                                </a>



                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>            

            </div>





        </div>

    </div>
    @endsection

