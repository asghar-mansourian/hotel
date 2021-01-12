<?xml version="1.0" encoding="UTF-8"?>
<GoodsInfo>
        @foreach($xmls as $xml)
        <GOODS>
            <TR_NUMBER> {{$xml['TR_NUMBER']}}</TR_NUMBER>
            <DIRECTION>{{$xml['DIRECTION']}}</DIRECTION>
            <QUANTITY_OF_GOODS>{{$xml['QUANTITY_OF_GOODS']}}</QUANTITY_OF_GOODS>
            <WEIGHT_GOODS>{{$xml['WEIGHT_GOODS']}}</WEIGHT_GOODS>
            <INVOYS_PRICE>{{$xml['INVOYS_PRICE']}}</INVOYS_PRICE>
            <CURRENCY_TYPE>{{$xml['CURRENCY_TYPE']}}</CURRENCY_TYPE>
            <NAME_OF_GOODS>{{$xml['NAME_OF_GOODS']}} </NAME_OF_GOODS>
            <IDXAL_NAME>{{$xml['IDXAL_NAME']}}</IDXAL_NAME>
            <IDXAL_ADRESS>{{$xml['IDXAL_ADRESS']}}</IDXAL_ADRESS>
            <IXRAC_NAME>{{$xml['IXRAC_NAME']}}</IXRAC_NAME>
            <IXRAC_ADRESS>{{$xml['IXRAC_ADRESS']}}</IXRAC_ADRESS>
            <GOODS_TRAFFIC_FR>{{$xml['GOODS_TRAFFIC_FR']}}</GOODS_TRAFFIC_FR>
            <GOODS_TRAFFIC_TO>{{$xml['GOODS_TRAFFIC_TO']}}</GOODS_TRAFFIC_TO>
            <QAIME>{{$xml['QAIME']}}</QAIME>
            <TRACKING_NO>{{$xml['TRACKING_NO']}}</TRACKING_NO>
            <FIN>{{$xml['FIN']}}</FIN>
            <PHONE>{{$xml['PHONE']}}</PHONE>
        </GOODS>
        @endforeach
</GoodsInfo>
