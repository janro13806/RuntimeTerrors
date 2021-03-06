//GET COMPONENTS FROM WITH DOM
//Get the buttons
// var deleteBtn = document.getElementById("deleteButton");
// deleteBtn.addEventListener("click", deletePlayer());

// var updateBtn = document.getElementById("changeButton");
// deleteBtn.addEventListener("click", updatePlayer());

// //Get the inputs
var idInput = document.getElementById("id_input");
var updateInput = document.getElementById("update_value").value;

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
    var idInput = document.getElementById("id_input2").value;
    var updateInput = document.getElementById("update_value").value;
    const data = {
        "type":"uPlayer",
        "age":updateInput,
        "weight":"",
        "player_id": idInput
    };

    sendRequest(data); 
}

function weight()
{
    var idInput = document.getElementById("id_input2").value;
    var updateInput = document.getElementById("update_value").value;
    const data = {
        "type":"uPlayer",
        "weight":updateInput,
        "age":"",
        "player_id": idInput
    };

    sendRequest(data); 
}

function deletePlayer()
{
    var idInput = document.getElementById("id_input").value;
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
    var name = document.getElementById("playerName").value;
    var surname = document.getElementById("playerSurname").value;
    var ranking = document.getElementById("playerRanking").value;
    var age = document.getElementById("playerAge").value;
    var nationality = document.getElementById("playerNationality").value;
    var weight = document.getElementById("playerWeight").value;
    var height = document.getElementById("playerHeight").value;

    

    const data = {
        "type":"aPlayer",
        "name":name,
        "surname":surname,
        "ranking":ranking,
        "age":age,
        "nationality":nationality,
        "weight":weight,
        "height": height
    };
    console.log(data);

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
    xhttpr.open("POST", "./api.php");

    //Send the request with data as the body
    xhttpr.send(JSON.stringify(data));
}

function displayTable(resBody)
{
    table.innerHTML = "";
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
        }    
    }
}


//COUNT REQUEST
function sendCountRequest(data)
{
    //Create the request
    const xhttpr = new XMLHttpRequest();

    //Set how the response is handled
    xhttpr.addEventListener("readystatechange", function() {
        if (this.readyState == 4 && this.status == 200)
        {
            var res = xhttpr.responseText;
            console.log(res);
            displayCount(res);
        }
    });


    // console.log(data);

    //Set the method and the URL
    xhttpr.open("POST", "./api.php");

    //Send the request with data as the body
    xhttpr.send(JSON.stringify(data));
}

function displayCount(resBody)
{
    var resData = JSON.parse(resBody);

    console.log(resData);
    if (resData.success == "Success!!!")
    {
        //Parse the data part of the response object
        var arrData = resData.message;

        var message = `The number of players is ${resData.message}`;
        
        //Display the stat in one of the html objects
        var msgBox = document.getElementById("countMsg");
        msgBox.innerText = message;
    }
}