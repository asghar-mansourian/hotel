@extends('layout.layout')
@section('title')
    Kargo | How We Work
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-7 col-sm-7">
                        <div class="black pt-5">How<span class="yellow ml-3 mr-3">Kargo</span>Works ?</div>
                        <div class="italic">Global turkey logistics and transportation<br/>services via sea, land and air.</div>
                    </div>
                    <div class="col-md-5 col-sm-5">
                        <div class="img_slider_con">
                            <img src="{{url('front/image/how_work.svg')}}" class="img_slider_faq">
                        </div>
                    </div>
                    <div class="col-md-12 mt-5 mb-5">
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <div class="how_work_list">
                                    <div class="how_work_page text-center">
                                        <img src="{{url('front/image/product_select.png')}}">
                                        <h4><strong>Qeydiyyatdan keç</strong></h4>
                                        <div class="yellow_border"></div>
                                        <div class="how_work_page_text">
                                            Kargo.az saytında qeydiyyatdan keçməklə, xaricdə daimi ünvana sahib olun.
                                        </div>
                                    </div>
                                    <div class="how_work_num">1</div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="how_work_list">
                                    <div class="how_work_page text-center">
                                        <img src="{{url('front/image/how_work_box.png')}}">
                                        <h4><strong>Sifarişi bizə yolla</strong></h4>
                                        <div class="yellow_border"></div>
                                        <div class="how_work_page_text">
                                            Onlayn mağazalardan alış-veriş edərkən bağlamanızın çatdırılacağı ünvan yerinə sizə təmin etdiyimiz ünvanı daxil edin.
                                        </div>
                                    </div>
                                    <div class="how_work_num">2</div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="how_work_list">
                                    <div class="how_work_page text-center">
                                        <img src="{{url('front/image/how_work_courier.png')}}">
                                        <h4><strong>Bağlamanı əldə et</strong></h4>
                                        <div class="yellow_border"></div>
                                        <div class="how_work_page_text">
                                            3-5 iş günü ərzində sifarişinizi Bakı anbarımızdan əldə edə və ya kuryer xidmətimizdən istifadə edə bilərsiniz.
                                        </div>
                                    </div>
                                    <div class="how_work_num">3</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footerCustom')
    <script>
        function showStuff(id, text, btn) {
            document.getElementById(id).style.display = 'block';
            document.getElementById(text).style.display = 'none';
            btn.style.display = 'none';
        }
    </script>
    <!-- faq menu js  -->
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var panel_faq = this.nextElementSibling;
                if (panel_faq.style.maxHeight) {
                    panel_faq.style.maxHeight = null;
                    panel_faq.style.margin = null;
                    panel_faq.style.padding = null;
                    panel_faq.style.border = null;
                } else {
                    panel_faq.style.maxHeight = panel_faq.scrollHeight + "10px";
                    panel_faq.style.margin = "20px 0";
                    panel_faq.style.padding = "15px";
                    panel_faq.style.border = "1px solid #eee";
                }
            });
        }
    </script>

@endsection
