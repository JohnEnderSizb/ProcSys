@extends('home')

@section('styling')

    <style>
        .select-css {
            display: block;
            font-size: 16px;
            font-family: sans-serif;
            font-weight: 700;
            color: #444;
            line-height: 1.3;
            padding: .6em 1.4em .5em .8em;
            width: 100%;
            max-width: 100%;
            box-sizing: border-box;
            margin: 0;
            border: 1px solid #aaa;
            box-shadow: 0 1px 0 1px rgba(0,0,0,.04);
            border-radius: .5em;
            -moz-appearance: none;
            -webkit-appearance: none;
            appearance: none;
            background-color: #fff;
            background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23007CB2%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'),
            linear-gradient(to bottom, #ffffff 0%,#e5e5e5 100%);
            background-repeat: no-repeat, repeat;
            background-position: right .7em top 50%, 0 0;
            background-size: .65em auto, 100%;
        }
        .select-css::-ms-expand {
            display: none;
        }
        .select-css:hover {
            border-color: #888;
        }
        .select-css:focus {
            border-color: #aaa;
            box-shadow: 0 0 1px 3px rgba(59, 153, 252, .7);
            box-shadow: 0 0 0 3px -moz-mac-focusring;
            color: #222;
            outline: none;
        }
        .select-css option {
            font-weight:normal;
        }

        .coolbg {
            background-color: #fff;
            background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23007CB2%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.'),
            linear-gradient(to bottom, #ffffff 0%,#e5e5e5 100%);
            background-repeat: no-repeat, repeat;
            background-position: right .7em top 50%, 0 0;
            background-size: .65em auto, 100%;
        }
    </style>

    @endsection

@section('content')

    <div class="" style="position: fixed; top: 0; right: 0; width: 100vw; height: 100vh; background: rgba(6,14,7,0.92); z-index: 500000000000000000; overflow-y: scroll">
        <br> <br>
        <div class="container shadow-sm bg-white coolbg" style="border-radius: 4px">
            <br>
            <form class="form-style-9" method="POST" action="/profile/{{ Auth::user()->id }}/init">
                @csrf
                <h4 class="text-secondary">Initialize Your Account</h4>

                <br>
                <table class="table table-borderless text-dark">
                    <tr>
                        <td>
                            <div class="form-group" style="padding: 0; margin: 0">
                                <label for="employeenumber" class="form-label">Employee Number</label>
                                <input type="text" name="employeenumber" placeholder="Employee Number" class="form-control field-style" required>
                            </div>
                        </td>
                        <td>
                            <div class="form-group" style="padding: 0; margin: 0">
                                <label for="jobTitle" class="form-label">Job Title</label>
                                <input type="text" name="jobTitle" placeholder="Job Title" class="form-control field-style" required>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <div class="form-group" style="padding: 0; margin: 0">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address" id="address" class="form-control " placeholder="Address">
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div class="form-group" style="padding: 0; margin: 0">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="select-css form-control field-style" name="gender" required style="">
                                    <option value="">Choose Gender</option>
                                    <option value="male" >Male</option>
                                    <option value="female" >Female</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="form-group" style="padding: 0; margin: 0">
                                <label for="mobilenumber" class="form-label">Mobile Number</label>
                                <input type="tel" name="mobilenumber" placeholder="Mobile Number" class="form-control field-style" required>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="form-group" style="padding: 0; margin: 0">
                                <label for="officenumber" class="form-label">Office Number</label>
                                <input type="text" name="officenumber" placeholder="Office Number" class="form-control field-style" required>
                            </div>
                        </td>
                        <td>
                            <div class="form-group-sm" style="padding: 0; margin: 0">
                                <label for="location" class="form-label">Location</label> <br>
                                <select class="select-css form-control field-style" name="location" required style="width: 250px">
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
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="form-group" style="padding: 0; margin: 0">
                                <label for="supervisor" class="form-label">Supervisor Email:</label>
                                <input type="email" name="supervisor" placeholder="example@agribank.co.zw" class="form-control field-style" required>
                            </div>
                        </td>
                        <td>
                            <div class="form-group" style="padding: 0; margin: 0">
                                <label for="authorisations" class="form-label">Number of Authorisations: </label>
                                <input type="number" name="authorisations" placeholder="Number of Authorisations" class="form-control field-style" required>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <button type="submit" class="btn btn-outline-info">Submit</button>
                        </td>
                    </tr>
                </table>
            </form>
            <br>
        </div>
    </div>

@endsection

@section('scripts')

    @endsection

