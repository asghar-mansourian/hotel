<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<style>

    body {
        font-family: system-ui;
        font-size: 14px;
        font-weight: 500;

    }

    .list {
        height: 561px;
        width: 794px;
        border: 1pt solid #9c9c9c;
    }

    .border {
        border: 2pt solid #9c9c9c;
    }

    .images {
        height: 91px
    }

    .left_img {
        width: 30%;
        float: left;
        height: 70px
    }

    .right_img {
        width: 30%;
        float: right;
        height: 70px
    }

    .center_img {
        width: 40%;
        float: left;
    }

    .left_img img {
        width: 75%;
        padding: 15px;
        height: 60px
    }

    .right_img img {
        padding: 15px;
        float: right;
        height: 60px
    }

    .list_left {
        width: 49%;
        float: left;
        margin-right: 1%
    }

    .list_right {
        width: 49%;
        float: right;
        margin-left: 1%;
    }

    table {
        width: 100%;
        text-align: left;
    }

    th {
        border: 1pt solid #9c9c9c;
    }

    .width_50 {
        width: 50%;
        padding: 5px 2px;
    }

    .width_50_strong {
        width: 50%;
        color: #000;
        font-style: italic;
        padding: 8px 4px;
    }

    .width_77_strong {
        width: 77%;
        color: #000;
        font-style: italic;
        padding: 10px 4px;
    }

    .xxx {
        background: #000;
        padding: 0px 5px;
        color: #fff;
        font-style: initial;
    }

    .no {
        background: #fff;
        padding: 0px 8px;
        margin-right: 2px;
        border: 1pt solid #000;
    }

    .number span {
        padding: 1px 5px
    }

    .number {
        width: 15px
    }

    .width_50 table th {
        font-size: 12px;
        font-family: system-ui;
    }

    .width_50 table {
        text-align: center;
    }

    .width_50 table td, .width_50 table th {
        border: 1pt solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    .text_right {
        text-align: right;
    }

    .border_unset {
        border: unset;
    }

    .table_total {
        margin-top: 30px
    }
</style>
<body>
<div class="list">
    <div class="images">
        <div class="left_img">
            <img src="{{url('front/image/logo-linex.svg')}}">
        </div>
        <div class="center_img">
        </div>
        <div class="right_img">
            <img src="{{url('/barcode/example/html/image.php?filetype=PNG&dpi=72&scale=1&rotation=0&font_family=Arial.ttf&font_size=8&text='.$barcode->barcode.'&thickness=30&code=BCGean13')}}">
        </div>
    </div>
    <div style="clear: both;"></div>
    <div class="list_left">
        <table>
            <tr>
                <th class="number"><span>1</span></th>
                <th class="width_50_strong">Traking number :</th>
                <th class="width_50_strong"><span class="xxx">X</span> <strong>Cargo Prepaid</th>
            </tr>
            <tr>
                <td></td>
                <td class="width_50">#{{$barcode->code}}</td>
                <td class="width_50"><span class="no"></span>Prepaid</td>
            </tr>
        </table>
        <table>
            <tr>
                <th class="number"><span>2</span></th>
                <th class="width_50_strong">From(Shipper) :</th>
                <th class="width_50_strong">Send adress :</th>
            </tr>
            <tr>
                <td></td>
                <td class="width_50">
                @isset($barcode->orderable->shop)
                    {{$barcode->orderable->shop}}
                @endif

                @isset($barcode->orderable->link)
                    {{explode('.',parse_url($barcode->orderable->link)['host'])[1]}}
                @endif
                <td class="width_50">{{\App\Setting::getValue(\App\Setting::FIELD_COMPANY_FACTOR_ADDRESS)}}</td>
            </tr>
        </table>
        <table>
            <tr>
                <td style="color: #fff" class="number">2></td>
                <th class="width_50_strong">Postal code :</th>
                <th class="width_50_strong">Send Phone :</th>
            </tr>
            <tr>
                <td></td>
                <td class="width_50">{{\App\Setting::getValue(\App\Setting::FIELD_COMPANY_POSTAL_CODE)}}</td>
                <td class="width_50">{{\App\Setting::getValue(\App\Setting::FIELD_COMPANY_FACTOR_PHONE)}}</td>
            </tr>
        </table>
        <table>
            <tr>
                <th class="number"><span>3</span></th>
                <th class="width_50_strong">To (Consignee):</th>
                <th class="width_50_strong">Personal ID :</th>
            </tr>
            <tr>
                <td></td>
                <td class="width_50"> {{$user->name . ' ' . $user->family }}<br/></td>
                <td class="width_50">M{{$user->id}}</td>
            </tr>
        </table>
        <table>
            <tr>
                <td style="color: #fff" class="number">3></td>
                <th class="width_50_strong">Delivery adress :</th>
                <th class="width_50_strong">Country/City :</th>
            </tr>
            <tr>
                <td></td>
                <td class="width_50">{{$user->address}}</td>
                <td class="width_50">{{isset($user->region) ? $user->region->country->name: ''}}/{{isset($user->region) ? $user->region->name: ''}}</td>
            </tr>
        </table>
        <table>
            <tr>
                <td style="color: #fff" class="number">3></td>
                <th class="width_50_strong">Website :</th>
            </tr>
            <tr>
                <td></td>
                <td class="width_50"><a href="{{url('/')}}">{{url('/')}}</a></td>
                <td class="width_50"></td>
            </tr>
        </table>
    </div>
    <div class="list_right">
        <table>
            <tr>
                <th class="number"><span>4</span></th>
                <th class="width_77_strong">To (Consignee):</th>
                <th class="width_77_strong"><span class="xxx">X</span> <strong>By Air</th>
            </tr>
            <tr>
                <td></td>
                <td class="width_50" style="padding: 0">
                    <table>
                        <tr>
                            <th>Total number of packages</th>
                            <th>Total gross weight (kg)</th>
                            <th>Delivery (USD)</th>
                        </tr>
                        <tr>
                            <td>{{$barcode->orderable->quantity}}</td>
                            <td>{{$barcode->orderable->weight}}</td>
                            <td>{{$barcode->orderable->weight_price}} $</td>
                        </tr>
                    </table>
                </td>
                <td class="width_50"><span class="no"></span>By Sea</td>
            </tr>
        </table>
        <table>
            <tr>
                <th class="number"><span>5</span></th>
                <th class="width_50_strong">Description of goods:</br>Category :</th>
                <th class="width_50_strong">Declaration value for customs :</th>
            </tr>
            <tr>
                <td></td>
                @isset($barcode->orderable->productCategory)
                    @isset($barcode->orderable->productCategory->parent)
                        <td class="width_50">{{$barcode->orderable->productCategory->parent->name_az}} / {{$barcode->orderable->productCategory->name_az}}</td>
                    @else
                        <td class="width_50">{{$barcode->orderable->productCategory->name_az}}</td>
                    @endisset
                @else
                    <td class="width_50">-</td>
                @endisset
                <td class="width_50">5.63 $</td>
            </tr>
        </table>
        <table class="table_total">
            <tr>
                <td class="width_50">Product price</td>
                <td class="width_50 text_right">{{\App\lib\Helpers::formatPrice($priceDollar)}} $</td>
            </tr>
            <tr>
                <td class="width_50">Delivery price</td>
                <td class="width_50 text_right">{{$barcode->orderable->weight_price}} $</td>
            </tr>
            <tr>
                <th class="width_50_strong border_unset">Total</th>
                <th class="width_50_strong border_unset text_right">{{\App\lib\Helpers::formatPrice($priceDollar + $barcode->orderable->weight_price)}} $</th>
            </tr>
        </table>
        <div>Information on goods filled by Consignee on by <strong>{{\App\Setting::getValue(\App\Setting::FIELD_COMPANY_NAME)}}</strong> on behalf on Consignee</div>
    </div>
</div>
<script>
    window.print()
</script>
</body>
</html>
