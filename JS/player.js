//GET COMPONENTS FROM WITH DOM
//Get the buttons
var deleteBtn = document.getElementById("delete");
deleteBtn.addEventListener("click", deletePlayer());

var updateBtn = document.getElementById("update");
deleteBtn.addEventListener("click", updatePlayer());

//Get the inputs
var idInput = document.getElementById("player_id");
var updateInput = document.getElementById("update_value").value;
var updateOption = document.getElementById("update_option");

//Get the table
var table = document.getElementById("dataTable");

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
            "type":"uPlayer",
            "age":updateInput,
            "player_id": player_id
        };
    }
    else
    {
        const data = {
            "type":"uPlayer",
            "weight":updateInput,
            "player_id": player_id
        };
    }
    
    sendRequest(data); 
}

function deletePlayer()
{
    const data = {
        "type":"dPlayer",
        "player_id": player_id
    };

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

function displayTable(resBody)
{
    //Parse the response object
    var resData = JSON.parse(resBody);

    if (resData.success == "success")
    {
        //Parse the data part of the response object
        var playersData = JSON.parse(resData.message);

        var tableText = "";

        //Loop through the array
        for (let i = 0; i < playersData.length; i++) {
            const player = playersData[i];

            tableText += "<tr>";

            tableText += "<td>" + player.player_id + "</td>";
            tableText += "<td>" + player.rank + "</td>";  //Should probably add a table heading for the rank
            tableText += "<td>" + player.name + "</td>";
            tableText += "<td>" + player.surname + "</td>";
            tableText += "<td>" + player.age + "</td>";
            tableText += "<td>" + player.nationality + "</td>";
            tableText += "<td>" + player.weight + "</td>";
            tableText += "<td>" + player.height + "</td>";

            tableText += "</tr>";
        }

        // tableText += "</table>";


        //Add the contents to the table
        table.innerHtml = tableText;
    }
}