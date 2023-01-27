var signinWin;
var service;

function social(serviceName) {
    $("#modal-connected").addClass('cover-spin');
    service = serviceName;
    let url = base_url + `/redirect/${serviceName}`;
    signinWin = window.open(`${url}`, "SignIn", "width=780,height=410,toolbar=0,scrollbars=0,status=0,resizable=0,location=0,menuBar=0,left=" + 500 + ",top=" + 200);
    setTimeout(CheckLoginStatus, 2000);
    signinWin.focus();
    return false;
}

function CheckLoginStatus() {
    if (signinWin.closed) {
        $("#modal-connected").removeClass('cover-spin');
        Livewire.emitTo('auth.user.login', 'updateList', service)
    } else setTimeout(CheckLoginStatus, 1000);
}

window.addEventListener('refresh-page', event => {
    $("#loginModal").modal('hide');
    location.reload();
})
window.addEventListener('close-login-modal', event => {
    $("#loginModal").modal('hide');
})
