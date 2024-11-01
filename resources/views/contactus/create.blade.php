


      @extends('layouts.app')

@section('content')
 
<section class="contact-section section-padding" id="section_5">
    <div class="container">
        <div class="row">   

            <div class="col-lg-12 col-12">
                 <h2 class="text-white mb-4 pb-lg-2">Contact</h2>
            </div>

            <div class="col-lg-6 col-12">
                <!-- Contact Form -->
                <form method="post" action="{{ route('contactus.store') }}" enctype="multipart/form-data" class="custom-form contact-form">
                    @csrf
                    <div class="row">

                        <div class="col-lg-6 col-12">
                            <label for="name" class="form-label">Name <sup class="text-danger">*</sup></label>
                            <input type="text" name="UserName" id="name" class="form-control" placeholder="Enter Your Name" value="{{ old('UserName') }}" >
                            @error("UserName")
                                <p class="text-light"> {{ $message }} </p>
                            @enderror
                        </div>

                        <div class="col-lg-6 col-12">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" name="Email" id="email" class="form-control" placeholder="Enter Email" value="{{ old('Email') }}" >
                            @error("Email")
                                <p class="text-light"> {{ $message }} </p>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" name="Phone" id="phone" class="form-control" placeholder="Enter Phone" value="{{ old('Phone') }}" >
                            @error("Phone")
                                <p class="text-light"> {{ $message }} </p>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="message" class="form-label">Message</label>
                            <textarea name="Message" rows="4" class="form-control" id="message" placeholder="Message" >{{ old('Message') }}</textarea>
                            @error("Message")
                                <p class="text-light"> {{ $message }} </p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-5 col-12 mx-auto mt-3">
                        <button type="submit" class="form-control">Send Message</button>
                    </div>
                </form>
            </div>

            <div class="col-lg-6 col-12 mx-auto mt-5 mt-lg-0 ps-lg-5">
                <!-- Contact Information Section -->
                <div class="contact-info">
                    <h3 class="title text-white">Let's get in touch</h3>
                    <p class="text-white">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe dolorum adipisci recusandae praesentium dicta!
                    </p>

                    <div class="col-lg-6 col-12 mx-auto mt-5 mt-lg-0 ps-lg-5">
                                      <img src="{{ asset('images/images.jpg') }}" alt="Barista Cafe Template">
 
                                
                                </div>

                    <!-- Social Media Links -->
                   
                </div>
            </div>

        </div>
    </div>
</section>



<!-- Nav and Header code -->

<!-- Swiper Section -->


@endsection
