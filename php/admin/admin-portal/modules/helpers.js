class WebServices {
  
    constructor() {
        this.api_url = "http://apsuusa.viz/api/";
        //this.api_url = "https://apsuusa.org/api/";
    }
    post(url, model){
        let post_url = this.api_url + url;
        return $.post(post_url, model);
    }

    get(url){
        let post_url = this.api_url + url;
        return $.get(post_url);
    }
}
const services = new WebServices();

class FileManager {
    
    constructor() {
        this.imageExt = ["png", "jpg", "jpeg"];
    }

    file_to_base64(file){
        let MediaFile = {
            Size: file.size,
            SizeKB: Number((file.size / 1024).toFixed(2)),
            SizeMB: Number((file.size / (1024 * 1024)).toFixed(2)),
            Type: file.type,
            Ext: file.name.split('.').pop(),
            Name: file.name.substring(0, file.name.lastIndexOf(".")),
            Width: null,
            Height: null
        };
        let imageExt = this.imageExt;

        // Initialize file reader
        var reader = new FileReader();

        // Closure to capture the file information.
        reader.onload = (function (theFile) {
            return function (e) {
                MediaFile.Data = e.target.result;

                // If Image, Get Dimensions
                if(imageExt.includes(MediaFile.Ext.toLowerCase())){                        
                    var img = new Image();
                                        
                    img.onload = function(){
                        MediaFile.Height = img.height;
                        MediaFile.Width = img.width;
                    }

                    img.src = e.target.result
                }
            };
        })(file);

        // Read in the image file as a data URL.
        reader.readAsDataURL(file);

        return MediaFile;        
    }

}
const files = new FileManager();

class Router {
    constructor(){}

    login(){

    }

    logout(){}

    push(url, model){
        let data = model ? stringify(model) : null;
        localStorage.setItem("user-data", data);
        window.location = url;
    }
}
const router = new Router();

class Data {
    constructor(){}

    toText(html){
        let safe = html.replace(/</g, "&lt;").replace(/>/g, "&gt;");
        return safe;
    }

    toHTML(safeText){
        let raw = safeText.replace(/&lt;/g, "<").replace(/&gt;/g, ">");
        return raw;
    }

    initForm(){            
        /*initialize chips*/
        $('.chips').material_chip();

        /* initialized tabs*/
        $('ul.tabs').tabs();
        /*initialized collapsible*/
        $('.collapsible').collapsible();
        /*initialized select*/
        $('select').material_select();

        /*models*/
        $('.modal').modal();

        /*initialized datapicker*/
        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15 // Creates a dropdown of 15 years to control year
        });
        /* initialized character count*/
        $('input#input_text, textarea#textarea1').characterCounter();

        /* initialized autocomplete*/
        $('input.autocomplete').autocomplete({
            data: {
                "Apple": null,
                "Microsoft": null,
                "Google": 'http://placehold.it/250x250'
            }
        });
    }
}
const data = new Data();

export const helpers = {
    services,
    files,
    router,
    data
}