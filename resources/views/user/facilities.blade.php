@extends('templates.navbar')

@section('container')
    
    <!-- Facilities section Starts -->
    <section class="fclt" id="fclt"> 
        <h1 class="heading"><span style="color: #333;">facilities</span></h1>
    <div class="container">
        <div class="container-box">
            <!-- Inpatient Care -->
            <div class="facility">
                <img src="/image/facility-1.jpg" alt="Inpatient Room">
                <div class="content">
                    <h2>Inpatient Room</h2>
                    <p>Our inpatient care facilities offer a serene and comfortable environment for patients requiring overnight stays. The cream-themed rooms are designed to promote healing and relaxation.</p>
                    <a href="room.html">
                        <button>Class Type</button>
                    </a>
                </div>
            </div>
            <!-- Emergency Unit (ER) -->
            <div class="facility">
                <img src="/image/facility-2.jpg" alt="Emergency Unit">
                <div class="content">
                    <h2>Emergency Unit (ER)</h2>
                    <p>Emergency facilities equipped to handle urgent medical cases.</p>
                    <a href="ambulance.html">
                        <button>Emergency Call</button>
                    </a>
                </div>
            </div>
             <!-- Pharmacy -->
             <div class="facility">
                <img src="../image/facility-3.jpeg" alt="Pharmacy">
                <div class="content">
                    <h2>Pharmacy</h2>
                    <p>Dispenses prescribed medications and provides pharmaceutical services.</p>
                    <a href="pharmacy.html">
                        <button>Pharmacy</button>
                    </a>
                </div>
            </div>
            <!-- Cafeteria -->
            <div class="facility">
                <img src="../image/facility-4.jpeg" alt="Cafeteria">
                <div class="content">
                    <h2>Cafeteria</h2>
                    <p>Dining facility serving patients, patient families and hospital staff.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="fclt" id="fclt" style="margin-top: -4rem;"> 
        <h1 class="heading">Services <span>Care</span></h1>
    <div class="container">
        <div class="container-box">
            <!-- Maternity and Obstetrics Ward -->
            <div class="facility">
                <img src="../image/facility-5.jpg" alt="Maternity and Obstetrics Ward">
                <div class="content">
                    <h2>Maternity and Obstetrics Ward</h2>
                    <p>Specialized area providing care for pregnant women and childbirth.</p>
                </div>
            </div>
            <!-- Medical and Diagnostic Examination -->
            <div class="facility">
                <img src="../image/facility-6.jpg" alt="Medical and Diagnostic Examination">
                <div class="content">
                    <h2>Medical and Diagnostic Examination</h2>
                    <p>Laboratory services for blood tests and other diagnostic procedures. Advanced imaging facilities including X-rays, MRI, CT scans, and ultrasonography.</p>
                </div>
            </div>
            <!-- Consultation and Psychological Services Facility -->
            <div class="facility">
                <img src="../image/facility-7.jpeg" alt="Consultation and Psychological Services Facility">
                <div class="content">
                    <h2>Consultation and Psychological Services Facility</h2>
                    <p>Provides consultations with specialist doctors and psychologists for mental health support.</p>
                </div>
            </div>
            <!-- Surgical Unit -->
            <div class="facility">
                <img src="/image/facility-8.jpg" alt="Surgical Unit">
                <div class="facility-content">
                    <h2>Surgical Unit</h2>
                    <p>The state-of-the-art surgical unit at Victoria Hospital boasts cream-colored interiors, creating a calming atmosphere. Our skilled surgical team ensures the highest standards of care in a modern and comforting setting.</p>
                </div>
            </div>
            <!-- Rehabilitation -->
            <div class="facility">
                <img src="../image/facility-9.jpeg" alt="Rehabilitation">
                <div class="content">
                    <h2>Rehabilitation</h2>
                    <p>Programs offering physical and occupational therapy for patient recovery.</p>
                </div>
            </div>
             <!-- Nutrition Center -->
            <div class="facility">
                <img src="../image/facility-10.jpeg" alt="Nutrition Center">
                <div class="content">
                    <h2>Nutrition Center</h2>
                    <p>Offers nutritional services to aid in patient recovery.</p>
                </div>
            </div>
            <!-- Research and Education Center -->
            <div class="facility">
                <img src="../image/facility-11.jpeg" alt="Research and Education Center">
                <div class="content">
                <h2>Research and Education Center</h2>
                <p>Facilities dedicated to medical research and education for staff members.</p>
                </div>
            </div>
        </div>
    </section>
<!-- Facilities section End -->
@endsection