@extends('layouts.app')

@section('content')
   <h1 class="main-title text-center m-5 display-2">Film List</h1>

   <div class="container">
      <div class="wrapper">
         <div class="row justify-content-center">
            @foreach ($movies as $movie)
               <div class="col-sm-4 mb-3">
                  <div class="card text-bg-dark h-100">
                     <div class="card-body text-center">
                        <div class="title-wrapper">
                           <h5 class="card-title">{{ $movie->title }}</h5>
                           @if ($movie->title !== $movie->original_title)
                              <h6 class="card-subtitle mb-2 text-muted">{{ $movie->original_title }}</h6>
                           @endif
                        </div>
                     </div>
                     <ul class="list-group list-group-flush details">
                        <li class="list-group-item list-group-item-info">
                           <span class="fw-bold">Nationality:</span>
                           <span class="text-capitalize">
                              {{ $movie->nationality }}
                           </span>
                        </li>
                        <li class="list-group-item list-group-item-info">
                           <span class="fw-bold">Date:</span>
                           <span class="text-capitalize">

                              {{ date('d F Y', strtotime($movie->date)) }}
                           </span>
                        </li>
                        <li class="list-group-item list-group-item-info">
                           <span class="fw-bold">Vote:</span>
                           <span @class([
                               'fw-bold',
                               'text-success' => $movie->vote >= 9,
                               'text-warning' => $movie->vote < 9,
                               'text-danger' => $movie->vote <= 8,
                           ])>
                              {{ $movie->vote }}
                           </span>
                        </li>
                     </ul>

                  </div>
               </div>
            @endforeach
         </div>
      </div>
   </div>
@endsection
