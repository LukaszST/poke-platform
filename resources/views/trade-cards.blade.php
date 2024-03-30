<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {{--    TODO extend main template--}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    {{--    TODO install from npm--}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<livewire:navbar></livewire:navbar>


<ul role="list" class="divide-y divide-gray-100">

    @foreach($openTrades as $openTrade)
    <li class="flex justify-between gap-x-6 py-5">
        <div class="flex min-w-0 gap-x-4">
            <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="{{asset('cards/' . $openTrade->card_id_for_trade . '.png')}}" alt="">
            <div class="min-w-0 flex-auto">
                <p class="text-sm font-semibold leading-6 text-gray-900">Trade: {{$openTrade->card_id_for_trade}} for: {{$openTrade->wanted_card_id}}</p>
                <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{$openTrade->trade_owner}}</p>
            </div>
        </div>
        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
            <p class="text-sm leading-6 text-gray-900">{{$openTrade->short_note}}</p>
{{--            <p class="mt-1 text-xs leading-5 text-gray-500">Last seen <time datetime="2023-01-23T13:23Z">3h ago</time></p>--}}
        </div>
    </li>
    @endforeach
</ul>


</body>
</html>
