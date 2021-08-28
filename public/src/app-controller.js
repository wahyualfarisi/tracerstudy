const UserController = ( (LIB) => {

    const eventListener = () => {

        $('#form_user').on('submit', function(e) {
            e.preventDefault();
        }).validate({
            errorPlacement: function (error, element) {
                error.css('color','red').css('fontSize', '10px').addClass('right')

                var placement = $(element).data("error");
                if (placement) {
                    $(placement).append(error);
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function(form) {
                LIB.postRes(
                    `/api/user/add`,
                    form,
                    'Loading...',
                    res => {
                        console.log(res);
                        if(res.status){
                            location.hash = '#/users'
                            $.notify("Berhasil membuat user", "success");
                        }else{
                            alert(res.message)
                        }
                    },
                    err => {
                        console.log(err);
                        $.notify("Silahkan coba lagi", "error");
                    }
                )
            }
        });

        
    }

    const submitUpdate = (id) => {
        $('#form_user_update').on('submit', function(e) {
            e.preventDefault();
        }).validate({
            errorPlacement: function (error, element) {
                error.css('color','red').css('fontSize', '10px').addClass('right')

                var placement = $(element).data("error");
                if (placement) {
                    $(placement).append(error);
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function(form) {
                LIB.postRes(
                    `/api/user/update/${id}`,
                    form,
                    'Loading...',
                    res => {
                        console.log(res);
                        if(res.status){
                            location.hash = '#/users'
                            $.notify("Berhasil update user", "success");
                        }else{
                            alert(res.message)
                        }
                    },
                    err => {
                        console.log(err);
                        $.notify("Silahkan coba lagi", "error");
                    }
                )
            }
        })
    }


    return {
        data: () => {
            let t_user = $('#t_user').DataTable({
                columnDefs: [],
                processing: false,
                language: LIB.dtLanguage(),
                dom: '<Bf<t>ip>',
                keys: { columns: [0, 1, 2, 3] },
                pageLength: 50,
                scrollY: 500,
                scrollX: true,
                buttons: {
                    dom: {
                        button: {
                            tag: 'button',
                            className: 'btn btn-small sb-bgc-second-color my-action'
                        }
                    },
                    buttons: [
                        {
                            extend: 'collection',
                            text: '<i class="fa fa-download" aria-hidden="true"></i>',
                            buttons: [
                                {
                                    extend: 'excelHtml5',
                                    text: 'Excel',
                                    exportOptions: {
                                        columns: [0,1,2,3]
                                    },
                                    filename: 'DATA_USER',
                                    title: 'Data User'
                                },
                                {
                                    extend: 'csvHtml5',
                                    text: 'CSV',
                                    exportOptions: {
                                        columns: [0,1,2,3]
                                    },
                                    filename: 'DATA_USER',
                                    title: 'Data User'
                                },
                            ]
                        }
                    ]
                },
                ajax: LIB.dtSettingSrc(
                    `/api/user`,
                    {},
                    res => {
                        return res.results
                    },
                    err => {
                        let {
                            error,
                            message
                        } = err.responseJSON
                    }
                ),
                columns: [
                    {
                        data: null,
                        render: (data, type, row) => {
                            return row.email
                        }
                    },
                    {
                        data: null,
                        render: (data, type, row) => {
                            return row.nama_lengkap
                        }
                    },
                    {
                        data: null,
                        render: (data, type, row) => {
                          let level;
                          if(row.level === 'SBK'){
                              level = 'Seksi Bidang Kemahasiswaan'
                          }else if(row.level === 'TU'){
                              level = 'TU'
                          }

                          return level
                        }
                    },
                    {
                        data: null,
                        render: (data, type, row) => {
                          return row.created_at;
                        }
                    },
                    {
                        data: null,
                        render: (data, type, row) => {
                            return `<a href="#/users/update/${row.id_user}"> Edit </a>`
                        }
                    },
                ],
                order: [[1, "asc"]]
            })
        },
        add: () => {
            eventListener()
        },
        update: (id) => {
            submitUpdate(id)
        }
    }
})( AppLibrary )



const LaporanControllor = ( (LIB) => {

    const loadLaporan = ( year ) => {
        
        LIB.getFree(
            `/api/laporan`,
            {
                tahun_kelulusan: year
            },
            null,
            res => {
                console.log(res);
               displayLaporan(res.results)
            },
            err => {
                console.log(err);
            }
        )
    }

    const displayLaporan = (data) => {
        console.log( data );
        const { isian, pertanyaan } = data;
        const pengisian_details = isian ? isian.getpengisian_details : null;

        
        //display
        let output_pertanyaan = '';
        pertanyaan.forEach(p => {
            let list_jawaban = '';
            p.get_jawabans.forEach(item => {
                
                
                let count = 0;
                if(pengisian_details){
                    count = pengisian_details.filter(isian_mhs => isian_mhs.id_jawaban === item.id_jawaban ).length;
                }

                let percentage = (count / p.get_jawabans.length) * 100;

    
                list_jawaban += `
                    <li class="laporan_jawaban_item">
                        <span>${ Math.floor(percentage) } % </span>
                        <p> ${item.jawaban} </p>
                    </li>
                `;
            })
            
            output_pertanyaan += `
            <tr>
                <td style="width: 250px;">${p.pertanyaan}</td>
                <td>
                    <ul class="laporan_list_jawabans">
                       ${list_jawaban}
                    </ul>
                </td>
            </tr>
            `;
        })
        $('#laporan_body').html( output_pertanyaan );
    }

    const submitLaporan = () => {
        $('#form_laporan').on('submit', function(e) {
            e.preventDefault();
        }).validate({
            errorPlacement: function (error, element) {
                error.css('color','red').css('fontSize', '10px').addClass('right')

                var placement = $(element).data("error");
                if (placement) {
                    $(placement).append(error);
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function(form) {
                const tahun_kelulusan = $('[name=tahun_kelulusan]').val();
                location.href = `/laporan/results/${tahun_kelulusan}`
            }
        })
    }

    return {
        data: (year) => {
            console.log(year)
            loadLaporan(year)
        },
        form: () => {
            submitLaporan()
        }
    }
})(AppLibrary)

const DashboardController = (( LIB ) => {
    let getUser = JSON.parse( localStorage.getItem('payload_tracerstudy') );


    const loadMahasiswaPending = () => {
        LIB.getFree(
            `/api/mahasiswa?filter_status=pending`,
            null,
            null,
            res => {
                if(res.status){
                    if(getUser.level === 'TU'){
                        $('.konfirmasi_mahasiswa').html(`
                        <div class="alert alert-primary" role="alert">
                            <p>${res.results.length} Mahasiswa Menunggu Konfirmasi <span>Klik <a href="#/data-mahasiswa/pending">disini</a> untuk melihat</span> </p>
                        </div>
                        `)
                    }
                }
            },
            err => {
                console.log(err);
            }
        )
    }

    const loadChart = ( data ) => {
        const { total_mahasiswa, sudah_bekerja, belum_bekerja } = data;

        const year = ['2019','2020','2021'];

        const data_mahasiswa = Object.values(total_mahasiswa).map(item => item);
        const data_sudah_bekerja = Object.values(sudah_bekerja).map(item => item);
        const data_belum_bekerja = Object.values(belum_bekerja).map(item => item);
     
       
       
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: year,
                datasets: [
                    {
                        label: 'Total Mahasiswa',
                        backgroundColor: '#4F909A',
                        data: data_mahasiswa
                    },
                    {
                        label: 'Total Sudah Bekerja',
                        backgroundColor: '#D38A87',
                        data: data_sudah_bekerja
                    },
                    {
                        label: 'Total Belum Bekerja',
                        backgroundColor: '#A7D48C',
                        data: data_belum_bekerja
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    const loadDataDashboard = () => {
        LIB.getFree(
            `/api/dashboard/full`,
            {},
            null,
            res => {
                if(res.status){
                    loadChart(res.results); 
                }
            },
            err => {
                console.log(err);
            }
        )
    }

    return {
        init: () => {
            loadMahasiswaPending();
            loadDataDashboard();
            if(getUser){
                $('.nama_lengkap').text(getUser.payload.nama_lengkap)
            }
        }
    }
})(AppLibrary);


const JadwalPengisianController = ( (LIB) => {
    let getUser = JSON.parse( localStorage.getItem('payload_tracerstudy') );

    const eventListener = () => {

        $('#form_jadwal').on('submit', function(e) {
            e.preventDefault();
        }).validate({
            errorPlacement: function (error, element) {
                error.css('color','red').css('fontSize', '10px').addClass('right')

                var placement = $(element).data("error");
                if (placement) {
                    $(placement).append(error);
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function(form) {
                let newForm = new FormData();
                newForm.append('tanggal_dimulai', $('[name=tanggal_dimulai]').val() );
                newForm.append('tanggal_selesai', $('[name=tanggal_selesai]').val() );
                newForm.append('tahun_kelulusan', $('[name=tahun_kelulusan]').val() );
                newForm.append('id_user', getUser.id_user ? getUser.id_user : '1' );
                LIB.postBlobData(
                    `/api/pengisian/createJadwal`,
                    newForm,
                    'Loading',
                    res => {
                        console.log(res);
                        if(res.status){
                            location.hash = '#/jadwal-pengisian';
                            alert(res.message)
                        }else{
                            alert(res.message)
                        }
                    },
                    err => {
                        console.log(err);
                    }
                )
            }
        })
    }

    const loadDetailJadwal = (id) => {
        LIB.getFree(
            `/api/pengisian/detailJadwal/${id}`,
            {},
            null,
            res => {
                console.log(res);
                if(res.status){
                    displayDetailJadwal(res.results);
                }
            },
            err => {
                console.log(err);
            }
        )
    }

    const displayDetailJadwal = (data) => {
        
        const { jadwal_detail, mahasiswa_yang_belum_mengisi } = data;

        const { get_data_pengisian } = jadwal_detail;

        if(get_data_pengisian){
            let output = '';
            if(get_data_pengisian.length > 0){
                get_data_pengisian.forEach(item => {
                    let status = '';
                    if(item.status === 'progress'){
                        status = '<p style="color: orange;">Masih dalam pengisian</p>'
                    }else if(item.status === 'finish'){
                        status = `
                            <p style="color: green;">Selesai</p>
                            <a href="#/jadwal-pengisian/lihat_formulir/${item.get_mahasiswa.id_mahasiswa}"> Lihat formulir </a>
                        `
                    }
                    output += `
                        <tr>
                            <td>${item.get_mahasiswa.nama_lengkap}</td>
                            <td>${item.get_mahasiswa.nim}</td>
                            <td>${item.get_mahasiswa.kode_prodi}</td>
                            <td>${item.get_mahasiswa.email}</td>
                            <td>${status}</td>
                        </tr>
                    `;
                })
            }
            $('#pengisian_formulir').html(output)
        }

        if(mahasiswa_yang_belum_mengisi){
            let output = '';
            if(mahasiswa_yang_belum_mengisi.length > 0){
                mahasiswa_yang_belum_mengisi.forEach(item => {
                    output += `
                    <tr>
                        <td>${item.nama_lengkap}</td>
                        <td>${item.nim}</td>
                        <td>${item.kode_prodi}</td>
                        <td>${item.email}</td>
                    </tr>
                    `;
                })
            }
            
            $('.total_belum_mengisi').html(mahasiswa_yang_belum_mengisi.length)
            $('#t_mahasiswa').html(output);
        }
    }

    return {
        data: () => {
            let t_jadwal = $('#t_jadwal').DataTable({
                columnDefs: [],
                processing: false,
                language: LIB.dtLanguage(),
                dom: '<Bf<t>ip>',
                keys: { columns: [0, 1, 2] },
                pageLength: 50,
                scrollY: 500,
                scrollX: true,
                buttons: {
                    dom: {
                        button: {
                            tag: 'button',
                            className: 'btn btn-small sb-bgc-second-color my-action'
                        }
                    },
                    buttons: [
                        {
                            extend: 'collection',
                            text: '<i class="fa fa-download" aria-hidden="true"></i>',
                            buttons: [
                                {
                                    extend: 'excelHtml5',
                                    text: 'Excel',
                                    exportOptions: {
                                        columns: [0,1, 2]
                                    },
                                    filename: 'DATA_USER',
                                    title: 'Data User'
                                },
                                {
                                    extend: 'csvHtml5',
                                    text: 'CSV',
                                    exportOptions: {
                                        columns: [0,1, 2]
                                    },
                                    filename: 'DATA_USER',
                                    title: 'Data User'
                                },
                            ]
                        }
                    ]
                },
                ajax: LIB.dtSettingSrc(
                    `/api/pengisian/getListJadwal`,
                    {},
                    res => {
                        return res.results
                    },
                    err => {
                        let {
                            error,
                            message
                        } = err.responseJSON
                    }
                ),
                columns: [
                    {
                        data: null,
                        render: (data, type, row) => {
                            return row.id_jadwal
                        }
                    },
                    {
                        data: null,
                        render: (data, type, row) => {
                            return row.tanggal_dimulai
                        }
                    },
                    {
                        data: null,
                        render: (data, type, row) => {
                          return row.tanggal_selesai;
                        }
                    },
                    {
                        data: null,
                        render: (data, type, row) => {
                          return row.tahun_kelulusan;
                        }
                    },
                    {
                        data: null,
                        render: (data, type, row) => {
                            return `
                                <a href="#/jadwal-pengisian/${row.id_jadwal}" style="margin-right: 1rem"> Lihat </a>
                                <a href="#/jadwal-pengisian/edit/${row.id_jadwal}"> Edit </a>
                            `
                        }
                    },
                ],
                order: [[1, "asc"]]
            })
        },
        add: () => {
            eventListener();
        },
        edit: (id) => {
            LIB.getFree(
                `/api/pengisian/detailJadwal/${id}`,
                {},
                null,
                res => {
                    console.log(res);
                    $('[name=tanggal_dimulai]').val(res.results.jadwal_detail.tanggal_dimulai)
                    $('[name=tanggal_selesai]').val(res.results.jadwal_detail.tanggal_selesai)
                },
                err => {
                    console.log(err);
                }
            )
            $('#form_edit_jadwal').on('submit', function(e) {
                e.preventDefault();
                LIB.postRes(
                    `/api/pengisian/editJadwal/${id}`,
                    this,
                    'Loading',
                    res => {
                        location.hash = '#/jadwal-pengisian'
                    },
                    err => {
                        console.log(err);
                    }
                )
            })
        },
        detail: (id) => {
            loadDetailJadwal(id);
        }
    }
})(AppLibrary)


const MasterPertanyaan = ( (LIB) => {
    let countRow = 0;

    const eventListener = () => {

        $('#btn_tambah').on('click', () => addMoreInput() );

        $('#form_pertanyaan').on('submit', function(e) {
            e.preventDefault();
        }).validate({
            errorPlacement: function (error, element) {
                error.css('color','red').css('fontSize', '10px').addClass('right')

                var placement = $(element).data("error");
                if (placement) {
                    $(placement).append(error);
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function(form){
                LIB.postRes(
                    `/api/pertanyaan/create`,
                    form,
                    'Loading',
                    res => {
                        if(res.status){
                            location.hash = '#/data-master';
                            $.notify("Berhasil membuat data", "success");
                        }
                    },
                    err => {
                        console.log(err)
                        $.notify("Silahkan coba lagi", "error");
                    }
                )

            }
        })

        $('.jawaban_inputs').on('click', '.link_small_end', function() {
            let id = $(this).data('count');
            $(`#input-${id}`).remove();
        })

    }

    const addMoreInput = () => {
        countRow++;
        let inputElement = `
            <div class="form-group" id="input-${countRow}">
                <input type="text" class="form-control" name="jawaban[${countRow}]" placeholder="Tulis Jawaban" required />
                <a class="link_small_end" data-count="${countRow}" href="javascript:void(0)">Delete</a>
            </div>
        `;
        $('.jawaban_inputs').append(inputElement)
    }

    return {
        data: () => {
            let t_pertanyaan = $('#t_pertanyaan').DataTable({
                columnDefs: [],
                processing: false,
                language: LIB.dtLanguage(),
                dom: '<Bf<t>ip>',
                keys: { columns: [0] },
                pageLength: 50,
                scrollY: 500,
                scrollX: true,
                buttons: {
                    dom: {
                        button: {
                            tag: 'button',
                            className: 'btn btn-small sb-bgc-second-color my-action'
                        }
                    },
                    buttons: [
                        {
                            extend: 'collection',
                            text: '<i class="fa fa-download" aria-hidden="true"></i>',
                            buttons: [
                                {
                                    extend: 'excelHtml5',
                                    text: 'Excel',
                                    exportOptions: {
                                        columns: [0]
                                    },
                                    filename: 'DATA_USER',
                                    title: 'Data User'
                                },
                                {
                                    extend: 'csvHtml5',
                                    text: 'CSV',
                                    exportOptions: {
                                        columns: [0]
                                    },
                                    filename: 'DATA_USER',
                                    title: 'Data User'
                                },
                            ]
                        }
                    ]
                },
                ajax: LIB.dtSettingSrc(
                    `/api/pertanyaan`,
                    {},
                    res => {
                        return res.results
                    },
                    err => {
                        let {
                            error,
                            message
                        } = err.responseJSON
                    }
                ),
                columns: [
                    {
                        data: null,
                        render: (data, type, row) => {
                            let output = `<div style="margin-bottom: 5px;">${row.pertanyaan}</div>`;
                            if(row.get_jawabans){
                                if(row.get_jawabans.length > 0){
                                    row.get_jawabans.forEach(item => {
                                        output += `
                                            <div>
                                                <ul style="list-style: none;">
                                                    <li> - ${item.jawaban}</li>
                                                </ul>
                                            </div>
                                        `;
                                    })
                                }
                            }

                            return output;
                        }
                    }
                ],
                order: [[0, "asc"]]
            })
        },
        add: () => {
            eventListener();
        }
    }
})(AppLibrary)

const AuthController = ( (LIB) => {

    const eventListener = () => {

        $('#form_login').on('submit', function(e) {
            e.preventDefault();
        }).validate({
            errorPlacement: function (error, element) {
                error.css('color','red').css('fontSize', '10px').addClass('right')

                var placement = $(element).data("error");
                if (placement) {
                    $(placement).append(error);
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function(form){
                LIB.postRes(
                    `/api/login`,
                    form,
                    'Loading',
                    res => {
                        if(res.status){
                            
                            localStorage.setItem('payload_tracerstudy', JSON.stringify(res));
                            location.href = 'app/'
                        }else{
                            alert(res.message)
                        }
                    },
                    err => {
                        console.log(err);
                    }
                )
            }
        })
    }

    return {
        login: () => {
            eventListener();
        }
    }
})(AppLibrary);


const MahasiswaController = ( (LIB, IMG_COMPRESS) => {

    let getUser = JSON.parse( localStorage.getItem('payload_tracerstudy') );

    const eventListener = () => {

        $('[name=photo]').on('change', function(e) {
            LIB.previewImage(e, '.preview_image')
        })

        //Form Registrasi
        $("#form_registrasi").on('submit', function(e) {
            e.preventDefault()
        }).validate({
            errorPlacement: function (error, element) {
                error.css('color','red').css('fontSize', '10px').addClass('right')

                var placement = $(element).data("error");
                if (placement) {
                    $(placement).append(error);
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function(form) {
                
                let nim = $('[name=nim]').val();
                let prodi = $('[name=kode_prodi]').val();
                let nama_lengkap = $('[name=nama_lengkap]').val();
                let email = $('[name=email]').val();
                let alamat = $('[name=alamat]').val();
                let no_telp = $('[name=no_telepon]').val();
                let kode_pos = $('[name=kode_pos]').val();
                let judul_skripsi = $('[name=judul_skripsi]').val();
                let tahun_lulus = $('[name=tahun_lulus]').val();
                let dospem_1 = $('[name=dospem_1]').val();
                let dospem_2 = $('[name=dospem_2]').val();

                let photo_compress = IMG_COMPRESS.init('.preview_image');

                let newMahasiswa = new FormData();
                newMahasiswa.append('nim', nim);
                newMahasiswa.append('kode_prodi', prodi);
                newMahasiswa.append('nama_lengkap', nama_lengkap);
                newMahasiswa.append('email', email);
                newMahasiswa.append('alamat', alamat);
                newMahasiswa.append('no_telepon', no_telp);
                newMahasiswa.append('kode_pos', kode_pos);
                newMahasiswa.append('judul_skripsi', judul_skripsi);
                newMahasiswa.append('tahun_lulus', tahun_lulus);
                newMahasiswa.append('dospem_1', dospem_1);
                newMahasiswa.append('dospem_2', dospem_2);

                if( $('[name=photo]').val() !== "" ){
                    newMahasiswa.append('photo', photo_compress.blob, photo_compress.replaceName);
                }
                LIB.postBlobData(
                    `/api/mahasiswa/register`,
                    newMahasiswa,
                    'Loading...',
                    res => {
                        alert(res.message);
                        if(res.status){
                            location.href = '/konfirmasi_sukses';
                        }
                    },
                    err => {
                        console.log(err)
                    }
                );
            }
           });

        //Form Add Pekerjaan
        $('#form_pekerjaan').on('submit', function(e) {
            e.preventDefault();
        }).validate({
            errorPlacement: function (error, element) {
                error.css('color','red').css('fontSize', '10px').addClass('right')

                var placement = $(element).data("error");
                if (placement) {
                    $(placement).append(error);
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function(form) {

                let newForm = new FormData();
                let tanggal_selesai = null;
                let isCurrent = 0;

                newForm.append('nama_perusahaan', $('[name=nama_perusahaan]').val() );
                newForm.append('tanggal_bekerja', $('[name=tanggal_bekerja]').val());
                newForm.append('pekerjaan', $('[name=pekerjaan]').val() );
                newForm.append('id_mahasiswa', getUser.id_mahasiswa);

                if( $('#isCurrent').is(":checked") ){
                    isCurrent = 1;
                }else{
                    tanggal_selesai = $('[name=tanggal_selesai]').val();
                    newForm.append('tanggal_selesai', tanggal_selesai);
                }

                newForm.append('isCurrent', isCurrent);
                

                LIB.postBlobData(
                    `/api/mahasiswa/addPekerjaan`,
                    newForm,
                    'Loading',
                    res => {
                        if(res.status){
                            location.hash = '#/data-pekerjaan';
                        }else{
                            alert('Coba lagi')
                        }
                    },
                    err => {
                        console.log(err);
                    }
                )

                
            }
        })

        //Toggle check box is current pekerjaan
        $('#isCurrent').on('click', function() {
            if($('#isCurrent').is(":checked")){
                $('#field_tanggal_selesai').hide();
            }else{
                $('#field_tanggal_selesai').show();
            }
        });

        //button click mulai pengisian
        $('.info_jadwal').on('click', '#btn_mulai_pengisian', function() {
            let c = confirm('Mulai Pengisian Formulir ? ');
            if(!c) return false;

            let id_jadwal = $(this).data('id_jadwal');
            let id_mahasiswa = $(this).data('id_mahasiswa');
            let newForm = new FormData();
            newForm.append('id_jadwal', id_jadwal);
            newForm.append('id_mahasiswa', id_mahasiswa);

            LIB.postBlobData(
                `/api/pengisian/startPengisian`,
                newForm,
                'Loading',
                res => {
                    if(res.status){
                        location.hash = '#/pengisian-formulir'
                    }else{  
                        alert(res.message)
                    }
                },
                err => {
                    console.log(err)
                }
            )

        })

        //Pilih jawaban
        $('.pengisianFormulir').on('click', '.pilih-jawaban', function() {
            let id_jawaban = $(this).data('id_jawaban');
            let id_pengisian_detail = $(this).data('id_pengisian_detail');

            let newForm = new FormData();
            newForm.append('id_jawaban', id_jawaban);
            newForm.append('id_pengisian_detail', id_pengisian_detail);

            
            LIB.postBlobData(
                `/api/pengisian/isi/formulir`,
                newForm,
                'Loading',
                res => {
                    if(res.status){
                        $.notify("Berhasil menyimpan jawaban", "success");
                    }else{
                        $.notify("Terjadi Masalah", "success");
                    }
                },
                err => {
                    $.notify("Terjadi Masalah", "error");
                }
            )

            
        });

        //Submit Formulir
        $('#btn_submit_formulir').on('click', function() {
            let c = confirm('Apakah anda yakin ingin submit formulir ini ?');
            if(!c) return false;
            let newform = new FormData();
            let id_pengisian = $(this).data('id_pengisian');
            newform.append('id_pengisian', id_pengisian);

            LIB.postBlobData(
                `/api/pengisian/submitFormulir`,
                newform,
                'Loading',
                res => {
                    if(res.status){
                        $.notify("Formulir berhasil di submit", "success");
                        location.hash = '#/formulir';
                    }else{
                        $.notify(res.message);
                    }
                },
                err => {
                    console.log( err );
                    $.notify("Silahkan coba lagi", "error");
                }
            )
        })
        
    }

    const loadDetailMahasiswa = (id ) => {
        LIB.getFree(
            `/api/mahasiswa/${id}`,
            null,
            null,
            res => {
                console.log(res);
                if(res.status){
                    $('[name=nim]').val(res.results.nim)
                    $('[name=email]').val(res.results.email)
                    $('[name=nama_lengkap]').val(res.results.nama_lengkap)
                    $('[name=alamat]').val(res.results.alamat);
                    $('[name=no_telepon]').val(res.results.no_telp);
                    $('[name=prodi]').val(res.results.kode_prodi);
                    $('[name=judul_skripsi]').val(res.results.judul_skripsi);
                    $('[name=dospem_1]').val(res.results.dospem_1);
                    $('[name=dospem_2]').val(res.results.dospem_2)
                    $('[name=photo]').attr('data-id_mahasiswa', res.results.id_mahasiswa);

                    if(res.results.photo) {
                        $('.img-responsive').attr('src', `/api/mahasiswa/foto/${res.results.photo}`)
                    }

                    if(res.results.status === 'pending'){
                        $('#btn_konfirmasi').show();
                    }else{
                        $('#table_pekerjaan').show();
                    }

                    let output = '';
                   if( res.results.get_pekerjaans.length > 0 ) {
                       res.results.get_pekerjaans.forEach(item => {
                           let tanggal_selesai = item.tanggal_selesai; 
                           if(item.isCurrent === 1){    
                                tanggal_selesai = 'Sampai Sekarang';
                            }
                            output += `
                                <tr>
                                    <td>${item.nama_perusahaan}</td>
                                    <td>${item.pekerjaan}</td>
                                    <td>${item.tanggal_bekerja}</td>
                                    <td>${tanggal_selesai}</td>
                                </tr>
                            `;
                       })
                   }
                   $('#list_pekerjaan').html(output);
                }
            },
            err => {
                console.log(err);
            }
        )
    }

    const onConfirmMahasiswa = (id) => {
        //konfirmasi button
        $('#btn_konfirmasi').on('click', function() {
            let c = confirm('Apakah anda yakin ingin mengkonfirmasi ?');
            if(c){
               
                LIB.postRes(
                    `/api/mahasiswa/update_status/${id}?update_status=verified`,
                    null,
                    'loading',
                    res => {
                        if(res.status){
                            location.hash = '#/data-mahasiswa/pending'
                        }else{
                            alert('Silahkan coba lagi')
                        }
                    },
                    err => {
                        console.log(err);
                    }
                )
            }
        });
    }

    const loadJadwalPengisian = (id_mahasiswa) => {
        LIB.getFree(
            `/api/pengisian/checkJadwalForMahasiswa/${id_mahasiswa}`,
            {},
            null,
            res => {
                console.log(res);
                if(res.status){
                    displayJadwal(res.results, id_mahasiswa);
                }
            },
            err => {
                console.log(err);
            }
        )
    }

    const displayJadwal = ( data, id_mahasiswa ) => {
        const { jadwal, check_pengisian} = data;
        
        if(jadwal){

            let link = '';

            if(check_pengisian){
                if(check_pengisian.status === 'progress'){
                    link = `<a href="#/pengisian-formulir" class="btn btn-danger">Lanjutkan Pengisian</a>`
                }else{
                    link = `
                    <div class="alert alert-success" role="alert">
                        <h6>Terimakasih Anda Sudah mengisi formulir tracer study</h6> 
                    </div>
                    `
                }

            }else{
                link = `<button 
                        class="btn btn-danger" 
                        id="btn_mulai_pengisian" 
                        data-id_jadwal="${jadwal.id_jadwal}"
                        data-id_mahasiswa="${id_mahasiswa}"
                        >Mulai Pengisian
                        </button>`
            }
            $('.info_jadwal').html(`
                <div class="alert alert-success" role="alert">
                    <h6>Jadwal Pengisian Formulir Tracer Study</h6>
                </div>
                <p>Tanggal ${jadwal.tanggal_dimulai} - ${jadwal.tanggal_selesai} untuk tahun kelulusan ${jadwal.tahun_kelulusan}</p>
            
                ${link}
            `)
        }else{
            $('.info_jadwal').html(`
                <div class="alert alert-danger" role="alert">
                    <h6>Belum ada Jadwal Pengisian Formulir Tracer Study</h6>
                </div>
            `)
        }
     }

    const loadFormulir = (id_mahasiswa) => {
        LIB.getFree(
            `/api/pengisian/getFormulirMahasiswa/${id_mahasiswa}`,
            {},
            null,
            res => {
                if(res.status){
                    displayFormulirPengisian(res.results);
                }
            },
            err => {
                console.log(err);
            }
        )
    }

    const displayFormulirPengisian = (data) => {
        console.log(data);
        const { get_jadwal, get_pengisian_details } = data;
        //set attr id pengisian pada submit formulir
        $('#btn_submit_formulir').attr('data-id_pengisian', data.id_pengisian);
        $('.tanggal_dimulai').text(get_jadwal.tanggal_dimulai)
        $('.tanggal_selesai').text(get_jadwal.tanggal_selesai);
        $('.tahun_kelulusan').text(get_jadwal.tahun_kelulusan);
        if(data.status === 'finish'){
            $('#btn_submit_formulir').hide();
        }else{
            $('#btn_submit_formulir').show();
        }
        let output = '';
        get_pengisian_details.forEach(item => {

         
            let jawaban = '';
            if( item.get_pertanyaan.get_jawabans.length > 0){
                item.get_pertanyaan.get_jawabans.forEach(jwb => {

                    let checked;
                    if(item.id_jawaban === jwb.id_jawaban){
                        checked = 'checked'
                    }
                    
                    jawaban += `
                        <li class="Jawabans_item">
                            <div class="form-check">
                                <input 
                                    class="form-check-input pilih-jawaban" 
                                    type="radio"
                                    value="${jwb.id_jawaban}"
                                    id="${jwb.id_jawaban}" 
                                    data-id_jawaban="${jwb.id_jawaban}"
                                    data-id_pengisian_detail="${item.id_pengisian_detail}"
                                    name="pengisian_detail_${jwb.id_pertanyaan}"
                                    ${checked}>
                                <p>${jwb.jawaban}</p>
                            </div>
                        </li>
                    `;
                })
            }

            output += `
                <div class="PengisanFormulir_item">
                    <p>${item.get_pertanyaan.pertanyaan}</p>
                    <ul class="Jawabans">
                        ${jawaban}
                    </ul>
                </div>
            `
        })

        $('.pengisianFormulir').html(output);
    }

    const uploadFotoListener = () => {
        $('[name=photo]').on('change', function(e) {
            LIB.previewImage(e, '.preview_image')

            setTimeout( () => {
                let id_mahasiswa = $(this).data('id_mahasiswa');
                let photo_compress = IMG_COMPRESS.init('.preview_image');
                let form = new FormData();
                form.append('photo', photo_compress.blob, photo_compress.replaceName);
                form.append('id_mahasiswa', id_mahasiswa);
    
                LIB.postBlobData(
                    `/api/mahasiswa/upload_foto`,
                    form,
                    'Loading...',
                    res => {
                        console.log(res);
                        $.notify("Berhasil Upload foto", "success");
                    },
                    err => {
                        $.notify("Silahkan coba lagi", "danger");
                    }
                );
            }, 1500);
            

        })

        $('#upload').on('click', function() {
            
        })
    }
    return {
        registrasi: () => {
            eventListener();
        },
        data: () => {
            let t_mahasiswa = $('#t_mahasiswa').DataTable({
                columnDefs: [
                    {
                        targets: [5],
                        orderable: false
                    },
                    {
                        targets: [5],
                        searchable: false
                    }
                ],
                processing: false,
                language: LIB.dtLanguage(),
                dom: '<Bf<t>ip>',
                keys: { columns: [1, 2, 3, 4] },
                pageLength: 50,
                scrollY: 500,
                scrollX: true,
                buttons: {
                    dom: {
                        button: {
                            tag: 'button',
                            className: 'btn btn-small sb-bgc-second-color my-action'
                        }
                    },
                    buttons: [
                        {
                            extend: 'collection',
                            text: '<i class="fa fa-download" aria-hidden="true"></i>',
                            buttons: [
                                {
                                    extend: 'excelHtml5',
                                    text: 'Excel',
                                    exportOptions: {
                                        columns: [0,1, 2, 3, 4, 5]
                                    },
                                    filename: 'DATA_USER',
                                    title: 'Data User'
                                },
                                {
                                    extend: 'csvHtml5',
                                    text: 'CSV',
                                    exportOptions: {
                                        columns: [0,1, 2, 3, 4, 5, 6]
                                    },
                                    filename: 'DATA_USER',
                                    title: 'Data User'
                                },
                            ]
                        }
                    ]
                },
                ajax: LIB.dtSettingSrc(
                    `/api/mahasiswa?filter_status=verified`,
                    {},
                    res => {
                        return res.results
                    },
                    err => {
                        let {
                            error,
                            message
                        } = err.responseJSON
                    }
                ),
                columns: [
                    {
                        data: null,
                        render: (data, type, row) => {
                            return row.nama_lengkap
                        }
                    },
                    {
                        data: null,
                        render: (data, type, row) => {
                           return row.nim;
                        }
                    },
                    {
                        data: null,
                        render: (data, type, row) => {
                            return row.tahun_lulus
                        }
                    },
                    {
                        data: null,
                        render: (data, type, row) => {
                            return row.kode_prodi
                        }
                    },
                    {
                        data: null,
                        render: (data, type, row) => {
                            return row.email
                        }
                    },
                    {
                        data: null,
                        render: (data, type, row) => {
                            return `<a href="#/detailmhs/${row.id_mahasiswa}" >Lihat </a>`
                        }
                    },
                ],
                order: [[1, "asc"]]
            })
        },
        dataPending: () => {
            let t_mahasiswa = $('#t_mahasiswa').DataTable({
                columnDefs: [
                    {
                        targets: [5],
                        orderable: false
                    },
                    {
                        targets: [5],
                        searchable: false
                    }
                ],
                processing: false,
                language: LIB.dtLanguage(),
                dom: '<Bf<t>ip>',
                keys: { columns: [1, 2, 3, 4] },
                pageLength: 50,
                scrollY: 500,
                scrollX: true,
                buttons: {
                    dom: {
                        button: {
                            tag: 'button',
                            className: 'btn btn-small sb-bgc-second-color my-action'
                        }
                    },
                    buttons: [
                        {
                            extend: 'collection',
                            text: '<i class="fa fa-download" aria-hidden="true"></i>',
                            buttons: [
                                {
                                    extend: 'excelHtml5',
                                    text: 'Excel',
                                    exportOptions: {
                                        columns: [0,1, 2, 3, 4, 5]
                                    },
                                    filename: 'DATA_USER',
                                    title: 'Data User'
                                },
                                {
                                    extend: 'csvHtml5',
                                    text: 'CSV',
                                    exportOptions: {
                                        columns: [0,1, 2, 3, 4, 5, 6]
                                    },
                                    filename: 'DATA_USER',
                                    title: 'Data User'
                                },
                            ]
                        }
                    ]
                },
                ajax: LIB.dtSettingSrc(
                    `/api/mahasiswa?filter_status=pending`,
                    {},
                    res => {
                        return res.results
                    },
                    err => {
                        let {
                            error,
                            message
                        } = err.responseJSON
                    }
                ),
                columns: [
                    {
                        data: null,
                        render: (data, type, row) => {
                            return row.nama_lengkap
                        }
                    },
                    {
                        data: null,
                        render: (data, type, row) => {
                           return row.nim;
                        }
                    },
                    {
                        data: null,
                        render: (data, type, row) => {
                            return row.tahun_lulus
                        }
                    },
                    {
                        data: null,
                        render: (data, type, row) => {
                            return row.kode_prodi
                        }
                    },
                    {
                        data: null,
                        render: (data, type, row) => {
                            return row.email
                        }
                    },
                    {
                        data: null,
                        render: (data, type, row) => {
                            return `<a href="#/detailmhs/${row.id_mahasiswa}" >Lihat </a>`
                        }
                    },
                ],
                order: [[1, "asc"]]
            })
        },
        dashboardMahasiswa: () => {
            if(getUser){
                $('.nama_lengkap').text(getUser.payload.nama_lengkap)
                loadJadwalPengisian(getUser.payload.id_mahasiswa);
                eventListener();
            }
        },
        pengisian: ( id = null) => {
            
            if(getUser.level === 'mahasiswa'){
                loadFormulir(getUser.payload.id_mahasiswa)
                eventListener()
            }else{
                loadFormulir(id)
            }
        },
        datadiri: () => {
            if(getUser){
                loadDetailMahasiswa(getUser.payload.id_mahasiswa)
                uploadFotoListener();
            }
        },
        listPekerjaan: () => {
            let t_pekerjaan = $('#t_pekerjaan').DataTable({
                columnDefs: [],
                processing: false,
                language: LIB.dtLanguage(),
                dom: '<Bf<t>ip>',
                keys: { columns: [0, 1, 2, 3] },
                pageLength: 50,
                scrollY: 500,
                scrollX: true,
                buttons: {
                    dom: {
                        button: {
                            tag: 'button',
                            className: 'btn btn-small sb-bgc-second-color my-action'
                        }
                    },
                    buttons: [
                        {
                            extend: 'collection',
                            text: '<i class="fa fa-download" aria-hidden="true"></i>',
                            buttons: [
                                {
                                    extend: 'excelHtml5',
                                    text: 'Excel',
                                    exportOptions: {
                                        columns: [0,1, 2, 3]
                                    },
                                    filename: 'DATA_USER',
                                    title: 'Data User'
                                },
                                {
                                    extend: 'csvHtml5',
                                    text: 'CSV',
                                    exportOptions: {
                                        columns: [0,1, 2, 3]
                                    },
                                    filename: 'DATA_USER',
                                    title: 'Data User'
                                },
                            ]
                        }
                    ]
                },
                ajax: LIB.dtSettingSrc(
                    `/api/mahasiswa/${getUser.id_mahasiswa}`,
                    {},
                    res => {
                        return res.results.get_pekerjaans
                    },
                    err => {
                        let {
                            error,
                            message
                        } = err.responseJSON
                    }
                ),
                columns: [
                    {
                        data: null,
                        render: (data, type, row) => {
                            return row.nama_perusahaan
                        }
                    },
                    {
                        data: null,
                        render: (data, type, row) => {
                            return row.pekerjaan
                        }
                    },
                    {
                        data: null,
                        render: (data, type, row) => {
                          return row.tanggal_bekerja;
                        }
                    },
                    {
                        data: null,
                        render: (data, type, row) => {
                          if(row.isCurrent === 0){
                              return row.tanggal_selesai 
                          }else{
                              return 'Sampai Sekarang'
                          }
                        }
                    },
                    {
                        data: null,
                        render: (data, type, row) => {
                            return '-'
                        }
                    },
                ],
                order: [[1, "asc"]]
            })
        },
        detail: (id_mahasiswa) => {
            onConfirmMahasiswa(id_mahasiswa);
            loadDetailMahasiswa(id_mahasiswa)
            uploadFotoListener();
        },
        addPekerjaan: () => {
            eventListener();
        }
    }
})(AppLibrary, CompressImage);


const MainController = ( () => {

    let getUser =  JSON.parse(localStorage.getItem('payload_tracerstudy'));

    const setRoute = () => {
        let path;
    
        if (location.hash) {
            path = location.hash.substr(1);
            loadContent(path, '.main');     
        } else {
            if(getUser){
                if(getUser.level === 'mahasiswa'){
                    location.href = '#/formulir';   
                }else{
                    location.href = '#/dashboard';
                    activeLink('#/dashboard')
                }
            }else{
                location.href = '/'
            }
            
        }

        $(window).on('hashchange', function () {
            path = location.hash;
            loadContent(path.substr(1), '.main');
            activeLink(path)
        });  
    }

    const activeLink = (path) => {
        console.log(path)
        $('a').removeClass('active');
        // $('a').closest('li').removeClass('active open');

        $('a[href="' + path + '"]').addClass('active');
    }

    const loadContent = (path, element) => {
        $.ajax({
            cache: false,
            url: `${path}`,
            dataType: 'HTML',
            beforeSend: function () {
               
            },
            success: function (response) {
                $(element).html(response)
            },
            error: function () {
                alert('Access Denied');
            },
            complete: () => {
                
            }
        })
    }

    const displayMenu = () => {
        let getUser = JSON.parse(localStorage.getItem('payload_tracerstudy'));
        if(getUser){
            switch(getUser.level){
                case 'mahasiswa':
                    $('.menus').html(`
                        <a href="#/formulir">Dashboard</a>
                        <a href="#/data-diri">Data Diri</a>
                        <a href="#/data-pekerjaan">Data Data Pekerjaan</a>
                    `)
                return;

                case 'TU':
                    $('.menus').html(`
                        <a href="#/dashboard">Dashboard</a>
                        <a href="#/users">Data User</a>
                        <a href="#/data-master">Data Master</a>
                        <a href="#/data-mahasiswa">Data Mahasiswa</a>
                        <a href="#/jadwal-pengisian">Data Jadwal Pengisian</a>
                    `)
                return;

                case 'SBK':
                    $('.menus').html(`
                        <a href="#/dashboard">Dashboard</a>
                        <a href="#/data-master">Data Master</a>
                        <a href="#/data-mahasiswa">Data Mahasiswa</a>
                        <a href="#/jadwal-pengisian">Data Jadwal Pengisian</a>
                        <a href="#/laporan">Laporan</a>
                    `)
                return;
            }
        }
    }

    const eventListener = () => {
        $('.btn_logout').on('click', function() {
            localStorage.removeItem('payload_tracerstudy');
            location.href = '/';
        })
    }


    return {
        init: () => {
            setRoute();
            displayMenu()
            eventListener()
        }
    }
})();