import { helpers } from "./helpers.js";

let FormPages = {
        Welcome: "welcome",
        Personal: "personal",
        Augusco: "augusco"
    },
    FormPage = "",
    Page = {
        id: 3
    },
    BirthDate = {
        OptMonths: "",
        OptDays: ""
    },
    Augusco = {
        OptHouses: "",
        OptClasses: "",
        OptYears: ""
    };


$(() => {
    GetPage();
})

let GetPage = () => {
helpers.services.get(`page-live/${Page.id}`).then(
    response => {
        //console.log({ response });
        if(response.error == 0){
            Page = response.body;
        }
        SetPage();
    },
    error => {
        console.log({ error });
    }
)
}

let SetPage = () => {
    console.log({ Page });

    // Caption
    if(Page && Page.caption){
        $("#backend-page-caption").html(helpers.data.toHTML(Page.caption));
    }

    // Contents => Desc
    Page.description = "";
    if(Page && Page.contents){
        let desc = "";
        Page.contents.forEach((item) => {
            desc += `
            <div class="text-title">${helpers.data.toHTML(item.title)}</div>
            <div class="text-description">
                <p><i>${helpers.data.toHTML(item.caption)}</i></p>
                <p>${helpers.data.toHTML(item.body)}</p>
            </div>`;
        })
        Page.description = desc;
    }

    BirthDate.OptMonths = `
        <option value="" disabled selected>Choose</option>
        <option value="1">Jan</option>
        <option value="2">Feb</option>
        <option value="3">Mar</option>
        <option value="4">Apr</option>
        <option value="5">May</option>
        <option value="6">Jun</option>
        <option value="7">Jul</option>
        <option value="8">Aug</option>
        <option value="9">Sep</option>
        <option value="10">Oct</option>
        <option value="11">Nov</option>
        <option value="12">Dec</option>`;
    
    let dbDays = `<option value="" disabled selected>Choose</option>`;
    for(let d = 1; d < 32; d++){
        dbDays += `<option value="${d}">${d}</option>`
    }
    BirthDate.OptDays = dbDays;

    Augusco.OptHouses = `
    <option value="" disabled selected>Choose</option>
    <option value="1">St. Josephs House</option>
    <option value="2">St. Johns House</option>
    <option value="3">Fr. Kelly House</option>
    <option value="4">St Theresa's House</option>
    <option value="5">St. Georges House</option>
    <option value="6">St. Luke's House</option>
    <option value="7">St. Stephens House</option>
    <option value="8">St. Patricks House</option>
    <option value="9">St. Peter's House</option>
    <option value="10">Fr. Glynn House</option>
    <option value="11">Ndoum House</option>`;

    Augusco.OptClasses = `
    <option value="" disabled selected>Choose</option>
    <option value="A1">Arts 1</option>
    <option value="A2">Arts 2</option>
    <option value="A3">Arts 3</option>
    <option value="AO">Arts O'Level</option>
    <option value="B1">Business 1</option>
    <option value="B2">Business 2</option>
    <option value="B3">Business 3</option>
    <option value="BO">Business O'Level</option>
    <option value="S1">Science 1</option>
    <option value="S2">Science 2</option>
    <option value="S3">Science 3</option>
    <option value="S4">Science 4</option>
    <option value="S5">Science 5</option>
    <option value="SO">Science O'Level</option>`;

    let augYears = `<option value="" disabled selected>Choose</option>`;
    var dY = new Date().getFullYear();
    for(let d = dY-1; d > dY-52; d--){
        augYears += `<option value="${d}">${d}</option>`
    }
    Augusco.OptYears = augYears;

    GoToWelcomePage();

    // // Body
    // if(Page && Page.body){
    //     $("#backend-page-body").html(helpers.data.toHTML(Page.body));
    // }

    // // Vision
    // let Vision = FindContent(ContentsIds.Vision);
    // if(Vision && Vision.title){
    //     $("#backend-vision-title").html(helpers.data.toHTML(Vision.title));
    //     $("#backend-vision-body").html(helpers.data.toHTML(Vision.body));
    // }else{
    //     $("#backend-vision").html("");
    // }
}

let FindContent = (id) => {
let get_contents = $.grep(Page.contents, (content) => {
    return content.id == id;
});
return get_contents && get_contents[0] ? get_contents[0] : null;
}

let GoToWelcomePage = () => {
    FormPage = FormPages.Welcome;
    SetregistrationForm();
}
let GoToPersonalPage = () => {
    FormPage = FormPages.Personal;
    SetregistrationForm();
}

let GoToAuguscoPage = () => {    
    FormPage = FormPages.Augusco;
    SetregistrationForm();
}

let SetregistrationForm = () => {
    let form_html = GetWelcomeForm();
    switch (FormPage) {
        case FormPages.Welcome:
            form_html = GetWelcomeForm();
            break;
        case FormPages.Personal:
            form_html = GetPersonalForm();
            break;
        case FormPages.Augusco:
            form_html = GetAuguscoForm();
            break;
        default:
            form_html = GetWelcomeForm();

    }
    $("#form-registration-html").html(form_html);
    
    helpers.data.initForm();

    //To WelcomePage
    $(".btn-goto-welcome").click(() => {
        GoToWelcomePage();
    })

    // To PersonalPage
    $(".btn-goto-personal").click(() => {
        GoToPersonalPage();
    })    
    
    //To AuguscoPage
    $(".btn-goto-augusco").click(() => {
        GoToAuguscoPage();
    })
}

let GetWelcomeForm = () => {
    return `
    <div class="row">
        <div class="col s12">
            <div class="card form-box">
                <div class="card-content">
                    <div class="row">
                        <div class="col s12 mb-3">
                            <p class="text-caption">${helpers.data.toHTML(Page.body)}</p>
                        </div>
                        <br/>
                        <div class="col s12 mb-3">
                            ${Page.description}
                        </div>
                        <div class="col s12">
                            <button class="btn waves-effect waves-light right btn-goto-personal">Start</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>`;
}

let GetPersonalForm = () => {
    return `
    <div class="row">
        <div class="col s12">
            <div class="card form-box">
                <div class="card-content">
                    <div class="col s12">
                        <h5 class="text-success">Personal Information</h5>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <input id="first_name" type="text" name="first_name" class="validate">
                            <label for="first_name" data-error="Invalid" data-success="Valid">First Name</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="middle_name" type="text" name="middle_name">
                            <label for="middle_name">Middle Name</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="last_name" type="text" name="first_name" class="validate">
                            <label for="last_name" data-error="Invalid" data-success="Valid">Last Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s2">
                            <select id="birth_month"  name="birth_month" class="validate">
                                ${BirthDate.OptMonths}
                            </select>
                            <label for="birth_month" data-error="Invalid" data-success="Valid">Birth Month</label>
                        </div>
                        <div class="input-field col s2">
                            <select id="birth_day"  name="birth_month" class="validate">
                                ${BirthDate.OptDays}
                            </select>
                            <label for="birth_day" data-error="Invalid" data-success="Valid">Birth Day</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="email_address" type="text" name="email_address" class="validate">
                            <label for="email_address" data-error="Invalid" data-success="Valid">Email Address</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="phone_number" type="text" name="phone_number">
                            <label for="phone_number">Phone (WhatsApp) Number</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <input id="profession" type="text" name="profession" class="validate">
                            <label for="profession" data-error="Invalid" data-success="Valid">Profession</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="industry" type="text" name="industry">
                            <label for="industry">Industry</label>
                        </div>
                        <div class="input-field col s4">
                            <select id="network"  name="network" class="validate">
                                <option value="" disabled selected>Choose</option>
                                <option value="PN">Professional Network</option>
                                <option value="MN">Mentorship Network</option>
                                <option value="BN">Both Networks</option>
                                <option value="NN">Maybe Later</option>
                            </select>
                            <label for="network" data-error="Invalid" data-success="Valid">Join APSU Network</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <button class="btn blue-grey waves-effect waves-light btn-goto-welcome">Back</button>
                            <button class="btn waves-effect waves-light right btn-goto-augusco">Continue</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>`;
}

let GetAuguscoForm = () => {
    return `
    <div class="row">
        <div class="col s12">
            <div class="card form-box">
                <div class="card-content">
                    <div class="col s12">
                        <h5 class="text-success">Augusco Information</h5>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <select id="augusco_house"  name="augusco_house" class="validate">
                                ${Augusco.OptHouses}
                            </select>
                            <label for="augusco_house" data-error="Invalid" data-success="Valid">House</label>
                        </div>
                        <div class="input-field col s4">
                            <select id="augusco_class"  name="augusco_class" class="validate">
                                ${Augusco.OptClasses}
                            </select>
                            <label for="augusco_class" data-error="Invalid" data-success="Valid">Class</label>
                        </div>
                        <div class="input-field col s4">
                            <select id="augusco_year"  name="augusco_year" class="validate">
                                ${Augusco.OptYears}
                            </select>
                            <label for="augusco_year" data-error="Invalid" data-success="Valid">Year</label>
                        </div>
                    </div>
                    <div class="col s12">
                        <h5 class="text-success">Location Information</h5>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <input id="country_name" type="text" name="country_name" class="validate">
                            <label for="country_name" data-error="Invalid" data-success="Valid">Country</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="region_name" type="text" name="region_name">
                            <label for="region_name" data-error="Invalid" data-success="Valid">State or Province</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="zip_code" type="text" name="zip_code" class="validate">
                            <label for="zip_code" data-error="Invalid" data-success="Valid">Zip Code</label>
                        </div>
                        <div class="input-field col s5">
                            <select id="shirt_size"  name="shirt_size" class="validate">
                                <option value="" disabled selected>Choose</option>
                                <option value="XS">Extra Small [XS]</option>
                                <option value="S">Small [S]</option>
                                <option value="M">Medium [M]</option>
                                <option value="L">Large [L]</option>
                                <option value="XL">Extra Large [XL]</option>
                                <option value="XXL">Extra Extra Large [XXL]</option>
                            </select>
                            <label for="shirt_size" data-error="Invalid" data-success="Valid">Shirt Size</label>
                        </div>
                        <div class="input-field col s7">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <button class="btn blue-grey waves-effect waves-light btn-goto-personal">Back</button>
                            <button class="btn waves-effect waves-light right btn-goto-augusco">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>`;
}