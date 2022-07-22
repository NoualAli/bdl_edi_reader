<div class="box">
    <table>
        <thead>
            <th>#</th>
            <th>Entête de la remise</th>
            <th>Référence de la remise</th>
            <th>Donneur d'ordre</th>
            <th>Identifiant de la banque du donneur d’ordre</th>
            <th>Date de la remise de l’ordre</th>
            <th>Montant total</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
                <tr>
                    <td data-th="#">{{ $payment->id }}</td>
                    <td data-th="Entête de la remise">{{ $payment->discount_header }}</td>
                    <td data-th="Référence de la remise">{{ $payment->discount_reference }}</td>
                    <td data-th="Donneur d'ordre">{{ $payment->name }}</td>
                    <td data-th="Identifiant de la banque du donneur d’ordre">{{ $payment->iob }}</td>
                    <td data-th="Date de la remise de l’ordre">{{ $payment->date }}</td>
                    <td data-th="Montant total">{{ $payment->totalAmount }}</td>
                    <td>
                        <a href="{{ route('edi.show', $payment) }}" class="is-info is-inline">
                            <span class="icon-text">
                                <span class="icon">
                                    <i class="las la-eye"></i>
                                </span>
                                <span>Afficher</span>
                            </span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {!! $payments->render() !!}

</div>
