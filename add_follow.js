window.onload = function() {
    document.getElementById("add").onclick = add_follow;
    document.getElementById("cancel").onclick = cancel_follow;
    };

function add_follow(){
    var add_btn = document.getElementById("add");
    var cancel_btn = document.getElementById("cancel");
    var follow_btn = document.getElementById("follow");
    var f_cancel_btn = document.getElementById("cancel_follow");
        add_btn.classList.remove("show");
        add_btn.classList.add("hide");
        cancel_btn.classList.add("show");
        cancel_btn.classList.remove("hide");
        follow_btn.classList.remove("show");
        follow_btn.classList.add("hide");
        f_cancel_btn.classList.add("show");
        f_cancel_btn.classList.remove("hide");
}

function cancel_follow(){
    var add_btn = document.getElementById("add");
    var cancel_btn = document.getElementById("cancel");
    var follow_btn = document.getElementById("follow");
    var f_cancel_btn = document.getElementById("cancel_follow");
        cancel_btn.classList.remove("show");
        cancel_btn.classList.add("hide");
        add_btn.classList.add("show");
        add_btn.classList.remove("hide");
        f_cancel_btn.classList.remove("show");
        f_cancel_btn.classList.add("hide");
        follow_btn.classList.add("show");
        follow_btn.classList.remove("hide");
}