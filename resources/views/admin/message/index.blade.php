@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-body">

                        <h3>Visitor Messages</h3>
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>SI</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($messages as $message)
                                    <tr>
                                        <td>{{ $messages->firstItem() + $loop->index }}</td>
                                        <td class="text-capitalize">{{ $message->name }}</td>
                                        <td class="text-capitalize">{{ $message->phone }}</td>
                                        <td class="text-capitalize">{{ $message->email }}</td>
                                        <td class="text-capitalize">{{ $message->message }}</td>

                                    </tr>
                                @empty
                                    No Message Found
                                @endforelse

                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                {{ $messages->links() }}
                            </ul>
                        </nav>
                    </div>


                </div>
            </div>

        </div>
    </div>
@endsection
