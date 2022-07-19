<nav class="navbar is-primary" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="{{ route('edi.index') }}">
            BDL<b class="has-text-warning">EDI</b>
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="top_nav">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="top_nav" class="navbar-menu">
        <div class="navbar-end">
            <div class="navbar-item">
                <button class="button is-warning js-modal-trigger" type="button" data-target="modal-js-upload">
                    <span class="icon-text">
                        <span class="icon is-medium">
                            <i class="las la-cloud-upload-alt"></i>
                        </span>
                        <span>
                            Importer
                        </span>
                    </span>
                </button>
            </div>
        </div>
    </div>
</nav>
