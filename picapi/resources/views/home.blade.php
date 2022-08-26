@extends('layouts.dashboard-top')

@section('content2')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card">
                    <div class="card-body" style="overflow-x:auto;">
                        <h5 class="card-title">Datas</h5>
                        <!-- Default Table -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Latitude</th>
                                    <th scope="col">Longitude</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">File Uploaded</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dets as $item)
                                    <tr>
                                        <td>{{ $item->user_name }}</td>
                                        <td>{{ $item->user_email }}</td>
                                        <td>{{ $item->latitude_data }}</td>
                                        <td>{{ $item->longitude_data }}</td>
                                        <td><a href="https://maps.google.com/?q={{ $item->latitude_data }},{{ $item->longitude_data }}"
                                                target="_blank">Get
                                                Location</a></td>
                                        <td><a href="/myfiles/{{ $item->file_location }}" target="_blank">Click Here To Download</a>
                                        </td>
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
