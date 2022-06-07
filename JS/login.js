

function submit(){
    var email = document.getElementById("email");
    var password = document.getElementById("password");

    const data = {
        "type": "login",
        "userName": email,
        "password": password
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
            processLogin(res);
        }
    });


    // console.log(data);

    //Set the method and the URL
    xhttpr.open("POST", "./api.php");

    //Send the request with data as the body
    xhttpr.send(JSON.stringify(data));
}

function processLogin(resBody)
{
    var resData = JSON.parse(resBody);

    console.log(resData);
    if (resData.success == "Success!!!")
    {
        //Parse the data part of the response object
        var arrData = resData.message;
    
        var txt = "<a href='player.php'>Go to Home </a>";

        var msgBox = document.getElementById("loginMsg");
        msgBox.innerText = "Your login was successful";
        var loginDiv = document.getElementById("loginResult");
        loginDiv.innerHTML += txt;
        
    }
}