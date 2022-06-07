//GET COMPONENTS FROM WITH DOM
//Get the buttons
var addBtn = document.getElementById("add");
deleteBtn.addEventListener("click", addScore());

var statBtn = document.getElementById("stat");
deleteBtn.addEventListener("click", getStat());
var statOption = document.getElementById("stat_option").value;

//Get the inputs
var round_nr = document.getElementById("round_nr").value;
var player_id = document.getElementById("player_id").value;
var tournament_id = document.getElementById("tournament_id").value;
var score = document.getElementById("score").value;
var pars = document.getElementById("pars").value;
var birdies = document.getElementById("birdies").value;
var bogeys = document.getElementById("bogeys").value;


//Get the table
var table = document.getElementById("dataTable");

window.addEventListener("load", function(){

    //Only set the type
    const data = {
        "type":"gRounds"
    }

    sendRequest(data);

});

function addScore()
{
    const data = {
        "type":"aScore",
        "player_id": player_id,
        "tournament_id": tournament_id,
        "round_nr": round_nr,
        "score": score,
        "pars": pars,
        "birdies": birdies,
        "bogeys": bogeys,
    };

    sendRequest(data); 
}


function getStat()
{
    //Create data object with type min/max depending on which option is selected
    if (statOption == "Minimum")
    {
        const data = {
            "type":"maxScore"
        };
    }
    else
    {
        const data = {
            "type":"minScore"
        };
    
    }
    

    sendStatRequest(data); 
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
        var arrData = JSON.parse(resData.message);

        var tableText = "";

        //Loop through the array
        for (let i = 0; i < arrData.length; i++) {
            const item = arrData[i];

            tableText += "<tr>";

            tableText += "<td>" + item.round_nr + "</td>";
            tableText += "<td>" + item.player_id + "</td>"; 
            tableText += "<td>" + item.round_nr + "</td>";
            tableText += "<td>" + item.score + "</td>";
            tableText += "<td>" + item.pars + "</td>";
            tableText += "<td>" + item.birdies + "</td>";
            tableText += "<td>" + item.bogeys + "</td>";

            tableText += "</tr>";
        }

        // tableText += "</table>";


        //Add the contents to the table
        table.innerHtml = tableText;
    }
}

//SEND REQUEST SPECIFICALLY FOR MIN OR MAX
function sendStatRequest(data)
{
    //Create the request
    const xhttpr = new XMLHttpRequest();

    //Set how the response is handled
    xhttpr.addEventListener("readystatechange", function() {
        if (this.readyState == 4 && this.status == 200)
        {
            var res = xhttpr.responseText;
            console.log(res);
            displayStat(res);
        }
    });


    // console.log(data);

    //Set the method and the URL
    xhttpr.open("POST", "../api.php");

    //Send the request with data as the body
    xhttpr.send(JSON.stringify(data));
}

function displayStat(resBody)
{
    var resData = JSON.parse(resBody);

    if (resData.success == "success")
    {
        //Parse the data part of the response object
        var arrData = JSON.parse(resData.message);


        //Display the stat in one of the html objects
        

    }
}