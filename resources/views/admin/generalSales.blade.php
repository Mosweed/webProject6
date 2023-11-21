<x-admin>
    <div class="row justify-center">
        <div class="col-8">
            <div class="filters">
                <label class="toggle">
                    <input id="filter-day" class="toggle-checkbox" type="checkbox">
                    <div class="toggle-switch"></div>
                    <span class="toggle-label">Dag</span>
                </label>
                <label class="toggle">
                    <input id="filter-month" class="toggle-checkbox" type="checkbox">
                    <div class="toggle-switch"></div>
                    <span class="toggle-label">Maand</span>
                </label>
                <label class="toggle">
                    <input id="filter-year" class="toggle-checkbox" type="checkbox">
                    <div class="toggle-switch"></div>
                    <span class="toggle-label">Jaar</span>
                </label>
            </div>
            <!-- <button onclick="" id="filter-day">
                day
            </button> -->
            <!-- <button id="filter-month">
                month
            </button>
            <button id="filter-year">
                year
            </button> -->
            <canvas style="display: block" id="chart-day"></canvas>
            <canvas style="display: none;" id="chart-month"></canvas>
            <canvas style="display: none;" id="chart-year"></canvas>
        </div>
    </div>
    <style>
        .filters {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-evenly;
        }

        .toggle {
            cursor: pointer;
            display: flex;
            flex-direction: column-reverse;
            justify-content: center;
            align-items: center;
            gap: 8px;
        }

        .toggle-switch {
            display: inline-block;
            background: #ccc;
            border-radius: 16px;
            width: 58px;
            height: 32px;
            position: relative;
            vertical-align: middle;
            transition: background 0.25s;
        }

        .toggle-switch:before,
        .toggle-switch:after {
            content: "";
        }

        .toggle-switch:before {
            display: block;
            background: linear-gradient(to bottom, #fff 0%, #eee 100%);
            border-radius: 50%;
            box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.25);
            width: 24px;
            height: 24px;
            position: absolute;
            top: 4px;
            left: 4px;
            transition: left 0.25s;
        }

        .toggle:hover .toggle-switch:before {
            background: linear-gradient(to bottom, #fff 0%, #fff 100%);
            box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.5);
        }

        .toggle-checkbox:checked+.toggle-switch {
            background: #6A9758;
        }

        .toggle-checkbox:checked+.toggle-switch:before {
            left: 30px;
        }

        .toggle-checkbox {
            position: absolute;
            visibility: hidden;
        }

        .toggle-label {
            margin-left: 5px;
            position: relative;
            top: 2px;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">
        let resdata = '{!! json_encode($chart_data) !!}';
        let data = JSON.parse(resdata);
        let chartDayEl = document.getElementById('chart-day').getContext('2d');
        let chartMonthEl = document.getElementById('chart-month').getContext('2d');
        let chartYearEl = document.getElementById('chart-year').getContext('2d');

        console.log(data);

        jQuery(document).ready(function() {
            console.log("ready!");
            $('#filter-day').prop('checked', true);
            $('#filter-day').on('change', function() {
                let checked = false;
                checked = $(this).is(':checked');
                console.log(checked);
                if (checked) {
                    $('#filter-month').prop('checked', false);
                    $('#filter-year').prop('checked', false);
                    $('#chart-day').show();
                    $('#chart-month').hide();
                    $('#chart-year').hide();
                }
            });
            $('#filter-month').on('click', function() {
                let checked = false;
                checked = $(this).is(':checked');
                console.log(checked);
                if (checked) {
                    $('#filter-day').prop('checked', false);
                    $('#filter-year').prop('checked', false);
                    $('#chart-day').hide();
                    $('#chart-month').show();
                    $('#chart-year').hide();
                }
            });
            $('#filter-year').on('click', function() {
                let checked = false;
                checked = $(this).is(':checked');
                console.log(checked);
                if (checked) {
                    $('#filter-month').prop('checked', false);
                    $('#filter-day').prop('checked', false);
                    $('#chart-day').hide();
                    $('#chart-month').hide();
                    $('#chart-year').show();
                }
            });
        });

        // Extract the sales by day data
        let salesByDayData = {
            label: 'Sales by Day',
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            data: data[0].sales_by_day.data
        };

        // Extract the sales by month data
        let salesByMonthData = {
            label: 'Sales by Month',
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            data: data[0].sales_by_month.data
        };

        // Extract the sales by year data
        let salesByYearData = {
            label: 'Sales by Year',
            backgroundColor: 'rgba(255, 206, 86, 0.2)',
            borderColor: 'rgba(255, 206, 86, 1)',
            data: data[0].sales_by_year.data
        };


        let saleDayChart = new Chart(chartDayEl, {
            type: 'bar',
            data: {
                labels: data[0].sales_by_day.labels,
                datasets: [salesByDayData]
            },
            options: {

                scales: {

                }
            }
        });
        let saleMonthChart = new Chart(chartMonthEl, {
            type: 'bar',
            data: {
                labels: data[0].sales_by_month.labels,
                datasets: [salesByMonthData]
            },
            options: {

                scales: {

                }
            }
        });

        let saleyYearChart = new Chart(chartYearEl, {
            type: 'bar',
            data: {
                labels: data[0].sales_by_year.labels,
                datasets: [salesByYearData]
            },
            options: {

                scales: {

                }
            }
        });
    </script>
</x-admin>