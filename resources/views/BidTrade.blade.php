@extends('layouts.app')

@section('content')
<div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">
    <livewire:bid-trade-wizard :tradeId="$tradeId"></livewire:bid-trade-wizard>
</div>
@endsection
