<?php require_once 'vwheader.php'; ?>


  <div class="container ">
    <div>
      <canvas id="temperatureChart"></canvas>
    </div>

    <script>
      const labels = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
      ];

      const data = {
        labels: labels,
        datasets: [{
          label: 'Temperature',
          backgroundColor: 'rgb(255, 99, 132)',
          borderColor: 'rgb(255, 99, 132)',
          data: [0, 10, 5, 2, 20, 30, 45],
        }]
      };

      const config = {
        type: 'line',
        data: data,
        options: {}
      };
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      const myChart = new Chart(
        document.getElementById('temperatureChart'),
        config
      );
    </script>
  </div>
</div>


<?php require_once 'vwfooter.php'; ?>
</body>

</html>