<table>
    <thead>
    <tr>
        <th style="background-color: red;">ID</th>
        <th>Title</th>
    </tr>
    </thead>
    <tbody>
    @foreach($role as $row)
        <tr>
            <td>{{ $row->id_role }}</td>
            <td>{{ $row->title }}</td>
        </tr>
    @endforeach
    </tbody>
</table>