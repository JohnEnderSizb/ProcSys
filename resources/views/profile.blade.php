@extends('home')

@section('styling')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .form {
            background: #000;
        }
    </style>
@endsection

@section('content')
    <div class="container bootstrap snippet">
        <div class="row">
            <div class="col-sm-10"><h1>{{ auth()->user()->name }}</h1></div>
            <div class="col-sm-2">
                <a href="#" class="pull-right">
                    <img title="profile image" class="img-circle img-responsive" src="/profile/darth.jpg" style="height: 100px; width: 100px">
                </a>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-3" style="display: none"><!--left col-->
                <div class="text-center">
                    <img src="/profile/darth.jpg" class="avatar img-circle img-thumbnail" style="height: 40px; height: 40px" alt="avatar">
                    <h6>Upload a different photo...</h6>
                    <input type="file" class="text-center center-block file-upload form-control-file">
                </div>
            </div><!--/col-3-->
            <div class="col-sm-12">
                <form class="form" method="POST" action="/profile/update">
                    @csrf

                    <div class="form-group">

                        <div class="col-xs-6">
                            <label for="last_name">Employee Number</label>
                            <input type="text" class="form-control" name="employeenumber" id="employeenumber" placeholder="Emoloyee Number" title="enter your employee number" value="{{ $profile->employeenumber }}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="jobTitle" class="form-label">Job Title</label>
                            <input type="text" name="jobTitle" placeholder="Job Title" class="form-control field-style" title="enter your job title" value="{{ $profile->jobTitle }}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12 mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" id="address" class="form-control " placeholder="Address" title="enter your mobile address" value="{{ $profile->address }}">
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-xs-6">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="select-css form-control field-style" name="gender" required title="select your gender" value="{{ $profile->gender }}">
                                <option value="">Choose Gender</option>
                                <option value="male" >Male</option>
                                <option value="female" >Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-xs-6">
                            <label for="mobilenumber" class="form-label">Mobile Number</label>
                            <input type="tel" name="mobilenumber" placeholder="Mobile Number" class="form-control field-style" required title="enter your mobile number" value="{{ $profile->mobilenumber }}">
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-xs-6">
                            <label for="officenumber" class="form-label">Office Number</label>
                            <input type="text" name="officenumber" placeholder="Office Number" class="form-control field-style" required required title="enter your office number" value="{{ $profile->officenumber }}">
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-xs-6">
                            <label for="location" class="form-label">Location</label> <br>
                            <select class="select-css form-control field-style" name="location" required style="width: 250px" title="select your location">
                                <option value="">Choose Location</option>
                                <option value="1" >Branch Bindura</option>
                                <option value="2" >Branch Bulawayo Inala</option>
                                <option value="3" >Branch Bulawayo Jason Moyo</option>
                                <option value="4" >Branch Bulawayo 8th Ave</option>
                                <option value="5" >Branch Chegutu</option>
                                <option value="6" >Branch Chinhoyi</option>
                                <option value="7" >Branch Chiredzi</option>
                                <option value="8" >Branch Gokwe</option>
                                <option value="9" >Branch Gwanda</option>
                                <option value="10" >Branch Gweru</option>
                                <option value="11" >Branch Hwange</option>
                                <option value="12" >Branch Karoi</option>
                                <option value="13" >Branch Kopje</option>
                                <option value="14" >Branch Marondera</option>
                                <option value="15" >Branch Gweru</option>
                                <option value="16" >Branch Marondera</option>
                                <option value="17" >Branch Masvingo</option>
                                <option value="18" >Branch Mutare</option>
                                <option value="19" >Branch Mvurwi</option>
                                <option value="20" >Branch Nelson Mandela</option>
                                <option value="21" >Branch Westgate</option>
                                <option value="22" >Hq Administration</option>
                                <option value="23" >Hq Central Clearing Unit Bulawayo</option>
                                <option value="24" >Hq Chief Executive </option>
                                <option value="25" >Hq Corporate Banking </option>
                                <option value="26" >Hq Debt Recoveries </option>
                                <option value="27" >Hq  E Banking &amp; Communications </option>
                                <option value="28" >Hq  Executive Banking Agrigold</option>
                                <option value="29" >Hq  Financial Accounting</option>
                                <option value="30" >Hq  Credit Department</option>
                                <option value="31" >Hq Human Resources</option>
                                <option value="32" selected>Hq  Information Comm Tech</option>
                                <option value="33" >Hq  Legal &amp; Compliance </option>
                                <option value="34" >Hq  Local Dealing</option>
                                <option value="35" >Hq  Premises</option>
                                <option value="36" >Hq  Procurement</option>
                                <option value="37" >Hq  Risk Management</option>
                                <option value="38" >Hq  Strategy,marketing &amp; Business</option>
                                <option value="39" >Hq  Trade Finance &amp; Exchange Contr</option>
                                <option value="40" >Hq  Treasury Back Office</option>
                                <option value="41" >Hq  Banking Operations</option>
                                <option value="42" >Microfinance Chiredzi</option>
                                <option value="43" >Microfinance Filabusi</option>
                                <option value="44" >Microfinance Gokwe</option>
                                <option value="45" >Microfinance Gwanda</option>
                                <option value="46" >Microfinance Maphisa</option>
                                <option value="47" >Microfinance Mutoko</option>
                                <option value="48" >Microfinance Sanyati</option>
                                <option value="49" >Nbo Binga</option>
                                <option value="50" >Nbo Checheche</option>
                                <option value="51" >Nbo Chipinge</option>
                                <option value="52" >Nbo Chivi</option>
                                <option value="53" >Nbo Filabusi</option>
                                <option value="54" >Nbo Guruve</option>
                                <option value="55" >Nbo Gutu</option>
                                <option value="56" >Nbo Jerera</option>
                                <option value="57" >Nbo Kotwa</option>
                                <option value="58" >Nbo Lupane</option>
                                <option value="59" >Nbo Magunje</option>
                                <option value="60" >Nbo Maphisa</option>
                                <option value="61" >Nbo Mataga</option>
                                <option value="62" >Nbo Mt Darwin</option>
                                <option value="63" >Nbo Mubaira</option>
                                <option value="64" >Nbo Murambinda</option>
                                <option value="65" >Nbo Murehwa</option>
                                <option value="66" >Nbo Mutoko</option>
                                <option value="67" >Nbo Nyanga</option>
                                <option value="68" >Nbo Nyika</option>
                                <option value="69" >Nbo Rusape</option>
                                <option value="70" >Nbo Rushinga</option>
                                <option value="71" >Nbo Wedza</option>
                                <option value="72" >Nbo Zvishane</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-xs-6">
                            <label for="supervisor" class="form-label">Supervisor Email:</label>
                            <input type="email" name="supervisor" placeholder="example@agribank.co.zw" class="form-control field-style" title="enter your supervisor's email address, if any" value="{{ $profile->supervisor }}">
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-xs-6">
                            <label for="authorisations" class="form-label">Number of Authorisations: </label>
                            <input type="number" name="authorisations" placeholder="Number of Authorisations" class="form-control field-style" required title="enter number of authentication levels" value="{{ $profile->authorisations }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <br>
                            <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                        </div>
                    </div>
                </form>
        </div><!--/col-9-->
    </div><!--/row-->
@endsection

@section('scripts')

    @endsection
