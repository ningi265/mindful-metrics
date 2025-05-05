<table class="min-w-full text-white">
    <thead><tr><th>Order ID</th><th>Amount</th><th>Status</th></tr></thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order['id'] }}</td>
            <td>{{ $order['amount'] }}</td>
            <td>{{ $order['status'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>