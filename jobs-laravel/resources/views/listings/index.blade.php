@extends('layout')

@section('content')
@include('partials._hero')
@include('partials._search')

	@unless (count($listings) == 0)

		<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
		@foreach ($listings as $listing)
			<x-listing-card :listing="$listing" />
		@endforeach
		</div>

		@else
		<p>No Listings Found</p>
	@endunless

	<div class="p-4 mt-6">
		{{ $listings->links() }}
	</div>

@endsection