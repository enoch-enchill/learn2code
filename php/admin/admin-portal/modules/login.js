import { helpers } from "./helpers.js";

let User = {},
    Credentials = {};

$(() => {

})

$("#login-action").click(() => {
    GetCredentials();
});

let GetCredentials = () => {
    Credentials = {
        email: $("#login-email").val(),
        password: $("#login-password").val(),
    }
    if(Credentials.email && Credentials.password){
        GetUser();
    }else{
        $("#login-info").html(`<div class='col s12 text-error'>Invalid credentials...</div>`);
    }
}

let GetUser = () => {
    helpers.services.post("users/login", Credentials).then(
        response => {
            console.log({ response });
            if(response.error == 0){
                $("#login-info").html(`<div class='col s12 text-success'>Login successful...</div>`);
                window.location.href = "/admin/home";
            }else{
                $("#login-info").html(`<div class='col s12 text-error'>Login failed...</div>`);
            }
        },
        error => {
            console.log({ error });
            $("#login-info").html(`<div class='col s12 text-error'>Login failed...</div>`);
        }
    )
}
