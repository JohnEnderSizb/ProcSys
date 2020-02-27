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
            <a class="flex-sm-fill text-sm-center nav-link active" href="/assets/collection" title="Ready for collection">Collection</a>
            <a class="flex-sm-fill text-sm-center nav-link" href="/assets/collected" title="Collected assets">Collected</a>
            <a class="flex-sm-fill text-sm-center nav-link" href="/assets/notAvail" title="Assets marked as not available">Not Available</a>
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
            <th>Status</th>
            <th>View</th>
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
                <td>{{ $specification->status }}</td>
                <td class="align-content-center text-center pt-2">
                    <a href="#" class="" title="Manage" onclick="manage({{ $specification->id }})">
                        <i data-feather="edit" style="color: #0168f8"></i>
                    </a>
                </td>
            </tr>

        @endforeach

    </table>


    <div id="changeDetailsForm" class="modal container-fluid">
        <div class= "row">
            <div class="col-lg-1 col-md-1 col-sm-12 col-sm-12">
            </div>
            <div class="col-lg-10 col-md-10 col-sm-12 col-sm-12">
                <div class="modal-content animate">
                    <div class="imgcontainer">
                        <span onclick="document.getElementById('changeDetailsForm').style.display='none'" class="close text-danger font-weight-bold" title="Cancel">&times;</span>
                    </div>
                    <div class="text-center">
                        <h4 style="width: 50%; margin: auto; padding: 3px; padding-bottom:5px" class="bg-primary text-white">Mark As Collected</h4> <br>
                    </div>
                    <div class="container table-responsive-lg">
                        <table class="table table-sm table-striped table-bordered">
                            <tr>
                                <th>Date</th>
                                <th>User</th>
                                <th>Position</th>
                                <th>Specification</th>
                                <th>Description</th>
                                <th>Priority</th>
                                <th>Due Date</th>
                                <th>Status</th>
                            </tr>
                            <tr>
                                <td id="date"></td>
                                <td id="user"></td>
                                <td id="position"></td>
                                <td id="specification"></td>
                                <td id="description"></td>
                                <td id="priority"></td>
                                <td id="due_date"></td>
                                <td id="status"></td>
                            </tr>
                        </table>
                    </div>

                    <h4 class="text-primary text-center">Options</h4><hr>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-sm-12">
                                <h5 class="text-center">
                                    <button class="btn btn-outline-info" onclick="document.getElementById('user-password').style.display='block'">User Password</button>
                                </h5>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-sm-12">
                                <h5 class="text-center">
                                    <button class="btn btn-outline-info" onclick="document.getElementById('scan-code').style.display='block'">Scan QR-Code</button>
                                </h5>
                                <p class="ml-3" style="display: none">
                                    <img class="card-img-right flex-auto d-none d-md-block" style="" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')
                                            ->size(300)->errorCorrection('H')->color(64, 64, 173)
                                            ->generate("Food")) !!} ">
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-12 col-sm-12">
            </div>
        </div>
    </div>

    <div class="modal container-fluid" id="user-password">
        <div class= "row">
            <div class="col-lg-1 col-md-1 col-sm-12 col-sm-12">
            </div>
            <div class="col-lg-10 col-md-10 col-sm-12 col-sm-12">
                <div class="modal-content animate">
                    <div class="imgcontainer">
                        <span onclick="document.getElementById('user-password').style.display='none'" class="close text-danger font-weight-bold" title="Cancel">&times;</span>
                    </div>
                    <br>
                    <div style="width: 80%; margin: auto" class="mt-3 mb-3 text-center">
                        <h3 class="text-dark">Enter Your Password</h3>
                        <br>
                        <div class="jello animated illustration mb-3">
                            <img src="/logo.png" alt="" style="height: 90px" class="rounded-circle shadow">
                        </div>

                        <div class="form-group">
                            <input style="width: 80%; margin: auto" class="form-control" type="password" name="password" id="password" placeholder="Password">
                        </div>

                        <div class="form-group">
                            <br>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-12 col-sm-12">
            </div>
        </div>
    </div>


    <div class="modal container-fluid" id="scan-code">
        <div class= "row">
            <div class="col-lg-1 col-md-1 col-sm-12 col-sm-12">
            </div>
            <div class="col-lg-10 col-md-10 col-sm-12 col-sm-12">
                <div class="modal-content animate">
                    <div class="imgcontainer">
                        <span onclick="document.getElementById('scan-code').style.display='none'" class="close text-danger font-weight-bold" title="Cancel">&times;</span>
                    </div>
                    <br>
                    <div style="width: 80%; margin: auto" class="mt-3 mb-3 text-center">
                        <h3 class="text-white bg-primary" style="width: 50%; margin: auto">Scan Qr-Code</h3>
                        <br>

                        <div>
                            <img class=""  src="data:image/png;base64, {!! base64_encode(QrCode::format('png')
                                ->size(300)->errorCorrection('H')->color(64, 64, 173)
                                ->generate(session('currentQR') ? : "food")) !!} ">
                        </div>

                        <br>
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-12 col-sm-12">
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    var currentID;
    <script>
        function manage(theId) {
            currentID = theId;

            $.ajax({
                type:'POST',
                url:'/assets/manage/show',
                data:{
                    theID: currentID,
                },
                success:function(response) {
                    //success
                    specification = response.specification
                    console.log(specification);
                    $('#date').text(specification.due_date);
                    $('#specification').text(specification.name);
                    $('#user').text(response.userName);
                    $('#position').text(response.jobTitle);
                    $('#description').text(specification.description);
                    $('#priority').text(specification.priority);
                    $('#due_date').text(specification.due_date);
                    $('#status').text(specification.status);
                }, error:function () {
                    //error
                    alert("An Error Occured");
                }
            });

           document.getElementById('changeDetailsForm').style.display='block';
        }


        $("#approveCheckbox").change(function() {
            if(this.checked) {
                $("#declineCheckbox").prop("checked", false);
                $("#notAvailableCheckbox").prop("checked", false);
                $('#decline-submit').hide();
                $('#na-submit').hide();
                $('#approve-submit').show();
            }
            else {
                $('#approve-submit').hide();
            }
        });

        $("#declineCheckbox").change(function() {
            if(this.checked) {
                $("#approveCheckbox").prop("checked", false);
                $("#notAvailableCheckbox").prop("checked", false);
                $('#decline-submit').show();
                $('#na-submit').hide();
                $('#approve-submit').hide();
            }
            else {
                $('#decline-submit').hide();
            }
        });

        $("#notAvailableCheckbox").change(function() {
            if(this.checked) {
                $("#declineCheckbox").prop("checked", false);
                $("#approveCheckbox").prop("checked", false);
                $('#decline-submit').hide();
                $('#approve-submit').hide();
                $('#na-submit').show();
            }
            else {
                $('#na-submit').hide();
            }
        });

        function  approve() {
            console.log("Approve " + currentID);
            $.ajax({
                type:'POST',
                url:'/assets/manage/approve',
                data:{
                    theID: currentID,
                },
                success:function(response) {
                    //success
                    console.log(response.status);
                    $('#changeDetailsForm').hide('fast');
                    $('#'+ currentID).hide();
                }, error:function () {
                    //error
                    alert("An Error Occured");
                }
            });

        }

        function decline() {
            console.log("Decline " + currentID);
            reason = $("#reason").val().trim();

            if(reason == ""){
                return;
            }

            $.ajax({
                type:'POST',
                url:'/assets/manage/decline',
                data:{
                    theID: currentID,
                    reason: reason,
                },
                success:function(response) {
                    //success
                    console.log(response.status);
                    $('#changeDetailsForm').hide('fast');
                    $('#'+ currentID).hide();
                }, error:function () {
                    //error
                    alert("An Error Occured");
                }
            });
        }

        function notAvailable() {
            console.log("Decline " + currentID);
            console.log("Approve " + currentID);
            $.ajax({
                type:'POST',
                url:'/assets/manage/notAvailable',
                data:{
                    theID: currentID,
                },
                success:function(response) {
                    //success
                    console.log(response.status);
                    $('#changeDetailsForm').hide('fast');
                    $('#'+ currentID).hide();
                }, error:function () {
                    //error
                    alert("An Error Occured");
                }
            });
            console.log("Not Available " + currentID);
        }

    </script>
    @endsection
