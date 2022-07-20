@php
$receivers = $payment->receivers()->paginate();
@endphp
<div class="box">
    <h1 class="title">Informations bénificiaires</h1>
    <table>
        <thead>
            <th>Numéro d'ordre de l'opération de virement</th>
            <th>Numéro d'ordre de l'opération de virement</th>
            <th>RIB</th>
            <th>Préfix IBAN</th>
            <th>Raison social</th>
            <th>Adresse</th>
            <th>Montant de l’opération de virement</th>
            <th>Libellé</th>
            <th>Filler</th>
        </thead>
        <tbody>
            @foreach ($receivers as $receiver)
                <tr>
                    <td data-th="Numéro d'ordre de l'opération de virement">{{ $receiver->ontto }}</td>
                    <td data-th="Numéro d'ordre de l'opération de virement">{{ $receiver->ontto2 }}</td>
                    <td data-th="RIB">{{ $receiver->rib }}</td>
                    <td data-th="Préfix IBAN">{{ $receiver->ip }}</td>
                    <td data-th="Non, prénom ou raison sociale du client  bénéficiaire">{{ $receiver->name }}</td>
                    <td data-th="Adresse du client  bénéficiaire">{{ $receiver->address }}</td>
                    <td data-th="Montant de l’opération de virement">{{ $receiver->amount }}</td>
                    <td data-th="Libellé">{{ $receiver->label }}</td>
                    <td data-th="Filler">{{ $receiver->filler }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $receivers->render() !!}
</div>
