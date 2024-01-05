@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="my-3">Suivre et compléter ma demande</h1>
        @include('members.includes.porteurProjet')
        @include('members.includes.dossierJuridique')
        @include('members.includes.businesesPlan')
    </div>
@endsection
