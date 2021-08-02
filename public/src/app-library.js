const AppLibrary = ( () => {

    return {
        postRes: (path, form, success, error) => {
            $.ajax({
                url: path,
                type: 'POST',
                data: new FormData(form),
                headers: {
                    'Accept': 'application/json'
                },
                beforeSend: function () {
                    console.log('before send')
                    // $.blockUI({ 
                    //     message: `
                    //     <div class="loader-wrapper">
                    //         <div class="loader-container">
                    //         <div class="ball-clip-rotate-multiple loader-success">
                    //             <div></div>
                    //             <div></div>
                    //         </div>
                    //         </div>
                    //     </div>
                    //     <h6 class="center-align mt-5" style="color: grey">Please wait ...</h6>
                    //     `
                    //  }); 
                },
                success: function (res) {
                    success(res)
                },
                error: function (err) {
                    error(err)
                    
                },
                complete: function () {
                    // $.unblockUI(); 
                }

            })
        }
    }
})()