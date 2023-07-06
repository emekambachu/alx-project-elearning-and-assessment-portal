let fileManagementService = {

    uploadImage(event){
        this.validateImage(event);
        //Assign image and path to this variable
        this.form.image = event.target.files[0];
        this.imageErrorMessage = '';
        // create base64 version display of image
        this.imagePreview = URL.createObjectURL(event.target.files[0]);
    },

    validateImage(event){
        // Validate Image
        let allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
        if(!allowedExtensions.exec(event.target.files[0].name)){
            this.imageErrorMessage = 'Incorrect image format';
            this.form.image = null;
            return false;
        }

        if(event.target.files[0].size > 5000000){
            this.imageErrorMessage = 'File too large, 5mb max.';
            this.form.image = null;
            return false;
        }
    },

}

export default fileManagementService;
