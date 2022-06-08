"use strict"

// Ask backend to return standard errors in json format
const opt = {headers: {'Accept': 'application/json'}};
    
const debounce = (func, delay) => {
    let inDebounce
    return function() {
      const context = this
      const args = arguments
      clearTimeout(inDebounce)
      inDebounce = setTimeout(() => func.apply(context, args), delay)
    }
  }

document.addEventListener("DOMContentLoaded", () => {

    let inputs = document.querySelectorAll("input");
    inputs.forEach(  input => {
        input.addEventListener('input', debounce(send, 1000));
    });
});

function send() {
    let radius = document.querySelector("#radius").value;
    if(radius) {
        fetch("circle/"+radius, opt)
            .then((response) => {
                response.text().then(text => {update("circle",text)}) ;
            })
            .catch((error) => {
                console.log(error);
                update("circle","Some Error");
            });
    } else
        update("triangle","");

    const sides = document.querySelectorAll(".triangle");
    let asides = [];
    sides.forEach(side => {if(side.value) asides.push(side.value)});
    if(asides.length==3) {
        fetch("triangle/"+asides.join("/"), opt)
            .then((response) => {
                response.text().then(text => {update("triangle",text)}) ;
            })
            .catch((error) => {
                console.log(error);
                update("triangle","Some Error");
            });
    } else 
        update("triangle","");

    if(asides.length==3 && radius) {
        if(asides.length==3) {
            fetch("sum/" + radius + "/" + asides.join("/"), opt)
                .then((response) => {
                    response.text().then(text => {update("sum",text)}) ;
                })
                .catch((error) => {
                    console.log(error);
                    update("sum","Some Error");
                });
        } else 
            update("sum","");
    }
}

function update(name, value) {
    const field = document.getElementById(name);
    console.log(value, field.value);
    if(field.value != value)
        field.value = value;
}

