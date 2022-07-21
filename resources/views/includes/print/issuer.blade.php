<h1 class="title is-5 my-2">Client Ordonnateur</h1>
<div class="box p-1">
    <div class="is-table">
        <div class="is-cell">
            <span class="has-text-weight-bold is-vcentered">
                personne physique
            </span>
            <span class="checkbox"></span>
        </div>
        <div class="is-cell">
            <span class="has-text-weight-bold is-vcentered">
                personne moral
            </span>
            <span class="checkbox"></span>
        </div>
    </div>

    <div>
        <b>Nom / raison social :</b>
        <span>{{ $payment->name }}</span>
    </div>
    <div>
        <b>Prénom :</b>
        <span></span>
    </div>
    <div>
        <b>Adresse :</b>
        <span>{{ $payment->address }}</span>
    </div>
    <div class="is-table">
        <div class="is-cell">
            <b>Nom de mandataire :</b>
            <span></span>
        </div>
        <div class="is-cell">
            <b>en qualité de :</b>
            <span></span>
        </div>
    </div>
    <div class="is-table">
        <div class="is-cell">
            <b>N°CN / PC :</b>
            <span></span>
        </div>
        <div class="is-cell">
            <b>Délivré(e) à :</b>
            <span>{{ $receiver->name }}</span>
        </div>
        <div class="is-cell">
            <b>le :</b>
            <span>{{ $payment->date }}</span>
        </div>
    </div>
    <div>
        <b>Numéro de compte :</b>
        <span>{{ $payment->rib }}</span>
    </div>
</div>
