const searchIcon = document.querySelector(".search-btn i"),
    searchBar = document.querySelector(".search-box input"),
    tableList = document.querySelector(".report-list");

//Get the users search value/
searchBar.onkeyup=()=>{
    let searchTerm = searchBar.value;

    //ajax start
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/search-report.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                tableList.innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //send the form through ajax to php
    xhr.send("searchTerm=" + searchTerm); //send the form to php
}
setInterval(()=>
{
    //ajax start
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "php/display-report.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(!searchBar.classList.contains("active"))
                {
                    tableList.innerHTML = data;
                }
            }
        }
    }
    //send the form through ajax to php
    xhr.send(); //send the form to php
},300); //this function will run every 500ms.
