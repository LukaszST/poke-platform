@extends('layouts.app')

@section('content')

<div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">
    <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 gap-10">
        @foreach($cardList as $card)
            <div class="rounded overflow-hidden shadow-lg">
                <a href="#"></a>
                <div class="relative">
                    <a href="#">

                        @if(asset('cards/' . $card->card_id . '.png'))
                            <img class="w-full"
                                 src="{{asset('cards/' . $card->card_id . '.png')}}"
                                 alt="">
                            <div
                        @else
{{--                            TODO add fallback for api data--}}
                            <img class="w-full"
                                 src="{{$card->card_id}}"
                                 alt="">
                            <div
                                @endif

                                class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25">
                            </div>
                    </a>
                    <a href="#!">
                        <div
                            class="absolute bottom-0 left-0 bg-indigo-600 px-4 py-2 text-white text-sm hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                            {{$card->card_name}}
                        </div>
                        <div
                            class="absolute bottom-0 right-0 bg-indigo-600 px-4 py-2 text-white text-sm hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                            @if (Route::has('login'))
                                @auth

                                    @livewire('add-card-to-collection', ['cardId' => $card->card_id])
                                @else
                                    Login or register to add to collection

                                @endauth
                            @endif

                        </div>
                    </a>

                    <a href="!#">
{{--                        <div--}}
{{--                            class="text-sm absolute top-0 right-0 bg-indigo-600 px-4 text-white rounded-full h-16 w-16 flex flex-col items-center justify-center mt-3 mr-3 hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">--}}
{{--                            <span class="font-bold">{{$card->getCardmarket()->getPrices()->getTrendPrice()}}</span>--}}
{{--                            <small>CM Trend Price</small>--}}
{{--                        </div>--}}
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
