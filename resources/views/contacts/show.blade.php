@extends('layouts.app')

@section('titleP',"contact-us")
@section('meta_description',"contact us page")
@section('meta_keyword',"contact us page")
    




@section('content')

<div class="py-5">



<div class="container">


 <!--Section: Contact v.2-->
    <section class="mb-5">

        <!--Section heading-->
        <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
        <!--Section description-->
        <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
            a matter of hours to help you.</p>

        <div class="row ">

            <!--Grid column-->
            <div class="col-md-9 mb-md-0 mb-5">
                <form id="contact-form" name="contact-form" action="{{route('contact.send')}}" method="POST">
                    @csrf
                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="text" id="name" name="name" class="form-control">
                                <label for="name" class="">Your name</label>
                            </div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="text" id="email" name="email" class="form-control">
                                <label for="email" class="">Your email</label>
                            </div>
                        </div>
                        <!--Grid column-->

                    </div>
                    <!--Grid row-->

                    <!--Grid row-->
                    
                    <!--Grid row-->

                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-12">

                            <div class="md-form">
                                <textarea type="text" id="message" name="content" rows="2" class="form-control md-textarea"></textarea>
                                <label for="message">Your message</label>
                            </div>

                        </div>
                    </div>
                    <!--Grid row-->

                    <div class="row">
                        <div class="col-md-4">

                            <div class="md-form">
                                <button class="btn btn-primary" type="submit">Send</button>
                            </div>
                        </div>
                    </div>

                </form>

                {{-- <div class="text-center text-md-left">
                    <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Send</a>
                </div> --}}
                <div class="status"></div>
            </div>
            <!--Grid column-->

        

        </div>

    </section>
<!--Section: Contact v.2-->

</div>



</div>
    
@endsection