@extends('home')

@section('styling')
    <style>
        .responsive-table {
            width: 100%;
            margin-bottom: 1.5em;
            border-spacing: 0;
        }
        @media (min-width: 48em) {
            .responsive-table {
                font-size: .9em;
            }
        }
        @media (min-width: 62em) {
            .responsive-table {
                font-size: 1em;
            }
        }
        .responsive-table thead {
            position: absolute;
            clip: rect(1px 1px 1px 1px);
            /* IE6, IE7 */
            padding: 0;
            border: 0;
            height: 1px;
            width: 1px;
            overflow: hidden;
        }
        @media (min-width: 48em) {
            .responsive-table thead {
                position: relative;
                clip: auto;
                height: auto;
                width: auto;
                overflow: auto;
            }
        }
        .responsive-table thead th {
            background-color: #1d96b2;
            border: 1px solid #1d96b2;
            font-weight: normal;
            text-align: center;
            color: white;
        }
        .responsive-table thead th:first-of-type {
            text-align: left;
        }
        .responsive-table tbody,
        .responsive-table tr,
        .responsive-table th,
        .responsive-table td {
            display: block;
            padding: 0;
            text-align: left;
            white-space: normal;
        }
        @media (min-width: 48em) {
            .responsive-table tr {
                display: table-row;
            }
        }
        .responsive-table th,
        .responsive-table td {
            padding: .5em;
            vertical-align: middle;
        }
        @media (min-width: 30em) {
            .responsive-table th,
            .responsive-table td {
                padding: .75em .5em;
            }
        }
        @media (min-width: 48em) {
            .responsive-table th,
            .responsive-table td {
                display: table-cell;
                padding: .5em;
            }
        }
        @media (min-width: 62em) {
            .responsive-table th,
            .responsive-table td {
                padding: .75em .5em;
            }
        }
        @media (min-width: 75em) {
            .responsive-table th,
            .responsive-table td {
                padding: .75em;
            }
        }
        .responsive-table caption {
            margin-bottom: 1em;
            font-size: 1em;
            font-weight: bold;
            text-align: center;
        }
        @media (min-width: 48em) {
            .responsive-table caption {
                font-size: 1.5em;
            }
        }
        .responsive-table tfoot {
            font-size: .8em;
            font-style: italic;
        }
        @media (min-width: 62em) {
            .responsive-table tfoot {
                font-size: .9em;
            }
        }
        @media (min-width: 48em) {
            .responsive-table tbody {
                display: table-row-group;
            }
        }
        .responsive-table tbody tr {
            margin-bottom: 1em;
        }
        @media (min-width: 48em) {
            .responsive-table tbody tr {
                display: table-row;
                border-width: 1px;
            }
        }
        .responsive-table tbody tr:last-of-type {
            margin-bottom: 0;
        }
        @media (min-width: 48em) {
            .responsive-table tbody tr:nth-of-type(even) {
                background-color: rgba(94, 93, 82, 0.1);
            }
        }
        .responsive-table tbody th[scope="row"] {
            background-color: #1d96b2;
            color: white;
        }
        @media (min-width: 30em) {
            .responsive-table tbody th[scope="row"] {
                border-left: 1px solid #1d96b2;
                border-bottom: 1px solid #1d96b2;
            }
        }
        @media (min-width: 48em) {
            .responsive-table tbody th[scope="row"] {
                background-color: transparent;
                color: #5e5d52;
                text-align: left;
            }
        }
        .responsive-table tbody td {
            text-align: right;
        }
        @media (min-width: 48em) {
            .responsive-table tbody td {
                border-left: 1px solid #1d96b2;
                border-bottom: 1px solid #1d96b2;
                text-align: center;
            }
        }
        @media (min-width: 48em) {
            .responsive-table tbody td:last-of-type {
                border-right: 1px solid #1d96b2;
            }
        }
        .responsive-table tbody td[data-type=currency] {
            text-align: right;
        }
        .responsive-table tbody td[data-title]:before {
            content: attr(data-title);
            float: left;
            font-size: .8em;
            color: rgba(94, 93, 82, 0.75);
        }
        @media (min-width: 30em) {
            .responsive-table tbody td[data-title]:before {
                font-size: .9em;
            }
        }
        @media (min-width: 48em) {
            .responsive-table tbody td[data-title]:before {
                content: none;
            }
        }

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

    <div class="d-flex align-items-center">

        <div class="content-search mr-3">
            <i data-feather="search"></i>
            <input type="search" class="form-control bg-light shadow-sm" placeholder="Search by employee name/Specification...">
        </div>

        <div class="d-none d-md-block">
            <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="printer" class="wd-10 mg-r-5"></i> Print</button>
            <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5"><i data-feather="file" class="wd-10 mg-r-5"></i> Generate Report</button>
        </div>

    </div>
    <hr>

Nostalgia food
        <table class="responsive-table">
            <thead>
            <tr>
                <th>
                    <i data-feather="hash"></i>
                </th>
                <th>Employee</th>
                <th>Specification</th>
                <th>Description</th>
                <th>Priority</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>Approve</th>
                <th>Decline</th>
            </tr>
            </thead>
            <tbody>

            @foreach($specifications as $specification)
                <tr id="{{ $specification->id }}">
                    <td>
                        {{ $specification->id }}
                    </td>
                    <td>
                        <a href="#" title="View more from {{ $specification->user->name }}">
                            {{ $specification->user->name }}
                        </a>
                    </td>
                    <td>
                        <a href="#" title="View more {{ $specification->name }} requests.">
                            {{ $specification->name }}
                        </a>
                    </td>
                    <td>
                        {{ $specification->description }}
                    </td>
                    <td>
                        <a href="#" title="View more {{ $specification->priority }} priority">
                            {{ $specification->priority }}
                        </a>
                    </td>
                    <td>
                        <a href="#" title="View more due on 14/02/2020">
                            {{ $specification->due_date }}
                        </a>
                    </td>
                    <td>
                        {{ $specification->status }}
                    </td>
                    <td class="align-content-center text-center">
                        <button class="btn btn-outline-success" onclick="approve({{ $specification->id }})">
                            <i data-feather="check" ></i>
                        </button>
                    </td>
                    <td class="align-content-center text-center">
                        <button class="btn btn-outline-danger" onclick="decline({{ $specification->id }})" >
                            <i data-feather="x" ></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

@endsection

@section('scripts')
    <script>
        $(".elem-demo").notify("Hello Box");
    </script>
    @endsection
