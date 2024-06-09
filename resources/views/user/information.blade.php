@extends('templates.navbar')

@section('container')
    <!-- Information section Starts -->
    <section class="about" id="about">
        <div class="row">
            <div class="image">
                <img src="{{ asset('images/information.svg') }}" alt="">
            </div>
            <div class="content">
                <h3>we take care of your healthy life</h3>
                <p>Victoria Hospital provides a variety of services including patient care, surgical units, medical
                    examinations and more. Our medical team is committed to providing safe and effective care. </p>
            </div>
        </div>
    </section>

    <section class="information" id="information">
        <div class="box-container">
            <div class="box">
                <h3>About Us</h3>
                <p class="text"> Welcome to Victoria Hospital, a leading health center committed to providing high
                    quality and caring healthcare services to the community. Established in 2024, Victoria Hospital has
                    become the top choice for patients seeking holistic, leading-edge care.
                </p>
            </div>
            <div class="box">
                <h3>Mission</h3>
                <ul class="text">
                    <li>Providing guaranteed, affordable and patient-oriented health services.</li>
                    <li>We are committed to providing the best and most affordable service.</li>
                    <li>Actively participate in improving public health and providing health education.</li>
                </ul>
            </div>
            <div class="box">
                <h3>Value</h3>
                <ul class="text">
                    <li>Caring and Empathy</li>
                    <li>Quality and Safety</li>
                    <li>Integrity and Ethics</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="info" id="info">
        <div class="contact-info">
            <p><i class="fas fa-phone"></i> (021)79136540
                <i class="fas fa-envelope"></i> victoria.info.@gmail.com
                <i class="fas fa-map-marker-alt"></i> Victoria Hospital Kec. Gayungan, Surabaya
            </p>
        </div>
    </section>
    <!-- Information section End -->
@endsection
