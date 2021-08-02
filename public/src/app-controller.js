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

    const setRoute = () => {
        let path;
        

        if (location.hash) {
            path = location.hash.substr(2);
            loadContent(path, '.main');
            
        } else {
            // location.href = '#/dashboard';
            location.replace('app/#/dashboard')
        }

        $(window).on('hashchange', function () {
            path = location.hash;
            loadContent(path.substr(2), '.main');
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


    return {
        init: () => {
            setRoute();
        }
    }
})();