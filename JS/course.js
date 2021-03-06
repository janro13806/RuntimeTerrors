//GET COMPONENTS FROM WITH DOM
//Get the buttons
// var deleteBtn = document.getElementById("delete");
// deleteBtn.addEventListener("click", deleteCourse());

// var updateBtn = document.getElementById("update");
// deleteBtn.addEventListener("click", updateCourse());

//Get the inputs
// var idInput = document.getElementById("id_input").value;
// var updateInput = document.getElementById("update_value").value;
// var updateOption = document.getElementById("update_option");

//Get the table
var table = document.getElementById("dataTable");
table.innerHTML = "";

window.addEventListener("load", function(){

    //Only set the type
    const data = {
        "type":"gCourse"
    }

    sendRequest(data);

});


function updateCourse()
{
    var courseID=document.getElementById("cid_input").value;
    var length=document.getElementById("length_input").value;
    const data = {
        "type":"uCourse",
        "length":length,
        "course_id": courseID
    };
    console.log(data);
    
    
    sendRequest(data); 
}

function deleteCourse()
{
    var courseID=document.getElementById("cid_input").value;
    // var courseID=document.getElementById("delete_course").value;
    const data = {
        "type":"dCourse",
        "course_id": courseID
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

            td1.textContent = item.Course_Id;
            td2.textContent = item.Name;
            td3.textContent = item.Town;
            td4.textContent = item.City;
            td5.textContent = item.Length;
           
            tr.appendChild(td1);
            tr.appendChild(td2);
            tr.appendChild(td3);
            tr.appendChild(td4);
            tr.appendChild(td5);

            table.appendChild(tr);

            // tableText += "<tr>";

            // tableText += "<td>" + item.course_id + "</td>";
            // tableText += "<td>" + item.name + "</td>"; 
            // tableText += "<td>" + item.town + "</td>";
            // tableText += "<td>" + item.city + "</td>";
            // tableText += "<td>" + item.length + "</td>";

            // tableText += "</tr>";
        }

        // tableText += "</table>";


        //Add the contents to the table
        // table.innerHtml = tableText;
    }
}