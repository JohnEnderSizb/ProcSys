@extends('home')

@section('styling')
    <link rel="stylesheet" href="/css/index_blade.css">

    <style>
        table {
            background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23007CB2%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207'),
            linear-gradient(to bottom, #ffffff 0%,#e5e5e5 100%);
            background-repeat: no-repeat, repeat;
            background-position: right .7em top 50%, 0 0;
            background-size: .65em auto, 100%;
        }
    </style>
    @endsection

@section('content')
    <div class="shadow mb-3 bg-light">
        <nav class="nav nav-pills flex-column flex-sm-row p-2">
            <a class="flex-sm-fill text-sm-center nav-link" href="/home" title="New Internal Requisitions">Pending</a>
            <a class="flex-sm-fill text-sm-center nav-link" href="/home/approved" title="Ready for collection">Approved</a>
            <a class="flex-sm-fill text-sm-center nav-link active" href="/home/collected" title="Collected assets">Collected</a>
            <a class="flex-sm-fill text-sm-center nav-link" href="/home/rejected" title="Rejected requests">Rejected</a>
        </nav>
    </div>

        <div class="d-flex align-items-center">
            <h6 class="mg-b-0 tx-spacing--1 mr-5">
                <a href="/profile/specification/create">
                    <button class="btn btn-outline-primary trigger" onclick="toggleModal()">NEW</button>
                </a>
            </h6>


            <div class="content-search mr-3">
                <i data-feather="search"></i>
                <input type="search" class="form-control bg-light shadow-sm" placeholder="Search...">
            </div>


            <div class="d-none d-md-block">
                <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="printer" class="wd-10 mg-r-5"></i> Print</button>
                <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5"><i data-feather="file" class="wd-10 mg-r-5"></i> Generate Report</button>
            </div>

        </div>
        <hr>

        <table>
            <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Specification</th>
                <th>Description</th>
                <th>Priority</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>View</th>
            </tr>
            </thead>
            <tbody>
            @foreach($specifications as $specification)
                <tr>
                    <td>{{ $specification->id }}</td>
                    <td>{{$specification->created_at->diffForHumans()}}</td>
                    <td>{{ $specification->name }}</td>
                    <td>{{ $specification->description }}</td>
                    <td>{{ $specification->priority }}</td>
                    <td>{{ $specification->due_date }}</td>
                    <td>{{ $specification->status }}</td>
                    <td class="align-content-center text-center">
                        <a href="/specifications/{{ $specification->id }}/view" title="View Lorem ipsum dolor sit amet, consectetur adipisicing elit. 13/07/2020">
                            <i data-feather="eye" style="color: #0168f8"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
@endsection

@section('scripts')

    @endsection
