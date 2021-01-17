<div class="row">
    <div class="col-md-12 mb-4 font_pink text-center"><strong>{{__('website.calculator')}}</strong></div>
    <div class="col-md-6 col-sm-6 mt-3 mb-3">
        <div class="pricing_box_cou">
            <input type="text" readonly value="{{__('website.turkey')}}" style="width: 254px;    font-size: 21px; color: #151f59;border: 1px solid #2AF598;">
        </div>
        <span class="font_pink" style="position: absolute; right: -10px; bottom: 10px;"> &xrArr;</span>
    </div>
    <div class="col-md-6 col-sm-6 mt-3 mb-3">
        <div class="pricing_box_cou">
            <input type="text" readonly value="{{__('website.russia')}}" style="width: 254px;    font-size: 21px; color: #151f59;border: 1px solid #2AF598;">
        </div>

    </div>
    {{--  <div class="col-md-6 col-sm-6 mt-3 mb-3">
          <input type="number" name="" class="pricing_imput w-100" placeholder="{{__('website.binding_number')}}">
      </div>--}}
    <div class="col-md-12 col-sm-6 mt-3 mb-3">
        <input type="number" id="weight" style="    border: 1px solid #2AF598;" name="" class="pricing_imput w-100" placeholder="{{__('website.weight')}}">
        <div class="pricing_box" style="left: 93%;">
            <input type="text" readonly value="{{__('website.home_page.weights.kg')}}" style="    width: 50px; text-align: center;">
        </div>
    </div>
    {{--   <div class="col-md-6 col-sm-6 mt-3 mb-3">
           <input type="number" name="" class="pricing_imput w-100" placeholder="{{__('website.home_page.en')}}">
           <div class="pricing_box">
               <select>
                   <option>{{__('website.home_page.sm')}}</option>
                   <option>{{__('website.home_page.m')}}</option>
                   <option>{{__('website.home_page.dm')}}</option>
               </select>
           </div>
       </div>--}}
    {{--   <div class="col-md-6 col-sm-6 mt-3 mb-3">
           <input type="number" name="" class="pricing_imput w-100" placeholder="{{__('website.length')}}">
           <div class="pricing_box">
               <select>
                   <option>{{__('website.home_page.sm')}}</option>
                   <option>{{__('website.home_page.m')}}</option>
                   <option>{{__('website.home_page.dm')}}</option>
               </select>
           </div>
       </div>--}}
    {{--     <div class="col-md-6 col-sm-6 mt-3 mb-3">
             <input type="number" name="" class="pricing_imput w-100" placeholder="{{__('website.height')}}">
             <div class="pricing_box">
                 <select>
                     <option>{{__('website.home_page.sm')}}</option>
                     <option>{{__('website.home_page.m')}}</option>
                     <option>{{__('website.home_page.dm')}}</option>
                 </select>
             </div>
         </div>--}}
    <div class="col-md-12 col-sm-12 col-xs-12 mt-4"></div>
    <div class="col-md-6 col-sm-6 col-xs-6 mt-3 mb-3 pricing_price_blue">
        <button id="calculate" class="order_button" style="/* background: #ffeca1; */
    border: 2px solid #2AF598;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 4px;
    margin-left: 10px;
    height: 45px;
    color: #fff;
    font-family: 'Montserrat-Bold';">{{__('website.calculate')}}</button>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6 mt-3 mb-3 pricing_price text-right">
        <div class="all">
            {{__('website.total')}} : <strong class="ml-3" id="result-price"></strong>
        </div>
    </div>
</div>
@push('scripts')
    <script src="{{url('front/js/pricing.js')}}"></script>
@endpush
