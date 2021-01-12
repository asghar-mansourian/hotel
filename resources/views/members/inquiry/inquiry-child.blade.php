@section('styles')
    <style>
        img:hover{
            cursor:pointer
        }
        .img_comment{
            width:auto;
            height:50px;
        }
        p{
            background-color: darkseagreen;
        }
        .right{
            direction: rtl;
            text-align: left;
            padding-right:10px;
        }
    </style>
    @endsection
<div class="right">
<p style="    word-break: break-all;
    height: auto;
    text-align: justify;
    direction: ltr;
    color: #f25c69;
    padding: 26px;
    border-radius: 6px;
    border: 2px solid #f25c69;background-color: white">
    {{__('member.title')}}: {{$inquiry->title}}
    <br>
    {{$inquiry->message}}
    @if($inquiry->image)
        <br>
{{--        <img class="img_comment" src="{{ route('storage_image',$inquiry->image->id) }}">--}}
    @endif
    <br>
    {{__('member.date')}}: {{$inquiry->created_at}}
</p>


</div>
@foreach($inquiry->inquirys as $inquiry_child)
       @if($inquiry_child->user_id == auth()->user()->id)
           <div class="right">
               <p style="  word-break: break-all;
    height: auto;
    text-align: justify;
    direction: ltr;
    color: #f25c69;
    padding: 26px;
    border-radius: 6px;
    border: 2px solid #f25c69;background-color: white">
                   {{$inquiry_child->message}}
                   @if($inquiry_child->image)
                       <br>
{{--                       <img class="img_comment" src="{{ route('storage_image',$inquiry_child->image->id) }}">--}}

                   @endif
                   <br>
                   {{__('member.date')}}: {{$inquiry_child->created_at}}
               </p>
           </div>

           @else
           <div class="right">
               <p style="background-color: #fff3cd">
                   {{__('member.answer')}}:
                   {{$inquiry_child->message}}
                   @if($inquiry_child->image)
                       <br>
{{--                       <img class="img_comment" src="{{ route('storage_image',$inquiry_child->image->id) }}">--}}
                   @endif
                   <br>
                   {{__('member.date')}}: {{$inquiry_child->created_at}}
               </p>
           </div>
       @endif
@endforeach
</div>
   <div class="row">
       @include('members.partials.validation_errors')
       <form method="post" action="{{route('inquiry_store')}}" enctype="multipart/form-data">
           @csrf
           <input type="hidden" name="parent_id" value="{{$inquiry->id}}">
           <div class="col-md-12">
               <input type="file" name="file" class="courier_file w-100">
           </div>
           <div class="col-md-12">
               <textarea class="courier_textare" name="message" value="Qeyd" placeholder="{{__('member.message')}}"></textarea>
               <button class="btn courier_button">{{__('member.send')}}</button>
           </div>
       </form>
<div class="modal fade" role="dialog" id="imgmodal">
    <div class="modal-dialog">
        <div class="modal-content"></div>
        <img class="img-responsive" src="" id="show-img">
    </div>
</div>
       @section('footerCustom')
    <script>
        $(document).ready(function(){
            $(".img_comment").click(function(){
                var img=$(this).attr('src');
                    $("#show-img").attr('src',img);
                    $("#imgmodal").modal('show');
            });
        });
    </script>
           @endsection


