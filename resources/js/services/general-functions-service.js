let generalFunctionsService = {

    // Install moment.js to work
    fullDate (value){
        return moment(value).format('MMMM Do YYYY, h:mm:ss a');
    },

}

export default generalFunctionsService;
