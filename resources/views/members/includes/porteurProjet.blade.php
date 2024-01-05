<fieldset class="scheduler-border mb-4">
    <legend class="scheduler-border mb-3">1. Porteur du projet</legend>
    <div class="row">
        <div class="col-md-4">
            <div class="mb-3">
                <label class="form-label" for="fullname">Nom & prénom :</label>
                <input type="text" id="fullname" class="form-control" value="{{ $member->fullName }}" readonly>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label class="form-label" for="candidateemail">Email :</label>
                <input type="email" id="candidateemail" class="form-control" value="{{ $member->email }}" readonly>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label class="form-label" for="candidategsm">GSM :</label>
                <input type="email" id="candidategsm" class="form-control" value="{{ $member->mobile }}" readonly>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <x-custom-upload label="cin" fileName="cin"  table="members" memberID="{{ $member->id }}" filePath="{{ $member->cin ?? '' }}"></x-custom-upload>
        </div>
        <div class="row">
            <h3 class="text-bg-info my-4">Justificatifs d’expérience : </h3>
            <div class="col-md-4">
                <x-custom-upload label="Cv" fileName="cvs" table="experiences" memberID="{{ $member->id }}" filePath="{{ $member->experience->cvs ?? '' }}"></x-custom-upload>
            </div>
            <div class="col-md-4">
                <x-custom-upload label="Diplôme" fileName="diplomas" table="experiences" memberID="{{ $member->id }}" filePath="{{ $member->experience->diplomas ?? '' }}"></x-custom-upload>
            </div>
            <div class="col-md-4">
                <x-custom-upload label="Attestations de Travail" fileName="workCertificates" table="experiences" memberID="{{ $member->id }}" filePath="{{ $member->experience->workCertificates ?? '' }}"></x-custom-upload>
            </div>
            <div class="col-md-4">
                <x-custom-upload label="Déclarations" fileName="declarations" table="experiences" memberID="{{ $member->id }}" filePath="{{ $member->experience->declarations ?? '' }}"></x-custom-upload>
            </div>
            <div class="col-md-12">
                <form method="post" action="{{ route('candidate.update', $member) }}">
                    @csrf
                    <div class="mb-4">
                        <label for="candidateProjectDescription" class="form-label">Description du projet :</label>
                        <textarea name="description" class="form-control" rows="6">{{ old('description') ?? $member->projectDescription }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</fieldset>
