@extends('layouts.master')

@section('content')

<!-- content -->
<div class="container">
    <div class="row">

        @include('includes.sidebar')


        <div class="col-md-9">

      

            <div class="panel panel-success">
                <form class="form-horizontal" role="form" novalidate method="GET" action="{{ route('contacts/search') }}">
                    <div class="panel-heading">
                        <strong>Search Contact</strong>
                    </div>  
                    <div class="panel-body">

                        <div class="form-horizontal">
                            <div class="row">
                                <div class="col-md-10">

                                    <div class="form-group">
                                        <label for="name" class="control-label col-md-3">Search Here</label>
                                        <div class="col-md-8">
                                            <input type="text" placeholder="Search for Name or Company or Email" name="keyword" id="keyword" class="form-control">
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
                                        <button type="submit" class="btn btn-primary">Search</button>
                                        <a href="{{url('/contacts/all')}}" class="btn btn-default">Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>




        </div>

    </div>

    <!--<123123123-->
    <div class="row">

        <div class="col-md-9 col-md-push-3">


            <div class="panel panel-default">
                @if (count($contacts))
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

                                <a href="{{url('contacts/delete/'.$contact->id)}}" class="btn  delete-task btn-circle btn-danger btn-xs" id="{{$contact->id}}" title="delete">
                                    <i class="glyphicon glyphicon-remove"></i>
                                </a>
                                <a href="{{url('contacts/show/'.$contact->id)}}" class="btn btn-circle btn-default btn-xs" title="View">
                                    <i class="fa fa-eye"></i>
                                </a>



                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>            
                @endif
            </div>
            @if (count($contacts))
            <div class="text-center">
                <nav>
                    <div class="pagination"> {{ $contacts->appends(['keyword'=>$keyword])->links() }} </div>
                </nav>
            </div>
            @endif
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
