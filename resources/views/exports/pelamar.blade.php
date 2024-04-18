<table>
    <thead>
    <tr>
        <th>ID PELAMAR</th>
        <th>NO KTP</th>
        <th>NAMA</th>
        <th>TGL LAHIR</th>
        <th>ALAMAT</th>
        <th>EMAIL</th>
        <th>PASSWORD</th>
        <th>NO HP</th>
        <th>KELAMIN</th>
        <th>FOTO</th>
        <th>CREATED AT</th>
        <th>UPDATE AT</th>
        <th>DELETE AT</th>
    </tr>
    </thead>
    <tbody>
    @foreach($pelamar as $row)
        <tr>
            <td>{{ $row->id_pelamar }}</td>
            <td>{{ $row->no_ktp }}</td>
            <td>{{ $row->nama_pelamar }}</td>
            <td>{{ $row->tanggal_lahir }}</td>
            <td>{{ $row->alamat }}</td>
            <td>{{ $row->email }}</td>
            <td>{{ $row->password }}</td>
            <td>{{ $row->no_hp }}</td>
            <td>{{ $row->jenis_kelamin }}</td>
            <td>{{ $row->foto }}</td>
            <td>{{ $row->created_at }}</td>
            <td>{{ $row->updated_at }}</td>
            <td>{{ $row->deleted_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>