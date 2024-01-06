<fieldset class="scheduler-border mb-4">
    <legend class="scheduler-border mb-3">3. Formation et Exprience </legend>
    <div class="row">
        <div class="col-md-4">
            <x-custom-upload label="Certificat de formation" fileName="certificat" table="trainings" memberID="{{ $member->id }}" filePath="{{ $training->certificat ?? '' }}"></x-custom-upload>
        </div>
        <div class="col-md-4">
            <x-custom-upload label="BMC" fileName="bmc" table="trainings" memberID="{{ $member->id }}" filePath="{{ $training->bmc ?? '' }}"></x-custom-upload>
        </div>
        <div class="col-md-4">
            <x-custom-upload label="Fiche de projet" fileName="projectFile" table="trainings" memberID="{{ $member->id }}" filePath="{{ $training->projectFile ?? '' }}"></x-custom-upload>
        </div>
        <div class="col-md-4">
            <x-custom-upload label="Fiche de suivi des condidats" fileName="candidateTracking" table="trainings" memberID="{{ $member->id }}" filePath="{{ $training->candidateTracking ?? '' }}"></x-custom-upload>
        </div>
    </div>
</fieldset>
