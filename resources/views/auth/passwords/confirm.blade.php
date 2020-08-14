@extends('layouts.User.auth.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Confirm Password') }}</div>

                <div class="card-body">
                    {{ __('Please confirm your password before continuing.') }}

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirm Password') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection





@section('Css')

@endsection


@section('jScript')
<script>
    $("#inputGroupFile01").change(function(event) {
        RecurFadeIn();
        readURL(this);
    });
    $("#inputGroupFile01").on('click', function(event) {
        RecurFadeIn();
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var filename = $("#inputGroupFile01").val();
            filename = filename.substring(filename.lastIndexOf('\\') + 1);
            reader.onload = function(e) {
                debugger;
                $('#blah').attr('src', e.target.result);

                $('#blah').hide();
                $('#blah').fadeIn(500);
                $('.custom-file-label').text(filename);
            }
            reader.readAsDataURL(input.files[0]);
        }
        $(".alert").removeClass("loading").hide();
    }

    function RecurFadeIn() {
        console.log('ran');
        FadeInAlert("Wait for it...");
    }

    function FadeInAlert(text) {
        $(".alert").show();
        $(".alert").text(text).addClass("loading");

    }

    function slugify(str) {
        str = str.replace(/^\s+|\s+$/g, ''); // trim
        str = str.toLowerCase();

        // remove accents, swap ñ for n, etc
        var from = "àáãäâèéëêìíïîòóöôùúüûñç·/_,:;";
        var to = "aaaaaeeeeiiiioooouuuunc------";

        for (var i = 0, l = from.length; i < l; i++) {
            str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
        }

        str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
            .replace(/\s+/g, '-') // collapse whitespace and replace by -
            .replace(/-+/g, '-'); // collapse dashes

        return str;
    }

    $('#first_name').on('keyup', function() {
        var url = slugify($(this).val());
        $('#url').html(url);
        $('#slug').val(url);
    })




    $('#last_name').on('keyup', function() {

        var str = $('#first_name').val()
        // re-generate slug  if last name is changed
        var slug = slugify($('#first_name').val() + ' ' + $(this).val());
        // dispay in html



        $('#url').html(slug);
        $('#slug').val(slug);
    });



    @if(session('status'))
    $.notify({
        icon: "add_alert",
        title: "Notification",
        animate: {
            enter: "animated fadeInDown",
            exit: "animated fadeOutUp",
        },
        message: "{{ session('status') }}"
    }, {
        type: 'success',
        timer: 4000,
        placement: {
            from: 'top',
            align: 'center'
        }
    });
    @endif


    @if($errors - > any())
    $.notify({
        icon: "error",
        title: "<strong>An Error Occured</strong>",
        animate: {
            enter: "animated fadeInDown",
            exit: "animated fadeOutUp",
        },
        message: "<ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>"
    }, {
        type: 'danger',
        timer: 4000,
        placement: {
            from: 'top',
            align: 'center'
        }
    });

    @endif


    $(document).ready(function() {
        md.checkFullPageBackgroundImage();
        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700);
    });
</script>
@endsection
