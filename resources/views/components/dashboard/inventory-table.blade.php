<table class="min-w-full text-white">
    <thead><tr><th>Name</th><th>In Stock</th><th>Status</th></tr></thead>
    <tbody>
        @foreach($inventory as $item)
        <tr>
            <td>{{ $item['name'] }}</td>
            <td>{{ $item['stock'] }}</td>
            <td>{{ $item['status'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>