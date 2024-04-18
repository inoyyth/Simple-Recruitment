<table>
    <thead>
    <tr>
        <th style="background-color: red;">ID</th>
        <th>ID Pelamar</th>
        <th>ID Jadwal</th>
        <th>Gelombang</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $row)
        <tr>
            <td>{{ $row->id_pelamar }}</td>
            <td>{{ $row->id_jadwal }}</td>
            <td>{{ $row->gelombang }}</td>
        </tr>
    @endforeach
    </tbody>
</table>