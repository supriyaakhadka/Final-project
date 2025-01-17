@if(Session::has('success'))
<div class="fixed right-4 bottom-4 bg-indigo-50 px-7 py-3 rounded-lg shadow-lg border-l-8 border-blue-500" id="alertmessage">
    <p class="text-indigo-500 text-center text-xl font-bold"><i class="ri-check-double-line text-3xl"></i> <br>{{session('success')}}</p>

</div>
<script>
    setTimeout(function(){
        document.getElementById('alertmessage').style.
        display='none';

    },2000);
</script>
@endif

@if(Session::has('error'))
<div class="fixed right-4 bottom-4 bg-red-200 px-7 py-3 rounded-lg shadow-lg border-l-8 border-red-800" id="alertmessage">
    <p class="text-black text-center text-xl font-bold"><i class="ri-error-warning-fill text-3xl"></i> <br>{{session('error')}}</p>

</div>
<script>
    setTimeout(function(){
        document.getElementById('alertmessage').style.
        display='none';

    },2000);
</script>
@endif
