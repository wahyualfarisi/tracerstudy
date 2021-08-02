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

    const eventListener = () => {

        $('[name=photo]').on('change', function(e) {
            LIB.previewImage(e, '.preview_image')
        })

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

                if( $('[name=photo]').val() !== "" ){
                    newMahasiswa.append('photo', photo_compress.blob, photo_compress.replaceName);
                }
                LIB.postBlobData(
                    `/api/mahasiswa/register`,
                    newMahasiswa,
                    'Loading...',
                    res => {
                        alert(res.message);
                    },
                    err => {
                        console.log(err)
                    }
                );
            }
           });

    }

    return {
        registrasi: () => {
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


    return {
        init: () => {
            setRoute();
            displayMenu()
        }
    }
})();