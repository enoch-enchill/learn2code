import { helpers } from "./helpers.js";

let WebsiteContent = {},
    WebsiteMenus = [],
    WebsiteMenu = {},
    WebsitePages = [],
    WebsitePage = {},
    imageExts = ["png", "jpg", "jpeg"];
$(() => {
    GetWebsiteMenus();
})

let GetWebsiteMenus = () =>{
    helpers.services.get('menus-pages').then(
        response => {
            // console.log({ response });
            if(response.error == 0){
                WebsiteMenus = response.body;
            }
            SetAddContentForm();
        },
        error => {
            console.log({ error });
        }
    )
}


let SetAddContentForm = () => {
    // console.log({ WebsiteMenus });
    let optsM = `<option value="">Choose one..</option>`;
    WebsiteMenus.forEach((menu) => {
        optsM += `<option value="${menu.id}">${menu.title}</option>`;
    });
    let html = `
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <div class="input-field col s6 m3">
                            <select id="content-menu">
                                ${optsM}
                            </select>
                            <label for="content-menu" class="">Menu <i class="text-danger">*</i></label>
                        </div>
                        <div class="input-field col s6 m3">
                            <select id="content-page"></select>
                            <label for="content-page" class="">Page <i class="text-danger">*</i></label>
                        </div>
                        <div class="input-field col s6 m3">
                            <input id="content-route" type="text" class="validate">
                            <label for="content-route" class="">Route</label>
                        </div>
                        <div class="input-field col s6 m3">
                            <input id="content-path" type="text" class="validate">
                            <label for="content-path" class="">Path</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s5 m4">
                            <input id="content-title" type="text" class="validate">
                            <label for="content-title" class="">Title <i class="text-danger">*</i></label>
                        </div>
                        <div class="input-field col s7 m8">
                            <input id="content-caption" type="text" class="validate">
                            <label for="content-caption" class="">Caption</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="content-body" class="materialize-textarea"></textarea>
                            <label for="content-body">Body <i class="text-danger">*</i></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s9">
                            <input id="content-brief" type="text" class="validate">
                            <label for="content-brief" class="">Brief</label>
                        </div>
                        <div class="input-field col s3">
                            <div class="switch">
                                <label>
                                Off
                                <input type="checkbox" checked class="default" id="content-status">
                                <span class="lever"></span>
                                On
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">        
                        <div class="input-field col s6">
                            <div class="file-field input-field">
                                <div class="btn default">
                                    <span>Thumbnail</span>
                                    <input type="file" id="content-thumbnail">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="input-field col s6">
                            <div class="file-field input-field">
                                <div class="btn default">
                                    <span>Banner</span>
                                    <input type="file" id="content-banner">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <div class="row">
                        <div class="col s12 p-b-3">
                            <button id="btn-website-content-add" class="btn btn-large default" style="position: absolute; display: inline-block; right: 24px;">Submit Content</button>
                        </div>
                        <br/>
                    </div>                    
                </div>
            </div>
        </div>
    </div>`;

    $("#website-content-add").html(html);
    $('select').material_select();
    
    // Change Menu
    $("#content-menu").change(() => {
        let _menu = $("#content-menu").val();
        let _menus = $.grep(WebsiteMenus, (menu) => {
            return menu.id == _menu;
        });
        WebsiteMenu =  _menus && _menus[0] ? _menus[0] : null
        WebsitePages = WebsiteMenu ? WebsiteMenu.pages : null;
        let optsP = `<option value="">Choose one..</option>`;
        if(WebsitePages){
            WebsitePages.forEach((page) => {
                optsP += `<option value="${page.id}">${page.title}</option>`;
            });
        }
        $("#content-page").html(optsP);
        $('select').material_select();
    });

    let ThumbnailFile = {}, BannerFile = {};
    $("#content-thumbnail").change((el) => {
        let file = el.target.files[0];
        if(file){
            ThumbnailFile = helpers.files.file_to_base64(file);
            console.log({ ThumbnailFile });            
        }
    });
    $("#content-banner").change((el) => {
        let file = el.target.files[0];
        if(file){
            BannerFile = helpers.files.file_to_base64(file);
            console.log({ BannerFile });
        }
    });
    $("#btn-website-content-add").click(() => {
        let _menu = $("#content-menu").val();
        let _page = $("#content-page").val();
        let _title = $("#content-title").val();
        let _caption = $("#content-caption").val();
        let _body = $("#content-body").val();
        let _brief = $("#content-brief").val();
        let _route = $("#content-route").val();
        let _path = $("#content-path").val();
        let _status = $("#content-status").val();
        let _thumbnail = ThumbnailFile && ThumbnailFile.Data && imageExts.includes(ThumbnailFile.Ext) ? ThumbnailFile.Data : null;
        let _banner = BannerFile && BannerFile.Data && imageExts.includes(BannerFile.Ext) ? BannerFile.Data : null;

        if(_menu && _page && _title && _body){
            WebsiteContent = {
                menu_id: _menu,
                page_id: _page,
                title: helpers.data.toText(_title),
                caption: helpers.data.toText(_caption),
                body: helpers.data.toText(_body),
                brief: helpers.data.toText(_brief),
                route: helpers.data.toText(_route),
                path: helpers.data.toText(_path),
                thumbnail: _thumbnail,
                banner: _banner,
                icon: "",
                status: _status == "on" ? "1" : "0",
                author_id: $("#current-user-id").val()
            }
            PostCreateWebsiteContent();
        } else{
            swal("Invalid!", "All fields are required.", "error");
        }
    })
}

let PostCreateWebsiteContent = () => {
    helpers.services.post('contents', WebsiteContent).then(
        response => {
            console.log({ response });
            if(response.error == 0){
                swal("Created!", "New content has been added to the list.", "success");
                window.location.reload(true);
            }else{
                swal("Error!", "Something went wrong. Pease try again later.", "error");
            }
            GetWebsiteContents();
            WebsiteContent = {}; // Empty object to avoid duplicate
            $("#modal-dialog").modal("close");
        },
        error => {
            console.log({ error });
            swal("Error!", "Something went wrong. Pease try again.", "error");
            WebsiteContent = {}; // Empty object to avoid duplicate
            $("#modal-dialog").modal("close");
        }
    )
}
