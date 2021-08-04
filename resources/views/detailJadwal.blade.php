<h4>Detail Jadwal</h4>

<div>
    <h6>Pengisian Formulir</h6>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Mahasiswa</th>
                <th>NIM</th>
                <th>Prodi</th>
                <th>Email</th>
                <th>Status Pengisian Formulir</th>
            </tr>
        </thead>
        <tbody id="pengisian_formulir"></tbody>
    </table>
</div>
<div>
    <h6>Mahasiswa yang belum melakukan pengisian</h6>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Mahasiswa</th>
                <th>NIM</th>
                <th>Prodi</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody id="t_mahasiswa"></tbody>
    </table>
</div>
<script>
    $(function() {
        var ID = "{{ $id }}";
        JadwalPengisianController.detail(ID)
    })
</script>