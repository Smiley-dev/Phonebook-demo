console.log("Script loaded")


function search() {

    const form = {
        search: document.getElementById('search1'),
        group: document.getElementById('groups'),
        email: document.getElementById('email'),
        phone: document.getElementById('phone'),

    }

    form.search.addEventListener('keyup', (e) => {
        e.preventDefault()
        const data = `search=${form.search.value}&group=${form.group.value}&email=${form.email.checked}&phone=${form.phone.checked}`

        sendRequest(data)
    })

    form.group.addEventListener('change', (e) => {
        e.preventDefault()
        const data = `search=${form.search.value}&group=${form.group.value}&email=${form.email.checked}&phone=${form.phone.checked}`
        sendRequest(data)

    })

    form.email.addEventListener('change', (e) => {
        e.preventDefault()
        const data = `search=${form.search.value}&group=${form.group.value}&email=${form.email.checked}&phone=${form.phone.checked}`
        sendRequest(data)
    })

    form.phone.addEventListener('change', (e) => {
        e.preventDefault()
        const data = `search=${form.search.value}&group=${form.group.value}&email=${form.email.checked}&phone=${form.phone.checked}`
        sendRequest(data)
    })

}

function sendRequest(data){
    const request = new XMLHttpRequest()

    request.open('post', 'http://localhost/phonebook/contacts/filter', true)
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
    request.onreadystatechange = function() {//Call a function when the state changes.
        if(request.readyState == 4 && request.status == 200) {
            document.getElementById('table').innerHTML = request.responseText
        }
    }
    request.send(data)

}

window.onload = search