<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #dddddd;
    }
</style>
</head>

<body>
    <center>
        <h2>Laporan Pinjaman</h2>
        <p id="date"></p>
    </center>

    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th>Nama</th>
                <th>Judul Buku</th>
                <th>Tanggal Meminjam</th>
                <th>Tanggal Dikembalikan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pinjam as $p)
                {{-- <tr
                                    class="{{ $p->log_kembali_buku == null ? '' : ($p->log_kembali < $p->log_kembali_buku ? 'bg-danger' : 'bg-success') }}"> --}}
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->user->name }}</td>
                    <td>{{ $p->buku->nama_buku }}</td>
                    <td>{{ $p->log_pinjam }}</td>
                    <td>{{ $p->log_kembali_buku }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        // Mendapatkan tanggal saat ini
        var currentDate = new Date();

        // Mendapatkan tanggal, bulan, dan tahun
        var date = currentDate.getDate();
        var month = currentDate.getMonth() + 1; // Menggunakan +1 karena indeks bulan dimulai dari 0
        var year = currentDate.getFullYear();

        // Format bulan menjadi 2 digit (misal: 01, 02, 03)
        if (month < 10) {
            month = "0" + month;
        }

        // Format tanggal menjadi 2 digit (misal: 01, 02, 03)
        if (date < 10) {
            date = "0" + date;
        }

        // Menampilkan tanggal, bulan, dan tahun pada elemen dengan id "date"
        var dateElement = document.getElementById("date");
        dateElement.innerHTML = "Tanggal: " + date + "<br>Bulan: " + month + "<br>Tahun: " + year;
    </script>
