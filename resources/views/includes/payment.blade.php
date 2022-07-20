<ul class="box mb-6">
    <h1 class="title">Informations remise</h1>
    <li class="level">
        <div class="level-left has-text-weight-bold">
            Référence :
        </div>
        <div class="level-right">
            {{ $payment->discount_reference }}
        </div>
    </li>
    <hr>
    <li class="level">
        <div class="level-left has-text-weight-bold">
            Entête :
        </div>
        <div class="level-right">
            {{ $payment->discount_header }}
        </div>
    </li>
    <hr>
    <li class="level">
        <div class="level-left has-text-weight-bold">
            Nombre d’opération :
        </div>
        <div class="level-right">
            {{ $payment->discount_on }}
        </div>
    </li>
    <hr>
    <li class="level">
        <div class="level-left has-text-weight-bold">
            Nature et type d’opération :
        </div>
        <div class="level-right">
            {{ $payment->nto }}
        </div>
    </li>
    <hr>
    <li class="level">
        <div class="level-left has-text-weight-bold">
            Nature des fonds :
        </div>
        <div class="level-right">
            {{ $payment->nb }}
        </div>
    </li>
    <hr>
    <li class="level">
        <div class="level-left has-text-weight-bold">
            Montant total :
        </div>
        <div class="level-right">
            {{ $payment->totalAmount }}
        </div>
    </li>
    <hr>
    <li class="level">
        <div class="level-left has-text-weight-bold">
            Filler :
        </div>
        <div class="level-right">
            {{ $payment->filler }}
        </div>
    </li>
    <hr>
    <li class="level">
        <div class="level-left has-text-weight-bold">
            Date de la remise de l’ordre :
        </div>
        <div class="level-right">
            {{ $payment->date }}
        </div>
    </li>
</ul>
