<h4>Detail Jadwal</h4>

<div style="margin-top: 3rem">
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
<div style="margin-top: 3rem">
    <h6><span class="total_belum_mengisi"></span> Mahasiswa yang belum mengisi formulir</h6>
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