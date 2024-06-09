@extends('templates.navbar')

@section('container')
    <!-- Location Section Start  -->
    <section class="location" id="location">
        <h1 class="heading"><br> Our <span style="color: #205b48;">Location</span></h1>

        <div class="address">
            <h3>Strategic, Safe, and comfortable location is our mission to provide an experience for you. <br> Come
                visit us immediately at the relevant location!</h3>
            <p>Ketintang, Kec. Gayungan, Surabaya, Jawa Timur 60231</p>
        </div>

        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1978.6785193011883!2d112.72489273830925!3d-7.313727837784268!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb7a1a70b03f%3A0x30aff4f8ad9e7694!2sSurabaya%2C%20Ketintang%2C%20Kec.%20Gayungan%2C%20Surabaya%2C%20Jawa%20Timur%2060231!5e0!3m2!1sid!2sid!4v1709805421230!5m2!1sid!2sid"
                width="600" height="450" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>


        <div class="hours">
            <h2>We are open seven days a week<br>
                Visiting hours: 10.00 AM - 6.00 PM <span id="fullHours"></span>
            </h2>
            <br>
            <button onclick="showFullVisitingHours()">
                Show Full Visiting Hours
            </button>
        </div>
        </div>
    </section>
    </section>
    <!-- Location Section End  -->

    <!-- custom js file link  -->
    <script src="../js/script.js"></script>
    <script>
        function showFullVisitingHours() {
            var fullHoursElement = document.getElementById("fullHours");
            var button = document.querySelector("button");

            if (fullHoursElement.classList.contains("show")) {
                // If already shown, hide visiting hours and change button text
                fullHoursElement.classList.remove("show");
                button.textContent = "Show Full Visiting Hours";
            } else {
                // If not shown, show visiting hours and change button text
                var fullVisitingHours = `
      <br>
      <h4>VISITING HOURS</h4>
      <ul>
        <li>Monday - Friday: 3:00 PM - 6:00 PM</li>
        <li>Saturday, Sunday, and Public Holidays:
          <ul>
            <li>[Morning] 10:00 AM - 12:00 PM</li>
            <li>[Afternoon] 3:00 PM - 6:00 PM</li>
          </ul>
        </li>
      </ul>`;
                fullHoursElement.innerHTML = fullVisitingHours;
                fullHoursElement.classList.add("show");
                button.textContent = "Hide Visiting Hours";
            }
        }
    </script>
@endsection
