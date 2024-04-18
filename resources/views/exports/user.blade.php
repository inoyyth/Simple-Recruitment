<table>
    <thead>
    <tr>
        <th style="background-color: red;">ID</th>
        <th>NIP</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Alamat</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $row)
        <tr>
            <td>{{ $row->nip }}</td>
            <td>{{ $row->nama }}</td>
            <td>{{ $row->email }}</td>
            <td>{{ $row->alamat }}</td>
        </tr>
    @endforeach
    </tbody>
</table>