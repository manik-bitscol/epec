@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-2">

                <div class="card mt-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <img class="img-fluid text-center rounded-circle" src="{{ asset($team->image->url) }}"
                                    alt="">
                            </div>
                            <div class="col-md-10">
                                <table class="table text-center table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Designation</th>
                                            <th>Education</th>
                                            <th>Phone 1</th>
                                            <th>Phone 2</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $team->name }}
                                            </td>
                                            <td>{{ $team->designation }}</td>
                                            <td>{{ $team->degreee }}</td>
                                            <td>{{ $team->phone_number_1 }}</td>
                                            <td>{{ $team->phone_number_2 }}</td>


                                        </tr>

                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-2">
                                <table class="table table-bordered">

                                    <tbody>
                                        <tr>
                                            <th>Facebook Account</th>
                                            <td>{{ $team->facebook_account }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Whats App Account</th>
                                            <td>{{ $team->whatsapp_account }}</td>
                                        </tr>
                                        <tr>
                                            <th>Instagram Account</th>
                                            <td>{{ $team->instagram_account }}</td>
                                        </tr>
                                        <tr>
                                            <th>Twitter Account</th>
                                            <td>{{ $team->twitter_account }}</td>
                                        </tr>
                                        <tr>
                                            <th>LinkedIn Account</th>
                                            <td>{{ $team->linkedin_account }}</td>
                                        </tr>
                                        <tr>

                                            <th>Email Account 1</th>
                                            <td>{{ $team->email_1 }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email Account 2</th>
                                            <td>{{ $team->email_2 }}</td>
                                        </tr>


                                    </tbody>

                                </table>
                            </div>
                            <div class="col-12">
                                <h2>About - {{ $team->name }}</h2>
                                <p>
                                    <td>{!! $team->description !!}</td>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
