//GET COMPONENTS FROM WITH DOM
//Get the buttons
// var deleteBtn = document.getElementById("deleteButton");
// deleteBtn.addEventListener("click", deletePlayer());

// var updateBtn = document.getElementById("changeButton");
// deleteBtn.addEventListener("click", updatePlayer());

// //Get the inputs
// var idInput = document.getElementById("id_input");
// var updateInput = document.getElementById("update_value").value;

// var weightBtn = document.getElementById("weight_option");
// var ageBtn = document.getElementById("age_option");

// var weightOption = document.getElementById("weight_option");
// var ageOption = document.getElementById("age_option");
// console.log(ageOption);

//Get the table
var table = document.querySelector("#dataTable");
table.innerHTML = "";
console.log(table);

window.addEventListener("load", function(){

    //Only set the type
    const data = {
        "type":"gPlayer"
    }

    sendRequest(data);

});


// function updatePlayer()
// {
//     //Create data object based on which update option is selected
//     if (ageOption.checked == true)
//     {
        
//     }
//     else
//     {
//         const data = {
//             "type":"uPlayer",
//             "weight":updateInput,
//             "player_id": idInput
//         };
//     }
    
//     sendRequest(data); 
// }

function age()
{
    const data = {
        "type":"uPlayer",
        "age":updateInput,
        "player_id": idInput
    };

    sendRequest(data); 
}

function weight()
{
    const data = {
        "type":"uPlayer",
        "weight":updateInput,
        "player_id": idInput
    };

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

function addPlayer()
{

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
            td8 = document.createElement('td');

            td1.textContent = item.Player_ID;
            td2.textContent = item.Rank;
            td3.textContent = item.Name;
            td4.textContent = item.Surname;
            td5.textContent = item.Age;
            td6.textContent = item.Nationality;
            td7.textContent = item.Weight;
            td8.textContent = item.Height;
           
            tr.appendChild(td1);
            tr.appendChild(td2);
            tr.appendChild(td3);
            tr.appendChild(td4);
            tr.appendChild(td5);
            tr.appendChild(td6);
            tr.appendChild(td7);
            tr.appendChild(td8);

            table.appendChild(tr);

            // console.log(item.Player_ID);


            // tableText += "<tr>";

            // tableText += "<td>" +  + "</td>";
            // tableText += "<td>" + item.Rank + "</td>";  //Should probably add a table heading for the rank
            // tableText += "<td>" + item. + "</td>";
            // tableText += "<td>" + item. + "</td>";
            // tableText += "<td>" + item. + "</td>";
            // tableText += "<td>" + item. + "</td>";
            // tableText += "<td>" + item.Weight + "</td>";
            // tableText += "<td>" + item.Height + "</td>";

            // tableText += "</tr>";
        }

        // tableText += "</table>";


        //Add the contents to the table
        // console.log(tableText);
        // table.innerHtml = "";
        // table.innerHtml += tableText;
        
    }
}