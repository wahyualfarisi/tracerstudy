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