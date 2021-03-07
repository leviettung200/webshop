@if(session('success'))

<div id="toast">
    <div class="notification success" id="notify">
        <i class="fa fa-bell-o" aria-hidden="true" style="font-size: 2rem"></i>
        <span>
            {{session('success')}}
        </span>
    </div>
</div>

@endif
@if(session('error'))

<div id="toast">
    <div class="notification danger" id="notify" style="background-color: #dd4b39">
        <i class="fa fa-bell-o" aria-hidden="true" style="font-size: 2rem"></i>
        <span>
            {{session('error')}}
        </span>
    </div>
</div>

@endif

