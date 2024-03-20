<!DOCTYPE html>
<html>
<head>
    <title>Card Price for</title>
</head>

<body>
<h1>Card Price for </h1>
<canvas id="myChartAvgSellPrice" height="50px"></canvas>
<canvas id="myChartLowPrice" height="50px"></canvas>
<canvas id="myChartTrendPrice" height="50px"></canvas>
<canvas id="myChartSuggestedPrice" height="50px"></canvas>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script type="text/javascript">

    var labels =  {{ Js::from($labels) }};
    var averageSellPrice =  {{ Js::from($avgSellPrice) }};
    var lowPrice =  {{ Js::from($lowPrice) }};
    var trendPrice =  {{ Js::from($trendPrice) }};
    var suggestedPrice =  {{ Js::from($suggestedPrice) }};

    const dataAvgSellPrice = {
        labels: labels,
        datasets: [{
            label: 'Average Sell Price',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: averageSellPrice,
        }]
    };

    const configAvgSellPrice = {
        type: 'line',
        data: dataAvgSellPrice,
        options: {}
    };

    const myChartAvgSellPrice = new Chart(
        document.getElementById('myChartAvgSellPrice'),
        configAvgSellPrice
    );

    const dataLowPrice = {
        labels: labels,
        datasets: [{
            label: 'Low Price',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: lowPrice,
        }]
    };

    const configLowPrice = {
        type: 'line',
        data: dataLowPrice,
        options: {}
    };

    const myChartLowPrice = new Chart(
        document.getElementById('myChartLowPrice'),
        configLowPrice
    );

    const dataTrendPrice = {
        labels: labels,
        datasets: [{
            label: 'Trend Price',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: trendPrice,
        }]
    };

    const configTrendPrice = {
        type: 'line',
        data: dataTrendPrice,
        options: {}
    };

    const myChartTrendPrice = new Chart(
        document.getElementById('myChartTrendPrice'),
        configTrendPrice
    );

    const dataSuggestedPrice = {
        labels: labels,
        datasets: [{
            label: 'Suggested Price',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: suggestedPrice,
        }]
    };

    const configSuggestedPrice = {
        type: 'line',
        data: dataSuggestedPrice,
        options: {}
    };

    const myChartSuggestedPrice = new Chart(
        document.getElementById('myChartSuggestedPrice'),
        configSuggestedPrice
    );

</script>
</html>
