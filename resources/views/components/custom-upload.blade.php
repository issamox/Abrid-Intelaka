<form enctype="multipart/form-data" class="mb-5">

    <div class="d-flex justify-content-between align-items-center">
        <label class="form-label" for="candidate{{ $label }}">{{ $label }} :</label>
        <img src="{{ asset('icons/check.png') }}" alt="" style="height: 40px" class="checkedFile {{ !empty($filePath) ? 'show' : 'hide' }}">
    </div>

    <input type="file" name="file"
           class="form-control uploadFile"
           id="candidate{{ $label }}"
           data-table="{{ $table }}"
           data-memberID="{{ $memberID }}"
           data-fileName="{{ $fileName }}"
           {{ !empty($filePath) ? 'disabled' : '' }}
    >
    <div class="{{ !empty($filePath) ? 'show' : 'hide' }}">
        <div class="showFile d-flex justify-content-between align-items-center">
            <a href="{{ asset('uploads/candidats/'.$filePath) }}" class="link-info" target="_blank">Voir le fichier</a>
            <a href="" class="link-success fileEdit" >Editer</a>
        </div>
    </div>
</form>
