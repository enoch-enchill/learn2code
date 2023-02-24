import { helpers } from "./helpers.js";

let WebsitePages = [],
    WebsitePage = {},
    WebsiteMenus = [],
    WebsiteMenu = {};


$(() => {
    GetWebsiteMenus();
    GetWebsitePages();
});

let GetWebsiteMenus = () =>{
    helpers.services.get('menus').then(
        response => {
            // console.log({ response });
            if(response.error == 0){
                WebsiteMenus = response.body;
            }
        },
        error => {
            console.log({ error });
        }
    )
}

let GetWebsitePages = () =>{
    helpers.services.get('pages').then(
        response => {
            // console.log({ response });
            if(response.error == 0){
                WebsitePages = response.body;
            }
            SetWebsitePages();
        },
        error => {
            console.log({ error });
        }
    )
}

let SetWebsitePages = () => {
    if(WebsitePages && WebsitePages.length > 0){
        let rows = "";
        WebsitePages.forEach((page) => {
            let get_menu = $.grep(WebsiteMenus, (menu) =>{
                return menu.id == page.menu_id;
            });
            WebsiteMenu = get_menu && get_menu[0] ?  get_menu[0] : null;
            let menu_title = WebsiteMenu ? WebsiteMenu.title : "N/A";
            rows += `
            <tr>
                <td class="p-0">${page.order}</td>
                <td class="p-0">${menu_title}</td>
                <td class="p-0">${page.title}</td>
                <td class="p-0">${page.route}</td>
                <td class="p-0">${page.path}</td>
                <td class="p-0">
                    <div class="switch switch-page-status" data-id="${page.id}">
                        <label data-id="${page.id}">
                        Off
                        <input type="checkbox" ${page.status ? 'checked' : ''} class="default"  data-id="${page.id}">
                        <span class="lever"></span>
                        On
                        </label>
                    </div>
                </td>
                <td class="p-0">${page.created_at}</td>
                <td class="p-0">${page.updated_at}</td>
                <td class="p-0">
                    <a class="btn-floating waves-effect waves-light default m-t-10 btn-edit-page" title="Edit" data-id="${page.id}">
                        <i class="material-icons" data-id="${page.id}">mode_edit</i>
                    </a>
                    <a class="btn-floating waves-effect waves-light red m-t-10 btn-delete-page" title="Delete" data-id="${page.id}">
                        <i class="material-icons" data-id="${page.id}">delete</i>
                    </a>
                </td>
            </tr>`;
        });
        let html = `
        <thead>
            <tr>
                <th>#</th>
                <th>Menu</th>
                <th>Title</th>
                <th>Route</th>
                <th>Path</th>
                <th>Status</th>
                <th>Created</th>
                <th>Updated</th>
                <th style="width:100px;">Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Menu</th>
                <th>Title</th>
                <th>Route</th>
                <th>Path</th>
                <th>Status</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>${rows}</tbody>`;
        $("#website-page-items").html(html);
        $('#website-page-items').DataTable();

        $(".switch-page-status").click((el) => {
            let _id = el.target.dataset.id;
            let get_page = $.grep(WebsitePages, (page) =>{
                return page.id == _id;
            });
            WebsitePage = get_page && get_page[0] ?  get_page[0] : null;
            if(WebsitePage){
                SwitchWebsitePage();
            } else{
                swal("Erro!", "Something went wrong. Pease try again.", "error");
            }
        });

        $(".btn-edit-page").click((el) => {
            let _id = el.target.dataset.id;
            let get_page = $.grep(WebsitePages, (page) =>{
                return page.id == _id;
            });
            WebsitePage = get_page && get_page[0] ?  get_page[0] : null;
            if(WebsitePage){
                EditWebsitePage();
            } else{
                swal("Erro!", "Something went wrong. Pease try again.", "error");
            }
        });

        $(".btn-delete-page").click((el) => {
            let _id = el.target.dataset.id;
            let get_page = $.grep(WebsitePages, (page) =>{
                return page.id == _id;
            });
            WebsitePage = get_page && get_page[0] ?  get_page[0] : null;
            if(WebsitePage){
                DeleteWebsitePage();
            } else{
                swal("Erro!", "Something went wrong. Pease try again.", "error");
            }
        });
    }
}

$("#add-new-page").click(() => {
    CreateWebsitePage();
})

let CreateWebsitePage = () => {
    let opts = `<option value="">Choose one..</option>`;
    WebsiteMenus.forEach((menu) => {
        opts += `<option value="${menu.id}">${menu.title}</option>`;
    });
    let html = `
    <div class="row">
        <div class="input-field col s4 m3">
            <input id="page-order" type="number" class="validate">
            <label for="page-order" class="">Order</label>
        </div>
        <div class="input-field col s8 m9">
            <select id="page-menu">
                ${opts}
            </select>
            <label for="page-menu" class="">Menu</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <input id="page-title" type="text" class="validate">
            <label for="page-title" class="">Title</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <textarea id="page-caption" class="materialize-textarea"></textarea>
            <label for="page-caption" class="">Caption</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <textarea id="page-body" class="materialize-textarea"></textarea>
            <label for="page-body">Body</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m4">
            <input id="page-route" type="text" class="validate">
            <label for="page-route" class="">Route</label>
        </div>
        <div class="input-field col s12 m4">
            <input id="page-path" type="text" class="validate">
            <label for="page-path" class="">Path</label>
        </div>
        <div class="input-field col s12 m4">            
            <div class="switch">
                <label>
                Off
                <input type="checkbox" checked class="default" id="page-status">
                <span class="lever"></span>
                On
                </label>
            </div>
        </div>
    </div>`;
    $("#modal-dialog-title").text("Add Page");
    $("#modal-dialog-content").html(html);
    $('select').material_select();
    // Open Modal
    $("#modal-dialog").modal("open");

    $("#modal-dialog-submit").click(() =>{
        let _menu = $("#page-menu").val();
        let _title = $("#page-title").val();
        let _route = $("#page-route").val();
        let _path = $("#page-path").val();
        let _caption = $("#page-caption").val();
        let _body = $("#page-body").val();
        let _status = $("#page-status").val();
        let _order = $("#page-order").val();

        if(_title && _route && _path && _caption){
            WebsitePage = {
                menu_id: _menu,
                title: helpers.data.toText(_title),
                route: helpers.data.toText(_route),
                path: helpers.data.toText(_path),
                caption: helpers.data.toText(_caption),
                body: helpers.data.toText(_body),
                status: _status == "on" ? "1" : "0",
                order: _order
            }
            PostCreateWebsitePage();
        } else{
            swal("Invalid!", "All fields are required.", "error");
        }
    });
    $("#modal-dialog-cancel").click(() =>{

    });
}

let PostCreateWebsitePage = () => {
    helpers.services.post('pages', WebsitePage).then(
        response => {
            console.log({ response });
            if(response.error == 0){
                swal("Created!", "New page has been added to the list.", "success");
                window.location.reload(true);
            }else{
                swal("Error!", "Something went wrong. Pease try again later.", "error");
            }
            GetWebsitePages();
            WebsitePage = {}; // Empty object to avoid duplicate
            $("#modal-dialog").modal("close");
        },
        error => {
            console.log({ error });
            swal("Error!", "Something went wrong. Pease try again.", "error");
            WebsitePage = {}; // Empty object to avoid duplicate
            $("#modal-dialog").modal("close");
        }
    )
}

let DeleteWebsitePage = () => {
    swal({
        title: "Are you sure?",
        text: `This operation will remove "${WebsitePage.title}" from the page list!`,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
        },
        function(){
            PostDeleteWebsitePage();
    });
}

let PostDeleteWebsitePage = () => {
    helpers.services.post(`pages/${WebsitePage.id}/delete`).then(
        response => {
            // console.log({ response });
            GetWebsitePages();
            swal("Deleted!", `"${WebsitePage.title}" has been deleted.`, "success");
        },
        error => {
            console.log({ error });
            swal("Error!", "Something went wrong. Pease try again.", "error");
        }
    )
}

let EditWebsitePage = () => {
    let check = WebsitePage.status ? "checked" : "";
    let html = `
    <div class="row">
        <div class="input-field col s4 m3">
            <input id="page-order" type="number" class="validate" value="${WebsitePage.order}">
            <label for="page-order" class="">Order</label>
        </div>
        <div class="input-field col s8 m9">
            <input id="page-title" type="text" class="validate" value="${WebsitePage.title}">
            <label for="page-title" class="">Title</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <textarea id="page-caption" class="materialize-textarea">${WebsitePage.caption}</textarea>
            <label for="page-caption" class="">Caption</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <textarea id="page-body" class="materialize-textarea">${WebsitePage.body}</textarea>
            <label for="page-body">Body</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m4">
            <input id="page-route" type="text" class="validate" value="${WebsitePage.route}">
            <label for="page-route" class="">Route</label>
        </div>
        <div class="input-field col s12 m4">
            <input id="page-path" type="text" class="validate" value="${WebsitePage.path}">
            <label for="page-path" class="">Path</label>
        </div>
        <div class="input-field col s12 m4">            
            <div class="switch">
                <label>
                Off
                <input type="checkbox" ${check} class="default" id="page-status">
                <span class="lever"></span>
                On
                </label>
            </div>
        </div>
    </div>`;
    $("#modal-dialog-title").text("Edit Page");
    $("#modal-dialog-content").html(html);
    // Open Modal
    $("#modal-dialog").modal("open");
    // Enable Edit-Mode
    $("#page-body").focus();
    $("#page-caption").focus();
    $("#page-path").focus();
    $("#page-route").focus();
    $("#page-title").focus();
    $("#page-order").focus();

    $("#modal-dialog-submit").click(() =>{
        let _title = $("#page-title").val();
        let _rotue = $("#page-route").val();
        let _path = $("#page-path").val();
        let _caption = $("#page-caption").val();
        let _body = $("#page-body").val();
        let _status = $("#page-status").val();
        let _order = $("#page-order").val();

        if(_title && _rotue && _path && _caption){
            WebsitePage.title = helpers.data.toText(_title);
            WebsitePage.route = helpers.data.toText(_rotue);
            WebsitePage.path = helpers.data.toText(_path);
            WebsitePage.caption = helpers.data.toText(_caption);
            WebsitePage.body = helpers.data.toText(_body);
            WebsitePage.status = _status == "on" ? "1" : "0";
            WebsitePage.order = _order;
            PostUpdateWebsitePage();
        } else{
            swal("Invalid!", "All fields are required.", "error");
        }
    });
    $("#modal-dialog-cancel").click(() =>{

    });
}

let SwitchWebsitePage = () => {
    let _state = WebsitePage.status ? "off" : "on";
    swal({
        title: "Are you sure?",
        text: `This operation will turn "${WebsitePage.title}" ${_state}!`,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: `Yes, switch it ${_state}!`,
        closeOnConfirm: false
        },
        function(){
            // console.log({ WebsitePage });
            if(WebsitePage.status){
                WebsitePage.status == "0";
            }else{
                WebsitePage.status = "1";
            }
            PostUpdateWebsitePage();
    });
    GetWebsitePages();
}

let PostUpdateWebsitePage = () => {
    helpers.services.post(`pages/${WebsitePage.id}/update`, WebsitePage).then(
        response => {
            //console.log({ response });
            if(response.error == 0){
                swal("Updated!", "Page has been updated successfuly.", "success");
                window.location.reload(true);
            }else{
                swal("Error!", "Something went wrong. Pease try again later.", "error");
            }
            GetWebsitePages();
            $("#modal-dialog").modal("close");
        },
        error => {
            console.log({ error });
            swal("Error!", "Something went wrong. Pease try again.", "error");
            $("#modal-dialog").modal("close");
        }
    )
}