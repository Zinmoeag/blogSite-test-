@if(session("invalid"))

      <div class="alert alert-danger col-12 flashMessage"> {{session("invalid")}} </div>

@endif

@if(session('created'))

      <div class="alert alert-success col-12 flashMessage"> {{session('created')}} </div>

@endif

@if(session('welcome-back'))

      <div class="alert alert-success col-12 flashMessage"> {{session('welcome-back')}} </div>

@endif


@if(session('paschange'))

      <div class="alert alert-success col-12 flashMessage"> {{session('paschange')}} </div>

@endif



@if(session("IncorrectPas"))

      <div class="alert alert-danger col-12 flashMessage"> {{session("IncorrectPas")}} </div>

@endif


@if(session("server error"))

      <div class="alert alert-danger col-12 flashMessage"> {{session("server error")}} </div>

@endif


@if(session("email-sent"))

      <div class="alert alert-success col-12 flashMessage"> {{session("email-sent")}} </div>

@endif

@if(session("Invalid Token"))

      <div class="alert alert-danger col-12 flashMessage"> {{session("Invalid Token")}} </div>

@endif

