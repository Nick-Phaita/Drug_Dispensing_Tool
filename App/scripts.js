function cancel(){
    if (!confirm("Are you sure you want to cancel?\nYou will lose all progress")) {
        return false;
    }else{
        window.history.back();
    }

}
function confirm_reset() {
    return confirm("Are you sure you want to reset all text?");
}
function back(){
    if (confirm("Are you sure you want to go back?")) {
        window.history.back();
    }
}