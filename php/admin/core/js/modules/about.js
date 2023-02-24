import {helpers } from "./helpers.js";

let Page = {
        id: 1
    },
    ContentsIds = {
        Vision: 7,
        Mission: 8,
        Principles: 9
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
    
    // Body
    if(Page && Page.body){
        $("#backend-page-body").html(helpers.data.toHTML(Page.body));
    }

    // Vision
    let Vision = FindContent(ContentsIds.Vision);
    if(Vision && Vision.title){
        $("#backend-vision-title").html(helpers.data.toHTML(Vision.title));
        $("#backend-vision-body").html(helpers.data.toHTML(Vision.body));
    }else{
        $("#backend-vision").html("");
    }
    
    // Mission
    let Mission = FindContent(ContentsIds.Mission);
    if(Mission && Mission.title){
        $("#backend-mission-title").html(helpers.data.toHTML(Mission.title));
        $("#backend-mission-body").html(helpers.data.toHTML(Mission.body));
    }else{
        $("#backend-mission").html("");
    }
    
    // Principles
    let Principles = FindContent(ContentsIds.Principles);
    if(Principles && Principles.title){
        $("#backend-principles-title").html(helpers.data.toHTML(Principles.title));
        $("#backend-principles-body").html(helpers.data.toHTML(Principles.body));
    }else{
        $("#backend-principles").html("");
    }

}

let FindContent = (id) => {
    let get_contents = $.grep(Page.contents, (content) => {
        return content.id == id;
    });
    return get_contents && get_contents[0] ? get_contents[0] : null;
}