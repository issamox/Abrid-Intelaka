@extends('layouts.app')
@section('content')
    <h1 class="text-center my-3">List de members</h1>
    <div class="container-fluid">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Province</th>
                <th scope="col">Nom & Prénom</th>
                <th scope="col">Groupe</th>
                <th scope="col">Secteur d'activité</th>
                <th scope="col">Téléphone</th>
                <th scope="col">Email</th>
                <th scope="col">Form Juridique</th>
                <th scope="col">Début Activité</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse( $members as $member )
                <tr>
                    <th scope="row">{{ '#ASM-'.$member->id }}</th>
                    <td>{{ $member->province }}</td>
                    <td>{{ $member->fullName }}</td>
                    <td>{{ $member->groupe }}</td>
                    <td>{{ $member->secteur }}</td>
                    <td>{{ $member->mobile }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->legalStatus }}</td>
                    <td>{{ $member->startActivity ? date('d/m/Y',strtotime($member->startActivity)) : '' }}</td>
                    <td>

                    </td>
                </tr>
            @empty
                <tr>
                    <td>No member exists</td>
                </tr>
            @endforelse
            </tbody>

        </table>
    </div>
@endsection
