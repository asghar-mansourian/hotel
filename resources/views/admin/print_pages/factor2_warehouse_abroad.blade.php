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
            <img src="{{url('front/image/logo-express.svg')}}">
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
                <th class="width_50_strong">{{__('admin.tracking_number_f2')}}</th>
                <th class="width_50_strong"><span class="xxx">X</span> <strong>{{__('admin.cargo_prepaid_f2')}}</th>
            </tr>
            <tr>
                <td></td>
                <td class="width_50">#{{$barcode->code}}</td>
                <td class="width_50"><span class="no"></span>{{__('admin.prepaid_f2')}}</td>
            </tr>
        </table>
        <table>
            <tr>
                <th class="number"><span>2</span></th>
                <th class="width_50_strong">{{__('admin.from_shipper_f2')}}</th>
                <th class="width_50_strong">{{__('admin.send_address_f2')}}</th>
            </tr>
            <tr>
                <td></td>
                <td class="width_50">
                @if(preg_match('/(http|ftp|mailto)/', $barcode->orderable->shop))
                    {{explode('.',parse_url($barcode->orderable->shop)['host'])[1]}}
                @else
                    {{str_limit($barcode->orderable->shop, 15)}}
                @endif

                @if($barcode->orderable->link)
                    {{explode('.',parse_url($barcode->orderable->link)['host'])[1]}}
                @endif
                <td class="width_50">{{\App\Setting::getValue(\App\Setting::FIELD_COMPANY_FACTOR_ADDRESS)}}</td>
            </tr>
        </table>
        <table>
            <tr>
                <td style="color: #fff" class="number">2></td>
                <th class="width_50_strong">{{__('admin.postal_code_f2')}}</th>
                <th class="width_50_strong">{{__('admin.send_phone_f2')}}</th>
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
                <th class="width_50_strong">{{__('admin.to_consignee_f2')}}</th>
                <th class="width_50_strong">{{__('admin.personal_id_f2')}}</th>
            </tr>
            <tr>
                <td></td>
                <td class="width_50"> {{$user->name . ' ' . $user->family }}<br/></td>
                <td class="width_50">{{$user->id}}</td>
            </tr>
        </table>
        <table>
            <tr>
                <td style="color: #fff" class="number">3></td>
                <th class="width_50_strong">{{__('admin.delivery_address_f2')}}</th>
                <th class="width_50_strong" {{__('admin.country_city_f2')}}</th>
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
                <th class="width_50_strong">{{__('admin.website_f2')}}</th>
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
                <th class="width_77_strong">{{__('admin.to_consignee_f2')}}</th>
                <th class="width_77_strong"><span class="xxx">X</span> <strong>{{__('admin.by_air_f2')}}</th>
            </tr>
            <tr>
                <td></td>
                <td class="width_50" style="padding: 0">
                    <table>
                        <tr>
                            <th>{{__('admin.total_number_of_packages_f2')}}</th>
                            <th>{{__('admin.total_gross_weight_f2')}}</th>
                            <th>{{__('admin.delivery_f2')}}</th>
                        </tr>
                        <tr>
                            <td>{{$barcode->orderable->quantity}}</td>
                            <td>{{$barcode->orderable->weight}}</td>
                            <td>{{$barcode->orderable->weight_price}} $</td>
                        </tr>
                    </table>
                </td>
                <td class="width_50"><span class="no"></span>{{__('admin.by_see_f2')}}</td>
            </tr>
        </table>
        <table>
            <tr>
                <th class="number"><span>5</span></th>
                <th class="width_50_strong">{{__('admin.description_of_goods_f2')}}</br>{{__('admin.category_f2')}}</th>
                <th class="width_50_strong">{{__('admin.declaration_value_for_customs_f2')}}</th>
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
                <td class="width_50">{{\App\lib\Helpers::formatPrice($priceDollar + $barcode->orderable->weight_price)}} $</td>
            </tr>
        </table>
        <table class="table_total">
            <tr>
                <td class="width_50">{{__('admin.product_price_f2')}}</td>
                <td class="width_50 text_right">{{\App\lib\Helpers::formatPrice($priceDollar)}} $</td>
            </tr>
            <tr>
                <td class="width_50">{{__('admin.delivery_price_f2')}}</td>
                <td class="width_50 text_right">{{$barcode->orderable->weight_price}} $</td>
            </tr>
            <tr>
                <th class="width_50_strong border_unset">{{__('admin.total_f2')}}</th>
                <th class="width_50_strong border_unset text_right">{{\App\lib\Helpers::formatPrice($priceDollar + $barcode->orderable->weight_price)}} $</th>
            </tr>
        </table>
        <div>{{__('admin.information_goods_filled_f2')}} <strong>{{\App\Setting::getValue(\App\Setting::FIELD_COMPANY_NAME)}}</strong> {{__('admin.on_behalf_on_consignee_f2')}}</div>
    </div>
</div>
<script>
    window.print()
</script>
</body>
</html>
