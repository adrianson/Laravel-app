<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daily user signups</title>
</head>

<body>
    <div class="chartBox" style="width: 700px;">

        <canvas id="myChart"></canvas>

        <label for="dates">Filter by date:</label>
        <select id="filterDate" name="dates">
            <option value="7">Last 7 days</option>
            <option value="14">Last 14 days</option>
            <option value="30">Last 30 days</option>
            <option value="">All</option>
        </select>

        <button onclick="filterDates()">Filter</button>
    </div>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>

    <script>
        const dates = {{ Js::from($dates) }}
        const signups = {{ Js::from($signups) }}

        // setup 
        const data = {
            labels: dates,
            datasets: [{
                label: 'Daily user signups',
                data: signups,
                backgroundColor: 'blue',
                borderWidth: 1
            }]
        };

        // config 
        const config = {
            type: 'bar',
            data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // initialize chart
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );

        function filterDates() {
            const filterDate = document.getElementById('filterDate');

            const datesFiltered = [];
            const signupsFiltered = [];

            dates.map((date, index, array) => {
                if (
                    filterDate.value == "" ||
                    ((array.length - 1 - index) < filterDate.value)
                ) {
                    datesFiltered.push(date);
                    signupsFiltered.push(signups[index]);
                }
            })

            myChart.config.data.labels = datesFiltered;
            myChart.config.data.datasets[0].data = signupsFiltered;
            myChart.update();
        }
    </script>
</body>

</html>
