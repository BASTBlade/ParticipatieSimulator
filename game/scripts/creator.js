var currentCell;
var cellWidth = "76px";
var cellHeight = "76px";

function drawTable(){
    var table = $("<table>").addClass("creator");
    for(var i = 1; i <= 10; i++){
        var row = $("<tr>").addClass("row " + i);
        for(var k = 1; k <= 10; k++){

            var data = $("<td>").addClass("data " + k);
            data.css("border","1px solid black");
            data.css("width",cellWidth);
            data.css("height", cellHeight);
            data.click(function(){
                if(currentCell != null){
                    $(currentCell).css("background","none");
                }
                currentCell = $(this);
                $(this).css("background","orange");
            })
            row.append(data);
        }
        table.append(row);
    }    
    $("#creator").append(table);
}

var lastOption;
function drawImagesList(){
    var list = $("<select>").addClass("images");
    var dir = "maps/tiles/";
    var fileextension = ".png";
    list.append($("<option>"));

    $.ajax({
        //This will retrieve the contents of the folder if the folder is configured as 'browsable'
        url: dir,
        success: function (data) {
            //List all .png file names in the page
            $(data).find("a:contains(" + fileextension + ")").each(function () {
                var filename = this.href.replace(window.location.host, "").replace("http://", "").replace("/game/","");
                var item = $("<option>").addClass(filename);
                item.text(filename);
                list.append(item);
                
                
            });
        }
    });
    $("#images").append(list);

    $(".images").on("change",function(e){
        var optionSelect = $("option:selected",this);
        lastOption = this.value;
        $("#previewImage").attr("src", dir + lastOption);
    });
}
function imageButtonClicked(){
    if(currentCell.find('img').length){
        currentCell.find('img').attr("src","maps/tiles/" + lastOption);
    }
    else{
        var img = $("<img>");
        img.attr("src","maps/tiles/" + lastOption);
        img.css("height",cellHeight);
        img.css("width",cellWidth);
        currentCell.append(img);
    }
}