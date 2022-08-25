@extends('layouts.dashboard-top')
@section('content2')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card">
                    <div class="card-body" style="overflow-x:auto;">
                        <h5 class="card-title">Disabled Users</h5>
                        <!-- Default Table -->
                        <table class="table" id="mytabledis">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="sel_usrs_all_dis" /></th>
                                    <th scope="col">#</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Edit Permission</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                    <tr>
                                        <td><input type="checkbox" class="sel_usrs_dis" data-id="{{ $item->id }}"></td>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->user_name }}</td>
                                        <td>{{ $item->user_email }}</td>
                                        <td>
                                            <input name="permisn" id="permisn" class="btn-tog-disable" type="checkbox"
                                                data-toggle="toggle" data-on="Enabled" data-off="Disabled"
                                                data-onstyle="success" data-offstyle="danger" data-id="{{ $item->id }}">
                                        </td>
                                        <td><button>Delete</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <input name="btn_all_enab" id="btn_all_enab" type="button" value="Enable Selected">
                        </table>
                        <!-- End Default Table Example -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
