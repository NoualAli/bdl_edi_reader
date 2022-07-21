<h1 class="title is-5 my-2">Client Bénéficiaire</h1>
<div class="box p-1">
    <p>
        <b>Nom du bénéficiaire :</b>
        <span>{{ $receiver->name }}</span>
    </p>
    <p>
        <b>Numéro de compte :</b>
        <span>{{ $receiver->rib }}</span>
    </p>
    <p>
        <b>Domiciliation Bancaire :</b>
        <span></span>
    </p>
    <div class="container">
        <div class="is-table">
            <p class="is-cell">
                <b>Agence :</b>
                <span>{{ $payment->address }}</span>
            </p>
            <p class="is-cell">
                <b>Code agence :</b>
                <span>{{ $payment->iob }}</span>
            </p>
        </div>
    </div>
    <p>
        <b>Observation :</b>
        <span></span>
    </p>
</div>
