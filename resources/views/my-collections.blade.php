@extends('layouts.app')

@section('content')
<div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">
    <canvas id="myChartTrendPrice" height="50px"></canvas>

    <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 gap-10">
        @foreach($cardList as $key => $card)
            <div class="rounded overflow-hidden shadow-lg">
                <a href="#"></a>
                <div class="relative">
                    <a href="#">
                        <img class="w-full"
                             src="{{$card->getImages()->getSmall()}}"
                             alt="">
                        <div
                            class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25">
                        </div>
                    </a>
                    <a href="#!">
                        <div
                            class="absolute bottom-0 left-0 bg-indigo-600 px-4 py-2 text-white text-sm hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                            {{$card->getName()}}
                        </div>
                        <div
                            class="absolute bottom-0 right-0 bg-indigo-600 px-4 py-2 text-white text-sm hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                            @if (Route::has('login'))
                                @auth

                                    @livewire('remove-card-from-collection', ['id' => $key])
                                @else
                                    Login or register to add to collection

                                @endauth
                            @endif

                        </div>
                    </a>

                    <a href="!#">
                        <div
                            class="text-sm absolute top-0 right-0 bg-indigo-600 px-4 text-white rounded-full h-16 w-16 flex flex-col items-center justify-center mt-3 mr-3 hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                            <span class="font-bold">{{$card->getCardmarket()->getPrices()->getTrendPrice()}}</span>
                            <small>Trend Price</small>
                        </div>
                    </a>
                </div>
                <a href="/prices/{{$card->getId()}}">Check prices for {{$card->getName()}}</a>
            </div>
        @endforeach
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script type="text/javascript">

    var labels =  {{ Js::from($labels) }};
    var trendPrice =  {{ Js::from($trendPrice) }};


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
</script>
@endsection
