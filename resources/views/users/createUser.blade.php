@extends('layouts.master')
@section('content')


    {{-- Mensaje de alerta cuando se crea un usuario --}}
    <div class="alert alert-success print-success-msg" style="display:none">
        @lang('register.success')
    </div>
        
    {{-- Mensaje de alerta cuando se genera un error --}}
    <div class="alert alert-danger print-error-msg" style="display:none">
        @lang('register.error')
        <ul></ul>
    </div>


    <form>
        
        {{csrf_field()}}
        

        <div class="form-group">
            
            <label for="inputFirstName">@lang('user.fName')</label>
            
            {{-- Div para mostrar el icono del usuario --}}
            <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-user-tie"></i></div>
                </div>
                {{-- Input para el nombre del usuario --}}
                <input type="text" name="firstName" class="form-control" id="inputFirstName" placeholder="@lang('user.fName')">
            </div>
        </div>
        
        <div class="form-group">
            <label for="inputLastName">@lang('user.lName')</label>

            {{-- Div para mostrar el icono del usuario --}}
            <div class="input-group mb-2 mr-sm-2">

                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-user-tie"></i></div>
                </div>
                {{-- Input para el apellido del usuario --}}
                <input type="text" name="lastName" class="form-control" id="inputLastName" placeholder="@lang('user.lName')">
            </div>
        </div>
        
        <div class="form-group">
            <label for="inputEmail">@lang('user.email')</label>

            {{-- Div para mostrar el icono del usuario --}}
            <div class="input-group mb-2 mr-sm-2">

                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                </div>
                {{-- Input para el email del usuario --}}
                <input type="text" name="email" class="form-control" id="inputEmail" placeholder="@lang('user.email')">
            </div>
        </div>

        {{-- Div para el captcha --}}
        {{-- <div class="form-group col-md-8">
                {!! Recaptcha::render() !!}
            </div> --}}

        <button type="submit" id="submitForm" class="btn btn-outline-primary btn-lg btn-block">@lang('register.submit')</button>
    </form>

@endsection

@section('script')

<script src='https://www.google.com/recaptcha/api.js'></script>

<script type="text/javascript">
   $(document).ready(function() {
        $("#submitForm").click(function(e){
            e.preventDefault();

            var _token = $("input[name='_token']").val();
            var firstName = $("input[name='firstName']").val();
            var lastName = $("input[name='lastName']").val();
            var email = $("input[name='email']").val();



            $.ajax({
                url: "/save",
                type:'POST',
                data: {
                    _token:_token, 
                    firstName:firstName, 
                    lastName:lastName, 
                    email:email
                },
                success: function(data) {
                    // si no hay error, muestro un mensaje de creacion
                    if($.isEmptyObject(data.error)){
                        $(".print-success-msg").find("ul").html('');
                        $(".print-success-msg").css('display','block');
                    
                    // Si hay error, muestro los mensajes de error
                    }else{
                        printErrorMsg(data.error);
                    }
                }
            });


        }); 

       /** 
        * Muestra los mensajes de error
        * @param msg son los mensajes de error
       */
        function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            
            $.each( msg, function( key, value ) {
                if( key == 'firstName' ) {
                    
                    $(".print-error-msg").find("ul").append('<li>'+'The first name is required'+'</li>');
                }
                if( key == 'email' && value == 'validation.required') {
                    
                    $(".print-error-msg").find("ul").append('<li>'+'The email is required'+'</li>');
                } else if (  key == 'email' && value == 'validation.email' ){
                    
                    $(".print-error-msg").find("ul").append('<li>'+'The email must be a valid email address'+'</li>');
                }
                
                if( key == 'g-recaptcha-response' ) {
                    
                    $(".print-error-msg").find("ul").append('<li>'+'The reCaptcha is required'+'</li>');
                }
                
            });
        }
    });

</script>

    
@endsection