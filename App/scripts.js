function cancel(){
    if (confirm("Are you sure you want to cancel?\nYou will lose all data")) {
            window.history.back();
        } 
}
function confirm_reset() {
    return confirm("Are you sure you want to reset all text?");
}