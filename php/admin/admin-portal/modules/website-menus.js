import { helpers } from "./helpers.js";

let WebsiteMenus = [],
    WebsiteMenu = {};


$(() => {
    GetWebsiteMenus();
});

let GetWebsiteMenus = () =>{
    helpers.services.get('menus').then(
        response => {
            // console.log({ response });
            if(response.error == 0){
                WebsiteMenus = response.body;
            }
            SetWebsiteMenus();
        },
        error => {
            console.log({ error });
        }
    )
}

let SetWebsiteMenus = () => {
    if(WebsiteMenus && WebsiteMenus.length > 0){
        let rows = "";
        WebsiteMenus.forEach((menu) => {
            rows += `
            <tr>
                <td class="p-0">${menu.order}</td>
                <td class="p-0">${menu.title}</td>
                <td class="p-0">${menu.route}</td>
                <td class="p-0">${menu.path}</td>
                <td class="p-0">
                    <div class="switch switch-menu-status" data-id="${menu.id}">
                        <label data-id="${menu.id}">
                        Off
                        <input type="checkbox" ${menu.status ? 'checked' : ''} class="default"  data-id="${menu.id}">
                        <span class="lever"></span>
                        On
                        </label>
                    </div>
                </td>
                <td class="p-0">${menu.created_at}</td>
                <td class="p-0">${menu.updated_at}</td>
                <td class="p-0">
                    <a class="btn-floating waves-effect waves-light default m-t-10 btn-edit-menu" title="Edit" data-id="${menu.id}">
                        <i class="material-icons" data-id="${menu.id}">mode_edit</i>
                    </a>
                    <a class="btn-floating waves-effect waves-light red m-t-10 btn-delete-menu" title="Delete" data-id="${menu.id}">
                        <i class="material-icons" data-id="${menu.id}">delete</i>
                    </a>
                </td>
            </tr>`;
        });
        let html = `
        <thead>
            <tr>
                <th>#</th>
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
        $("#website-menu-items").html(html);
        $('#website-menu-items').DataTable();

        $(".switch-menu-status").click((el) => {
            let _id = el.target.dataset.id;
            let get_menu = $.grep(WebsiteMenus, (menu) =>{
                return menu.id == _id;
            });
            WebsiteMenu = get_menu && get_menu[0] ?  get_menu[0] : null;
            if(WebsiteMenu){
                SwitchWebsiteMenu();
            } else{
                swal("Erro!", "Something went wrong. Pease try again.", "error");
            }
        });

        $(".btn-edit-menu").click((el) => {
            let _id = el.target.dataset.id;
            let get_menu = $.grep(WebsiteMenus, (menu) =>{
                return menu.id == _id;
            });
            WebsiteMenu = get_menu && get_menu[0] ?  get_menu[0] : null;
            if(WebsiteMenu){
                EditWebsiteMenu();
            } else{
                swal("Erro!", "Something went wrong. Pease try again.", "error");
            }
        });

        $(".btn-delete-menu").click((el) => {
            let _id = el.target.dataset.id;
            let get_menu = $.grep(WebsiteMenus, (menu) =>{
                return menu.id == _id;
            });
            WebsiteMenu = get_menu && get_menu[0] ?  get_menu[0] : null;
            if(WebsiteMenu){
                DeleteWebsiteMenu();
            } else{
                swal("Erro!", "Something went wrong. Pease try again.", "error");
            }
        });
    }
}

$("#add-new-menu").click(() => {
    CreateWebsiteMenu();
})

let CreateWebsiteMenu = () => {
    let html = `
    <div class="row">
        <div class="input-field col s4 m3">
            <input id="menu-order" type="number" class="validate">
            <label for="menu-order" class="">Order</label>
        </div>
        <div class="input-field col s8 m9">
            <input id="menu-title" type="text" class="validate">
            <label for="menu-title" class="">Title</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <textarea id="menu-caption" class="materialize-textarea"></textarea>
            <label for="menu-caption" class="">Caption</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m4">
            <input id="menu-route" type="text" class="validate">
            <label for="menu-route" class="">Route</label>
        </div>
        <div class="input-field col s12 m4">
            <input id="menu-path" type="text" class="validate">
            <label for="menu-path" class="">Path</label>
        </div>
        <div class="input-field col s12 m4">            
            <div class="switch">
                <label>
                Off
                <input type="checkbox" checked class="default" id="menu-status">
                <span class="lever"></span>
                On
                </label>
            </div>
        </div>
    </div>`;
    $("#modal-dialog-title").text("Add Menu");
    $("#modal-dialog-content").html(html);
    // Open Modal
    $("#modal-dialog").modal("open");

    $("#modal-dialog-submit").click(() =>{
        let _title = $("#menu-title").val();
        let _route = $("#menu-route").val();
        let _path = $("#menu-path").val();
        let _caption = $("#menu-caption").val();
        let _status = $("#menu-status").val();
        let _order = $("#menu-order").val();

        if(_title && _route && _path && _caption){
            WebsiteMenu = {
                title: helpers.data.toText(_title),
                route: helpers.data.toText(_route),
                path: helpers.data.toText(_path),
                caption: helpers.data.toText(_caption),
                status: _status == "on" ? "1" : "0",
                order: Number(_order)
            }
            PostCreateWebsiteMenu();
        } else{
            swal("Invalid!", "All fields are required.", "error");
        }
    });
    $("#modal-dialog-cancel").click(() =>{

    });
}

let PostCreateWebsiteMenu = () => {
    helpers.services.post('menus', WebsiteMenu).then(
        response => {
            console.log({ response });
            if(response.error == 0){
                swal("Created!", "New menu has been added to the list.", "success");
            }else{
                swal("Error!", "Something went wrong. Pease try again later.", "error");
            }
            GetWebsiteMenus();
            WebsiteMenu = {}; // Empty object to avoid duplicate
            $("#modal-dialog").modal("close");
        },
        error => {
            console.log({ error });
            swal("Error!", "Something went wrong. Pease try again.", "error");
            WebsiteMenu = {}; // Empty object to avoid duplicate
            $("#modal-dialog").modal("close");
        }
    )
}

let DeleteWebsiteMenu = () => {
    swal({
        title: "Are you sure?",
        text: `This operation will remove "${WebsiteMenu.title}" from the menu list!`,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
        },
        function(){
            PostDeleteWebsiteMenu();
    });
}

let PostDeleteWebsiteMenu = () => {
    helpers.services.post(`menus/${WebsiteMenu.id}/delete`).then(
        response => {
            // console.log({ response });
            GetWebsiteMenus();
            swal("Deleted!", `"${WebsiteMenu.title}" has been deleted.`, "success");
        },
        error => {
            console.log({ error });
            swal("Error!", "Something went wrong. Pease try again.", "error");
        }
    )
}

let EditWebsiteMenu = () => {
    let check = WebsiteMenu.status ? "checked" : "";
    let html = `
    <div class="row">
        <div class="input-field col s4 m3">
            <input id="menu-order" type="number" class="validate" value="${WebsiteMenu.order}">
            <label for="menu-order" class="">Order</label>
        </div>
        <div class="input-field col s8 m9">
            <input id="menu-title" type="text" class="validate" value="${WebsiteMenu.title}">
            <label for="menu-title" class="">Title</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <textarea id="menu-caption" class="materialize-textarea">${WebsiteMenu.caption}</textarea>
            <label for="menu-caption" class="">Caption</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m4">
            <input id="menu-route" type="text" class="validate" value="${WebsiteMenu.route}">
            <label for="menu-route" class="">Route</label>
        </div>
        <div class="input-field col s12 m4">
            <input id="menu-path" type="text" class="validate" value="${WebsiteMenu.path}">
            <label for="menu-path" class="">Path</label>
        </div>
        <div class="input-field col s12 m4">            
            <div class="switch">
                <label>
                Off
                <input type="checkbox" ${check} class="default" id="menu-status">
                <span class="lever"></span>
                On
                </label>
            </div>
        </div>
    </div>`;
    $("#modal-dialog-title").text("Edit Menu");
    $("#modal-dialog-content").html(html);
    // Open Modal
    $("#modal-dialog").modal("open");
    // Enable Edit-Mode
    $("#menu-caption").focus();
    $("#menu-path").focus();
    $("#menu-route").focus();
    $("#menu-title").focus();
    $("#menu-order").focus();

    $("#modal-dialog-submit").click(() =>{
        let _title = $("#menu-title").val();
        let _rotue = $("#menu-route").val();
        let _path = $("#menu-path").val();
        let _caption = $("#menu-caption").val();
        let _status = $("#menu-status").val();
        let _order = $("#menu-order").val();

        if(_title && _rotue && _path && _caption){
            WebsiteMenu.title = helpers.data.toText(_title);
            WebsiteMenu.route = helpers.data.toText(_rotue);
            WebsiteMenu.path = helpers.data.toText(_path);
            WebsiteMenu.caption = helpers.data.toText(_caption);
            WebsiteMenu.status = _status == "on" ? "1" : "0";
            WebsiteMenu.order = Number(_order);
            PostUpdateWebsiteMenu();
        } else{
            swal("Invalid!", "All fields are required.", "error");
        }
    });
    $("#modal-dialog-cancel").click(() =>{

    });
}

let SwitchWebsiteMenu = () => {
    let _state = WebsiteMenu.status ? "off" : "on";
    swal({
        title: "Are you sure?",
        text: `This operation will turn "${WebsiteMenu.title}" ${_state}!`,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: `Yes, switch it ${_state}!`,
        closeOnConfirm: false
        },
        function(){
            // console.log({ WebsiteMenu });
            if(WebsiteMenu.status){
                WebsiteMenu.status == "0";
            }else{
                WebsiteMenu.status = "1";
            }
            PostUpdateWebsiteMenu();
    });
    GetWebsiteMenus();
}

let PostUpdateWebsiteMenu = () => {
    helpers.services.post(`menus/${WebsiteMenu.id}/update`, WebsiteMenu).then(
        response => {
            //console.log({ response });
            if(response.error == 0){
                swal("Updated!", "Menu has been updated successfuly.", "success");
            }else{
                swal("Error!", "Something went wrong. Pease try again later.", "error");
            }
            GetWebsiteMenus();
            $("#modal-dialog").modal("close");
        },
        error => {
            console.log({ error });
            swal("Error!", "Something went wrong. Pease try again.", "error");
            $("#modal-dialog").modal("close");
        }
    )
}