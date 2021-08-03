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


    return {
        init: () => {
            loadMahasiswaPending();
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
                            return '-'
                        }
                    },
                ],
                order: [[1, "asc"]]
            })
        },
        add: () => {
            eventListener();
        }
    }
})(AppLibrary)


const MasterPertanyaan = ( (LIB) => {

    return {
        data: () => {
            let t_pertanyaan = $('#t_pertanyaan').DataTable({
                columnDefs: [],
                processing: false,
                language: LIB.dtLanguage(),
                dom: '<Bf<t>ip>',
                keys: { columns: [0, 1] },
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
                                        columns: [0,1]
                                    },
                                    filename: 'DATA_USER',
                                    title: 'Data User'
                                },
                                {
                                    extend: 'csvHtml5',
                                    text: 'CSV',
                                    exportOptions: {
                                        columns: [0,1]
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
                            return row.pertanyaan
                        }
                    },
                    {
                        data: null,
                        render: (data, type, row) => {
                           let output = '';
                           if(row.get_jawabans){
                               if(row.get_jawabans.length > 0){
                                   row.get_jawabans.forEach(item => {
                                    output += `
                                        <div style="padding: 1rem;">
                                            <ul>
                                                <li>${item.jawaban}</li>
                                            </ul>
                                        </div>
                                    `;
                                   })
                               }
                           }

                           return output;
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

                    if(res.results.photo) {
                        $('.img-responsive').attr('src', `/api/mahasiswa/foto/${res.results.photo}`)
                    }

                    if(res.results.status === 'pending'){
                        $('#btn_konfirmasi').show();
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
                    `/api/mahasiswa/update/${id}?update_status=verified`,
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
                }
            }else{
                location.href = '/'
            }
            
            // location.replace('app/#/dashboard')
        }

        $(window).on('hashchange', function () {
            path = location.hash;
            loadContent(path.substr(1), '.main');
        });  
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