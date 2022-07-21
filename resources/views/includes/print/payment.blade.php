<div class="is-table">
    <div class="is-cell has-text-weight-bold">
        Nature du virement :
    </div>
    <div class="is-cell">
        <div class="is-table">
            <div class="is-cell">
                <span class="has-text-weight-bold is-vcentered">
                    Brut
                </span>
                <span class="checkbox"></span>
            </div>
            <div class="is-cell">
                <span class="has-text-weight-bold is-vcentered">
                    Urgent
                </span>
                <span class="checkbox"></span>
            </div>
        </div>
    </div>
</div>
<p>
    <b>Motif du virement :</b>
    <span>{{ $receiver->label }}</span>
</p>
<p>
    <b>Montant du virement en chiffre :</b>
    <span>{{ $receiver->amount }} DZD</span>
</p>
<p>
    <b>En lettre :</b>
    <span>{{ $receiver->amount_letters }} dinar</span>
</p>
