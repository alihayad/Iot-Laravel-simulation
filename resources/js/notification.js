//this interval to check every 5 minutes if theres a module down to notify the user where the user can press snoooze or confimr he ius notified
setInterval(() => {
    console.log("23")
    axios.get('/check-for-module-down')
        .then(response => {
            if (response.data > 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: `${response.data} Module(s) went down check Logs!`,
                    showDenyButton: true,
                    confirmButtonText: 'Notified',
                    denyButtonText: `Snooze`,

                }).then((result) => {

                    if (result.isConfirmed) {
                        axios.put('/notified-for-module-down');//updating the log to notified = 1 
                    }
                })
            }
        })
        .catch(error => {
            console.error(error);
        });
}, 20000); // 300000 ms = 5 min
