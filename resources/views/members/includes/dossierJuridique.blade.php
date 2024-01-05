<fieldset class="scheduler-border mb-4">
    <legend class="scheduler-border mb-3">2. Dossier Juridique</legend>
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3">
                <label for="candidateType">Type</label>
                <select name="type" id="candidateType" class="form-control showTargetSection">
                    <option value="1"> Auto-Entrepreneur</option>
                    <option value="2"> SARL AU</option>
                    <option value="2"> SARL</option>
                    <option value="3"> Personne Physique</option>
                    <option value="4"> Coopérative</option>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row candidateTypeSection" data-target="1">
                <div class="col-md-4">
                    <x-custom-upload label="Carte autoentrepreneur" fileName="carteAutoentrepreneur" table="legal_files" memberID="{{ $member->id }}" filePath="{{ $member->legalFile->carteAutoentrepreneur ?? '' }}"></x-custom-upload>
                </div>
            </div>
            <div class="row candidateTypeSection hide" data-target="2">
                <div class="col-md-4">
                    <x-custom-upload label="Statuts enregistrés certifiés conformes" fileName="statuts" table="legal_files" memberID="{{ $member->id }}" filePath="{{ $member->legalFile->statuts ?? '' }}"></x-custom-upload>
                </div>
                <div class="col-md-4">
                    <x-custom-upload label="RC Récent (3 mois)" fileName="lastRC" table="legal_files" memberID="{{ $member->id }}" filePath="{{ $member->legalFile->lastRC ?? '' }}"></x-custom-upload>
                </div>
                <div class="col-md-4">
                    <x-custom-upload label="Taxe Professionnelle - Patente" fileName="taxes" table="legal_files" memberID="{{ $member->id }}" filePath="{{ $member->legalFile->taxes ?? '' }}"></x-custom-upload>
                </div>
                <div class="col-md-4">
                    <x-custom-upload label="Attestation IF" fileName="attestationIF" table="legal_files" memberID="{{ $member->id }}" filePath="{{ $member->legalFile->attestationIF ?? '' }}"></x-custom-upload>
                </div>
                <div class="col-md-4">
                    <x-custom-upload label="Affiliation CNSS" fileName="cnss" table="legal_files" memberID="{{ $member->id }}" filePath="{{ $member->legalFile->cnss ?? '' }}"></x-custom-upload>
                </div>
                <div class="col-md-4">
                    <x-custom-upload label="Journal d’Annonces Légales" fileName="announcementsJournal" table="legal_files" memberID="{{ $member->id }}" filePath="{{ $member->legalFile->announcementsJournal ?? '' }}"></x-custom-upload>
                </div>
                <div class="col-md-4">
                    <x-custom-upload label="Bulletin Officiel" fileName="bulletin" table="legal_files" memberID="{{ $member->id }}" filePath="{{ $member->legalFile->bulletin ?? '' }}"></x-custom-upload>
                </div>
                <div class="col-md-4">
                    <x-custom-upload label="Attestation ICE" fileName="ice" table="legal_files" memberID="{{ $member->id }}" filePath="{{ $member->legalFile->ice ?? '' }}"></x-custom-upload>
                </div>
            </div>
            <div class="row candidateTypeSection hide" data-target="3">
                <div class="col-md-4">
                    <x-custom-upload label="Modèle J RC" fileName="jrc" table="legal_files" memberID="{{ $member->id }}" filePath="{{ $member->legalFile->jrc ?? '' }}"></x-custom-upload>
                </div>
                <div class="col-md-4">
                    <x-custom-upload label="Taxe Professionnelle - Patente" fileName="taxes" table="legal_files" memberID="{{ $member->id }}" filePath="{{ $member->legalFile->taxes ?? '' }}"></x-custom-upload>
                </div>
                <div class="col-md-4">
                    <x-custom-upload label="Affiliation CNSS" fileName="cnss" table="legal_files" memberID="{{ $member->id }}" filePath="{{ $member->legalFile->cnss ?? '' }}"></x-custom-upload>
                </div>
                <div class="col-md-4">
                    <x-custom-upload label="Attestation ICE" fileName="ice" table="legal_files" memberID="{{ $member->id }}" filePath="{{ $member->legalFile->ice ?? '' }}"></x-custom-upload>
                </div>
            </div>
            <div class="row candidateTypeSection hide" data-target="4">
                <div class="col-md-4">
                    <x-custom-upload label="Attestation d’immatriculation" fileName="registreLocal" table="legal_files" memberID="{{ $member->id }}" filePath="{{ $member->legalFile->registreLocal ?? '' }}"></x-custom-upload>
                </div>
                <div class="col-md-4">
                    <x-custom-upload label="Liste des membres souscripteurs" fileName="listSubscribing" table="legal_files" memberID="{{ $member->id }}" filePath="{{ $member->legalFile->listSubscribing ?? '' }}"></x-custom-upload>
                </div>
                <div class="col-md-4">
                    <x-custom-upload label="Liste des membres souscripteurs" fileName="listSubscribing" table="legal_files" memberID="{{ $member->id }}" filePath="{{ $member->legalFile->listSubscribing ?? '' }}"></x-custom-upload>
                </div>
                <div class="col-md-4">
                    <x-custom-upload label="Statuts certifiés conformes de la coopérative" fileName="certifiedStatus" table="legal_files" memberID="{{ $member->id }}" filePath="{{ $member->legalFile->certifiedStatus ?? '' }}"></x-custom-upload>
                </div>
                <div class="col-md-4">
                    <x-custom-upload label="PV Délibératoire signé par les membres" fileName="pv" table="legal_files" memberID="{{ $member->id }}" filePath="{{ $member->legalFile->pv ?? '' }}"></x-custom-upload>
                </div>
                <div class="col-md-4">
                    <x-custom-upload label="4-5 PV des 2 dernières Assemblées Générales" fileName="lastTwoPv" table="legal_files" memberID="{{ $member->id }}" filePath="{{ $member->legalFile->lastTwoPv ?? '' }}"></x-custom-upload>
                </div>
                <div class="col-md-4">
                    <x-custom-upload label="4-5 PV des 2 dernières Assemblées Générales" fileName="lastTwoPv" table="legal_files" memberID="{{ $member->id }}" filePath="{{ $member->legalFile->lastTwoPv ?? '' }}"></x-custom-upload>
                </div>

                <div class="col-md-4">
                    <label for="candidateHasLocal">Disposez vous d'un Local ?</label>
                    <select id="candidateHasLocal" class="form-control">
                        <option value="Non">Non</option>
                        <option value="Oui">Oui</option>
                    </select>
                </div>
                <div class="col-md-4 hide">
                    <label for="candidateTypeLocal">Type de local ? </label>
                    <select class="form-control" id="candidateTypeLocal">
                        <option value="1">Propriété</option>
                        <option value="2">Contrat de bail</option>
                        <option value="3">Terrain Agricole</option>
                        <option value="4">Domiciliation</option>
                    </select>
                </div>

                <div class="col-md-4 hide typeLocal" data-target="1">
                    <x-custom-upload label="Certificat de propriété" fileName="propertyCertificat" table="legal_files" memberID="{{ $member->id }}" filePath="{{ $member->legalFile->propertyCertificat ?? '' }}"></x-custom-upload>
                </div>
                <div class="col-md-4 hide typeLocal" data-target="2">
                    <x-custom-upload label="Contrat ou promesse de bail" fileName="promiseLease" table="legal_files" memberID="{{ $member->id }}" filePath="{{ $member->legalFile->promiseLease ?? '' }}"></x-custom-upload>
                </div>
                <div class="col-md-4 hide typeLocal" data-target="3">
                    <x-custom-upload label="Attestation Administrative si terres collectives" fileName="attestationAdministrative" table="legal_files" memberID="{{ $member->id }}" filePath="{{ $member->legalFile->attestationAdministrative ?? '' }}"></x-custom-upload>
                </div>
                <div class="col-md-4 hide typeLocal" data-target="4">
                    <x-custom-upload label="Contrat de domiciliation si nouvelle création" fileName="domiciliationContract" table="legal_files" memberID="{{ $member->id }}" filePath="{{ $member->legalFile->domiciliationContract ?? '' }}"></x-custom-upload>
                </div>
            </div>
        </div>
    </div>
</fieldset>
