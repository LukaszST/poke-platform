@extends('layouts.app')

@section('content')
<div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">
    <h1 class="text-center">Card Price for {{ $cardData->getName() }}</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 gap-10">
            <div class="rounded overflow-hidden shadow-lg">
                <a href="#"></a>
                <div class="relative">
                    <a href="#">
                        <img class="w-full"
                             src="{{$cardData->getImages()->getSmall()}}"
                             alt="">
                        <div
                            class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25">
                        </div>
                    </a>
                    <a href="#!">
                        <div
                            class="absolute bottom-0 left-0 bg-indigo-600 px-4 py-2 text-white text-sm hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                            {{$cardData->getName()}}
                        </div>
                    </a>

                    <a href="!#">
                        <div
                            class="text-sm absolute top-0 right-0 bg-indigo-600 px-4 text-white rounded-full h-16 w-16 flex flex-col items-center justify-center mt-3 mr-3 hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                            <span class="font-bold">{{$cardData->getCardmarket()->getPrices()->getTrendPrice()}}</span>
                            <small>Trend Price</small>
                        </div>
                    </a>
                </div>
            </div>
    </div>
</div>

<h2 class="text-center">Average Sell Price</h2>
<canvas id="myChartAvgSellPrice" height="50px"></canvas>

<h2 class="text-center">Low Price</h2>
<canvas id="myChartLowPrice" height="50px"></canvas>

<h2 class="text-center">Trend Price</h2>
<canvas id="myChartTrendPrice" height="50px"></canvas>

<h2 class="text-center">Suggested Price</h2>
<canvas id="myChartSuggestedPrice" height="50px"></canvas>
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
@endsection
