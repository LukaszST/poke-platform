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

<div>
    <ul role="list" class="divide-y divide-gray-100">
        @foreach($pokemonSetsList as $set)

            <li class="flex justify-between gap-x-6 py-5">
                <div class="flex min-w-0 gap-x-4">
                    <img class="h-20 w-20 flex-none rounded-full bg-gray-50" src="{{$set->getImages()->getLogo()}}" alt="">
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm font-semibold leading-6 text-gray-900"><a href="/set/{{$set->getId()}}">{{$set->getName()}}</a></p>
                        <p class="mt-1 truncate text-xs leading-5 text-gray-500"></p>
                    </div>
                </div>
                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    <p class="text-sm leading-6 text-gray-900">{{$set->getReleaseDate()}}</p>
                    <p class="mt-1 text-xs leading-5 text-gray-500">{{ $set->getPrintedTotal() }}</time></p>
                </div>
            </li>
        @endforeach
    </ul>
</div>


</body>


