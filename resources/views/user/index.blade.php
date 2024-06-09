@extends('templates.navbar')

@section('container')
    @php
        use Carbon\Carbon;
    @endphp
    <!-- Home Section starts -->
    <section class="home" id="home">
        <div class="content">
            <h3>stay safe, stay healthy</h3>
            <p> We are fully dedicated to caring for your health and assisting you on your healing journey.</p>
            <a href="register.html" class="btn">register now <span class="fas fa-chevron-right"></span> </a>
        </div>
    </section>
    <!-- Home Section End -->

    <!-- Blogs section Starts -->
    <section class="blogs" id="blogs">
        <h1 class="heading"> Newest <span> Articles </span></h1>
        <div class="box-container">
            @foreach ($newses as $news)
                <div class="box">
                    <div class="image">
                        <img src="{{ $news->img_url }}" alt="">
                    </div>
                    <div class="content">
                        <h3>{{ $news->title }}</h3>
                        <div class="icon">
                            <a href="#"><i class="fas fa-calendar"></i>{{  Carbon::parse($news->date)->translatedFormat('d F Y') }}</a>
                        </div>
                        <p>Campos has Type 1 diabetes, meaning her pancreas doesn’t produce enough insulin to regulate her
                            glucose levels.</p>
                        <a href="{{ $news->news_url }}"
                            class="btn">learn more <span class="fas fa-chevron-right"></span> </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- Blogs section End -->

    <!-- Service section Starts  -->
    <section class="services" id="services">
        <h1 class="heading">our <span>services</span></h1>
        <div class="box-container">
            <div class="box">
                <i class="fas fa-notes-medical"></i>
                <h3>free checkups</h3>
                <a href="appointment.html" class="btn">learn more <span class="fas fa-chevron-right"></span> </a>
            </div>
            <div class="box">
                <i class="fas fa-ambulance"></i>
                <h3>24/7 ambulance</h3>
                <a href="ambulance.html" class="btn">learn more <span class="fas fa-chevron-right"></span> </a>
            </div>
            <div class="box">
                <i class="fas fa-user-md"></i>
                <h3>expert doctors</h3>
                <a href="doctor.html" class="btn">learn more <span class="fas fa-chevron-right"></span> </a>
            </div>
            <div class="box">
                <i class="fas fa-pills"></i>
                <h3>medicines</h3>
                <a href="pharmacy.html" class="btn">learn more <span class="fas fa-chevron-right"></span> </a>
            </div>
            <div class="box">
                <i class="fas fa-procedures"></i>
                <h3>bed facility</h3>
                <a href="room.html" class="btn">learn more <span class="fas fa-chevron-right"></span> </a>
            </div>
            <div class="box">
                <i class="fas fa-heartbeat"></i>
                <h3>total care</h3>
                <a href="facilities.html" class="btn">learn more <span class="fas fa-chevron-right"></span> </a>
            </div>
        </div>
    </section>
    <!-- Service section End  -->

    <!-- Review section Starts  -->
    <section class="review" id="review">
        <h1 class="heading">client's <span>review</span></h1>
        <div class="box-container">
            <div class="box">
                <img src="{{ asset('images/pic-1.png') }}" alt="">
                <h3>Chris Evan</h3>
                <p class="text">I had an exceptional experience at this hospital. The staff was incredibly attentive and
                    caring throughout my entire stay. From the moment I walked in, I felt welcomed and well taken care of.
                    The facilities were clean, and the medical team was highly professional. I highly recommend this
                    hospital to anyone in need of medical care.</p>
            </div>
            <div class="box">
                <img src="../image/pic-2.png" alt="">
                <h3>Roseanne Park</h3>
                <p class="text">Overall, my visit to this hospital was satisfactory. The medical staff were knowledgeable
                    and efficient in their care. However, I did encounter some delays in receiving certain services. Despite
                    this, the quality of care provided was excellent. The facilities were clean and well-maintained. I would
                    consider returning to this hospital for any future medical needs.</p>
            </div>
            <div class="box">
                <img src="../image/pic-3.png" alt="">
                <h3>Tom Holland</h3>
                <p class="text">The medical team went above and beyond to ensure my comfort and well-being. They took the
                    time to explain my treatment plan thoroughly and addressed all of my concerns with patience and empathy.
                    The facilities were top-notch and impeccably clean. I would highly recommend this hospital to anyone
                    seeking medical care.</p>
            </div>
        </div>
    </section>
    <!-- Review section End  -->
@endsection
