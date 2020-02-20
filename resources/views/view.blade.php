@extends('home')

@section('styling')
    <link rel="stylesheet" href="css/index_blade.css">
    <style>
        table{
            background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23007CB2%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207'),
            linear-gradient(to bottom, #ffffff 0%,#e5e5e5 100%);
            background-repeat: no-repeat, repeat;
            background-position: right .7em top 50%, 0 0;
            background-size: .65em auto, 100%;
        }
    </style>

    @endsection

@section('content')

    <table class="table table-striped bg-light">
        <thead>
            <tr>
                <th>#</th>
                <th>Specification</th>
                <th>Description</th>
                <th>Priority</th>
                <th>Due Date</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>

        @foreach($specifications as $specification)

            <tr>
                <td>{{ $specification->id }}</td>
                <td>{{ $specification->name }}</td>
                <td>{{ $specification->description }}</td>
                <td>{{ $specification->priority }}</td>
                <td>{{ $specification->due_date }}</td>
                <td>{{ $specification->status }}</td>
            </tr>
            @endforeach

        </tbody>
    </table>

    <br>

    <div>
        <h3 class="text-primary">Actions</h3>
    </div>

@endsection

@section('scripts')

    @endsection


