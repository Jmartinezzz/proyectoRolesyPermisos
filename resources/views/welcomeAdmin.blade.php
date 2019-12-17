@extends('principal')
@section('title', 'Administración')
@section('content')
@foreach($nRegistros as $cantidad)
   @php
      $nRoles = $cantidad->roles;
      $nUsers = $cantidad->users;
   @endphp
@endforeach
   <div class="row mt-4">
     <div class="col-4">
         <div class="card border-primary mb-3" style="max-width: 19rem;">
           <div class="h4 card-header">Usuarios <span class="icon-users"></span>
            <span class="badge badge-dark float-right">{{ $nUsers }}</span></div>
           <div class="card-body text-dark">
             <h5 class="card-title">Primary card title</h5>
             <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
           </div>
         </div>
     </div>
     <div class="col-4">
         <div class="card border-primary mb-3" style="max-width: 19rem;">
           <div class="h4 card-header">Roles <span class="icon-user-tie"></span>
            <span class="badge badge-dark float-right">{{ $nRoles }}</span></div>
           <div class="card-body text-primary">
             <h5 class="card-title">Primary card title</h5>
             <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
           </div>
         </div>
     </div>
     <div class="col-4">
         <div class="card border-primary mb-3" style="max-width: 19rem;">
           <div class="card-header">Header</div>
           <div class="card-body text-primary">
             <h5 class="card-title">Primary card title</h5>
             <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
           </div>
         </div>
     </div>
   </div>
@endsection()