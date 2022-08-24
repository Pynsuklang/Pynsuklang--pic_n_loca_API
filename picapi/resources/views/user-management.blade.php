@extends('layouts.dashboard-top')

@section('content2')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card">
                    <div class="card-body" style="overflow-x:auto;">
                        <h5 class="card-title">Default Table</h5>

                        <!-- Default Table -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->user_name }}</td>
                                        <td>{{ $item->user_email }}</td>
                                        <td><button>Edit</button></td>
                                        <td><button>Delete</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Default Table Example -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
