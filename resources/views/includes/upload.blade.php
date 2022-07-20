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
            <form action="{{ route('edi.upload') }}" enctype="multipart/form-data" method="POST" id="edit_upload_form">
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
            const uploadForm = document.querySelector('#edit_upload_form')
            const fileInput = uploadForm.querySelector('input[type=file]');
            uploadForm.addEventListener('submit', () => {
                const button = uploadForm.querySelector('button')
                button.classList.add('is-disabled', 'is-loading')
                button.setAttribute('disabled', true)
                console.log(button);
            })
            fileInput.onchange = () => {
                if (fileInput.files.length > 0) {
                    const fileName = uploadForm.querySelector('.file-name');
                    fileName.textContent = fileInput.files[0].name;
                }
            }
        </script>
    @endpush
@endonce
