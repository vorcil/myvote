$(document).ready(function(){
    //check to make sure user can vote and is logged in else redirect to index.html this should be done server side but for now okay
    /*$.ajax({
        url : "vote_api.php?allowedVote",
        dataType : 'jsonp',
        method : 'GET',
        success : function(response) {
           if (response.success == false)
               location.href = "index.html"


        }

    });*/
    var vote_details = {
        party : null,
        mp : null
    }

    $(".portfolio-box").click(function(){
        var party_name = $(this).attr('id');
        vote_details.party = party_name;

        console.log("party_name",party_name)
        $(this).css('opacity','0.2');
        $(this).parent().addClass("fa fa-4x fa-check");
        $(".portfolio-box" ).unbind("click");
    })

    $(".mp-vote").click(function(){
        var mp_vote = $(this).attr('mp_name');
        console.log("mp_vote",mp_vote);
        vote_details.mp = mp_vote;
	$(this).css('opacity','0.2');
        $(".mp-vote").unbind("click");
    })

    $("#submitVote").click(function(){
        console.log("vote_details",vote_details);
        $.ajax({
            url : "vote_api.php?recordVote",
            data : vote_details,
            dataType : 'jsonp',
            method : 'GET',
            success : function(response) {
                console.log("response",response);
                if (response.success == true){
                    alert("Voted, thank you");
                    location.href = "index.html"
                }else{

                    alert("sorry you have already voted");
                    location.href = "index.html"
                }
                console.log("response", response);
            }

        });
    })
})




//vote_details
