//GET COMPONENTS FROM WITH DOM

//Get the table
var table = document.getElementById("dataTable");
table.innerHTML = "";

window.addEventListener("load", function(){

    //Only set the type
    const data = {
        "type":"gStatistics"
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

        var arrData=resData.message;

        // var tableText = "";

        //Loop through the array
        for (let i = 0; i < arrData.length; i++) {
            const item = arrData[i];

            tr = document.createElement('tr');
            td1 = document.createElement('td');
            td2 = document.createElement('td');
            td3 = document.createElement('td');
            td4 = document.createElement('td');
            td5 = document.createElement('td');
            td6 = document.createElement('td');
            td7 = document.createElement('td');

            td1.textContent = item.statistic_id;
            td2.textContent = item.tournament_id;
            td3.textContent = item.round_nr;
            td4.textContent = item.score;
            td5.textContent = item.pars;
            td6.textContent = item.birdies;
            td7.textContent = item.bogeys;
           
            tr.appendChild(td1);
            tr.appendChild(td2);
            tr.appendChild(td3);
            tr.appendChild(td4);
            tr.appendChild(td5);
            tr.appendChild(td6);
            tr.appendChild(td7);

            table.appendChild(tr);


            // tableText += "<tr>";

            // tableText += "<td>" + item.statistic_id + "</td>";
            // tableText += "<td>" + item.tournament_id + "</td>"; 
            // tableText += "<td>" + item.round_nr + "</td>";
            // tableText += "<td>" + item.score + "</td>";
            // tableText += "<td>" + item.pars + "</td>";
            // tableText += "<td>" + item.birdies + "</td>";
            // tableText += "<td>" + item.bogeys + "</td>";

            // tableText += "</tr>";
        }

        // tableText += "</table>";


        //Add the contents to the table
        // table.innerHtml = tableText;
    }
}