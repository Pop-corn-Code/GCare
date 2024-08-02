function generateResponse(){
    var input_message = document.getElementById("input_message");
    var response = document.getElementById("response");

    fetch("api/execute-gemi", {
        method: "post",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            text: input_message.value
        })
    }).then(res=>res.json()).then(res=>{
        response.innerHTML = res.text;
    });
}