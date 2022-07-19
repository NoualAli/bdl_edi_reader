<h1 class="title">Informations donneur d'ordre</h1>
<ul class="box mb-6">
    <li class="level">
        <div class="level-left has-text-weight-bold">
            Entête de la remise :
        </div>
        <div class="level-right">
            {{ $payment->issuer->discount_header }}
        </div>
    </li>
    <hr>
    <li class="level">
        <div class="level-left has-text-weight-bold">
            Identifiant de la banque :
        </div>
        <div class="level-right">
            {{ $payment->issuer->iob }}
        </div>
    </li>
    <hr>
    <li class="level">
        <div class="level-left has-text-weight-bold">
            Nature et type d’opération :
        </div>
        <div class="level-right">
            {{ $payment->issuer->nto }}
        </div>
    </li>
    <hr>
    <li class="level">
        <div class="level-left has-text-weight-bold">
            Nature des fonds :
        </div>
        <div class="level-right">
            {{ $payment->issuer->nb }}
        </div>
    </li>
    <hr>
    <li class="level">
        <div class="level-left has-text-weight-bold">
            Indicateur de présence RIB/BAN :
        </div>
        <div class="level-right">
            {{ $payment->issuer->pi }}
        </div>
    </li>
    <hr>
    <li class="level">
        <div class="level-left has-text-weight-bold">
            RIB :
        </div>
        <div class="level-right">
            {{ $payment->issuer->rib }}
        </div>
    </li>
    <hr>
    <li class="level">
        <div class="level-left has-text-weight-bold">
            Préfix IBAN :
        </div>
        <div class="level-right">
            {{ $payment->issuer->ip }}
        </div>
    </li>
    <hr>
    <li class="level">
        <div class="level-left has-text-weight-bold">
            Raison social :
        </div>
        <div class="level-right">
            {{ $payment->issuer->name }}
        </div>
    </li>
    <hr>
    <li class="level">
        <div class="level-left has-text-weight-bold">
            Adresse :
        </div>
        <div class="level-right">
            {{ $payment->issuer->address }}
        </div>
    </li>
    <hr>
    <li class="level">
        <div class="level-left has-text-weight-bold">
            Date de la remise de l’ordre :
        </div>
        <div class="level-right">
            {{ $payment->issuer->date }}
        </div>
    </li>
    <hr>
    <li class="level">
        <div class="level-left has-text-weight-bold">
            Référence de la remise :
        </div>
        <div class="level-right">
            {{ $payment->issuer->discount_reference }}
        </div>
    </li>
    <hr>
    <li class="level">
        <div class="level-left has-text-weight-bold">
            Nombre d’opération dans la remise :
        </div>
        <div class="level-right">
            {{ $payment->issuer->discount_on }}
        </div>
    </li>
    <hr>
    <li class="level">
        <div class="level-left has-text-weight-bold">
            Montant total :
        </div>
        <div class="level-right">
            {{ $payment->issuer->totalAmount }}
        </div>
    </li>
    <hr>
    <li class="level">
        <div class="level-left has-text-weight-bold">
            Filler :
        </div>
        <div class="level-right">
            {{ $payment->issuer->filler }}
        </div>
    </li>
    <hr>
</ul>
