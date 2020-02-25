@extends('home')

@section('styling')
    <style>
        @keyframes click-wave {
            0% {
                height: 40px;
                width: 40px;
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
            top: 13.33333px;
            right: 0;
            bottom: 0;
            left: 0;
            height: 40px;
            width: 40px;
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
            background: #5ee038;
        }
        .option-input:checked::before {
            height: 40px;
            width: 40px;
            position: absolute;
            content: '✔';
            display: inline-block;
            font-size: 26.66667px;
            text-align: center;
            line-height: 40px;
        }
        .option-input:checked::after {
            -webkit-animation: click-wave 0.65s;
            -moz-animation: click-wave 0.65s;
            animation: click-wave 0.65s;
            background: #6be065;
            content: '';
            display: block;
            position: relative;
            z-index: 100;
        }
    </style>
    @endsection

@section('content')
    <div class="d-flex align-items-center">

        <button onclick="document.getElementById('changeDetailsForm').style.display='block'">Show Modat Test</button>

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
        <tr class="bg-primary text-white">
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

            <tr>
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
                <form class="modal-content animate" action="profile.php" method="POST">
                    <div class="imgcontainer">
                        <span onclick="document.getElementById('changeDetailsForm').style.display='none'" class="close text-danger font-weight-bold" title="Cancel">&times;</span>
                    </div>
                    <div class="text-center">
                        <h4 style="width: 50%; margin: auto; padding: 3px; padding-bottom:5px" class="bg-primary text-white">Manage</h4> <br>
                    </div>
                    <div class="container">
                        <table class="table table-striped table-bordered">
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

                    <h4 class="text-primary text-center">Actions</h4><hr>
                    <table class="table table-bordered text-center">
                        <tr>
                            <th class="align-content-center pb-3">
                                <form action="">
                                    Approve:
                                    <input type="checkbox" class="option-input checkbox ml-3" name="approveCheckbox" id="approveCheckbox" value="approve"/>
                                    <br>
                                    <button class="btn btn-sm btn-outline-success">Submit</button>
                                </form>
                            </th>
                            <th>
                                Decline:
                                <input type="checkbox" class="option-input checkbox ml-3" id="declineCheckbox" name="declineCheckbox" value="approve"/>
                            </th>
                            <th>
                                Not Available:
                                <input type="checkbox" class="option-input checkbox ml-3" id="notAvailableCheckbox" name="notAvailableCheckbox" value="approve"/>
                            </th>
                        </tr>
                    </table>
                </form>
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

    </script>
    @endsection
