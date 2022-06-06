//GET COMPONENTS FROM WITH DOM

//Get the table
var table = document.getElementById("dataTable");

window.addEventListener("load", function(){

    //Only set the type
    const data = {
        "type":"gTournament"
    }

    sendRequest(data);

});

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

            tableText += "<td>" + item.year + "</td>";
            tableText += "<td>" + item.tournament_id + "</td>"; 
            tableText += "<td>" + item.win_score + "</td>";
            tableText += "<td>" + item.winner + "</td>";
            tableText += "<td>" + item.course_id + "</td>";

            tableText += "</tr>";
        }

        // tableText += "</table>";


        //Add the contents to the table
        table.innerHtml = tableText;
    }
}