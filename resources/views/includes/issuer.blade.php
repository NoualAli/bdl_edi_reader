<ul class="box mb-6">
    <h1 class="title">Informations donneur d'ordre</h1>
    <li class="level">
        <div class="level-left has-text-weight-bold">
            Raison social :
        </div>
        <div class="level-right">
            {{ $payment->name }}
        </div>
    </li>
    <hr>
    <li class="level">
        <div class="level-left has-text-weight-bold">
            RIB :
        </div>
        <div class="level-right">
            {{ $payment->rib }}
        </div>
    </li>
    <hr>
    <li class="level">
        <div class="level-left has-text-weight-bold">
            Identifiant de la banque :
        </div>
        <div class="level-right">
            {{ $payment->iob }}
        </div>
    </li>
    <hr>
    <li class="level">
        <div class="level-left has-text-weight-bold">
            Indicateur de présence RIB/BAN :
        </div>
        <div class="level-right">
            {{ $payment->pi }}
        </div>
    </li>
    <hr>
    <li class="level">
        <div class="level-left has-text-weight-bold">
            Préfix IBAN :
        </div>
        <div class="level-right">
            {{ $payment->ip }}
        </div>
    </li>
    <hr>
    <li class="level">
        <div class="level-left has-text-weight-bold">
            Adresse :
        </div>
        <div class="level-right">
            {{ $payment->address }}
        </div>
    </li>
</ul>
