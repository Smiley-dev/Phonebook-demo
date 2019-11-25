console.log("Script loaded")
function search(str) {
    console.log(str)

    const xhttp = new XMLHttpRequest()

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("table").innerHTML = this.responseText;
        }
    }

    xhttp.open("GET", "http://localhost/phonebook/contacts/search/" + str ,  true)
    xhttp.send()
}