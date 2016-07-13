var int = 0;
$( document ).ready(function() {
    $('#addDiv').click(function () {
        var str = 'draggable' + int;
        $(".cont-dragg").append( "<div class='draggable' id="+str+"></div>" );
        int++;
        init($("#"+ str));
    });

    $('.draggable').each(function(i,elem) {
        init($(elem));
    });
});

function initDraggable(elem) {
    elem.draggable({

        stop: function(){
            var offset = $(this).offset();
            var color  = $(this).css("background-color");
            var index  = $(this).index();
            var xPos = offset.left;
            var yPos = offset.top;
            var data = {"id": index , "left" : offset.left  , "top" : offset.top,"color": color };
            $.ajax({
                type: 'POST',
                url: '/square/add',
                data: data,
                success: function(data){
                    console.log(data);
                }

            });

        }
    });
};

function initRandomColor(elem) {
    elem.flashMe({
        backgroundColors: "surprise",
        interval: 1000,
        transition: 500,
    });
}

function init(elem) {
    initDraggable(elem);
    initRandomColor(elem);
};