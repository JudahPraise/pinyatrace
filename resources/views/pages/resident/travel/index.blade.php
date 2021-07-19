@extends('pages.resident.layouts.main')

@section('main')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
<div class="containerp-3 mt-3">
    <div class="row justify-content-center p-4" >
        <div class="col-md-6">
            <ul class="cbp_tmtimeline">
                @forelse ($history as $location)
                    <li>
                        <time class="cbp_tmtime" datetime="2017-11-03T13:22"><span>{{ Carbon\Carbon::parse($location->out)->format('h:m a') }}</span> <span>{{ $location->updated_at->diffForHumans() }}</span></time>
                        <div class="cbp_tmicon bg-green"><i class="cil-location-pin text-white"></i></div>
                        <div class="cbp_tmlabel">
                            <h2><a href="javascript:void(0);">{{ $location->establishment_name }}</a></h2>
                            <p>{{ $location->establishment_address }}</p> 
                            <h6>
                                <span class="text-success">In: </span>
                                {{ Carbon\Carbon::parse($location->in)->format('h:m a') }}
                                <span class="text-danger ml-2">Out: </span>
                                {{ $location->out === null ? 'Still Inside' : Carbon\Carbon::parse($location->out)->format('h:m a') }}
                            </h6>                           
                        </div>
                    </li>
                @empty
                    <div class="row d-flex justify-content-center">
                        <p>No recent travel history</p>
                    </div>
                @endforelse
            </ul>  
        </div>
    </div>
</div>

@endsection
