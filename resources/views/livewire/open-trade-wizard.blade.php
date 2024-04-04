<div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">

    <div  wire:loading>
        <livewire:loading-modal></livewire:loading-modal>
    </div>

    <form>
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Trade Card</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">You will put card to trade with other players or collectors.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="tradeCard" class="block text-sm font-medium leading-6 text-gray-900">Trade Card</label>
                        <div class="mt-2">
                            <select wire:model.change="card" id="tradeCard" name="tradeCard" autocomplete="tradeCard-name" class="block w-full rounded-md border-0 py-1.5 text-white-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                <option></option>
                                @foreach($cards as $key => $card)
                                    <option value="{{$key}}">{{$card}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        @if(!is_null($img))
                            <div class="rounded overflow-hidden shadow-lg">
                                <a href="#"></a>
                                <div class="relative">
                                    <a href="#">
                                        <img class="w-full"
                                             src="{{$img}}"
                                             alt="">
                                        <div
                                            class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Wanted Card</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">Find wanted card which you want trade card from your collection.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="sets" class="block text-sm font-medium leading-6 text-gray-900">Choose set which have wanted card</label>
                        <div class="mt-2">
                            <select wire:model.change="set" id="sets" name="sets" autocomplete="sets-name" class="block w-full rounded-md border-0 py-1.5 text-white-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                <option></option>
                                @foreach($sets as $singleSet)
                                    <option>{{$singleSet}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if(!is_null($wantedCardsSelect))
                            <label for="wantedCard" class="block text-sm font-medium leading-6 text-gray-900">Wanted Card</label>
                            <div class="mt-2">
                                <select wire:model.change="wantedCard" id="wantedCard" name="wantedCard" autocomplete="wantedcard-name" class="block w-full rounded-md border-0 py-1.5 text-white-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    <option></option>
                                    @foreach($wantedCardsSelect as $key => $card)
                                        <option value="{{$key}}">{{$card}}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    </div>

                    <div class="sm:col-span-2">
                        @if(!is_null($wantedImg))
                            <div class="rounded overflow-hidden shadow-lg">
                                <a href="#"></a>
                                <div class="relative">
                                    <a href="#">
                                        <img class="w-full"
                                             src="{{$wantedImg}}"
                                             alt="">
                                        <div
                                            class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button wire:click="cancel" type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <button wire:click="saveTrade" type="button" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>
</div>

