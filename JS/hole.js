//GET COMPONENTS FROM WITH DOM

//Get the table
var table = document.getElementById("dataTable");

window.addEventListener("load", function(){

    //Only set the type
    const data = {
        "type":"gHoles"
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

    if (resData.success == "Success!!!")
    {
        //Parse the data part of the response object
        // var arrData = JSON.parse(resData.message);

        var arrData=resData.message

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

            td1.textContent = item.hole_nr;
            td2.textContent = item.distance;
            td3.textContent = item.par;
            td4.textContent = item.num_bunkers;
            td5.textContent = item.stroke_difficulty;
            td6.textContent = item.course_id;
           
            tr.appendChild(td1);
            tr.appendChild(td2);
            tr.appendChild(td3);
            tr.appendChild(td4);
            tr.appendChild(td5);
            tr.appendChild(td6);


            table.appendChild(tr);

            // tableText += "<tr>";

            // tableText += "<td>" + item.hole_nr + "</td>";
            // tableText += "<td>" + item.distance + "</td>"; 
            // tableText += "<td>" + item.par + "</td>";
            // tableText += "<td>" + item.num_bunkers + "</td>";
            // tableText += "<td>" + item.stroke_difficulty + "</td>";
            // tableText += "<td>" + item.course_id + "</td>";

            // tableText += "</tr>";
        }

        // tableText += "</table>";


        //Add the contents to the table
        // table.innerHtml = tableText;
    }
}