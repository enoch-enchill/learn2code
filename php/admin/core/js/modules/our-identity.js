import {helpers } from "./helpers.js";

let Page = {
        id: 2
    },
    ContentsIds = {
        Motto: 10,
        Colours: 11,
        Emblem: 12
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
    
    // Motto
    let Motto = FindContent(ContentsIds.Motto);
    if(Motto && Motto.title){
        $("#backend-motto-title").html(helpers.data.toHTML(Motto.title));
        $("#backend-motto-body").html(helpers.data.toHTML(Motto.body));
    }else{
        $("#backend-motto").html("");
    }
    
    // Colours
    let Colours = FindContent(ContentsIds.Colours);
    if(Colours && Colours.title){
        $("#backend-colours-title").html(helpers.data.toHTML(Colours.title));
        $("#backend-colours-body").html(helpers.data.toHTML(Colours.body));
    }else{
        $("#backend-colours").html("");
    }
    
    // Emblem
    let Emblem = FindContent(ContentsIds.Emblem);
    if(Emblem && Emblem.title){
        $("#backend-emblem-title").html(helpers.data.toHTML(Emblem.title));
        $("#backend-emblem-body").html(helpers.data.toHTML(Emblem.body));
    }else{
        $("#backend-emblem").html("");
    }

}

let FindContent = (id) => {
    let get_contents = $.grep(Page.contents, (content) => {
        return content.id == id;
    });
    return get_contents && get_contents[0] ? get_contents[0] : null;
}