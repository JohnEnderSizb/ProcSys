@extends('home')

@section('styling')
    <style type="text/css">
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


          .form-style-9{
              max-width: 80%;
              padding: 30px;
              margin: 50px auto;
              border-radius: 4px;
              color: #222;
              background: #FFF url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23007CB2%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207'),
              linear-gradient(to bottom, #ffffff 0%, #e5e5e5 100%) no-repeat, repeat right .7em top 50%, 0 0;
              background-size: .65em auto, 100%;
          }
        .form-style-9 ul{
            padding:0;
            margin:0;
            list-style:none;
        }
        .form-style-9 ul li{
            display: block;
            margin-bottom: 10px;
            min-height: 35px;
        }
        .field-style{
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            padding: 8px;
            outline: none;
            border: 1px solid #0168f8;
            -webkit-transition: all 0.30s ease-in-out;
            -moz-transition: all 0.30s ease-in-out;
            -ms-transition: all 0.30s ease-in-out;
            -o-transition: all 0.30s ease-in-out;


        .form-style-9 ul li .field-full{
            width: 100%;
        }
        .form-style-9 ul li input.align-left{
            float:left;
        }
        .form-style-9 ul li input.align-right{
            float:right;
        }
        .form-style-9 ul li textarea{
            width: 100%;
            height: 100px;
        }



    </style>


    @endsection

@section('content')

    <div class="container">
        <form class="form-style-9 shadow-sm bg-light" autocomplete="on" method="POST" action="/profile/specification/create">
            @csrf
            <h3 class="text-center" style="color: #0168f8">Internal Requisition</h3>
            <hr>
            <br>
            <table class="table table-borderless">

                <tr>
                    <td colspan="2" class="mb-5">
                        <div class="row">
                            <div class="col-md-3 mt-1">
                                <h5>
                                    <label for="item" style="color: #0168f8">Specifications:</label>
                                </h5>
                            </div>
                            <div class="col-md-7">
                                <div class="">
                                    <select id="hard-coded" class="select-css select-css" style="" name="hardcoded">
                                        <option value="">Select Item</option>
                                        <option  disabled="1" class="bg-light shadow-sm">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspPRINTED STATIONERY-</option><br/>
                                        <option  value='Request for Bank Balance-Pads'>Request for Bank Balance-Pads</option>
                                        <option  value='Credit Customer A/C Slips'>Credit Customer A/C Slips</option>
                                        <option  value='Debit Customer A/C Slips'>Debit Customer A/C Slips</option>
                                        <option  value='Cash Specification Slip-50 Page Pads'>Cash Specification Slip-50 Page Pads</option>
                                        <option  value='Certificate of Balance-50 Page Pad'>Certificate of Balance-50 Page Pads</option>
                                        <option  value='Cash Deposit Slips(small)'>Cash Deposit Slips(small)</option>
                                        <option  value='Cash Deposit Book(small)'>Cash Deposit Book(small)</option>
                                        <option  value='Lupane State University Deposit Slips'>Lupane State University Deposit Slips</option>
                                        <option  value='Cheque Deposit Book(small)'>Cheque Deposit Book(small)</option>
                                        <option value="School Fees Cash Deposit Slips-Packs" >School Fees Cash Deposit Slips-Packs</option>
                                        <option value="Mandate for Club Accounts-Pads" >Mandate for Club Accounts-Pads</option>
                                        <option value="Mandate: Consent Minor A/C-Pads" >Mandate: Consent Minor A/C-Pads</option>
                                        <option value="Signing Arrangements on a Company Account-Pads" >Signing Arrangements on a Company Account-Pads</option>
                                        <option value="Business Acc Opening Form-Packets" >Business Acc Opening Form-Packets</option>
                                        <option value="App for Personal/Joint A/C-Packets" >App for Personal/Joint A/C-Packets</option>
                                        <option value="Signature Cards-Packets of 500 Cards" >Signature Cards-Packets of 500 Cards</option>
                                        <option value="Savings Withdrawal Slips-Packets of 1000 Slips" >Savings Withdrawal Slips-Packets of 1000 Slips</option>
                                        <option value="Account History Card-Packets of 500 Cards" >Account History Card-Packets of 500 Cards</option>
                                        <option value="Night Safe Agreement-Pads" >Night Safe Agreement-Pads</option>
                                        <option value="Staff ttendance Register-Pads" >Staff ttendance Register-Pads</option>
                                        <option value="Change of Co. Signatories-Pads" >Change of Co. Signatories-Pads</option>
                                        <option value="Mandate to Operate a Partnership Account-Pads" >Mandate to Operate a Partnership Account-Pads</option>
                                        <option value="Security Cards" >Security Cards</option>
                                        <option value="Facility Record Sheets" >Facility Record Sheets</option>
                                        <option value="Agribank letterheads-Packets/Reams" >Agribank letterheads-Packets/Reams</option>
                                        <option value="Mandate Sole Propietor-Pads" >Mandate Sole Propietor-Pads</option>
                                        <option value="Account Number Tags-Packets" >Account Number Tags-Packets</option>
                                        <option value="Teller's Daily Balancing Record-Pads" >Teller's Daily Balancing Record-Pads</option>
                                        <option value="Accounts Opened Register-Pads" >Accounts Opened Register-Pads</option>
                                        <option value="Accounts Closed Register-Pads" >Accounts Closed Register-Pads</option>
                                        <option value="Cash in Transit Voucher-Books" >Cash in Transit Voucher-Books</option>
                                        <option value="Certificate of Cash T/Over-Pads" >Certificate of Cash T/Over-Pads</option>
                                        <option value="Power of Artoney-Pads" >Power of Artoney-Pads</option>
                                        <option value="Small Plastic Money Bags(Resealable)-Lose" >Small Plastic Money Bags(Resealable)-Lose</option>
                                        <option value="Plastic Money Bags-Packs" >Plastic Money Bags-Packs</option>
                                        <option value="Inter-Teller Cash Transfer-Books" >Inter-Teller Cash Transfer-Books</option>
                                        <option value="Zimra Cash Deposit Slips-Pads" >Zimra Cash Deposit Slips-Pads</option>
                                        <option value="Safe Custody/Pledged Record" >Safe Custody/Pledged Record</option>
                                        <option value="Assets Disposal Invoice Book" >Assets Disposal Invoice Book</option>
                                        <option value="Purchase Order Books Gen" >Purchase Order Books Gen</option>
                                        <option value="Purchase Order Books M/V" >Purchase Order Books M/V</option>
                                        <option value="Internal Requisition Books" >Internal Requisition Books</option>
                                        <option value="GRN Books" >GRN Books</option>
                                        <option value="Invoice Books" >Invoice Books</option>
                                        <option value="Motor Vehicle Log Books" >Motor Vehicle Log Books</option>
                                        <option value="Asset Clearence Books" >Asset Clearence Books</option>
                                        <option value="Boxes Agribank Statement Paper" >Boxes Agribank Statement Paper</option>
                                        <option value="Bankers Acceptance-Lose Sheets" >Bankers Acceptance-Lose Sheets</option>
                                        <option value="Closed Account Notice" >Closed Account Notice</option>
                                        <option value="Taxi Voucher Books" >Taxi Voucher Books</option>
                                        <option value="Large Coin Bags" >Large Coin Bags</option>
                                        <option value="AgriPlus Account Opening Forms" >AgriPlus Account Opening Forms</option>
                                        <option value="Agency Banking Application Form" >Agency Banking Application Form</option>
                                        <option value="SMS Alert Forms" >SMS Alert Forms</option>
                                        <option value="Internal Transfer Forms" >Internal Transfer Forms</option>
                                        <option value="Ecocash Services" >Ecocash Services</option>
                                        <option value="Overdraft Forms" >Overdraft Forms</option>
                                        <option value="Personal Loan Application Forms" >Personal Loan Application Forms</option>
                                        <option value="RTGS Forms" >RTGS Forms</option>


                                        <option  disabled="1" class="bg-light shadow-sm">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspCOMPUTER CONSUMABLES-</option>
                                        <option value="ATM Thermal Rolls-5670" >ATM Thermal Rolls-5670</option>
                                        <option value="ATM Ribbon Agribank Receipt" >ATM Ribbon Agribank Receipt</option>
                                        <option value="ATM Models Journal" >ATM Models Journal</option>
                                        <option value="ATM Ribbons" >ATM Ribbons</option>


                                        <option  disabled="1" class="bg-light shadow-sm">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp GENERAL STATIONERY-</option>
                                        <option value="A4 80 GSM Bond Paper-Reams" >A4 80 GSM Bond Paper-Reams</option>
                                        <option value="80 Column Computer Paper-Boxes" >80 Column Computer Paper-Boxes</option>
                                        <option value="A4 Counter Books" >A4 Counter Books</option>
                                        <option value="A4 Bond Excecutive Pads" >A4 Bond Excecutive Pads</option>
                                        <option value="32 Column Analysis Books" >32 Column Analysis Books</option>
                                        <option value="Shorthand Note Books" >Shorthand Note Books</option>
                                        <option value="Newsprint Flipcharts" >Newsprint Flipcharts</option>
                                        <option value="Guard Books" >Guard Books</option>
                                        <option value="Parcel Delivery Books" >Parcel Delivery Books</option>
                                        <option value="Telephone Message Pads" >Telephone Message Pads</option>
                                        <option value="Bond block Refills" >Bond block Refills</option>
                                        <option value="Sticks on Pads" >Sticks on Pads</option>
                                        <option value="Accessible Files" >Accessible Files</option>
                                        <option value="Suspension Files" >Suspension Files</option>
                                        <option value="Eversharp Pens-Blue" >Eversharp Pens-Blue</option>
                                        <option value="Eversharp Pens-Black" >Eversharp Pens-Black</option>
                                        <option value="Eversharp Pens-Red" >Eversharp Pens-Red</option>
                                        <option value="Magic or Mighty Markers" >Magic or Mighty Markers</option>
                                        <option value="Heavy Duty Punch" >Heavy Duty Punch</option>
                                        <option value="Heavy Duty Staplers" >Heavy Duty Staplers</option>
                                        <option value="Highlighters" >Highlighters</option>
                                        <option value="HB Pencils-Staedlar" >HB Pencils-Staedlar</option>
                                        <option value="Staple Removers" >Staple Removers</option>
                                        <option value="30cm Rulers" >30cm Rulers</option>
                                        <option value="HB Pencils-Staedla" >HB Pencils-Staedlar</option>
                                        <option value="Pritt Glue Sticks-Grams" >Pritt Glue Sticks-Grams</option>
                                        <option value="Pritt Liquifix Glue" >Pritt Liquifix Glue</option>
                                        <option value="Packet Sticky Suff" >Packet Sticky Suff</option>
                                        <option value="Packets A4 Blue Carbon Papers" >Packets A4 Blue Carbon Papers</option>
                                        <option value="Boxes C5/6 Khaki Manila Emvelopes-Boxes" >Boxes C5/6 Khaki Manila Emvelopes-Boxes</option>
                                        <option value="Boxes C5/6 Khaki Window Manila Emvelopes-Boxes" >Boxes C5/6 Khaki Window Manila Emvelopes-Boxes</option>
                                        <option value="A4/B4/C4 Manila Envelopes-Pack" >A4/B4/C4 Manila Envelopes-Pack</option>
                                        <option value="Packets A5/B5/C5 Manila Envelopes-25 ENV Each" >Packets A5/B5/C5 Manila Envelopes-25 ENV Each</option>
                                        <option value="Boxes A4 Khaki Emvelopes" >Boxes A4 Khaki Emvelopes</option>
                                        <option value="Packets A3 Khaki Envelopes" >Packets A3 Khaki Envelopes</option>
                                        <option value="Jumbo Khaki Envelopes" >Jumbo Khaki Envelopes</option>
                                        <option value="Boxes Money Clips" >Boxes Money Clips</option>
                                        <option value="Packets Money Clips" >Packets Money Clips</option>
                                        <option value="Paper Spikes" >Paper Spikes</option>
                                        <option value="Medium paper Punches" >Medium paper Punches</option>
                                        <option value="Medium Staplers 26/6" >Medium Staplers 26/6</option>
                                        <option value="Boxes Stapples 26/6" >Boxes Stapples 26/6</option>
                                        <option value="Boxes Jumbo Staples Pins" >Boxes Jumbo Staples Pins</option>
                                        <option value="Stamp Pads" >Stamp Pads</option>
                                        <option value="Sponge Dumpers" >Sponge Dumpers</option>
                                        <option value="Packet Rubber Bands" >Packet Rubber Bands</option>
                                        <option value="Pair of Scissors" >Pair of Scissors</option>
                                        <option value="Rolls Clear Celotape" >Rolls Clear Celotape</option>
                                        <option value="Rolls Packaging Tapes" >Rolls Packaging Tapes</option>
                                        <option value="P.O.S Machine Rolls" >P.O.S Machine Rolls</option>
                                        <option value="Stamp Pad Ink-Blue" >Stamp Pad Ink-Blue</option>


                                        <option  disabled="1" class="bg-light shadow-sm">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp PR MATERIALS-</option>
                                        <option value="Agribank Flags" >Agribank Flags</option>
                                        <option value="Zimbabwe National Flags" >Zimbabwe National Flags</option>


                                        <option  disabled="1" class="bg-light shadow-sm">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp POSTAGE EXPENSES-</option>
                                        <option value="Swift Action Packs-1KG<" >Swift Action Packs-1KG</option>
                                        <option value="Swift Action Packs-3KG" >Swift Action Packs-3KG</option>
                                        <option value="Zimpost Action Packs-1KG" >Zimpost Action Packs-1KG</option>
                                        <option value="Zimpost Action Packs-3KG" >Zimpost Action Packs-3KG</option>


                                        <option  disabled="1" class="bg-light shadow-sm">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp OFFICE CLEANING AND MATERIALS-</option>
                                        <option value="Windowlene" >Windowlene</option>
                                        <option value="Toilet Tissues-Rolls" >Toilet Tissues-Rolls</option>
                                        <option value="Imperial Mint" >Imperial Mint</option>
                                        <option value="Dishwasher" >Dishwasher</option>
                                        <option value="Pinefresh" >Pinefresh</option>
                                        <option value="Scoure Powder/VIM" >Scoure Powder/VIM</option>
                                        <option value="Liquid Bleach" >Liquid Bleach</option>
                                        <option value="Hand Andy" >Hand Andy</option>
                                        <option value="Acid Toilet Cleaner" >Acid Toilet Cleaner</option>
                                        <option value="Handy Liquid Soap" >Handy Liquid Soap</option>
                                        <option value="Channel Blocks" >Channel Blocks</option>
                                        <option value="Cobra" >Cobra</option>


                                        <option name='supervisor_id' disabled="1" class="bg-light shadow-sm">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp BUILDINGS REPAIRS AND MAINTENANCE-</option>
                                        <option value="MCB 5 AMP" >MCB 5 AMP</option>
                                    </select>
                                    <input id="other" class="form-control field-style hidden" placeholder="Specifications/Requirements" type="text" name="other">
                                </div>
                            </div>
                            <div class="col-md-2 mt-1">
                                <h5>
                                    <label for="other" class="" style="color: #0168f8">Other:</label>
                                    <input class="ml-2 form-check-label" type="checkbox" id="other-toggle" name="other-toggle" value="other">
                                </h5>
                            </div>
                        </div>
                    </td>
                </tr>
                <br>

                <tr>
                    <td colspan="2">
                        <textarea name="description" class="form-control field-style" placeholder="Description/Details" style="height: 100px" required></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="">
                            <h5>
                                <label for="due-date" style="color: #0168f8">Due date:</label>
                            </h5>
                            <input type="date" class="form-control field-style" name="due_date" required>
                        </div>
                    </td>
                    <td>
                        <div>
                            <h5>
                                <label for="due-date" style="color: #0168f8">Priority:</label>
                            </h5>
                            <select class="select-css form-control" name="priority" required>
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
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
    </div>

    <br>
    <hr>
    <br>

@endsection

@section('scripts')

    @endsection
