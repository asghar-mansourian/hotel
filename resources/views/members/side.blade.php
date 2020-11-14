<div class="col-md-3 col-sm-2 col-xs-3">
    <div class="h4_height">
        <h4 class="use_dis_no">{{__('member.user')}} <strong>{{auth()->user()->name}}</strong></h4>
    </div>

    <div class="left-side mt-5">
        <ul>
            @yield('menuItem')
        </ul>

    </div>
    <div class="rate_calculator mt-5">
        <div class="title_list mb-4">{{__('member.exchangeratecalculator')}}</div>
        <form id="calBtn" method="post" action="{{url('/getCurrencyCalculator')}}">
            <div class="float-left">
                <input type="number" name="currency" required>
            </div>
            <select name="from" class=" " aria-labelledby="dropdown_baglama"
                    style="width: 100px;margin-left: 10px;
    box-shadow: 0 0 black !important;">
                <option class="">{{__('member.select')}}</option>
                <option class="dropdown-item" value="RUB">RUB</option>
                <option class="dropdown-item" value="USD">USD</option>
                <option class="dropdown-item" value="TRY">TRY</option>
            </select>
            <div style="clear: both;"></div>
            <div class="mt-4"></div>
            <div class="float-left">
                <input id="result_cal" type="number" readonly>
            </div>
            <select name="to" class=" " aria-labelledby="dropdown_baglama"
                    style=" width: 100px;margin-left: 10px;
    box-shadow: 0 0 black !important;">
                <option class="">{{__('member.select')}}</option>
                <option class="dropdown-item" value="RUB">AZN</option>
                <option class="dropdown-item" value="USD">USD</option>
                <option class="dropdown-item" value="TRY">TRY</option>
            </select>
            <div style="clear: both;"></div>

            <div class="col-md-12 button-part mt-4 p-0" style="display: none">
                <button type="submit" class="btn-effect w-100 ">{{__('member.calculate')}}</button>
            </div>
        </form>

        <div class="font_grey mt-4">{{__('member.calculateexchange')}}</div>
    </div>
    <div class="daily_unit mt-5">
        <div class="title_list mb-4">{{__('member.dailysize')}}</div>
        <ul>
            @php
                $daySizeTRY = 1;
                $daySizeUSD = \Illuminate\Support\Facades\DB::table('currencies')->where('from' , 'try')->where('to' , 'usd')->first()->to_value;
                $daySizeAZN = \Illuminate\Support\Facades\DB::table('currencies')->where('from' , 'try')->where('to' , 'azn')->first()->to_value;
            @endphp
            <li>
                <img src="{{url('front/image/flg-tr.png')}}" alt="flt-tr">
                <span>{{$daySizeTRY}}</span>
                <span>TL</span>
            </li>
            <li>
                <img src="{{url('front/image/flg-az.png')}}" alt="flt-az">
                <span>{{substr($daySizeAZN , 0 , 4)}}</span>
                <span>AZN</span>
            </li>
            <li>
                <img src="{{url('front/image/flg-usa.png')}}" alt="flt-usa">
                <span>{{substr($daySizeUSD , 0 , 4)}}</span>
                <span>USD</span>
            </li>
        </ul>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>

    $(document).ready(function () {


        $('#calBtn').on('change', function (e) {

            e.preventDefault();

            var form = $(this);
            var error = function (response) {
                var jsonResponse = JSON.parse(response.responseText);
                console.log(jsonResponse.errors);
                $(jsonResponse.errors).each(function (index, value) {
                    $('#' + jsonResponse.keys[index]).addClass('has-danger');
                    $('#' + jsonResponse.keys[index]).after('<span class="help-block"  style="color:red">' + value + '</span>');
                })
            }
            var success = function (response) {
                // var url = '/setting';
                //
                // window.location.replace(url);
                $('#result_cal').attr('value', response);
            };
            var after = function () {
                // $('div.block2').unblock();
            }
            var before = function () {
                $('.form-control').removeClass('has-danger');
                $('.help-block').each(function () {
                    $(this).remove();
                });
            }
            var option = {
                data: new FormData(this),
                url: form.attr('action'),
                type: form.attr('method'),
                dataType: "JSON",
                processData: false,
                contentType: false,
                cache: false,
            };
            $.ajaxSetup(option);
            $.ajax({
                beforeSend: function () {
                    before()
                },
                success: function (response) {
                    success(response)
                },
                error: function (response) {
                    error(response)
                },
                complete: function () {
                    after()
                }
            });
        });

    });

</script>
