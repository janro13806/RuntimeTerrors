//GET COMPONENTS FROM WITH DOM

//Get the table
var table = document.getElementById("dataTable");
table.innerHTML = "";

window.addEventListener("load", function(){

    //Only set the type
    const data = {
        "type":"gStatistics"
    }

    console.log(data);
    sendRequest(data);

});

function top3(){
    var year=document.getElementById("year_input").value;
    const data = {
        "type":"gTopThree",
        "year": year
    }

    sendTopThreeRequest(data);
}

function roundAverage(){
    const data = {
        "type":"gAverageScore"
    }

    sendAvgRequest(data);
}

function firstLastDist(){
    const data = {
        "type":"gBackFrontNine"
    }

    sendFrontBackNineRequest(data);
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

            td1.textContent = item.Statistic_Id;
            td2.textContent = item.Tournament_Id;
            td3.textContent = item.Round_Nr;
            td4.textContent = item.Score;
            td5.textContent = item.Pars;
            td6.textContent = item.Birdies;
            td7.textContent = item.Bogeys;
           
            tr.appendChild(td1);
            tr.appendChild(td2);
            tr.appendChild(td3);
            tr.appendChild(td4);
            tr.appendChild(td5);
            tr.appendChild(td6);
            tr.appendChild(td7);

            table.appendChild(tr);

        }
    }
}

//STAT REQUESTS
function sendTopThreeRequest(data)
{
    //Create the request
    const xhttpr = new XMLHttpRequest();

    //Set how the response is handled
    xhttpr.addEventListener("readystatechange", function() {
        if (this.readyState == 4 && this.status == 200)
        {
            var res = xhttpr.responseText;
            console.log(res);
            displayTopThreeStats(res);
        }
    });

    //Set the method and the URL
    xhttpr.open("POST", "./api.php");

    //Send the request with data as the body
    xhttpr.send(JSON.stringify(data));
}

function displayTopThreeStats(resBody)
{
    var resData = JSON.parse(resBody);

    console.log(resData);
    if (resData.success == "Success!!!")
    {
        //Parse the data part of the response object
        var arrData = resData.message;

        var message = "Top Three Players";
        
        //Display the stat in one of the html objects
        var msgBox = document.getElementById("top3Msg");
        msgBox.innerText = message;

        //Display top 3 in list
        var firstID = resData.message[0].player_id;
        var firstScore = resData.message[0].Total_Score;
        var secondID = resData.message[1].player_id;
        var secondScore = resData.message[1].Total_Score;
        var thirdID = resData.message[2].player_id;
        var thirdScore = resData.message[2].Total_Score;

        let list = document.getElementById("top3players");
        
        let item1 = document.createElement('li');
        item1.innerText = 'ID: ' + firstID + ' Score: ' + firstScore;
        list.appendChild(item1);
        let item2 = document.createElement('li');
        item2.innerText = 'ID: ' + secondID + ' Score: ' + secondScore;
        list.appendChild(item2);
        let item3 = document.createElement('li');
        item3.innerText = 'ID: ' + thirdID + ' Score: ' + thirdScore;
        list.appendChild(item3);
        
        
    }

    
}

//STAT REQUESTS
function sendFrontBackNineRequest(data)
{
    //Create the request
    const xhttpr = new XMLHttpRequest();

    //Set how the response is handled
    xhttpr.addEventListener("readystatechange", function() {
        if (this.readyState == 4 && this.status == 200)
        {
            var res = xhttpr.responseText;
            console.log(res);
            displayFrontBackNineStats(res);
        }
    });

    //Set the method and the URL
    xhttpr.open("POST", "./api.php");

    //Send the request with data as the body
    xhttpr.send(JSON.stringify(data));
}

function displayFrontBackNineStats(resBody)
{
    var resData = JSON.parse(resBody);

    console.log(resData);
    if (resData.success == "Success!!!")
    {
        //Parse the data part of the response object
        var arrData = resData.message;

        var message = "";
        message = `Front Nine Distance: ${resData.message.Front_Nine} & Back Nine Distance: ${resData.message.Back_Nine}`;
        //Display the stat in one of the html objects
        var msgBox = document.getElementById("top3Msg");
        msgBox.innerText = message;

    }
}



function displayStats(resBody)
{
    var resData = JSON.parse(resBody);

    console.log(resData);
    if (resData.success == "Success!!!")
    {
        //Parse the data part of the response object
        var arrData = resData.message;

        var message = "";
        if (resData.type == "maxScore")
        {
            message = `The maximum score is ${resData.message}`;
        }
        else
        {
            message = `The minimum score is ${resData.message}`;
        }
        //Display the stat in one of the html objects
        var msgBox = document.getElementById("statMsg");
        msgBox.innerText = message;

    }
}

//ROUND AVERAGE REQUEST
function sendAvgRequest(data)
{
    //Create the request
    const xhttpr = new XMLHttpRequest();

    //Set how the response is handled
    xhttpr.addEventListener("readystatechange", function() {
        if (this.readyState == 4 && this.status == 200)
        {
            var res = xhttpr.responseText;
            console.log(res);
            displayAvg(res);
        }
    });

    //Set the method and the URL
    xhttpr.open("POST", "./api.php");

    //Send the request with data as the body
    xhttpr.send(JSON.stringify(data));
}


function displayAvg(resBody)
{
    var tableHead = document.getElementById("dataTableHead");
    var table = document.getElementById("dataTable");
    

    tableHead.innerHTML = "";
    trH = document.createElement('tr');
    th1 = document.createElement('th');
    th2 = document.createElement('th');
    th3 = document.createElement('th');

    
    th1.textContent = "Year";
    th2.textContent = "Round Number";
    th3.textContent = "Average Score";

    trH.appendChild(th1);
    trH.appendChild(th2);
    trH.appendChild(th3);
    
    tableHead.appendChild(trH);
    
    table.innerHTML = "";

    //Parse the response object
    var resData = JSON.parse(resBody);
    console.log(table);

    if (resData.success == "Success!!!")
    {
        //Parse the data part of the response object
        // console.log(resData.message);

        var arrData=resData.message;

        //Loop through the array
        for (let i = 0; i < arrData.length; i++) {
            const item = arrData[i];

            // console.log(item.Year);
            tr = document.createElement('tr');
            td1 = document.createElement('td');
            td2 = document.createElement('td');
            td3 = document.createElement('td');

            td1.textContent = item.Year;
            td2.textContent = item.Round;
            td3.textContent = item.AverageScore;
           
            tr.appendChild(td1);
            tr.appendChild(td2);
            tr.appendChild(td3);

            table.appendChild(tr);
            // console.log(table);
        }
    }

}