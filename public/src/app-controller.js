const MahasiswaController = ( (LIB) => {

    const eventListener = () => {

        $("#form_registrasi").validate({
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
           
                $.ajax({
                    url: 'api/mahasiswa/register',
                    type: 'POST',
                    data: $(form).serialize(),
                    beforeSend: function() {
                        console.log('before send')
                    },
                    success: function(res) {
                        alert(res.message)
                    },
                    error: function(err) {
                        console.log(err)
                    }
                })
            }
           });

    }

    return {
        init: () => {
            eventListener();
        }
    }
})(AppLibrary);


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