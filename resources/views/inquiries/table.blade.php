<table class="table table-bordered">
    <thead class="thead-dark">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Message</th>
    </tr>
    </thead>
    <tbody>
    @foreach($inquiries as $inquiry)
        <tr>
            <td>{{ $inquiry->name }}</td>
            <td>{{ $inquiry->email }}</td>
            <td>{{ $inquiry->phone }}</td>
            <td>{{ $inquiry->message }}</td>
        </tr>
    @endforeach
    </tbody>
</table>