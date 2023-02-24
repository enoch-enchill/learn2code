import { helpers } from "./helpers.js";

let WebsiteContents = [],
    WebsiteContent = {},
    WebsiteMenus = [],
    WebsiteMenu = {};


$(() => {
    GetWebsiteMenus();
    GetWebsiteContents();
});

let GetWebsiteMenus = () =>{
    helpers.services.get('menus-pages').then(
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

let GetWebsiteContents = () =>{
    helpers.services.get('contents').then(
        response => {
            // console.log({ response });
            if(response.error == 0){
                WebsiteContents = response.body;
            }
            SetWebsiteContents();
        },
        error => {
            console.log({ error });
        }
    )
}

let SetWebsiteContents = () => {
    if(WebsiteContents && WebsiteContents.length > 0){
        let rows = "";
        WebsiteContents.forEach((content) => {
            let get_menu = $.grep(WebsiteMenus, (menu) =>{
                return menu.id == content.menu_id;
            });
            WebsiteMenu = get_menu && get_menu[0] ?  get_menu[0] : null;
            let menu_title = WebsiteMenu ? WebsiteMenu.title : "N/A";
            rows += `
            <tr>
                <td class="p-0">${content.title}</td>
                <td class="p-0">${menu_title}</td>
                <td class="p-0">${content.route}</td>
                <td class="p-0">${content.path}</td>
                <td class="p-0">
                    <div class="switch switch-content-status" data-id="${content.id}">
                        <label data-id="${content.id}">
                        Off
                        <input type="checkbox" ${content.status ? 'checked' : ''} class="default"  data-id="${content.id}">
                        <span class="lever"></span>
                        On
                        </label>
                    </div>
                </td>
                <td class="p-0">${content.created_at}</td>
                <td class="p-0">${content.updated_at}</td>
                <td class="p-0">
                    <a class="btn-floating waves-effect waves-light default m-t-10 btn-edit-content" title="Edit" data-id="${content.id}">
                        <i class="material-icons" data-id="${content.id}">mode_edit</i>
                    </a>
                    <a class="btn-floating waves-effect waves-light red m-t-10 btn-delete-content" title="Delete" data-id="${content.id}">
                        <i class="material-icons" data-id="${content.id}">delete</i>
                    </a>
                </td>
            </tr>`;
        });
        let html = `
        <thead>
            <tr>
                <th>Title</th>
                <th>Menu</th>
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
                <th>Title</th>
                <th>Menu</th>
                <th>Route</th>
                <th>Path</th>
                <th>Status</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>${rows}</tbody>`;
        $("#website-content-items").html(html);
        $('#website-content-items').DataTable();

        $(".switch-content-status").click((el) => {
            let _id = el.target.dataset.id;
            let get_content = $.grep(WebsiteContents, (content) =>{
                return content.id == _id;
            });
            WebsiteContent = get_content && get_content[0] ?  get_content[0] : null;
            if(WebsiteContent){
                SwitchWebsiteContent();
            } else{
                swal("Erro!", "Something went wrong. Pease try again.", "error");
            }
        });

        $(".btn-edit-content").click((el) => {
            let _id = el.target.dataset.id;
            helpers.router.push(`/admin/website/contents-edit/${_id}`);
        });

        $(".btn-delete-content").click((el) => {
            let _id = el.target.dataset.id;
            let get_content = $.grep(WebsiteContents, (content) =>{
                return content.id == _id;
            });
            WebsiteContent = get_content && get_content[0] ?  get_content[0] : null;
            if(WebsiteContent){
                DeleteWebsiteContent();
            } else{
                swal("Erro!", "Something went wrong. Pease try again.", "error");
            }
        });
    }
}

$("#add-new-content").click(() => {
    helpers.router.push("/admin/website/contents-add");
})

let DeleteWebsiteContent = () => {
    swal({
        title: "Are you sure?",
        text: `This operation will remove "${WebsiteContent.title}" from the content list!`,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
        },
        function(){
            PostDeleteWebsiteContent();
    });
}

let PostDeleteWebsiteContent = () => {
    helpers.services.post(`contents/${WebsiteContent.id}/delete`).then(
        response => {
            // console.log({ response });
            GetWebsiteContents();
            swal("Deleted!", `"${WebsiteContent.title}" has been deleted.`, "success");
        },
        error => {
            console.log({ error });
            swal("Error!", "Something went wrong. Pease try again.", "error");
        }
    )
}

let SwitchWebsiteContent = () => {
    let _state = WebsiteContent.status ? "off" : "on";
    swal({
        title: "Are you sure?",
        text: `This operation will turn "${WebsiteContent.title}" ${_state}!`,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: `Yes, switch it ${_state}!`,
        closeOnConfirm: false
        },
        function(){
            // console.log({ WebsiteContent });
            if(WebsiteContent.status){
                WebsiteContent.status == "0";
            }else{
                WebsiteContent.status = "1";
            }
            PostUpdateWebsiteContent();
    });
    GetWebsiteContents();
}

let PostUpdateWebsiteContent = () => {
    helpers.services.post(`contents/${WebsiteContent.id}/update`, WebsiteContent).then(
        response => {
            //console.log({ response });
            if(response.error == 0){
                swal("Updated!", "Content has been updated successfuly.", "success");
            }else{
                swal("Error!", "Something went wrong. Pease try again later.", "error");
            }
            GetWebsiteContents();
        },
        error => {
            console.log({ error });
            swal("Error!", "Something went wrong. Pease try again.", "error");
        }
    )
}