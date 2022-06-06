//Get all the components from the page
var deleteBtn = document.getElementById("delete");
var updateBtn = document.getElementById("update");

//Get the inputs
var idInput = document.getElementById("player_id");
var updateInput = document.getElementById("update_value").value;
var updateOption = document.getElementById("update_option");

//Get the table
var playersTable = document.getElementById("players");

window.addEventListener("load", function(){

    //Only set the type
    const data = {
        "type":"gPlayer"
    }

    sendRequest(data);

});


function updatePlayer()
{
    //Create data object based on which update option is selected
    if (updateOption.value == "age")
    {
        const data = {
            "type":"uplayer",
            "age":updateInput,
            "player_id": player_id
        };
    }
    else
    {
        const data = {
            "type":"uplayer",
            "weight":updateInput,
            "player_id": player_id
        };
    }
    
    sendRequest(data); 
}


function sendRequest(data)
{
    //Create the request
    const xhttpr = new XMLHttpRequest();

    //Set how the response is handled
    xhttpr.addEventListener("readystatechange", function() {
        if (this.readyState == 4 && this.status == 200)
        {
            var res = xhttpr.responseText;
            console.log(res);
            displayTable(res);
        }
    });


    // console.log(data);

    //Set the method and the URL
    xhttpr.open("POST", "../api.php");

    //Send the request with data as the body
    xhttpr.send(JSON.stringify(data));
}