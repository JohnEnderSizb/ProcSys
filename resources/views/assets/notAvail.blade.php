@extends('home')

@section('styling')
    <style>
        @keyframes click-wave {
            0% {
                height: 20px;
                width: 20px;
                opacity: 0.35;
                position: relative;
            }
            100% {
                height: 200px;
                width: 200px;
                margin-left: -80px;
                margin-top: -80px;
                opacity: 0;
            }
        }

        .option-input {
            -webkit-appearance: none;
            -moz-appearance: none;
            -ms-appearance: none;
            -o-appearance: none;
            appearance: none;
            position: relative;
            top: 8.33333px;
            right: 0;
            bottom: 8.33333;
            left: 0;
            height: 20px;
            width: 20px;
            transition: all 0.15s ease-out 0s;
            background: #cbd1d8;
            border: none;
            color: #fff;
            cursor: pointer;
            display: inline-block;
            margin-right: 0.5rem;
            outline: none;
            position: relative;
            z-index: 1000;
        }
        .option-input:hover {
            background: #9faab7;
        }
        .option-input:checked {
            background: #6be065;
        }
        .option-input:checked::before {
            height: 20px;
            width: 20px;
            position: absolute;
            content: '✔';
            display: inline-block;
            font-size: 13.3333px;
            text-align: center;
            line-height: 20px;
        }
        .option-input:checked::after {
            -webkit-animation: click-wave 0.65s;
            -moz-animation: click-wave 0.65s;
            animation: click-wave 0.65s;
            background: #525252;
            content: '';
            display: block;
            position: relative;
            z-index: 100;
        }
    </style>
    @endsection

@section('content')
    <div class="shadow mb-3 bg-light">
        <nav class="nav nav-pills flex-column flex-sm-row p-2">
            <a class="flex-sm-fill text-sm-center nav-link" href="/assets/home" title="New Internal Requisitions">Pending</a>
            <a class="flex-sm-fill text-sm-center nav-link" href="/assets/collection" title="Ready for collection">Collection</a>
            <a class="flex-sm-fill text-sm-center nav-link" href="/assets/collected" title="Collected assets">Collected</a>
            <a class="flex-sm-fill text-sm-center nav-link active" href="/assets/notAvail" title="Assets marked as not available">Not Available</a>
            <a class="flex-sm-fill text-sm-center nav-link" href="/assets/declined" title="Declined Requests">Declined</a>
        </nav>
    </div>

    <div class="d-flex align-items-center">

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

    <table class="table table-hover table-striped">
        <tr class="bg-info text-white">
            <th>Date</th>
            <th>User</th>
            <th>Position</th>
            <th>Specification</th>
            <th>Description</th>
            <th>Priority</th>
            <th>Due Date</th>
            <th>Mark For Collection</th>
        </tr>
        @foreach($specifications as  $specification)

            <tr id="{{ $specification->id }}">
                <td>{{ $specification->created_at->diffForHumans() }}</td>
                <td>{{ $specification->user->name }}</td>
                <td>{{ $specification->user->profile->jobTitle }}</td>
                <td>{{ $specification->name }}</td>
                <td>{{ $specification->description }}</td>
                <td>{{ $specification->priority }}</td>
                <td>{{ $specification->due_date }}</td>
                <td class="align-content-center text-center pt-2">
                    <button class="btn btn-outline-success" onclick="markForCollection({{ $specification->id }})">
                        <i data-feather="check" ></i>
                    </button>
                </td>
            </tr>

        @endforeach

    </table>

@endsection

@section('scripts')
    <script>
        function markForCollection(currentID) {
            console.log("For Collection " + currentID);
            $.ajax({
                type:'POST',
                url:'/assets/manage/markForCollection',
                data:{
                    theID: currentID,
                },
                success:function(response) {
                    $('#'+ currentID).hide();
                    $.notify("Done!", "success");
                }, error:function () {
                    //error
                    $.notify("An error occured!", "error");
                }
            });
        }
    </script>
    @endsection
