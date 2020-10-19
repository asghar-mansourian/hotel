<script src="{{url('front/js/style_js.js')}}"></script>
<script src="{{url('front/js/jquery.js')}}"></script>
<script src="{{url('front/js/bootstrap.min.js')}}"></script>
<script src="{{url('front/js/bootstrap-select.min.js')}}"></script>
<script src="{{url('front/js/clipboard.min.js')}}"></script>


<script>
    function showStuff(id, text, btn) {
        document.getElementById(id).style.display = 'block';
        document.getElementById(text).style.display = 'none';
        btn.style.display = 'none';
    }
</script>
