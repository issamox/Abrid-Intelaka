@extends('layouts.app')
@section('content')
    <h1 class="text-center my-3">List des candidats</h1>
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
                    <th scope="row">{{ $member->id }}</th>
                    <td>{{ $member->province }}</td>
                    <td>{{ $member->fullName }}</td>
                    <td>{{ $member->groupe }}</td>
                    <td>{{ $member->secteur }}</td>
                    <td>{{ $member->mobile }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->legalStatus }}</td>
                    <td>{{ $member->startActivity ? date('d/m/Y',strtotime($member->startActivity)) : '' }}</td>
                    <td>
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="{{ route('candidate.mail', ['id' => $member->id ]) }}" title="send mail to candidate" class="mx-1">
                                <img src="{{ asset('icons/mail.svg') }}" alt="send mail" style="height: 30px">
                            </a>

                            <a href="{{ route('candidate.formationForm', ['member' => $member]) }}" title="certificate" class="mx-1">
                                <img src="{{ asset('icons/certificate.svg') }}" alt="send mail" style="height: 30px">
                            </a>

                            <a href="{{ route('candidate.projectFilePdf', ['member' => $member]) }}" title="download project file" class="mx-1" target="_blank">
                                <img src="{{ asset('icons/pdf.svg') }}" alt="pdf project file" style="height: 30px">
                            </a>

                            <a href="{{ route('candidate.candidateInfoPdf', ['member' => $member]) }}" title="download project file" class="mx-1" target="_blank">
                                <img src="{{ asset('icons/pdf.svg') }}" alt="pdf info" style="height: 30px">
                            </a>

                            <a href="{{ route('candidate.createZipFile', ['member' => $member]) }}" title="download zipfile"  target="_blank">
                                <img src="{{ asset('icons/rar.svg') }}" alt="zip file" style="height: 30px">
                            </a>

                        </div>
                    </td>
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
