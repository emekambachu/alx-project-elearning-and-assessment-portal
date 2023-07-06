@extends('layouts.main')

@section('title')
    Application
@endsection

@section('top-assets')
<style>
    .header{
        width: 100vw;
        height: auto;
        left: -23px;
        top: 73px;

        background: #780101;
    }

    .form-header >span{
        color: #780101;
    }

    label >span{
        color: #780101;
    }

    .header > h4{
        left: 80px;
        top: 120px;

        font-family: 'Inter', serif;
        font-style: normal;
        font-weight: 600;
        font-size: 32px;
        line-height: 39px;
    }

    .header > p {
        left: 79px;
        top: 178px;

        font-family: 'Inter', serif;
        font-style: normal;
        font-weight: 400;
        font-size: 16px;
        line-height: 19px;
    }

    .form-header{
        font-weight: 500;
        font-size: 18px;
        line-height: 22px;
    }

    .nomination-btn {
       height: 51px;
       width: 213px;
       border-radius: 5px;
       border-color: #780101;
       padding: 16px 32px 16px 32px;
       background: #780101;
       color: #fff;
    }

   input[type=checkbox]{
       width: 20px;
   }

   input[type=radio]{
       width: 20px;
   }

    /* Overwrite date-picker css style */
    .dp__input {
        background-color: var(--dp-background-color);
        border-radius: 8px;
        font-family: -apple-system, blinkmacsystemfont, "Segoe UI", roboto, oxygen, ubuntu, cantarell, "Open Sans", "Helvetica Neue", sans-serif;
        border: 1px solid #039246;
        outline: none;
        transition: border-color .2s cubic-bezier(0.645, 0.045, 0.355, 1);
        width: 100%;
        font-size: 1rem;
        line-height: 1.5rem;
        padding: 6px 12px;
        color: var(--dp-text-color);
        box-sizing: border-box;
        height: 46px;
    }
</style>
@endsection

@section('content')
    <section
        class="wow fadeIn parallax padding-five-tb"
        data-stellar-background-ratio="0.5"
        style="background-image: url(&quot;{{ asset('/images/workshop/1.png') }}&quot;);
         visibility: visible; animation-name: fadeIn;">
        <div class="opacity-medium bg-extra-dark-gray"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4 class="text-white custom-font2 text-left font-weight-500 letter-spacing-minus-1 text-center"
                        style="margin-bottom: 0;">ALX | E-learning and Assessment Portal (BRACE)</h4>
                </div>
            </div>
        </div>
    </section>

    <section class="wow fadeIn padding-20px-tb border-bottom bg-brand-color"
             style="visibility: visible; animation-name: fadeIn;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 breadcrumb alt-font text-medium">
                    <!-- breadcrumb -->
                    <ul>
                        <li><a href="{{ url('/') }}" class="text-light">Overview</a></li>
                        <li class="text-light">Application</li>
                    </ul>
                    <!-- end breadcrumb -->
                </div>
            </div>
        </div>
    </section>

    <!--Keep here to avoid conflict with blade scripts-->
    <script type="text/javascript" defer src="{{ asset('js/app.js') }}"></script>
    <section id="app"
             class="wow fadeIn padding-five-tb"
             style="visibility: visible; animation-name: fadeIn; background-color:#E5E5E5;">
        <application-form></application-form>
    </section>

@endsection

@section('bottom-assets')
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/5e315fed8e78b86ed8ab9ce7/default';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
@endsection
