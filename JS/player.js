//GET COMPONENTS FROM WITH DOM
//Get the buttons
// var deleteBtn = document.getElementById("deleteButton");
// deleteBtn.addEventListener("click", deletePlayer());

// var updateBtn = document.getElementById("changeButton");
// deleteBtn.addEventListener("click", updatePlayer());

// //Get the inputs
// var idInput = document.getElementById("id_input");
// var updateInput = document.getElementById("update_value").value;


// var weightOption = document.getElementById("weight_option");
// var ageOption = document.getElementById("age_option");
// console.log(ageOption);

//Get the table
var table = document.getElementById("dataTable");
console.log(table);

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
    if (ageOption.checked == true)
    {
        const data = {
            "type":"uPlayer",
            "age":updateInput,
            "player_id": idInput
        };
    }
    else
    {
        const data = {
            "type":"uPlayer",
            "weight":updateInput,
            "player_id": idInput
        };
    }
    
    sendRequest(data); 
}

function deletePlayer()
{
    const data = {
        "type":"dPlayer",
        "player_id": idInput
    };

    sendRequest(data); 
}

function countPlayers()
{
    const data = {
        "type":"cPlayers"
    };

    sendCountRequest(data);
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
    xhttpr.open("POST", "./api.php");

    //Send the request with data as the body
    xhttpr.send(JSON.stringify(data));
}

function displayTable(resBody)
{
    //Parse the response object
    var resData = JSON.parse(resBody);

    if (resData.success == "Success!!!")
    {
        //Parse the data part of the response object
        console.log(resData.message);
        // var arrData = JSON.parse(resData.message);

        var arrData = resData.message;

        var tableText = "";

        //Loop through the array
        for (let i = 0; i < arrData.length; i++) {
            const item = arrData[i];

            console.log(item.Player_ID);
            tableText += "<tr>";

            tableText += "<td>" + item.Player_ID + "</td>";
            tableText += "<td>" + item.Rank + "</td>";  //Should probably add a table heading for the rank
            tableText += "<td>" + item.Name + "</td>";
            tableText += "<td>" + item.Surname + "</td>";
            tableText += "<td>" + item.Age + "</td>";
            tableText += "<td>" + item.Nationality + "</td>";
            tableText += "<td>" + item.Weight + "</td>";
            tableText += "<td>" + item.Height + "</td>";

            tableText += "</tr>";
        }

        // tableText += "</table>";


        //Add the contents to the table
        console.log(tableText);
        table.innerHtml = tableText;
    }
}