<div class="modal{{ $errors->any() ? ' is-active' : '' }}" id="modal-js-upload">
    <div class="modal-background"></div>
    <div class="modal-content">
        <div class="box">
            @if ($errors->any())
                <ul class="notification">
                    @foreach ($errors->all() as $error)
                        <li class="has-text-danger">
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            @endif
            <form action="{{ route('edi.upload') }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('POST')
                <div class="field">
                    <div class="control">
                        <div class="file has-name is-fullwidth @error('edi_file') is-danger @enderror" id="edi_file">
                            <label class="file-label">
                                <input class="file-input" type="file" name="edi_file" accept="txt">
                                <span class="file-cta">
                                    <span class="file-icon">
                                        <i class="las la-upload"></i>
                                    </span>
                                    <span class="file-label">
                                        Choisir un fichier...
                                    </span>
                                </span>
                                <span class="file-name"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <button class="button is-primary">Importer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <button class="modal-close is-large" aria-label="close"></button>
</div>

@once
    @push('scripts')
        <script type="text/javascript">
            const fileInput = document.querySelector('#edi_file input[type=file]');
            fileInput.onchange = () => {
                if (fileInput.files.length > 0) {
                    const fileName = document.querySelector('#edi_file .file-name');
                    fileName.textContent = fileInput.files[0].name;
                }
            }
        </script>
    @endpush
@endonce
