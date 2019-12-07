
function favoriteCard(button, codeName, userName) {
     $.post("ajax/updateFavorite.php", {codeName: codeName, username: userName})
    .done(function(data) {
        if (data == true) {
            $(button).removeClass("fas");
            $(button).addClass("far");
        } else {
           $(button).removeClass("far");
            $(button).addClass("fas"); 
        }
    }); 
}

$("#searchType").change(function() {
    var val = $(this).val();
    if(val == "Wrestler"){
        $("#searchLabel").text("Wrestler?");
    } else if (val == "Event") {
        $("#searchLabel").text("Show?");    
    } else if (val == "Championship") {
        $("#searchLabel").text("Championship?");    
    } else {
        alert("failed");
    }
})


//Changes Link on Main Page
$("#Choice1").change(function() {
    var val = $(this).val();
    if(val == "New Set"){
        $("#selectNewCardLink").attr("href", "newCardTypes/NewSet.php");
    } else if (val == "New Card") {
        $("#selectNewCardLink").attr("href", "newCardTypes/NewCard.php"); 
    } else {
       $("#selectNewCardLink").attr("href", "newCardTypes/NewSet.php"); 
    }
})


$("#cardType").change(function() {
    var val = $(this).val();
    if(val == "Pokemon"){
        $("#cardSubType").html("<option>Basic</option><option>Stage 1</option><option>Stage 2</option><option>Restored</option><option>Level Up</option><option>BREAK</option>");
        $("#variantType").html("<option>None</option><option>GX</option><option>Tag Team GX</option><option>EX</option><option>Prime</option><option>Prism Star</option><option>Ultra Beast</option><option>Delta Species</option>");
    } else if (val == "Trainer") {
        $("#cardSubType").html("<option>Item</option><option>Supporter</option><option>Stadium</option><option>Tool</option>");
        $("#variantType").html("<option>None</option><option>Prism Star</option><option>Ace Spec</option>");
    } else if (val == "Energy") {
        $("#cardSubType").html("<option>Basic</option><option>Special</option>");
        $("#variantType").html("<option>None</option><option>Prism Star</option>");
    } else {
        $("#cardSubType").html("<option>Basic</option><option>Stage 1</option><option>Stage 2</option><option>Restored</option><option>Level Up</option><option>BREAK</option>");
        $("#cardSubType").html("<option>None</option><option>GX</option><option>Tag Taam GX</option><option>EX</option><option>Prime</option><option>Prism Star</option><option>Ultra Beast</option><option>Delta Species</option>");
    }
})

$("#format").change(function() {
    var formatType = $(this).val();
    
    $.post("../ajax/updateSetList.php", {format: formatType})
    .done(function(data) {
        $("#setName").html(data);
    });
})

function loadSetList() {
   var formatType = "Standard";
    
    $.post("../ajax/updateSetList.php", {format: formatType})
    .done(function(data) {
        $("#setName").html(data);
    }); 
}


/*function postComment(button, postedBy, videoId, replyTo, containerClass) {
    var textarea = $(button).siblings("textarea");
    var commentText = textarea.val();
    textarea.val("");
    
    if(commentText) {
        
        $.post("ajax/postComment.php", {commentText: commentText, postedBy: postedBy, videoId: videoId, replyTo: replyTo})
        .done(function(comment) {
                
                $("." + containerClass).prepend(comment);
                
              });
        
    }
    else {
        alert("You can't post an empty comment");
    }
}*/

window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
    if(window.pageYOffset >= sticky) {
        navbar.classList.add("sticky");
    } else {
        navbar.classList.remove("sticky");
    }
}






