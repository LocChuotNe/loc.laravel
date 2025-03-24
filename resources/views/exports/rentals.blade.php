<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Customer ID</th>
            <th>Book ID</th>
            <th>Title</th>
            <th>Title (EN)</th>
            <th>Rental Date</th>
            <th>Return Date</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rentals as $rental)
        <tr>
            <td>{{ $rental->id }}</td>
            <td>{{ $rental->customer_id }}</td>
            <td>{{ $rental->book_id }}</td>
            <td>{{ $rental->title }}</td>
            <td>{{ $rental->title_en }}</td>
            <td>{{ $rental->rental_date }}</td>
            <td>{{ $rental->return_date }}</td>
            <td>{{ $rental->status }}</td>
            <td>{{ $rental->created_at }}</td>
            <td>{{ $rental->updated_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
