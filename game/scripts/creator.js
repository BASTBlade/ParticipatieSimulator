var currentCell;
var cellWidth = "38px";
var cellHeight = "38px";
var cells = [];
function drawTable(){
    var table = $("<table>").addClass("creator");
    //table.css("border","1px solid black");
    table.css("height", cellHeight * 10);
    table.css("width", cellWidth * 10);
    for(var i = 1; i <= 20; i++){
        var row = $("<tr>").addClass("row " + i);
        for(var k = 1; k <= 20; k++){
            var data = $("<td>").addClass("data " + k);
            data.css("border","1px solid black");
            data.css("width",cellWidth);
            data.css("height", cellHeight);
            data.click(handleCellClick);
            row.append(data);
        }
        table.append(row);
    }    
    $("#creator").append(table);
}

function handleCellClick(){
    if(ctrlPressed){
        if(isObjectInArray(cells,$(this)) != -1){
            $(this).css("background","none");
            removeEntryFromArray(cells,$(this));
        }else{
            cells.push($(this));
            $(this).css("background","orange");
        }
    }
    else{
        resetArray();
        cells.push($(this));
        $(this).css("background","orange");
    }
}
function removeEntryFromArray(array,object){
    for(var i = 0; i < array.length; i++) {
        if($(object).is(array[i])) {
            array.splice(i, 1);
            break;
        }
    }
}
function isObjectInArray(array,object){
    for(var i = 0; i < array.length; i++) {
        if($(object).is(array[i])) {
            return i;
        }
    }
    return -1;
}

function resetArray(array){
    cells.forEach(
        function(obj){
            if(obj.css("background-image") == 'none'){
                obj.css("background","none");
            }
        }
    );
    cells = [];
}

var lastOption;
function drawImagesList(){
    var list = $("<select>").addClass("images");
    list.addClass("dropdown-menu");
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
                item.addClass("dropdown-item");
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
        $("#previewImage").css("width", cellWidth);
        $("#previewImage").css("height", cellHeight);
        
    });
}
function imageButtonClicked(){
    cells.forEach(
        function(cell){
            cell.css("background","none");
            var img = "url('maps/tiles/" + lastOption + "')";
            cell.css("background-image",img);
        }
    )
}

function uploadFile(e){
    var input = document.getElementById("file");
    file = input.files[0];
    if(file != undefined){
      formData= new FormData();
      if(!!file.type.match(/image.*/)){
        formData.append("image", file);
        $.ajax({
          url: "php/upload.php",
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          success: function(data){
              alert('success');
          }
        });
      }else{
        alert(messages.INVALID_IMAGE);
      }
    }else{
      alert(messages.NO_INPUT);
    }
}
var ctrlPressed = false
$(document).keydown(function(e){
    if(e.ctrlKey){
        ctrlPressed = true;
    }
});
$(document).keyup(function(e){
    ctrlPressed = false;
});

function setStartTile(){
    if(cells.length == 1){
        cells.forEach(
            function(cell){
                cell.addClass("start");
            }
        );
    }
    else{
        $(".warningtext").text(messages.CREATOR_WARNING_START);
        $(".warning").toggle("fade");
    }
}

function isStartTile(tile){
    if(tile.hasClass("start")){
        return 1;
    }
    else{
        return 0;
    }
}

function toggleWarning(obj){
    $(obj).toggle("fade");
}

function saveMap(){
    var confirmed = confirm(messages.CONFIRM_SAVE);
    if(confirmed){
        var tiles = [];
        $(".row").each(function(index){
            $(this).find('td').each(function(){
                var tile = {
                    ["starttile"] : isStartTile($(this)),
                    ["background"] : $(this).css("background"),
                    ["maprow"] : index,
                    ["position"] : $(this).attr("class").replace('data','')
                };
                tiles.push(tile);
            });
        });
        $.ajax({
            url: "php/saveMap.php",
            type: "POST",
            data: {myData:tiles},
            success: function(data){
                alert(data);
            }
        });


    }
}
function clearMap(){
    var confirmed = confirm(messages.CONFIRM_RESET);
    if(confirmed){
        cells = []
        $(".creator").remove();
        drawTable();
    }
}