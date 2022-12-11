@extends('layouts.admin')
@section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{ asset($profile->image->url) }}" alt="" class="img-fluid rounded-circle">
                    </div>
                    <div class="col-md-9">
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                            </tr>
                            <tr>
                                <td>
                                    {{ $profile->name }}
                                </td>
                                <td>
                                    {{ $profile->email }}
                                </td>
                                <td>
                                    {{ $profile->phone }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
