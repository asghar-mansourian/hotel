<div class="row">
    <div class="col-md-6">
        <div class="h4_height">
            <h5 class="use_dis_no">customer code: <strong>{{\Illuminate\Support\Facades\Auth::user()->code}}</strong>
            </h5>
        </div>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{route('invoices.create')}}" class="invoice_button">register invoice</a>
        <a href="{{route('invoices.create')}}" class="order_button">register order</a>
    </div>
</div>
