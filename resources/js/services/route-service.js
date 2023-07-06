import router from "../router";

let RouteService = {
    // Authenticate each api request
    authenticateUser(url, token, next, logout){
        // Get token from local storage
        axios.get(url, {
            withCredentials: false,
            headers: {
                "Authorization" : "Bearer " + token,
                'Accept' : 'application/json',
            },
            params: {
                token: token
            }
        }).then((response) => {
            if(response.data.success){
                next();
            }else{
                window.location.href = logout;
            }

        }).catch(() => {
            window.location.href = logout;
        });
    },

    // check if diagnostic tool has been completed
    // If not redirect to diagnostic tool
    completedDiagnosticTool(token){
        // Get token from local storage
        axios.get('/api/learning/diagnostic-tool/completed', {
            headers: {
                "Authorization" : "Bearer " + token,
                'Accept' : 'application/json',
            },
        }).then((response) => {
            if(response.data.completed === false){
                // router.push({ path: '/diagnostic/user-details' });
                window.location.href = '/diagnostic/user-details';
            }

        }).catch((error) => {
            console.log(error)
        });
    }

}

export default RouteService;
