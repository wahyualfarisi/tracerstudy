const AppLibrary = ( () => {

    return {
        previewImage: ( e, selectorImage ) => {
            // let file = this.files[0]
            var preview = document.querySelector(selectorImage);
            console.log({e, selectorImage});

            const width    = 500;
            const height   = 500;

            if(e.target.files[0]){
                const fileName = e.target.files[0]
    
                const reader = new FileReader();
                reader.readAsDataURL(e.target.files[0]);
                reader.onload = event => {
                    const img = new Image();
                    img.src = event.target.result;
                    img.onload = () => {
                            const elem = document.createElement('canvas');
                            elem.width = width;
                            elem.height = height;
                            const ctx = elem.getContext('2d');
                            // img.width and img.height will contain the original dimensions
                            ctx.drawImage(img, 0, 0, width, height);
    
                            const image = ctx.canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
                            preview.src = image
                            
                        }, reader.onerror = error => console.log(error);
    
                 };
            }else{
                $(selectorImage).attr('src', '')
            }
        },
        dataURItoBlob: (dataURI) =>
        {
            var byteString;
            if(dataURI.split(',')[0].indexOf('base64') >=0 )
                byteString = atob(dataURI.split(',')[1])
            else
                byteString = unescape(dataURI.split(',')[1])


            var mimestring = dataURI.split(',')[0].split(':')[1].split(',')[0];

            var ia = new Uint8Array(byteString.length);
            for(var i = 0; i < byteString.length; i++)
            {
                ia[i] = byteString.charCodeAt(i)
            }
            return new Blob([ia], {type: mimestring});
        },
        postBlobData: (path, form, message = 'please wait', success, error) => {
            $.ajax({
                url: path,
                type: 'POST',
                data: form,
                processData: false,
                contentType: false,
                cache: false,
                headers: {
                    'Accept': 'application/json'
                },
                beforeSend: function () {
                    $.blockUI({ 
                        message: `
                        <div class="loader-wrapper">
                            <div class="loader-container">
                            <div class="ball-clip-rotate-multiple loader-success">
                                <div></div>
                                <div></div>
                            </div>
                            </div>
                        </div>
                        <h6 class="center-align mt-5" style="color: grey">${message}</h6>
                        `
                     }); 
                 
                },
                success: function (res) {
                    success(res)
                },
                error: function (err) {
                    error(err)
                    
                },
                complete: function () {
                    $.unblockUI(); 
                }

            })
        },
        postRes: (path, form, message = 'please wait', success, error) => {
            $.ajax({
                url: path,
                type: 'POST',
                dataType: 'JSON',
                data: $(form).serialize(),
                headers: {
                    'Accept': 'application/json'
                },
                beforeSend: function () {
                    $.blockUI({ 
                        message: `
                        <div class="loader-wrapper">
                            <div class="loader-container">
                            <div class="ball-clip-rotate-multiple loader-success">
                                <div></div>
                                <div></div>
                            </div>
                            </div>
                        </div>
                        <h6 class="center-align mt-5" style="color: grey">${message}</h6>
                        `
                     }); 
                 
                },
                success: function (res) {
                    success(res)
                },
                error: function (err) {
                    error(err)
                },
                complete: function () {
                    $.unblockUI(); 
                }

            })
        },
    }
})()

const CompressImage = ( (JIC) => {
    
    const startCompress = function( selectorImageTarget ) {

        let source_image = document.querySelector(selectorImageTarget);
        let createImage  = document.createElement('img');

        createImage.src  = JIC.compress(source_image, 80, 'jpg').src;
        let blob         = AppLibrary.dataURItoBlob(createImage.src);
        let date         = new Date().getTime();
        blob.filename    = `file_${date}.png`;

        let replaceName  = blob.filename.replace(/\.[^/.]+$/, ".jpg");

        return {
            blob: blob,
            replaceName: replaceName
        }
    }


    return {
        init: ( selectorImageTarget ) => {
            return startCompress( selectorImageTarget );
        }
    }
})(jic)