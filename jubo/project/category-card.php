<!-- Font Awesome CDN for icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<!-- Taking the Card Details from Database -->


<div class="col-lg-12 mt-3" data-aos="fade-left">
<div class="row g-3 justify-content-center align-items-center">
  <!-- Card 1 - Total Trainers -->
  <div class="col-6 col-md-4 col-lg-2 mb-3">
    <div class="card text-white text-center h-100 shadow-sm" style="background-color: #d4edda;">
      <div class="card-body">
        <div class="icon-wrapper mb-2">
          <i class="fas fa-chalkboard-teacher h1 icon-hover text-success"></i>
        </div>
       <h4 class="fw-bold mb-1 text-dark" id="counter" data-target="192">0</h4>

       <script>
    document.addEventListener("DOMContentLoaded", function () {
        const counter = document.getElementById('counter');
        const target = +counter.getAttribute('data-target');
        let count = 0;

        const speed = 20; // Smaller value = faster

        const updateCount = () => {
            const increment = Math.ceil(target / 100); // adjust step
            if (count < target) {
                count += increment;
                counter.innerText = count > target ? target : count;
                setTimeout(updateCount, speed);
            } else {
                counter.innerText = target;
            }
        };

        updateCount();
    });
</script>


        <p class="text-muted mb-0">Total Trainers</p>
      </div>
    </div>
  </div>

  <!-- Card 2 - Total Students -->
  <div class="col-6 col-md-4 col-lg-2 mb-3">
    <div class="card text-white text-center h-100 shadow-sm" style="background-color: #e2e3e5;">
      <div class="card-body">
        <div class="icon-wrapper mb-2">
          <i class="fas fa-user-graduate h1 icon-hover text-secondary"></i>
        </div>
        <h4 class="fw-bold mb-1 text-dark" id="counter2" 
         data-target="2400">0</h4>

          <script>
    document.addEventListener("DOMContentLoaded", function () {
        const counter2 = document.getElementById('counter2');
        const target = +counter2.getAttribute('data-target');
        let count = 0;

        const speed = 20; // Smaller value = faster

        const updateCount = () => {
            const increment = Math.ceil(target / 100); // adjust step
            if (count < target) {
                count += increment;
                counter2.innerText = count > target ? target : count;
                setTimeout(updateCount, speed);
            } else {
                counter2.innerText = target;
            }
        };

        updateCount();
    });
</script>

        <p class="text-muted mb-0">Total Tranees</p>
      </div>
    </div>
  </div>

  <!-- Card 3 - Male Students -->
  <div class="col-6 col-md-4 col-lg-2 mb-3">
    <div class="card text-white text-center h-100 shadow-sm" style="background-color: #cfe2ff;">
      <div class="card-body">
        <div class="icon-wrapper mb-2">
          <i class="fas fa-male h1 icon-hover text-primary"></i>
        </div>
        <!-- <h4 class="fw-bold mb-1 text-dark">
         1446 (61%)
        </h4> -->
       <h4 class="fw-bold mb-1 text-dark" id="counter3" data-target="1446">0 (61%)</h4>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const counter3 = document.getElementById('counter3');
        const target = +counter3.getAttribute('data-target');
        const percentageText = ' (61%)'; // fixed text part
        let count = 0;

        const speed = 20;

        const updateCount = () => {
            const increment = Math.ceil(target / 100);
            if (count < target) {
                count += increment;
                counter3.innerText = (count > target ? target : count) + percentageText;
                setTimeout(updateCount, speed);
            } else {
                counter3.innerText = target + percentageText;
            }
        };

        updateCount();
    });
</script>


        <p class="text-muted mb-0">Male Tranees</p>
      </div>
    </div>
  </div>

  <!-- Card 4 - Female Students -->
  <div class="col-6 col-md-4 col-lg-2 mb-3">
    <div class="card text-white text-center h-100 shadow-sm" style="background-color: #fce5cd;">
      <div class="card-body">
        <div class="icon-wrapper mb-2">
          <i class="fas fa-female h1 icon-hover text-danger"></i>
        </div>
        <!-- <h4 class="fw-bold mb-1 text-dark">
        936 (39%)
        </h4> -->
          <h4 class="fw-bold mb-1 text-dark" id="counter4" data-target="936">0 (39%)</h4>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const counter4 = document.getElementById('counter4');
        const target = +counter4.getAttribute('data-target');
        const percentageText = ' (39%)'; // fixed text part
        let count = 0;

        const speed = 20;

        const updateCount = () => {
            const increment = Math.ceil(target / 100);
            if (count < target) {
                count += increment;
                counter4.innerText = (count > target ? target : count) + percentageText;
                setTimeout(updateCount, speed);
            } else {
                counter3.innerText = target + percentageText;
            }
        };

        updateCount();
    });
</script>

        <p class="text-muted mb-0">Female Tranees</p>
      </div>
    </div>
  </div>

  <!-- Card 5 - Earnings (Dollar) -->
  <div class="col-6 col-md-4 col-lg-2 mb-3">
    <div class="card text-white text-center h-100 shadow-sm" style="background-color: #fff3cd;">
      <div class="card-body">
        <div class="icon-wrapper mb-2">
          <i class="fas fa-dollar-sign h1 icon-hover" style="color: #ed0808;"></i>
        </div>
        <!-- <h4 class="fw-bold mb-1 text-dark">
      <i class="fa-solid fa-dollar-sign"></i> 1,52,329
        </h4> -->

         <h4 class="fw-bold mb-1 text-dark" id="counter5" 
         data-target=" 152329">0</h4>

          <script>
    document.addEventListener("DOMContentLoaded", function () {
        const counter5 = document.getElementById('counter5');
        const target = +counter5.getAttribute('data-target');
        let count = 0;

        const speed = 20; // Smaller value = faster

        const updateCount = () => {
            const increment = Math.ceil(target / 100); // adjust step
            if (count < target) {
                count += increment;
                counter5.innerText = count > target ? target : count;
                setTimeout(updateCount, speed);
            } else {
                counter5.innerText = target;
            }
        };

        updateCount();
    });
</script>
        <p class="text-muted mb-0">Earnings (Dollar)</p>
      </div>
    </div>
  </div>

  <!-- Card 6 - Earnings (DDT) -->
  <div class="col-6 col-md-4 col-lg-2 mb-3">
    <div class="card text-white text-center h-100 shadow-sm" style="background-color: #f8d7da;">
      <div class="card-body">
        <div class="icon-wrapper mb-2">

          <i class="fa-solid fa-bangladeshi-taka-sign h1 icon-hover text-danger"></i>
        </div>
        <h4 class="fw-bold mb-1 text-dark" id="counter6" 
         data-target="19041125"> 
           0
        </h4>
          <script>
    document.addEventListener("DOMContentLoaded", function () {
        const counter6 = document.getElementById('counter6');
        const target = +counter6.getAttribute('data-target');
        let count = 0;

        const speed = 20; // Smaller value = faster

        const updateCount = () => {
            const increment = Math.ceil(target / 100); // adjust step
            if (count < target) {
                count += increment;
                counter6.innerText = count > target ? target : count;
                setTimeout(updateCount, speed);
            } else {
                counter6.innerText = target;
            }
        };

        updateCount();
    });
</script>

        <p class="text-muted mb-0">Earnings (BDT)</p>
      </div>
    </div>
  </div>

  <!-- Card 7 - Job Placements -->
  <div class="col-6 col-md-4 col-lg-3 mb-3">
    <div class="card text-white text-center h-100 shadow-sm" style="background-color: #d1ecf1;">
      <div class="card-body">
        <div class="icon-wrapper mb-2">
          <i class="fas fa-briefcase h1 icon-hover text-info"></i>
        </div>
        <!-- <h4 class="fw-bold mb-1 text-dark">
         1512(60%)
        </h4> -->


  <h4 class="fw-bold mb-1 text-dark" id="counter7" data-target="1512">0 (60%)</h4>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const counter7 = document.getElementById('counter7');
        const target = +counter7.getAttribute('data-target');
        const percentageText = ' (60%)'; // fixed text part
        let count = 0;

        const speed = 20;

        const updateCount = () => {
            const increment = Math.ceil(target / 100);
            if (count < target) {
                count += increment;
                counter7.innerText = (count > target ? target : count) + percentageText;
                setTimeout(updateCount, speed);
            } else {
                counter7.innerText = target + percentageText;
            }
        };

        updateCount();
    });
</script>


        <p class="text-muted mb-0">Job Placements</p>
      </div>
    </div>
  </div>

  <!-- Card 8 - Completed Batch -->
  <div class="col-6 col-md-4 col-lg-3 mb-3">
    <div class="card text-white text-center h-100 shadow-sm" style="background-color: #d4edda;">
      <div class="card-body">
        <div class="icon-wrapper mb-2">
          <i class="fas fa-check-circle h1 icon-hover text-success"></i>
        </div>
        <h4 class="fw-bold mb-1 text-dark">
         01
        </h4>
        <p class="text-muted mb-0">Completed Batch</p>
      </div>
    </div>
  </div>

  <!-- Card 9 - On Going Batch -->
  <div class="col-6 col-md-4 col-lg-3 mb-3">
    <div class="card text-white text-center h-100 shadow-sm" style="background-color: #f0f0f0;">
      <div class="card-body">
        <div class="icon-wrapper mb-2">
          <i class="fas fa-spinner h1 icon-hover text-secondary"></i>
        </div>
        <h4 class="fw-bold mb-1 text-dark">
         2nd
        </h4>
        <p class="text-muted mb-0">On Going Batch</p>
      </div>
    </div>
  </div>

  <!-- Card 10 - Running Trainers -->
  <div class="col-6 col-md-4 col-lg-3 mb-3">
    <div class="card text-white text-center h-100 shadow-sm" style="background-color: #e2f0d9;">
      <div class="card-body">
        <div class="icon-wrapper mb-2">
          <i class="fas fa-running h1 icon-hover text-success"></i>
        </div>
        <!-- <h4 class="fw-bold mb-1 text-dark">
         2400
        </h4> -->

         <h4 class="fw-bold mb-1 text-dark" id="counter10" 
         data-target="2400">0</h4>

          <script>
    document.addEventListener("DOMContentLoaded", function () {
        const counter10 = document.getElementById('counter10');
        const target = +counter2.getAttribute('data-target');
        let count = 0;

        const speed = 20; // Smaller value = faster

        const updateCount = () => {
            const increment = Math.ceil(target / 100); // adjust step
            if (count < target) {
                count += increment;
                counter10.innerText = count > target ? target : count;
                setTimeout(updateCount, speed);
            } else {
                counter10.innerText = target;
            }
        };

        updateCount();
    });
</script>
        <p class="text-muted mb-0">Running Tranees</p>
      </div>
    </div>
  </div>
</div>


  <!-- Hover effect for icons -->
  <style>
    .icon-hover {
      transition: all 0.3s ease-in-out;
    }

    .icon-hover:hover {
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      border-radius: 50%;
    }
  </style>
</div>
<!-- End of the card section -->