import {helpers } from "./helpers.js";

let ActiveMenuItems = [];
$(() => {
    GetActiveMenuItems();
})

let GetActiveMenuItems = () => {
    helpers.services.get('menus-live').then(
        response => {
            // console.log({ response });
            if(response.error == 0){
                ActiveMenuItems = response.body;
            }
            SetActiveMenuItems();
        },
        error => {
            console.log({ error });
        }
    )
}

let SetActiveMenuItems = () => {
    if (ActiveMenuItems && ActiveMenuItems.length > 0) {
        let _html = "";
        ActiveMenuItems.forEach((menuItem) => {
            if(menuItem.pages && menuItem.pages.length){
                let _item = "";
                menuItem.pages.forEach((pageItem) => {
                    _item += `<a class="dropdown-item" href="${pageItem.route}">${pageItem.title}</a>`;
                });
                _html += `
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown06" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">${menuItem.title}</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown06">
                     ${_item}
                    </div>
                </li>`;
                
            }else{
                _html += `
                <li class="nav-item">
                    <a class="nav-link" href="${menuItem.route}">${menuItem.title}</a>
                </li>`;
            }
        });

        $("#backend-menus-holder").html(_html);
    }
}