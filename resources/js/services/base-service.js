let baseService = {

    // Install moment.js to work
    fullDate (value){
        return moment(value).format('MMMM Do YYYY, h:mm:ss a');
    },

    roundDecimal(num){
       return Math.round(num * 100) / 100
    },

    deleteCookies(){
        const cookies = document.cookie.split("; ");
        console.log(cookies);
        for (let c = 0; c < cookies.length; c++) {
            const d = window.location.hostname.split(".");
            while (d.length > 0) {
                const cookieBase = encodeURIComponent(cookies[c].split(";")[0].split("=")[0]) + '=; expires=Thu, 01-Jan-1970 00:00:01 GMT; domain=' + d.join('.') + ' ;path=';
                const p = location.pathname.split('/');
                document.cookie = cookieBase + '/';
                while (p.length > 0) {
                    document.cookie = cookieBase + p.join('/');
                    p.pop();
                }
                d.shift();
            }
        }

        console.log("Cookie deleted");


        // const cookies = document.cookie.split(";");
        // console.log(cookies);
        // for (let i = 0; i < cookies.length; i++) {
        //     const cookie = cookies[i];
        //     const eqPos = cookie.indexOf("=");
        //     const name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        //     document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
        // }
        // console.log("deleted cookie");
    }

}

export default baseService;
