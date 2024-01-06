<fieldset class="scheduler-border mb-4">
    <legend class="scheduler-border mb-3">Busineses Plan </legend>
    <div class="row">
        <div class="col-md-4">
            <x-custom-upload label="Devis ou factures" fileName="equipmentInvoice" table="business_plans" memberID="{{ $member->id }}" filePath="{{ $member->businessPlan->equipmentInvoice ?? '' }}"></x-custom-upload>
        </div>
        <div class="col-md-4">
            <x-custom-upload label="Promesse de vente" fileName="salePromise" table="business_plans" memberID="{{ $member->id }}" filePath="{{ $member->businessPlan->salePromise ?? '' }}"></x-custom-upload>
        </div>
        <div class="col-md-4">
            <x-custom-upload label="Contrat de bail" fileName="leaseContract" table="business_plans" memberID="{{ $member->id }}" filePath="{{ $member->businessPlan->leaseContract ?? '' }}"></x-custom-upload>
        </div>
        <div class="col-md-4">
            <x-custom-upload label="Rapport d’expertise" fileName="expertReport" table="business_plans" memberID="{{ $member->id }}" filePath="{{ $member->businessPlan->expertReport ?? '' }}"></x-custom-upload>
        </div>
        <div class="col-md-4">
            <x-custom-upload label="Devis ou facture pro" fileName="materialsInvoice" table="business_plans" memberID="{{ $member->id }}" filePath="{{ $member->businessPlan->materialsInvoice ?? '' }}"></x-custom-upload>
        </div>
    </div>
</fieldset>
